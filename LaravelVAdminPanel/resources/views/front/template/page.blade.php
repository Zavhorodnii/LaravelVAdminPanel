@extends('front.layout.app')

@section('title')
    {{ $title }}
@endsection

@section('header_menu_active')
active
@endsection

@section('page')
    @foreach( $fields as $key => $value )
        @include('front.section.' . $key)
    @endforeach
@endsection
