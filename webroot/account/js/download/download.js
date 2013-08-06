$(document).ready(function() {
	$('div.category table tbody tr').bind({
		'mouseover': function() {
			var tr = this;
			if ($(this).hasClass('language-pack')) {
				tr = '.' + $(this).attr('class').split(' ')[1];
			}
			$(tr).addClass('hover');
		},
		'mouseout': function() {
			var tr = this;
			if ($(this).hasClass('language-pack')) {
				tr = '.' + $(this).attr('class').split(' ')[1];
			}
			$(tr).removeClass('hover');
		}
	});
	DownloadFilter.initialize();
	LanguageSelection.initialize();
});

/**
 * Filters display of game client downloads.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       LanguageSelection
 * @requires    
 * @example
 *
 *      DownloadFilter.initialize();
 *
 */
var DownloadFilter = {
	links: {},
	initialize: function() {
		DownloadFilter.links = $('.download-filter a');

		if (!DownloadFilter.links.length) {
			return false;
		}

		if (window.location.hash) {
			var hash = window.location.hash;
			if (typeof hash === 'string' && hash.indexOf('#') === 0 && hash.length < 19) {
				switch (hash) {
					case '#all-downloads':
					case '#wow-downloads':
					case '#sc2-downloads':
					case '#classic-downloads':
						DownloadFilter.filterBy(hash);
						break;
				}
			}
		}

		DownloadFilter.links.unbind('click').bind({
			'click': function() {
				DownloadFilter.filterBy($(this).attr('href'));
			}
		});
	},
	filterBy: function(target) {
		var category = target.split('-')[0];
		DownloadFilter.links.removeClass('active');
		$('.download-filter a[href="' + target + '"]').addClass('active');
		if (category === '#all') {
			$('div.category').removeClass('hidden');
		} else {
			$('div.category').addClass('hidden');
			$(category).removeClass('hidden');
		}
	}
};

/**
 * Toggles display of game client region & language selection.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       LanguageSelection
 * @requires    
 * @example
 *
 *      LanguageSelection.initialize();
 *
 */
var LanguageSelection = {
	links: {},
	initialize: function() {
		LanguageSelection.links = $('.language-selection a');

		if (!LanguageSelection.links.length) {
			return false;
		}
		var tr = $('tr.localized'),
			length = tr.length,
			i = length - 1;
		if (i >= 0) { do {
			var id = $(tr[i]).attr('id').split('-');
			id = id[0] + '-' + id[1];
		} while (i--);}

		LanguageSelection.links.unbind('click').bind({
			'click': function() {
				LanguageSelection.displayDialog(this);
				return false;
			}
		});

		$('a.disabled-download').bind({
			'click': function() {
				return false;
			}
		});

	},
	displayDialog: function(target) {
		var id = $(target).attr('rel'),
			downloads = '.' + id.split('-')[1] + '.' + id.split('-')[2] + '.localized .download a';
		$('#' + id).removeClass('hidden');
		$('#' + id + ' .regions a').unbind('click').bind({
			'click': function() {
				LanguageSelection.changeRegion($(this).attr('rel'));
				return false;
			}
		});
		$('#' + id + ' .languages a').unbind('click').bind({
			'click': function() {
				LanguageSelection.changeLanguage($(this).attr('id'));
				return false;
			}
		});

		$(target).addClass('hidden');

		// disable download links while dialog is open
		$(downloads).addClass('disabled-download').bind({
			'click': function() {
				return false;
			}
		});

		$('#' + id + ' p.controls a').unbind('click').bind({
			'click': function() {
				var rel = $(this).parent().parent().parent().parent().attr('id'),
					region = rel.split('-')[2],
					lang = $(this).parent().parent().find('.languages .active').attr('rel');
				$(this).parent().parent('div.region-selection').addClass('hidden');
				$(this).parent().parent().parent().find('.language-selection a').removeClass('hidden');
				$(this).parent().parent().parent().parent().find('.download a').removeClass('disabled-download').unbind('click');
				return false;
			}
		});
	},
	changeRegion: function(target) {
		var rel = target.split('-'),
			region = rel[3],
			game = rel[1],
			client = rel[2],
			id = game + '-' + client + '-' + region,
			name = $(' .regions a[rel="languages-' + id + '"]').text();
		$('tr.localized.' + game + '.' + client).each(function() {
			// update the table row
			$(this).attr('id', id);
			var lang = $('#languages-' + id + ' .languages a').attr('rel');

			// highlight the active region name
			$('#' + id + ' .active-region').text(name);
			$('#' + id + ' .regions a').removeClass('active');
			$(' .regions a[rel="languages-' + id + '"]').addClass('active');

			// display the languages for the active region
			$('#' + id + ' .available-languages').addClass('hidden');
			$('#languages-' + id).removeClass('hidden');

			// select the default language
			LanguageSelection.changeLanguage('language-' + id + '-' + lang);

			// display the relevant support link
			$('.' + game + '-' + client + '-restrictions').addClass('hidden');
			$('#restrictions-' + id).removeClass('hidden');

			if (client === 'full') {
				// display any available language packs
				$('.language-pack-' + game + '-full').addClass('hidden');
				$('.language-pack-' + game + '-full-' + region).removeClass('hidden');
				// this is the only way IE can recover a <tr> properly from display:hidden
				// (simply removing .hidden doesn't work, neither does setting display:table-row).
				$('.language-pack-' + game + '-full').css('display', 'none');
				$('.language-pack-' + game + '-full-' + region).css('display', '');
			}
		});
	},
	changeLanguage: function(target) {
		var rel = target.split('-'),
			region = rel[3],
			game = rel[1],
			client = rel[2],
			lang = rel[4],
			name = $('#' + target).text(),
			id = game + '-' + client + '-' + region;

		// highlight the active language name
		$('#' + id + ' .active-language').text(name);
		$('#' + id + ' .languages a').removeClass('active');
		$('#' + target).addClass('active');

		// enable the download links
		$('#' + id + ' .download a').addClass('hidden');
		$('#win-' + game + '-' + client + '-' + lang).removeClass('hidden');
		$('#mac-' + game + '-' + client + '-' + lang).removeClass('hidden');
	}
};
