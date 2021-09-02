/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/control_posts.js ***!
  \***************************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

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
    console.log('update-return-button'); // let $names = $('.content_repeater').find('[name]')

    var $names = $('.field_section_container').find('[name]');
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
    // data.append('post_title', post_title)
    // console.log('draft = ' + $('.sidebar_right').find('.field_section_container')
    //     .find('.custom_checkbox').children('.custom_input_text').val())
    // data.append('draft', $('.sidebar_right').find('.field_section_container')
    //     .find('.custom_checkbox').children('.custom_input_text').val())

    $names.each(function (index) {
      var current_name = $(this).attr('name');

      if (current_name.indexOf('imageField') !== -1) {
        var value = $(this).attr('data-id');
        data.append(current_name, value);

        if (value === '') {
          var field = $(this).closest('.field');

          if (field.hasClass('required')) {
            add_notification_page('Не заполнено поле: ' + field.find('.title_section').text(), 'error');
            field.addClass('error');
            errors++;
          }
        } else if ($(this).closest('.field').hasClass('error')) $(this).closest('.field').removeClass('error');
      } else if (current_name.indexOf('inputField') !== -1 || current_name.indexOf('textareaInput') !== -1) {
        var _value = $(this).val();

        if (_value === '') {
          var _field = $(this).closest('.field');

          if (_field.hasClass('required')) {
            add_notification_page('Не заполнено поле: ' + _field.find('.title_section').text(), 'error');

            _field.addClass('error');

            errors++;
          }
        } else if ($(this).closest('.field').hasClass('error')) $(this).closest('.field').removeClass('error');

        data.append(current_name, $(this).val());
      }
    });
    console.log('before for');

    var _iterator = _createForOfIteratorHelper(data.values()),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var value = _step.value;
        console.log(value);
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    if (errors > 0) {
      console.log('error');
      removeLoader();
      return;
    }

    removeLoader();
    return;
    $.ajax({
      url: window.ajax_update_post,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        console.log('success');
        console.log('status = ' + data.status);
        add_notification_page('Запись обновлена', 'ok');
        removeLoader();
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
        removeLoader();
        add_notification_page('Ошибка обновления', 'error');
      }
    });
  });
});
/******/ })()
;