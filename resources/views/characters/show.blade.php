@extends('main')

@section('content')
<h2>{{$character->name}}</h2>

<img src="{{$character->image}}" />
<p>{{$character->status}}</p>
<p>{{$character->species}}</p>
<p>{{$character->gender}}</p>


@endsection