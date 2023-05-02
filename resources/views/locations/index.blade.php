@extends('main')

@section('content')
<h2>Locations</h2>

@if ( !$info->count )
You have no characters
@else
<ul>
    @foreach( $locations as $location )
    <li style="list-style: none; float:left; width:100%; ">
        <div style="float: left; width:150px"><a href="location/{{$location->id}}">{{ $location->name }}</a></div>
        <div style="float: left; width:150px">{{ $location->type }}</div>
        <div style="float: left; width:150px">{{ $location->dimension }}</div>
    </li>
    @endforeach
</ul>
@endif

<nav aria-label="Page navigation example" style="clear:both">
  <ul class="pagination">
    @if($info->prev != null)
     <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    @endif
    @for($i=2;$i <= $info->pages; $i++)
    <li class="page-item"><a class="page-link" href="/pagination/location/{{$i}}">{{$i}}</a></li>
    
    @endfor
    @if($info->next != null)
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    @endif
    
  </ul>
</nav>
@endsection