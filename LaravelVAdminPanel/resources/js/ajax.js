$(document).ready(function(){
  console.log('ajax.js ready')


    let ajaxUpload;

    $('.js-add-input-field').click(function (event){
        let upload_elem = $('.upload-input');
        upload_elem.html('<input type="file" class="js-select-upload-file">');
        upload_elem.find('.js-select-upload-file').change(selectInputFile);
        upload_elem.find('.js-select-upload-file').click();
    })

    $('.js-remove-upload').click(function (event){

        ajaxUpload.abort();
        let $items = $('.upload-input').children('.js-select-upload-file');

        $items.each
        (
            function (index) {
                $(this).remove();
            }
        );

        $(this).closest('.load-file').addClass('none')
        $('.js-add-input-field').removeClass('none');
    })

    function selectInputFile(event){
        console.log('select file');

        let upload_button = $('.js-add-input-field');
        upload_button.addClass('none');
        let selected_file = $(this).prop('files')[0]
        let data = new FormData();
        data.append('file', selected_file);
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        // for (let value of data.values()) {
        //     console.log(value);
        // }


        console.log(' window.ajaxUploadUrl = ' +  window.ajaxUploadUrl)

        let block_upload_file = $('.js-upload-file');
        block_upload_file.find('.file_name').text(selected_file.name)
        block_upload_file.removeClass('none');

        ajaxUpload = $.ajax({
            url: window.ajaxUploadUrl,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;

                        block_upload_file.find('.upload-progress').css('width', percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function(data){
                console.log('success');
                upload_button.removeClass('none');
                block_upload_file.addClass('none');
                console.log(data.status);
                console.log(data.size);
                console.log('id = ' + data.id);


                if(data.status === 'ok'){
                    let image = '\n' +
                        '                    <div class="single_item">\n' +
                        '                        <img class="single-upload-file js_paste_name"\n' +
                        '                             type="text" name="name6"\n' +
                        '                             src="' + data.path + '"\n' +
                        '                             alt="" data-id="'+ data.id +'">\n' +
                        '                    </div>';
                    $('.uploaded_files').prepend(image)
                }

            },
            error: function(jqXHR, status, errorThrown){
                console.log('Ошибка ajax запроса: ' + status, jqXHR);
            }
        })
    }
})
