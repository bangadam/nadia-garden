@extends('layouts.app')

@section('title', ' - Menu')

@section('content')

<h1 class="menu-header">Menu</h1>

<p>
    We take garden fresh seriously, offering you a farm to table dining experience.
    Our ingredients are found locally, using only the best organic suppliers available.
    Check out our popular lunch salad buffet!
</p>

<div class="menu">
    @foreach($categories as $category)
        <div class="category">
            <a name="{{Str::slug($category->name)}}"></a>
            <h2 class="category-name">{{$category->name}}</h2>
            <hr>
            @foreach($category->menuItems as $item)
            <div class="menu-item">
                <img src="/storage/images/{{$item->image}}">
                <div>
                    <strong>{{$item->name}}</strong>
                    <p>{{$item->description}}</p>
                </div>
                <div class="price">
                    {{round($item->price, 2)}}
                </div>
            </div>
            @endforeach
        </div>
    @endforeach
</div>

@endsection
