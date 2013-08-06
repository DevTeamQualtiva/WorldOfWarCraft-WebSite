$(document).ready(function() {
	AccountSettings.initialize();
});

/**
 * Methods used in changing user's email address.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       AccountSettings
 * @requires    
 * @example
 *
 *      AccountSettings.initialize();
 *
 */
var AccountSettings = {
	form: '',
	requiredField: {},
	submitButton: {},
	initialize: function() {
		AccountSettings.form = '#change-settings';
		AccountSettings.requiredField = $(AccountSettings.form + ' .form-row.required input');
		AccountSettings.submitButton = $('#settings-submit');

		if (!AccountSettings.form.length) {
			return false;
		}

		AccountSettings.requiredField.bind({
			'keyup': function() {
				if ($(this).val().length > 0) {
					setTimeout(function() {
						if (AccountSettings.getStatus() === 'complete') {
							UI.wakeButton(AccountSettings.submitButton);
						}
					}, 250);
				} else {
					UI.freezeButton(AccountSettings.submitButton);
				}
			},
			'blur': function() {
				if ($(this).val().length > 0) {
					if (AccountSettings.getStatus() === 'complete') {
						UI.wakeButton(AccountSettings.submitButton);
					}
				} else {
					UI.freezeButton(AccountSettings.submitButton);
				}
			}
		});
	},

	getStatus: function() {
		if (!AccountSettings.form.length) {
			AccountSettings.initialize();
		}
		var length	= AccountSettings.requiredField.length;
		var	i		= length - 1;
		if (i >= 0) { do {
			if ($(AccountSettings.requiredField[i]).val().length === 0) {
				return 'incomplete';
			}
		} while (i--);}
		return 'complete';
	}
};
