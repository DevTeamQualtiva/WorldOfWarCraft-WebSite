
var Ladder = {

	/**
	 * Dynamic slide menu.
	 */
	menu: null,

	/**
	 * Max team compositions.
	 */
	maxComps: 2,

	/**
	 * Map of class specs.
	 */
	classes: {},

	/**
	 * Total applied filters.
	 */
	currentFilters: 1,

	/**
	 * Initialize the filters and binds.
	 *
	 * @param filters
	 */
	initialize: function(filters) {
		Ladder.menu = new DynamicMenu('#menu-pvp');

		Core.fixTableHeaders('#ladders');

		// Apply binds
		$('#comp-base .class').change(function() {
			Ladder.showSpecs(this);
		});

		$('#pvp-filters input[name="compType"]').click(function() {
			var value = $(this).val();

			if (value == 'all') {
				$('#team-composition').slideUp();
				$('#filter-comp').val('');
				$('#current-filters').slideUp();
				$('#comp-add').show();
				$('#team-composition .comp:not(#comp-base)').remove();
				Ladder.resetBase();
				Ladder.currentFilters = 1;

			} else {
				$('#team-composition').slideDown();
			}
		});

		$('#filter-rating-min, #filter-rating-max').keydown(function(e) {
			return KeyCode.isNumeric(e.which || e.keyCode);
		});

		// Setup if filters exist
		Ladder.setupComps(filters);
	},

	/**
	 * Clone and add another class comp filter.
	 */
	addComp: function() {
		var length = Ladder.currentFilters,
			filter = $('#comp-base')
				.clone(true)
				.attr('id', 'comp-'+ length)
				.attr('data-index', length);

		filter
			.find('.spec').empty().hide().end()
			.find('.class').val('').end()
			.hide().insertBefore('#comp-add').fadeIn('fast');

		Ladder.currentFilters++;

		if (Ladder.currentFilters == Ladder.maxComps)
			$('#comp-add').hide();

		return filter;
	},

	/**
	 * Open the list of comp filters.
	 *
	 * @param node
	 */
	openFilters: function(node) {
		$(node).parent().slideUp();
		$('#team-composition').slideDown();
		$('#filter-comp-all')[0].checked = false;
		$('#filter-comp-edit')[0].checked = true;

		if (Ladder.currentFilters < Ladder.maxComps)
			$('#comp-add').show();
	},

	/**
	 * Remove from the inline filter list.
	 *
	 * @param index
	 * @param node
	 */
	removeFilter: function(index, node) {
		if (index == 0) {
			Ladder.resetBase();

			$(node).parent().fadeOut('fast', function() {
				$(this).parent().remove();
			});

		} else {
			$('#comp-'+ index).fadeOut('fast', function() {
				$(this).remove();
				$(node).parent().parent().remove();
		});
		}

		Ladder.currentFilters--;

		$('#pvp-filters').submit();

		/*if (Ladder.currentFilters <= 0) {
			Ladder.currentFilters = 1;
			
			$('#current-filters').hide();
			$('#filter-comp-all')[0].checked = true;
			$('#filter-comp-edit')[0].checked = false;
			$('#filter-comp').val('');
			$('#comp-add').show();
		}*/
	},

	/**
	 * Remove the comp filter.
	 *
	 * @param node
	 */
	removeComp: function(node) {
		$(node).parent().fadeOut('fast', function() {
			var self = $(this);

			self.remove();
			$('#comp-filter-'+ self.data('index')).remove();

			Ladder.currentFilters--;

			if (Ladder.currentFilters < Ladder.maxComps)
				$('#comp-add').show();
		});
	},

	/**
	 * Reset the base filter.
	 */
	resetBase: function() {
		$('#comp-base')
			.find('.class').val('').end()
			.find('.spec').empty().hide();
	},
		
	/**
	 * Set the defined class and spec.
	 *
	 * @param filter
	 * @param classId
	 * @param specId
	 */
	setComp: function(filter, classId, specId) {
		classId = classId || '';
		specId = specId || '';
		
		var classField = filter.find('.class');

		classField.val(classId);

		Ladder.showSpecs(classField);

		filter.find('.spec').val(specId);
	},

	/**
	 * Setup all the comp filters if the query exists.
	 *
	 * @param comps
	 */
	setupComps: function(comps) {
		if (comps !== '') {
			$('#filter-comp-all')[0].checked = false;
			$('#filter-comp-edit')[0].checked = true;

			comps = comps.split(',');
			Ladder.currentFilters = 1;

			var filter, build, comp, i;

			for (i = 0; comp = comps[i]; ++i) {
				build = comp.split(':');

				if (i === 0)
					filter = $('#comp-base');
				else
					filter = Ladder.addComp();

				Ladder.setComp(filter, build[0], build[1] || null);
	}
		}
	},

	/**
	 * Generate the spec dropdown based on selected class.
	 *
	 * @param select
	 */
	showSpecs: function(select) {
		var node = $(select),
			value = node.val(),
			spec = node.siblings('.spec'),
			options = '<option value="">'+ Ladder.classes['0'] +'</option>';

		if (value === '') {
			spec.hide();
			
		} else {
			for (var i = 0; i < 3; ++i) {
				options += '<option value="'+ (i + 1) +'">'+ Ladder.classes[value][i] +'</option>';
			}

			spec.html(options).show();
		}
	},

	/**
	 * Format the form before submitting.
	 */
	submit: function() {
		var comp = [],
			minRating = $('#filter-rating-min'),
			maxRating = $('#filter-rating-max'),
			minVal = minRating.val(),
			maxVal = maxRating.val();
		
		$('#team-composition .comp').each(function() {
			var filter = $(this),
				clas = filter.find('.class').val(),
				spec = filter.find('.spec').val();

			if (clas) {
				if (spec)
					comp.push(clas +':'+ spec);
				else
					comp.push(clas);
			}
		});

		$('#filter-comp').val(comp.join(','));

		if (minVal !== '') {
			minVal = Core.numeric(minVal);

		if (minVal <= 0) {
			minRating.val('0');
			minVal = 0;
		}
		}

		if (maxVal !== '') {
			maxVal = Core.numeric(maxVal);

			if (minVal && maxVal < minVal)
			maxRating.val(minVal);
		}

		return true;
	}

};