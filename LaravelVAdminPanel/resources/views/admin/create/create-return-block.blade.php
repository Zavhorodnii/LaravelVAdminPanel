@extends('admin.layout.app')

@section('page-title')
    Возврат
@endsection

@section('main-block-title')
    Создание записи
@endsection

@section('all-block-menu')
    active
@endsection

@section('all-return-submeny-all')
    active
@endsection

@section('main-content')
    @include('admin.TemplatePages.return')
@endsection

@section('right-aside')
    <aside class="sidebar_right">

        <div class="field_section">
            <div class="field_section_header padding_10">
                <div class="control-tab">
                    <div class="header_text">Управление</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>

            <div class="field_section_container">
                <div class="checkbox_field section_input border_top padding_10 js_find_elem">
                    <input type="text"
                           class="none js_paste_name"
                           name="name7" value="">
                    <ul>
                        <li>
                            <div class="custom_checkbox ">
                                <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text"
                                       value="0">
                                <label class="title_section click"
                                       for="">
                                    Черновик
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="field_section_container_button border_top padding_10">
                    <button class="button aside-style-button style_button add-new-page js-save-return-item" type="button">
                        Создать запись
                    </button>
                    {{--                    <a href="{{ route('all-return-page') }}" class="create style_button add-new-page js-save-return-item">--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </div>

    </aside>
@endsection

@section('popup-upload')
    @include('admin.include.popup-files')
@endsection


@section('ajaxUrl')
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <script>
        window.ajaxUploadUrl = '{{ route('upload-file') }}';
        window.ajaxGetSelectedInfo = '{{ route('get-selected-info') }}';
        window.ajaxUpdateFileInfo = '{{ route('update-file-info') }}';
        window.ajaxDeleteSelectedFile = '{{ route('delete-selected-file') }}';
        window.ajaxCreateReturnItem = '{{ route('create-return-item') }}';
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/returnPage.js') }}"></script>
@endsection
