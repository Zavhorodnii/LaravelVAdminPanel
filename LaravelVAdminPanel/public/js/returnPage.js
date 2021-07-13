/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/returnPage.js ***!
  \************************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

$(document).ready(function () {
  console.log('return-page');
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

  function add_notification_page(message, status) {
    var notification = '<li class="style-notification padding_t_10 padding_lrb_10 ' + status + '">\n' + '                            <p>' + message + '</p>\n' + '                            <div class="notification_message_control js-remove-page-notif ">\n' + '                                <i class="fas fa-times delete_notif"></i>\n' + '                            </div>\n' + '                        </li>';
    var notif = $(notification);
    notif.find('.js-remove-page-notif').click(remove_page_notif);
    $(notif).appendTo($('.js-paste-notifications'));
    check_notification_page_message();
  }

  $('.js-save-return-item').click(function (event) {
    console.log('save-return-button');
    var $names = $('.content_repeater').find('[name]'); // for (let value of $names) {
    //     console.log(value);
    // }

    var data = new FormData();
    var post_title = $('[name=post_title]').val();

    if (post_title === '') {
      add_notification_page('Не заполнено оглавление записи', 'error');
      return;
    }

    data.append('post_title', post_title);
    data.append('draft', $('.sidebar_right').find('.field_section_container').find('.custom_checkbox').children('.custom_input_text').val());
    $names.each(function (index) {
      var current_name = $(this).attr('name');

      if (current_name.indexOf('imageField') !== -1) {
        data.append(current_name, $(this).attr('data-id'));
      } else if (current_name.indexOf('inputField') !== -1) {
        data.append(current_name, $(this).val());
      } else if (current_name.indexOf('textareaInput') !== -1) {
        data.append(current_name, $(this).val());
      }
    });

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

    $.ajax({
      url: window.ajaxCreateReturnItem,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        console.log('success');
        console.log('status = ' + data.status);
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
      }
    });
  });
});
/******/ })()
;