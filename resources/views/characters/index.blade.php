@extends('main')

@section('content')
<h2>Characters</h2>

@if ( !$info->count )
You have no characters
@else


<form class="form-horizontal" role="form" method="POST" action="/searchcharacter">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-3 control-label">Character Name</label>
        <div class="col-md-3">
            <input type="text" class="form-control" name="name" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Owner</label>
        <div class="col-md-2">
           <select name="status"  class="form-control">
                <option value="alive">Alive</option>
                <option value="dead">Dead</option>
                <option value="unknown">unknown</option>
           </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Species</label>
        <div class="col-md-2">
            <input type="text" class="form-control" name="species" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Type</label>
        <div class="col-md-2">
            <input type="text" class="form-control" name="type" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Gender</label>
        <div class="col-md-2">
            <select name="gender"  class="form-control">
                <option value="female">Female</option>
                <option value="make">Male</option>
                <option value="genderless">Genderless</option>
                <option value="unknow">Unknown</option>
           </select>
        </div>
    </div>



    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Search
            </button>
        </div>
    </div>
</form>

<ul>
    @foreach( $characters as $character )
    <li style="list-style: none; float:left; width:100%; ">
        <div style="float: left; width:150px"><a href="/character/{{$character->id}}">{{ $character->name }}</a></div>
        <div style="float: left; width:150px">{{ $character->status }}</div>
        <div style="float: left; width:150px">{{ $character->species }}</div>
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
    <li class="page-item"><a class="page-link" href="/pagination/character/{{$i}}">{{$i}}</a></li>
    
    @endfor
    @if($info->next != null)
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    @endif
    
  </ul>
</nav>
@endsection