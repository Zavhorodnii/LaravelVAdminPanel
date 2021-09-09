/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/main_all_block.js ***!
  \****************************************/
$(document).ready(function () {
  console.log('main all block');

  function addLoader() {
    $('.content').addClass('loader');
    $('.sidebar_right').addClass('loader');
  }

  function removeLoader() {
    $('.content').removeClass('loader');
    $('.sidebar_right').removeClass('loader');
  }

  $('.js-delete-return-item').click(function (event) {
    addLoader();
    var data = new FormData();
    data.append('post_id', $(this).attr('data-block-id'));
    var single_page = $(this).closest('.single-page');
    $('.content').addClass('loader');
    $.ajax({
      url: window.ajaxDeleteReturnItem,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        // console.log('success');
        // console.log('status = ' + data.status);
        if (data.status === 'ok') {
          single_page.remove();
        }

        removeLoader();
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
        removeLoader();
      }
    });
  });
  $('.js-ajax-check-control').click(function () {
    var input = $(this).find('.custom_input_text');
    var data = new FormData();
    addLoader();
    data.append('post_id', input.attr('data-block-id'));
    data.append('draft', input.attr('value'));
    $.ajax({
      url: window.ajaxChangeDraftStatus,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: data,
      success: function success(data) {
        if (data.status === 'ok') {// console.log('+++')
        }

        removeLoader();
      },
      error: function error(jqXHR, status, errorThrown) {
        console.log('Ошибка ajax запроса: ' + status, jqXHR);
        removeLoader();
      }
    });
  });
});
/******/ })()
;