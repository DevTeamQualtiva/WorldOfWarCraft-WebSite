
$(function() {
	Pvp.initialize();
});

var Pvp = {

	/**
	 * Dynamic slide menu.
	 */
	menu: null,

	/**
	 * Set event handlers.
	 */
	initialize: function() {
		Pvp.menu = new DynamicMenu('#menu-pvp', { rootDirectLink: false });
		Pvp.recentTopics();

		$('#filter-bg').change(function() {
			Core.goTo('?battlegroup='+ $(this).val());
		})

		$('.top-teams .column:first, .team-comps .comp:first').addClass('first-child');
	},

	/**
	 * Load in the recent topics from the forums.
	 */
	recentTopics: function() {
		$.ajax({
			url: Core.baseUrl +'/pvp/trending',
			dataType: 'html',
			cache: true,
			success: function(data) {
				$('#recent-topics').removeClass('loading').html(data);
			},
			error: function() {
				$('.recent-topics').fadeOut();
			}
		});
	}
	
};
