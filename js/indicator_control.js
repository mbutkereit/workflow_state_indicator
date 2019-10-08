(function ($, Drupal) {
    Drupal.behaviors.indicatorControl = {
        attach: function (context, settings) {

            $('.current_moderation_state').each(function () {
                $(this).click(function () {
                    $(this).parent().find('.current_moderation_state__settings').hide();
                });
            });

            
            $('.current_moderation_state__background_input').each(function () {

                if(!localStorage.getItem('Drupal.indicator_control.background')) {
                    localStorage.setItem('Drupal.indicator_control.background','hidden');
                }

                if(localStorage.getItem('Drupal.indicator_control.background') === 'show') {
                    var color = $(this).parent().parent().find('.current_moderation_state').css('background-color');
                    $('body').css('background-color', color);
                    $(this).prop('checked', true);
                }


                $(this).change(function () {
                    if ($(this).is(':checked')) {
                        var color = $(this).parent().parent().find('.current_moderation_state').css('background-color');
                        $('body').css('background-color', color);
                        localStorage.setItem('Drupal.indicator_control.background','show');
                    }else{
                        $('body').css('background-color', '');
                        localStorage.setItem('Drupal.indicator_control.background','hidden');
                    }
                });



            });

        }
    };
})(jQuery, Drupal);
