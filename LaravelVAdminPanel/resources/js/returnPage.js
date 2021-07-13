$(document).ready(function(){
    console.log('return-page')

    $('.js-remove-page-notif').click(remove_page_notif);

    function check_notification_page_message(){
        let count = $('.js-paste-notifications').children();
        if(count.length === 0){
            if(!$('.js-control-notification-section').hasClass('none')) {
                $('.js-control-notification-section').addClass('none')
            }
        } else {
            if($('.js-control-notification-section').hasClass('none')) {
                $('.js-control-notification-section').removeClass('none')
            }
        }
    }

    function remove_page_notif(event){
        $(this).closest('.style-notification').remove()
        check_notification_page_message();
    }

    function add_notification_page(message, status){
        let notification = '<li class="style-notification padding_t_10 padding_lrb_10 ' + status + '">\n' +
            '                            <p>' + message +'</p>\n' +
            '                            <div class="notification_message_control js-remove-page-notif ">\n' +
            '                                <i class="fas fa-times delete_notif"></i>\n' +
            '                            </div>\n' +
            '                        </li>'
        let notif = $(notification);
        notif.find('.js-remove-page-notif').click(remove_page_notif);
        $(notif).appendTo($('.js-paste-notifications'));
        check_notification_page_message();
    }

    $('.js-save-return-item').click(function (event){
        console.log('save-return-button');
        let $names = $('.content_repeater').find('[name]')

        // for (let value of $names) {
        //     console.log(value);
        // }
        let data = new FormData();
        let post_title = $('[name=post_title]').val();
        if(post_title === ''){
            add_notification_page(
                'Не заполнено оглавление записи',
                'error'
            )
            return;
        }
        data.append('post_title', post_title)
        data.append('draft', $('.sidebar_right').find('.field_section_container')
            .find('.custom_checkbox').children('.custom_input_text').val())

        $names.each
        (
            function (index) {
                let current_name = $(this).attr('name');
                if(current_name.indexOf('imageField')!== -1){
                    data.append(current_name, $(this).attr('data-id'));
                }
                else if(current_name.indexOf('inputField') !== -1){
                    data.append(current_name, $(this).val())
                }
                else if(current_name.indexOf('textareaInput') !== -1){
                    data.append(current_name, $(this).val())
                }
            }
        );

        for (let value of data.values()) {
            console.log(value);
        }

        $.ajax({
            url: window.ajaxCreateReturnItem,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function(data){
                console.log('success');
                console.log('status = ' + data.status);

            },
            error: function(jqXHR, status, errorThrown){
                console.log('Ошибка ajax запроса: ' + status, jqXHR);
            }
        })
    })
})
