
$(document).ready(function (){
console.log('v_ajax');

if (document.querySelector('.js-send-form-review') !== null) {
    document.querySelector('.js-send-form-review').addEventListener('click', function (e) {
        e.preventDefault();
        console.log('js_form_footer');

        let js_get_form_info = this.closest('.js-get-form-info')
        let name = js_get_form_info.querySelector('.js-get-name');
        if (name.value.length < 4) {
            if (!name.classList.contains('_form-error')) {
                name.classList.add('_form-error')
            }
            return;
        } else {
            name.classList.remove('_form-error')
        }
        let phone = js_get_form_info.querySelector('.js-get-phone');
        if (phone.value.replace(/\D/g, '').length < 10) {
            if (!phone.classList.contains('_form-error')) {
                phone.classList.add('_form-error')
            }
            return;
        } else {
            phone.classList.remove('_form-error');
        }
        let email = js_get_form_info.querySelector('.js-get-email');
        if (email.value.length < 4) {
            if (!email.classList.contains('_form-error')) {
                email.classList.add('_form-error')
            }
            return;
        } else {
            email.classList.remove('_form-error')
        }
        let link = js_get_form_info.querySelector('.js-get-link');
        let message = js_get_form_info.querySelector('.js-get-message');

        let form_files = js_get_form_info.querySelector('.js-get-files');

        const request = new XMLHttpRequest();
        const url = window.addReview;

        let token = document.querySelector('meta[name="csrf-token"]')
        let data = new FormData();

        data.append('action', 'ajax_form_footer');
        data.append('name', name.value);
        data.append('phone', phone.value);
        data.append('email', email.value);
        data.append("_token", token.getAttribute('content'));
        data.append('link', link.value);
        data.append('file_count', form_files.files.length);
        data.append('mess', message.value);

        let i = 0, len = form_files.files.length
        for (; i < len; i++) {
            data.append('file_' + i, form_files.files[i]);
        }
        request.responseType = "json";
        request.open("POST", url, true);
        request.onreadystatechange = function () {
            let obj = request.response;
            if (this.readyState !== 4)
                return;

            if (this.status === 200) {
                // let data = JSON.parse(this.responseText);
                // console.log(this);
                if (obj.status === 'ok') {
                    name.value = '';
                    phone.value = '';
                    email.value = '';
                    link.value = '';
                    message.value = '';
                    form_files.files = null;
                }

            } else {
                if (obj.onError != null)
                    obj.onError(this.status, this.statusText, this.responseText);
            }
        }
        request.send(data);
    })
}

if (document.querySelector('.js-send-consultation') !== null) {
    document.querySelector('.js-send-consultation').addEventListener('click', function (e) {
        e.preventDefault();
        console.log('js-send-consultation');

        let js_get_form_info = this.closest('.js-get-form-info')
        let name = js_get_form_info.querySelector('.js-get-name');
        if (name.value.length < 4) {
            if (!name.classList.contains('_form-error')) {
                name.classList.add('_form-error')
            }
            return;
        } else {
            name.classList.remove('_form-error')
        }

        let email = js_get_form_info.querySelector('.js-get-email');
        if (email.value.length < 4) {
            if (!email.classList.contains('_form-error')) {
                email.classList.add('_form-error')
            }
            return;
        } else {
            email.classList.remove('_form-error')
        }
        let phone = js_get_form_info.querySelector('.js-get-phone');
        if (phone.value.replace(/\D/g, '').length < 10) {
            if (!phone.classList.contains('_form-error')) {
                phone.classList.add('_form-error')
            }
            return;
        } else {
            phone.classList.remove('_form-error');
        }

        const request = new XMLHttpRequest();
        const url = window.sendMail;

        let token = document.querySelector('meta[name="csrf-token"]')
        let data = new FormData();

        data.append('action', 'ajax_form_consultation');
        data.append('name', name.value);
        data.append('phone', phone.value);
        data.append('email', email.value);
        data.append("_token", token.getAttribute('content'));

        request.responseType = "json";
        request.open("POST", url, true);
        request.onreadystatechange = function () {
            let obj = request.response;
            if (this.readyState !== 4)
                return;

            if (this.status === 200) {
                // let data = JSON.parse(this.responseText);
                // console.log(this);
                if (obj.status === 'ok') {
                    name.value = '';
                    phone.value = '';
                    email.value = '';
                }

            } else {
                if (obj.onError != null)
                    obj.onError(this.status, this.statusText, this.responseText);
            }
        }
        request.send(data);
    })
}

if (document.querySelector('.js-click-add-to-cart') !== null) {
    document.querySelectorAll('.js-click-add-to-cart').forEach(item => {
        item.addEventListener('click', addToCart)
    })
}

function addToCart(e) {
    e.preventDefault();
    console.log('js-click-add-to-cart');

    let js_get_form_info = this.closest('.js-get-product-info')
    let product_id = js_get_form_info.getAttribute('data-product-id');


    const request = new XMLHttpRequest();
    const url = window.cartControl;

    let token = document.querySelector('meta[name="csrf-token"]')
    let data = new FormData();

    console.log('product_id = ', product_id)
    console.log('cartControl = ', window.cartControl)

    data.append('product_id', product_id);
    data.append("_token", token.getAttribute('content'));

    request.responseType = "json";
    request.open("POST", url, true);
    request.onreadystatechange = function () {
        let obj = request.response;
        if (this.readyState !== 4)
            return;

        if (this.status === 200) {
            // let data = JSON.parse(this.responseText);
            // console.log(this);
            if (obj.status === 'ok') {
                console.log(obj.cookie_control)
                let headerCartGift = $.parseHTML(obj.headerCartGift);
                headerCartGift = $(headerCartGift);
                headerCartGift.find('.js-remove-product').click(remove_product);
                $('.js-paste-all-basket').html(headerCartGift)
                js_paste_cart_count(obj.cartCount)

                // document.querySelector('.js-paste-all-basket').innerHTML = headerCartGift;
            }

        } else {
            if (obj.onError != null)
                obj.onError(this.status, this.statusText, this.responseText);
        }
    }
    request.send(data);
}

    console.log('ready')

    $('.js-change-quantity').click(function (event){
        event.preventDefault();
        let data = new FormData;
        let $cart_item = $(this).closest('.js-get-cart-item');
        let $get_info = $(this).closest('.js-get-info');
        let product_id = $cart_item.attr('data-product-id');
        let quantity = $get_info.find('input[type=number]').val()

        data.append('id',  product_id)
        data.append('quantity', quantity)

        let token = document.querySelector('meta[name="csrf-token"]')
        data.append("_token", token.getAttribute('content'));
        console.log('click')

        // console.log(data);

        // return;

        $.ajax({
            url: window.changeQuantity,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                // console.log('data' + data);
                // console.log('data = ' + data.status);
                if(data.status == 'ok') {
                    console.log('ok');
                    $cart_item.find('.js-paste-product-subTotal').text(data.productSubtotal + ' руб')
                    $('.js-paste-cart-subTotal').text(data.cartSubTotal + ' руб')
                    $('[data-product-id=' + product_id + ']').find('.js-paste-quantity').text(quantity)
                }

            },
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
                // ошибка при отправке
            }
        })
    })

    $(document).find('.js-remove-product').click(remove_product)

    function remove_product(event){
        event.preventDefault();
        let data = new FormData;
        let $remove_item = $(this).closest('.js-get-cart-item')
        let product_id = $remove_item.attr('data-product-id');

        data.append('id', product_id)

        let token = document.querySelector('meta[name="csrf-token"]')
        data.append("_token", token.getAttribute('content'));
        console.log('click')


        // return;

        $.ajax({
            url: window.removeProduct,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                // console.log('data' + data);
                // console.log('data = ' + data.status);
                if(data.status == 'ok') {
                    console.log('ok')
                    $('.js-paste-cart-subTotal').text(data.cartSubTotal + ' руб')
                    $('.js-cart-elem[data-product-id=' + product_id + ']').remove();

                    js_paste_cart_count(data.cartCount)
                }

            },
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
                // ошибка при отправке
            }
        })
    }


    function js_paste_cart_count( count ){
        $('.js-paste-cart-count').html(count);
    }



    $('.js-click-add-gift').click(function (event){
        event.preventDefault();
        let data = new FormData;
        let $remove_item = $(this).closest('.js-get-cart-item')

        data.append('id',  $(this).attr('data-gift-id'))

        let token = document.querySelector('meta[name="csrf-token"]')
        data.append("_token", token.getAttribute('content'));
        console.log('click')

        // console.log(data);

        // return;

        $.ajax({
            url: window.addGift,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                // console.log('data' + data);
                // console.log('data = ' + data.status);
                if(data.status == 'ok') {
                    console.log('ok')
                    let html = $.parseHTML(data.giftHtml);
                    html = $(html);
                    html.find('.js-remove-product').click(remove_product);

                    let headerCartGift = $.parseHTML(data.headerCartGift);
                    headerCartGift = $(headerCartGift);
                    headerCartGift.find('.js-remove-product').click(remove_product);


                    $('.js-remove-gift').remove();
                    $('.js-paste-items').append(html)
                    // $('.js-paste-header-items').insertBefore(headerCartGift)
                    headerCartGift.insertBefore('.js-paste-header-items')

                    js_paste_cart_count(data.cartCount)
                }

            },
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
                // ошибка при отправке
            }
        })
    })

    $('.js-click-cart-order').click(function (event){
        event.preventDefault();
        let data = new FormData;

        let js_get_form_info = this.closest('.js-get-form-info')
        let name = js_get_form_info.querySelector('.js-get-name');
        if (name.value.length < 4) {
            if (!name.classList.contains('_form-error')) {
                name.classList.add('_form-error')
            }
            return;
        } else {
            name.classList.remove('_form-error')
        }

        let email = js_get_form_info.querySelector('.js-get-email');
        if (email.value.length < 4) {
            if (!email.classList.contains('_form-error')) {
                email.classList.add('_form-error')
            }
            return;
        } else {
            email.classList.remove('_form-error')
        }
        let phone = js_get_form_info.querySelector('.js-get-phone');
        if (phone.value.replace(/\D/g, '').length < 10) {
            if (!phone.classList.contains('_form-error')) {
                phone.classList.add('_form-error')
            }
            return;
        } else {
            phone.classList.remove('_form-error');
        }

        let token = document.querySelector('meta[name="csrf-token"]')

        data.append('name', name.value);
        data.append('phone', phone.value);
        data.append('email', email.value);
        data.append("_token", token.getAttribute('content'));
        console.log('click')

        console.log('name = ' + name.value);
        console.log('phone = ' + phone.value);
        console.log('email = ' + email.value);

        // return;

        $.ajax({
            url: window.cartOrder,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                // console.log('data' + data);
                // console.log('data = ' + data.status);
                if(data.status == 'ok') {
                    console.log('ok')
                    name.value = '';
                    phone.value = '';
                    email.value = '';

                    $('.js-paste-all-basket').html('<span>Корзина пуста</span>')
                    $('.js-paste-items').html('<span>Корзина пуста</span>')
                    $('.js-paste-cart-subTotal').text('0 руб')

                    js_paste_cart_count(0)
                }

            },
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
                // ошибка при отправке
            }
        })
    })
})



console.log('v_ajax2');
