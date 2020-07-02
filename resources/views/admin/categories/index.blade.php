@extends('layouts.app')

@section('title', ' - Categories')

@section('content')
    <h4 class="intro">Categories Manager</h4>
    <categories-manager :initial-categories="{{$categories}}"></categories-manager>
@endsection
