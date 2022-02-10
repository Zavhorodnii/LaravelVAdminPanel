
<section class="content">
    <div class="js-get-post-id none" data-post-id="@if(isset($fields)){{ $fields['post_id'] }}@endif"></div>
    <div class="field_section js-control-notification-section none">
        <div class="field_section_container">
            <div class="notification-save-message">
                <ul class=" js-paste-notifications">
                </ul>
            </div>
        </div>
    </div>
    <div class="field_section "> <!--hid_block-->
        <div class="field_section_header padding_10">
            <div class="back-icon">
                <a href="{{ route('all-text-block') }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

            <div class="section_input required field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title"
                       data-base_name="title"
                       @if(isset($fields['title']))
                            value="{{ $fields['title'] }}"
                       @endif
                >
            </div>
            <div class="text-area field required section_input border_top padding_10 js_find_elem">
                <div class="title_section">
                    Описание<span>*</span>
                </div>
                <textarea rows="5"
                          class="style_input_field style_custom_scroll js_paste_name"
                          type="text" name="description" data-type-filed="textareaInput"
                          required>@if(isset($fields['description'])){{ $fields['description'] }}@endif</textarea>
            </div>

        </div>


    </div>
</section>
