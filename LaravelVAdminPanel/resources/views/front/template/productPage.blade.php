@extends('front.layout.app')

@section('title')
    {{ $title . ' | ' . $productInfo['title'] }}
@endsection

@section('header_menu_active')
@endsection

@section('page')

    @include('front.section.Product')

    @foreach( $fields as $key => $value )
        @include('front.section.' . $key)
    @endforeach
@endsection
