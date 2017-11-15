@extends('default') 
@section('content')
<h1>Raccourcir un nouveau lien</h1>
<form action="{{ route('link.store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">    
        <label for="url">lien à raccourcir</label>
        <input class ="form-control"   type="text" name="url" id="url" placeholder="http://........">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Raccourcir</button>
    </div>
</form>
@stop