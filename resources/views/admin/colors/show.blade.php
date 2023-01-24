@extends('layouts.admin')
@section('content')
<h1>Show color</h1>
<h2>{{$color->name}}</h2>
<h2>{{$color->hex_value}}</h2>

    
@endsection