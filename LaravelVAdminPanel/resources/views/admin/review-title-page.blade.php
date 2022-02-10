@extends('admin.layout.app')

@section('page-title')
    Оглавления отзывов
@endsection

@section('all-block-review-menu')
    active
@endsection

@section('main-block-title')
    Блок оглавлений отзывов
@endsection

@section('all-review-title-submeny-all')
    active
@endsection

@section('main-content')
    @include('admin.TemplatePages.review-title')
@endsection

@section('right-aside')
    <aside class="sidebar_right ">

        <div class="field_section">
            <div class="field_section_header padding_10">

                <div class="control-tab">
                    <div class="header_text">Управление</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>
            <div class="field_section_container">
                <div class="field_section_container_button border_top padding_10">
                    <button class="button aside-style-button style_button add-new-page js-update-post-item" type="button">
                        Обновить запись
                    </button>
                </div>
            </div>
        </div>

    </aside>
@endsection

@section('popup-upload')
    @include('admin.include.popup-files')
@endsection

@section('ajaxUrl')
    {{--    <script>--}}
    {{--        tinymce.init({--}}
    {{--            selector: 'textarea'--}}
    {{--        });--}}
    {{--    </script>--}}
    <script>
        window.ajax_update_post = '{{ route('edit-review-title') }}';
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/control_posts.js') }}"></script>
@endsection
