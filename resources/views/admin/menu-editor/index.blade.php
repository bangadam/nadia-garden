@extends('layouts.app')

@section('title', ' - Admin Menu')

@section('content')
    <menu-editor :categories="{{$categories}}"></menu-editor>
@endsection
