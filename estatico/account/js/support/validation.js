$(document).ready(function() {
	Support.initialize();
});

/**
 * Methods used in validating support forms
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       AccountSettings
 * @requires    
 * @example
 *
 *      AccountSettings.initialize();
 *
 */

var Support = {
	form: '',
	requiredField: {},
	submitButton: {},
	initialize: function() {
		Support.form = '#support-form';
		Support.requiredField = $(Support.form + ' .form-row.required input');
		Support.requiredCheckboxField = $(Support.form + ' .form-row-checkbox.required input');
		Support.submitButton = $('#support-submit');
		Support.hasSecondName = $('#hasSecondName');
		Support.secondName = $('#secondName');
		
		if (!Support.form.length) {
			return false;
		}
		
		if (Support.hasSecondName.is(":checked") ){
	    	disableField(Support.secondName); 
		}
		
		var reqLength=1;
		if (this.maxLength && this.maxLength == 6){
			reqLength = 6;
		}

		Support.requiredField.bind('focus blur input propertychange', function() {
			if ($(this).val().length >= reqLength) {
				setTimeout(function() {
					if (Support.getStatus() === 'complete') {
						UI.wakeButton(Support.submitButton);
					}
				}, 250);
			} else {
				UI.freezeButton(Support.submitButton);
			}
		});

		Support.requiredCheckboxField.bind('focus blur input propertychange click', function() {
			if ($(this).val().length > 0) {
				setTimeout(function() {
					if (Support.getStatus() === 'complete') {
						UI.wakeButton(Support.submitButton);
					}
				});
			} else {
				UI.freezeButton(Support.submitButton);
			}
		});

	},

	getStatus: function() {
		if (!Support.form.length) {
			Support.initialize();
		}
		var length	= Support.requiredField.length;
		var	i		= length - 1;
		if (i >= 0) { do {
			if (trim($(Support.requiredField[i]).val()).length === 0 && $(Support.requiredField[i]).is(':enabled')) {
				return 'incomplete';
			
			}
		} while (i--);}
		return 'complete';
	}
};

function toggleRequiredField(field) {
	var fieldObj = $(field);
	
    if (fieldObj.is(':disabled')) {
    	enableField(fieldObj);
    } else { 
    	disableField(fieldObj);
    }
	if (Support.getStatus() === 'complete') {
		UI.wakeButton(Support.submitButton);
	}else{
		UI.freezeButton(Support.submitButton);
	}

}

function enableField(fieldObj){
	fieldObj.removeAttr('disabled');
	fieldObj.val('');
}

function disableField(fieldObj){
	fieldObj.val('N/A');
	fieldObj.attr('disabled', 'disabled'); 
}

function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
