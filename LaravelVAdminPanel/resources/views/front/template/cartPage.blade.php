@extends('front.layout.app')

@section('title')
    {{ $title }}
@endsection

@section('header_menu_active')
@endsection

@section('page')

    @include('front.section.Cart')

    @foreach( $fields as $key => $value )
        @include('front.section.' . $key)
    @endforeach

@endsection
