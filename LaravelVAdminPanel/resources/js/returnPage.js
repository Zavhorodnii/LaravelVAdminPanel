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

    function remove_all_page_notif(event){
        $('.js-paste-notifications').html('');
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


    function addLoader(){
        $('.content').addClass('loader')
        $('.sidebar_right').addClass('loader')
    }

    function removeLoader(){
        $('.content').removeClass('loader')
        $('.sidebar_right').removeClass('loader')
    }

    $('.js-save-return-item').click(function (event){
        console.log('save-return-button');
        let $names = $('.content_repeater').find('[name]')

        addLoader();
        remove_all_page_notif();
        let errors = 0;
        let data = new FormData();
        let $name = $('[name=post_title]')
        let post_title = $name.val();
        if(post_title === ''){
            add_notification_page(
                'Не заполнено оглавление записи',
                'error'
            )
            $name.closest('.field').addClass('error')
            errors++;
        }
        else if($name.closest('.field').hasClass('error'))
            $name.closest('.field').removeClass('error')
        data.append('post_title', post_title)
        data.append('draft', $('.sidebar_right').find('.field_section_container')
            .find('.custom_checkbox').children('.custom_input_text').val())

        $names.each
        (
            function (index) {
                let current_name = $(this).attr('name');
                if(current_name.indexOf('imageField')!== -1 ){
                    let value = $(this).attr('data-id')
                    data.append(current_name, value);
                    if(value  === ''){
                        let field = $(this).closest('.field')
                        if(field.hasClass('required')){
                            add_notification_page(
                                'Не заполнено поле: ' + field.find('.title_section').text(),
                                'error'
                            )
                            field.addClass('error')
                            errors++;
                        }
                    }
                    else if($(this).closest('.field').hasClass('error'))
                        $(this).closest('.field').removeClass('error')
                }
                else if((current_name.indexOf('inputField') !== -1) || (current_name.indexOf('textareaInput') !== -1)){
                    let value = $(this).val();
                    if(value  === ''){
                        let field = $(this).closest('.field')
                        if(field.hasClass('required')){
                            add_notification_page(
                                'Не заполнено поле: ' + field.find('.title_section').text(),
                                'error'
                            )
                            field.addClass('error')
                            errors++;
                        }
                    }
                    else if($(this).closest('.field').hasClass('error'))
                        $(this).closest('.field').removeClass('error')
                    data.append(current_name, $(this).val())
                }
            }
        );

        for (let value of data.values()) {
            console.log(value);
        }

        if(errors > 0){
            return;
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
                removeLoader();
                if(data.status === 'ok'){
                    console.log('url = ' + data.url)

                    window.location.replace(data.url);
                }
            },
            error: function(jqXHR, status, errorThrown){
                console.log('Ошибка ajax запроса: ' + status, jqXHR);
                removeLoader();
            }
        })
    })

    $('.js-update-return-item').click(function (){
        console.log('update-return-button');
        let $names = $('.content_repeater').find('[name]')

        addLoader();
        remove_all_page_notif();
        let errors = 0;
        let data = new FormData();
        let $name = $('[name=post_title]')
        let post_title = $name.val();
        if(post_title === ''){
            add_notification_page(
                'Не заполнено оглавление записи',
                'error'
            )
            $name.closest('.field').addClass('error')
            errors++;
        }
        else if($name.closest('.field').hasClass('error'))
            $name.closest('.field').removeClass('error')

        $url = window.location.href;
        $arr = $url.split('/')
        data.append('post_id', $arr[$arr.length - 1])


        data.append('post_title', post_title)
        console.log('draft = ' + $('.sidebar_right').find('.field_section_container')
            .find('.custom_checkbox').children('.custom_input_text').val())
        data.append('draft', $('.sidebar_right').find('.field_section_container')
            .find('.custom_checkbox').children('.custom_input_text').val())

        $names.each
        (
            function (index) {
                let current_name = $(this).attr('name');
                if(current_name.indexOf('imageField')!== -1 ){
                    let value = $(this).attr('data-id')
                    data.append(current_name, value);
                    if(value  === ''){
                        let field = $(this).closest('.field')
                        if(field.hasClass('required')){
                            add_notification_page(
                                'Не заполнено поле: ' + field.find('.title_section').text(),
                                'error'
                            )
                            field.addClass('error')
                            errors++;
                        }
                    }
                    else if($(this).closest('.field').hasClass('error'))
                        $(this).closest('.field').removeClass('error')
                }
                else if((current_name.indexOf('inputField') !== -1) || (current_name.indexOf('textareaInput') !== -1)){
                    let value = $(this).val();
                    if(value  === ''){
                        let field = $(this).closest('.field')
                        if(field.hasClass('required')){
                            add_notification_page(
                                'Не заполнено поле: ' + field.find('.title_section').text(),
                                'error'
                            )
                            field.addClass('error')
                            errors++;
                        }
                    }
                    else if($(this).closest('.field').hasClass('error'))
                        $(this).closest('.field').removeClass('error')
                    data.append(current_name, $(this).val())
                }
            }
        );
        console.log('before for')
        for (let value of data.values()) {
            console.log(value);
        }

        if(errors > 0){
            return;
        }

        $.ajax({
            url: window.ajaxUpdateReturnItem,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function(data){
                console.log('success');
                console.log('status = ' + data.status);
                add_notification_page(
                    'Запись обновлена',
                    'ok'
                )
                removeLoader();
            },
            error: function(jqXHR, status, errorThrown){
                console.log('Ошибка ajax запроса: ' + status, jqXHR);
                removeLoader();
            }
        })
    })

    $('.js-delete-return-item').click(function (event){
        addLoader();
        $url = window.location.href;
        $arr = $url.split('/')
        let data = new FormData();
        data.append('post_id', $arr[$arr.length - 1])

        $.ajax({
            url: window.ajaxDeleteReturnItem,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function(data){
                console.log('success');
                console.log('status = ' + data.status);
                removeLoader();
                if(data.status === 'ok'){
                    console.log('url = ' + data.url)
                    window.location.replace(data.url);
                }
            },
            error: function(jqXHR, status, errorThrown){
                console.log('Ошибка ajax запроса: ' + status, jqXHR);
                removeLoader();
            }
        })

    })
})
