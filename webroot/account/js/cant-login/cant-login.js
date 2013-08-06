$(document).ready(function() {
	CantLogin.initialize();
});

var CantLogin = {
    initialize : function() {
        $(".form-anchor").bind({
            'click' : function() {
                var f = $(this).attr('href'),
                    parents = $(".form-anchor").parent(),
                    parent = null,
                    child = null,
                    icon = null,
                    subForm = null,
                    length = 0,
                    i = 0,
                    collapsed = false;

                for (i = 0, length = parents.length; i < length; i++) {
                    parent = $(parents[i]);
                    child = parent.children('.form-anchor');
                    child = parent.children('.form-anchor');
                    if (child.attr('href') === f && parent.hasClass('open')) {
                        collapsed = true;
                        continue;
                    }
                }

                for (i = 0, length = parents.length; i < length; i++) {
                    parent = $(parents[i]);
                    child = parent.children('.form-anchor');
                    icon = child.children("span.icon-32");
                    subForm = parent.children('.sub-form');
                    if (child.attr('href') === f && !parent.hasClass('open')) {
                        parent.addClass('open');
                        child.removeClass('faded');
                        icon.addClass('open').removeClass('closed-faded');
                        subForm.show();
                    } else {
                        parent.removeClass('open');
                        if (collapsed) {
                            child.removeClass('faded');
                            icon.removeClass('open').removeClass('closed-faded');
                        } else {
                            child.addClass('faded');
                            icon.removeClass('open').addClass('closed-faded');
                        }
                        subForm.hide();
                    }
                }
                /*
                parents.removeClass('open')
                $("span.icon-32").removeClass('open').addClass('closed-faded');
                $(".form-anchor").addClass('faded');
                $(".sub-form").hide();

                $(this).parent().addClass('open');
                $(this).removeClass('faded');
                $(this).children(":first").addClass('open').removeClass('closed-faded');
                $(f).show();
                */
                return false;
            }
        });

        $("#email").bind('focus blur input propertychange click', function() {
			if ($("#photoId").length != 0) {
                CantLogin.validateRemoveAuthenticator();
            }
		});

        $("#confirmCheck").bind('focus blur input propertychange click', function() {
			CantLogin.validateRemoveAuthenticator();
		});

        $("#description").bind('focus blur input propertychange click', function() {
			CantLogin.validateRemoveAuthenticator();
		});

        $("#description").focus(
            function() {
                this.select();
            }
        );

        $("#photoId").bind('focus blur input propertychange click mouseout', function() {
			CantLogin.validateRemoveAuthenticator();
		});

        $('textarea[maxlength]').keyup(function(){
             var limit = parseInt($(this).attr('maxlength'));
             var text = $(this).val();
             var chars = text.length;

             if(chars > limit){
                 var new_text = text.substr(0, limit);
                 $(this).val(new_text);
             }

        });
    },
    showFileUpload : function() {
        $("#hidden-file-upload").show();
    },
    validateRemoveAuthenticator : function() {
        var formValid = true;

        if ($("#email").val().length == 0) { formValid = false; }
        if ($("#photoId").val().length == 0) { formValid = false; }
        if ($("#confirmCheck").is(":checked")) {} else { formValid = false; }

        if (formValid) { UI.wakeButton($('#authenticatorSubmit'));} else { UI.freezeButton($('#authenticatorSubmit')); }
    }
};
