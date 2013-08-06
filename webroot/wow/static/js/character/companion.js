
$(function() {
	setTimeout(Companion.initialize, 50); // Small delay so the loading animation can be seen
});

var Companion = {

	/**
	 * DOM objects.
	 */
	filters: $('#filters'),
	status: '',
	popup: $('#model-popup'),
	model: $("#model-popup div.model"),

	// Set in page source
	data: null,
	grid: null,
	msg: null,
	renderPath: '',
	itemPath: '',
	modelViewer: null,

	POPUP_DELAY_MOUSEOVER: 250,
	POPUP_DELAY_REDUCED_FACTOR: 0.2,

	/**
	 * Setup events.
	 */
	initialize: function() {

		// Timeouts used to let the browser breathe/refresh
		setTimeout(Companion.initFilters, 1);
		setTimeout(Companion.initEvents, 1);

	},

	initFilters: function() {
		Filter.initialize(Companion.applyQuery);
	},

	initEvents: function() {

		// Filters

		Input.bind('#filter-keyword');
		Companion.filters.find('.tabs a').click(Companion.setStatus);

		Filter.bindInputs(Companion.filters, Companion.filterGrid);

		// Model Viewer / Popup

		Companion.modelViewer.setDragCallback(Companion.dragCallback);
		Companion.popup.detach().appendTo('body');

		$('#companions')
			.delegate('a.preview', 'click', Companion.entryClick)
			.delegate('a.preview', 'mousedown', Companion.entryMouseDown)
			.delegate('a.preview', 'mouseenter', Companion.entryMouseOver)
			.delegate('a.preview', 'mouseleave', Companion.entryMouseOut);

		Companion.popup
			.bind('click', Companion.popupClick)
			.bind('mouseenter', Companion.popupMouseOver)
			.bind('mouseleave', Companion.popupMouseOut);
	},

	/**
	 * Grab the data related to the node.
	 *
	 * @param that
	 */
	getCompanionFromNode: function(that) {
		return Companion.data[$(that).data('companion')];
	},

	isDragging: function() {
		return Companion.modelViewer.isDragging();
	},

	dragCallback: function(dragging) {

		if(!dragging) { // When you stop dragging

			// Open popup if you release on another companion
			if(Companion.hoveringEntry && Companion.lastEntry) {
				Companion.openPopup(Companion.lastEntry);

			// Close popup if you release outside
			} else if(!Companion.popupHovered) {
				Companion.closePopup();
			}
		}
	},

	entryClick: function(e) {

		Companion.openPopup(this);

		return false;
	},

	entryMouseDown: function(e) {

		return false;
	},

	entryMouseOver: function(e) {

		Companion.hoveringEntry = true;

		if(Companion.isDragging()) {
			Companion.lastEntry = this;
			return;
		}

		var _this = this;

		// Reduces delay when popup was recently closed
		var delay = Companion.POPUP_DELAY_MOUSEOVER;
		if(Companion.lastClosedPopup && ((new Date()).getTime() - Companion.lastClosedPopup) < 100) {
			delay *= Companion.POPUP_DELAY_REDUCED_FACTOR;
		}

		clearTimeout(Companion.timer);
		Companion.timer = setTimeout(function() {
			Companion.openPopup(_this);
		}, delay);

	},

	entryMouseOut: function(e) {

		Companion.hoveringEntry = false;

		// Prevents popup from opening if you don't hover it long enough
		clearTimeout(Companion.timer);
	},

	popupClick: function(e) {
		// Prevents popup from closing when you click inside it
		e.stopPropagation();
	},

	popupMouseOver: function(e) {

		Companion.popupHovered = true;
	},

	popupMouseOut: function(e) {

		Companion.popupHovered = false;

		if(!Companion.isDragging()) {
			Companion.closePopup();
		}
	},

	/**
	 * Open up the popup (w/ 3D model and details).
	 *
	 * @param node
	 * @param companion
	 */
	openPopup: function(node) {

		node = $(node);

		var companion = Companion.getCompanionFromNode(node);
		if(!companion) {
			return;
		}

		Companion.preparePopup(node, companion);

		var offset = node.offset(),
			popup = Companion.popup;

		popup.css({
			left: (offset.left + (node.width() / 2)) - (popup.width() / 2),
			top: (offset.top + (node.height() / 2)) - (popup.height() / 2)
		});

		popup.show();
		setTimeout(function() {
			Core.scrollToVisible(popup);
		}, 100);
	},

	preparePopup: function(node, companion) {

		// 3D render
		Companion.modelViewer.reset();

		Companion.model.find('div.viewer').css({
			backgroundPosition: '0 0',
			backgroundImage: "url('"+ Companion.renderPath.replace('grid', 'rotate').replace('{id}', companion.npcId) +"')"
		});

		Companion.modelViewer.verifyImage();

		// Details

		var $details = Companion.popup.children('div.details');
		$details.empty();

		// Icon+Name
		var $iconNameWrapper = ( // Link to item page when possible
			companion.itemId ?
			$('<a />').attr({ href: Companion.itemPath.replace('{id}', companion.itemId) }) :
			$('<span />').attr({ 'class': 'tip', 'data-spell': companion.spellId })
		);

		$iconNameWrapper.addClass('name-wrapper color-q' + companion.qualityId);
		$iconNameWrapper.append(Wow.Icon.framedIcon(companion.icon, 36));
		$iconNameWrapper.append($('<span />').addClass('name').text(companion.name));
		$iconNameWrapper.appendTo($details);

		// Type
		$('<span />').addClass('type').text(companion.type ? Companion.msg.mount + ' (' + Companion.msg.mountTypes[companion.type] + ')' : Companion.msg.companion).appendTo($details);;

		// Source
		if(companion.source) {
			$('<ul />').addClass('source').html(companion.source).appendTo($details);
		}

		// Buy Now button
		node.find('a.buy').clone().appendTo($details);
	},

	/**
	 * Close the popup.
	 */
	closePopup: function() {

		Companion.popup.hide();
		Companion.lastClosedPopup = (new Date()).getTime();
	},

	isPopupOpen: function() {
		return Companion.popup.is(':visible');
	},

	/**
	 * Filter the results based on the hash query.
	 *
	 * @param query
	 * @param total
	 */
	applyQuery: function(query, total) {
		var filters = [];
		var checkboxfilter = function(query, type) {
			var hashes = query[type].split(',');

			$("#advanced-filters").show();
			$('#advanced-toggle a').toggle();

			Companion.filters.find('.advanced-filters-'+ type +' input').each(function() {
				if ($.inArray(this.value, hashes) >= 0)
					this.checked = true;
			});

			filters.push( ['row', type, hashes, 'contains' ])
		}

		if (query.status != 'is-collected' && query.status != 'not-collected') {
			query.status = 'is-collected'; // Default tab
		}

		if (query.status) {
			Companion.status = query.status;
			filters.push( ['class', 'status', query.status] );
		}

		if (query.filter) {
			$('#filter-keyword').val(query.filter).trigger('keyup');
			filters.push( ['row', 'filter', query.filter, null, true] );
		}

		if (query.source) {
			checkboxfilter(query, 'source');
		}

		if (query.quality) {
			checkboxfilter(query, 'quality');
		}

		if (query.mode) {
			filters.push( ['class', 'mode', query.mode] );
		}

		Companion.grid.batch(filters, query.page || 1);
		Companion.filters
			.find('.tabs a').removeClass('tab-active').end()
			.find('.tabs a[data-status="'+ (query.status || '') +'"]').addClass('tab-active').end();

		$('#companions-loading').hide();
		$('#companions').show();
	},

	/**
	 * Filter down the grid based on the currently checked radios and checkboxes.
	 *
	 * @param data
	 */
	filterGrid: function(data) {
		var checkboxFilter = function(data, type) {
			var hashes = [];

			Companion.filters.find('.advanced-filters-'+ type +' input').each(function() {
				if (this.checked)
					hashes.push( this.value );
			});

			if (hashes.length)
				Companion.grid.filter('row', data.name, hashes, 'contains');
			else
				Companion.grid.filter('row', data.name, '');

			return hashes.join(',');
		};

		if (data.name == 'source') {
			data.value = checkboxFilter(data, 'source');

		} else if (data.name == 'quality') {
			data.value = checkboxFilter(data, 'quality');

		} else {
			Companion.grid.filter(data.filter, data.name, data.value, null, (data.name == 'filter'));
		}

		Filter.addParam(data.name, data.value);
		Filter.applyQuery();
	},

	/**
	 * Set the status and run a filter.
	 */
	setStatus: function() {
		var node = $(this),
			status = node.data('status');

		node.parent().find('a').removeClass('tab-active');
		node.addClass('tab-active');

		Companion.status = status;
		Companion.grid.filter('class', 'status', status);

		Filter.addParam('status', status);
		Filter.addParam('page', '');
		Filter.applyQuery();
	},

	/**
	 * Toggle advanced filters. Decheck all checkboxes when closing.
	 */
	toggleAdvanced: function(node, show) {
		node = $(node);
		var sib = node.siblings('.advanced-toggle');

		if (node.is(':visible')) {
			node.hide();
			sib.show();

		} else {
			node.show();
			sib.hide();
		}

		$("#advanced-filters").toggle(show);
	},

	/**
	 * Callback triggered after ever data set process.
	 *
	 * @param instance
	 * @param fragment
	 */
	afterProcess: function(instance, fragment) {
		if (instance.pager.totalResults <= 0) {
			var status = Companion.status || 'not-collected';

			instance.controls.hide();

			if (instance.none) {
				instance.none
					.find('span').hide().end()
					.find('.'+ status).show();
			}
		} else {
			instance.controls.show();
		}

		// Add the clear span
		var span = document.createElement('span');
			span.className = 'clear';

		fragment.appendChild(span);

		return fragment;
	},

	/**
	 * Add data to the class.
	 *
	 * @param data
	 */
	setData: function(data) {
		for (var id in data) {
			data[id].id = id;
		}

		Companion.data = data;
	}

}