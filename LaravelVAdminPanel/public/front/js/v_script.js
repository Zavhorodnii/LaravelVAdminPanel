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
            }

        } else {
            if (obj.onError != null)
                obj.onError(this.status, this.statusText, this.responseText);
        }
    }
    request.send(data);
}

console.log('v_ajax2');
