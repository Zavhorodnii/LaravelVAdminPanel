console.log('v_ajax');


document.querySelector('.js-send-form-review').addEventListener('click', function (e) {
    e.preventDefault();
    console.log('js_form_footer');

    let div = document.createElement('div');
    div.className = "form__error";
    div.innerHTML = "Ошибка";

    let js_get_form_info = this.closest('.js-get-form-info')
    let name = js_get_form_info.querySelector('.js-get-name');
    if (name.value.length < 4){
        if( !name.classList.contains('_form-error') ) {
            name.classList.add('_form-error')
        }
        return;
    }else {
        name.classList.remove('_form-error')
    }
    let phone = js_get_form_info.querySelector('.js-get-phone');
    if (phone.value.replace(/\D/g, '').length < 10){
        if( !phone.classList.contains('_form-error') ) {
            phone.classList.add('_form-error')
        }
        return;
    }else {
        phone.classList.remove('_form-error');
    }
    let email = js_get_form_info.querySelector('.js-get-email');
    if (email.value.length < 4){
        if( !email.classList.contains('_form-error') ) {
            email.classList.add('_form-error')
        }
        return;
    }else {
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
    data.append("_token", token.getAttribute('content') );
    data.append('link', link.value);
    data.append('file_count', form_files.files.length);
    data.append('mess', message.value);

    let i = 0, len = form_files.files.length
    for ( ; i < len; i++ ) {
        data.append('file_' + i, form_files.files[i]);
    }
    request.responseType =	"json";
    request.open("POST", url, true);
    request.onreadystatechange = function()
    {
        let obj = request.response;
        if(this.readyState !== 4)
            return;

        if(this.status === 200)
        {
            // let data = JSON.parse(this.responseText);
            // console.log(this);
            if(obj.status === 'ok'){
                name.value = '';
                phone.value = '';
                email.value = '';
                link.value = '';
                message.value = '';
                form_files.files = null;
            }

        }
        else
        {
            if(obj.onError != null)
                obj.onError(this.status, this.statusText, this.responseText);
        }
    }
    request.send(data);
})
