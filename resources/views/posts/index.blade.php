@extends('default')
@section('content')
    @foreach($posts as $post)
        <h1>{{ $post->title }}</h1>
        @if($post->category)
            <p><em>{{ $post->category->name }}</em></p>
        @endif
        <p>{{ $post->content }}</p>
        <p><a href="{{ route('news.edit',$post) }}" class="btn btn-primary">Editer</a></p>
    @endforeach
@stop