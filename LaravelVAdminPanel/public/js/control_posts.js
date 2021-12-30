/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/control_posts.js ***!
  \***************************************/
// import{ hello } from './app.js';
$(document).ready(function () {
  console.log('control_posts.js');
  $('.js-remove-page-notif').click(remove_page_notif);

  function check_notification_page_message() {
    var count = $('.js-paste-notifications').children();

    if (count.length === 0) {
      if (!$('.js-control-notification-section').hasClass('none')) {
        $('.js-control-notification-section').addClass('none');
      }
    } else {
      if ($('.js-control-notification-section').hasClass('none')) {
        $('.js-control-notification-section').removeClass('none');
      }
    }
  }

  function remove_page_notif(event) {
    $(this).closest('.style-notification').remove();
    check_notification_page_message();
  }

  function remove_all_page_notif(event) {
    $('.js-paste-notifications').html('');
    check_notification_page_message();
  }

  function addLoader() {
    $('.content').addClass('loader');
    $('.sidebar_right').addClass('loader');
  }

  function removeLoader() {
    $('.content').removeClass('loader');
    $('.sidebar_right').removeClass('loader');
  }

  function add_notification_page(message, status) {
    //error ok
    var notification = '<li class="style-notification padding_t_10 padding_lrb_10 ' + status + '">\n' + '                            <p>' + message + '</p>\n' + '                            <div class="notification_message_control js-remove-page-notif ">\n' + '                                <i class="fas fa-times delete_notif"></i>\n' + '                            </div>\n' + '                        </li>';
    var notif = $(notification);
    notif.find('.js-remove-page-notif').click(remove_page_notif);
    $(notif).appendTo($('.js-paste-notifications'));
    check_notification_page_message();
  }

  $('.js-update-post-item').click(function () {
    // console.log('update-return-button');
    // let $names = $('.content_repeater').find('[name]')
    var $names = $('.field_section_container').find('[data-type-filed]');
    addLoader();
    remove_all_page_notif();
    var errors = 0;
    var data = new FormData(); // let $name = $('[name=post_title]')
    // let post_title = $name.val();
    // if(post_title === ''){
    //     add_notification_page(
    //         'Не заполнено оглавление записи',
    //         'error'
    //     )
    //     $name.closest('.field').addClass('error')
    //     errors++;
    // }
    // else if($name.closest('.field').hasClass('error'))
    //     $name.closest('.field').removeClass('error')
    //
    // $url = window.location.href;
    // $arr = $url.split('/')
    // data.append('post_id', $arr[$arr.length - 1])

    var post_id = $('.js-get-post-id').attr('data-post-id');

    if (post_id) {
      data.append('post_id', post_id);
    }

    data.append('draft', $('.sidebar_right').find('.field_section_container').find('.custom_checkbox').children('.custom_input_text').val()); // console.log("len = "  + $names.length)

    $names.each(function (index) {
      // console.log($(this))
      var current_name = $(this).attr('data-type-filed');
      var name = $(this).attr('name'); // console.log("name = " + name);

      if (current_name.indexOf('imageField') !== -1) {
        var value = $(this).attr('data-id');
        data.append(name, value);

        if (value === '') {
          var field = $(this).closest('.field');

          if (field.hasClass('required')) {
            add_notification_page('Не заполнено поле: ' + field.find('.title_section').text(), 'error');
            field.addClass('error');
            errors++;
          }
        } else if ($(this).closest('.field').hasClass('error')) $(this).closest('.field').removeClass('error');
      } else if (current_name.indexOf('inputField') !== -1 || current_name.indexOf('textareaInput') !== -1 || current_name.indexOf('switchField') !== -1) {
        var _value = $(this).val();

        if (_value === '') {
          var _field = $(this).closest('.field');

          if (_field.hasClass('required')) {
            add_notification_page('Не заполнено поле: ' + _field.find('.title_section').text(), 'error');

            _field.addClass('error');

            errors++;
          }
        } else if ($(this).closest('.field').hasClass('error')) $(this).closest('.field').removeClass('error');

        data.append(name, $(this).val());
      } else if (current_name.indexOf('multiple_field') !== -1) {
        if ($(this).closest('.mult_field').hasClass('selected_field')) {
          var _value2 = $(this).attr('data-value');

          if (_value2 === '') {
            var _field2 = $(this).closest('.field');

            if (_field2.hasClass('required')) {
              add_notification_page('Не заполнено поле: ' + _field2.find('.title_section').text(), 'error');

              _field2.addClass('error');

              errors++;
            }
          } else if ($(this).closest('.field').hasClass('error')) $(this).closest('.field').removeClass('error');

          data.append(name, $(this).attr('data-value'));
        }
      }
    }); // console.log('before for')
    // for (let value of data.values()) {
    //     console.log(value);
    // }

    if (errors > 0) {
      // console.log('error')
      removeLoader();
      return;
    } // removeLoader();
    // return;


    $.ajax({
      url: window.ajax_update_post,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        // console.log('success');
        // console.log('status = ' + data.status);
        add_notification_page('Запись обновлена', 'ok');
        removeLoader();

        if (data.url && !post_id) {
          // console.log('data url = ' + data.url)
          window.location.replace(data.url);
        }
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
        removeLoader();
        add_notification_page('Ошибка обновления', 'error');
      }
    });
  });
  $('.js-delete-post-item').click(function (event) {
    // console.log('delete item')
    addLoader(); // $url = window.location.href;
    // $arr = $url.split('/')

    var data = new FormData(); // data.append('post_id', $arr[$arr.length - 1])

    var delete_item = null;
    var post_id = $(this).attr('data-block-id');

    if (post_id) {
      delete_item = $(this).closest('.js-delete-item');
    } else {
      post_id = $('.js-get-post-id').attr('data-post-id');
    }

    if (post_id) {
      data.append('post_id', post_id);
    }

    $.ajax({
      url: window.ajax_delete_post,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        // console.log('success');
        // console.log('status = ' + data.status);
        removeLoader();
        if (delete_item) delete_item.remove();else {
          if (data.status === 'ok') {
            window.location.replace(data.url);
          }
        }
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
        add_notification_page('Ошибка удаления', 'error');
        removeLoader();
      }
    });
  });
  $('.js-change-draft-post').click(function (event) {
    // console.log('js-change-draft-post')
    addLoader();
    var data = new FormData();
    var draft_block = $(this).closest('.js-ajax-check-control').find('.custom_input_text'); // console.log('draft_block = ' + draft_block.val());
    // console.log('draft = ' + draft_block.attr('data-block-id'));

    data.append('id', draft_block.attr('data-block-id'));
    data.append('status', draft_block.val()); // removeLoader();
    // return;

    $.ajax({
      url: window.ajax_change_draft_status,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        // console.log('success');
        // console.log('status = ' + data.status);
        removeLoader();

        if (data.status === 'error') {
          add_notification_page('Ошибка обновления', 'error');
        }
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
        add_notification_page('Ошибка обновления', 'error');
        removeLoader();
      }
    });
  });
});
/******/ })()
;