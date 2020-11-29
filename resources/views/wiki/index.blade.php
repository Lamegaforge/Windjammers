<p>Introduction</p>
<a href="{{LaravelLocalization::localizeUrl('wiki/home')}}">home</a>
<a href="{{LaravelLocalization::localizeUrl('wiki/basic')}}">basic</a>
<a href="{{LaravelLocalization::localizeUrl('wiki/faq')}}">faq</a>
<a href="{{LaravelLocalization::localizeUrl('wiki/subtelties')}}">subtelties</a>

@php
$routes = [
    'mita',
    'miller',
    'costa',
    'biaggi',
    'scott',
    'wessel',
];
@endphp
<p>characters</p>
@foreach($routes as $route)
<a href="{{LaravelLocalization::localizeUrl('wiki/' . $route)}}">{{$route}}</a>
@endforeach

@php
$routes = [
    'beach',
    'clay',
    'concrete',
    'lawn',
    'tiled',
    'stadium',
];
@endphp
<p>stages</p>
@foreach($routes as $route)
<a href="{{LaravelLocalization::localizeUrl('wiki/' . $route)}}">{{$route}}</a>
@endforeach