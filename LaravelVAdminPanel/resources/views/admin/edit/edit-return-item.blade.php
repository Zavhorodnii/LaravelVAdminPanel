@extends('admin.layout.app')

@section('page-title')
    Возврат
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
                            <div class="custom_checkbox @if(isset($fields['draft']))@if($fields['draft'] == 1) checked @endif @endif">
                                <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text"
                                       value="@if(isset($fields['draft'])){{ $fields['draft'] }}@endif">
                                <label class="title_section click"
                                       for="">
                                    Черновик
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="field_section_container_button border_top padding_10">
                    <button class="button aside-style-button style_button add-new-page js-update-return-item" type="button">
                        Обновить запись
                    </button>
                </div>
                <div class="field_section_container_button border_top padding_10">
                    <button class="delete aside-style-button style_button add-new-page js-delete-return-item" type="button">
                        Удалить запись
                    </button>
                </div>
            </div>
        </div>

    </aside>
@endsection

@section('popup-upload')
    @include('admin.include.popup-files')
@endsection

@section('main-block-title')
    Редактирование записи
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
        window.ajaxUpdateReturnItem = '{{ route('update-return-item') }}';
        window.ajaxDeleteReturnItem = '{{ route('delete-return-item') }}';
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/returnPage.js') }}"></script>
@endsection
