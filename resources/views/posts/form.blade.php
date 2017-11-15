 <?php
 if($post->id){
     $options = ['method'=>'put','url'=>action('PostController@update',$post)];
 }else {
     $options = ['method'=>'posts','url'=>action('PostController@store')];
 }
 ?>

 {{--  {{ var_dump($errors) }}  --}}
@include('errors');
    {{--  {!! Form::open(['method'=>'put','url'=>route('news.update',$post)]) !!}  --}}
    {{--  {!! Form::model($post,['method'=>'put','url'=>route('news.update',$post)]) !!}  --}}
    {!! Form::model($post,$options) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titre') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'URL') !!}
            {!! Form::text('slug', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Catégorie') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags_list[]', 'Tag') !!}
            {{--  $article->tags->pluck('id')')  --}}
            {{--  {!! Form::select('tags_list[]', App\Tag::pluck('name','id'), $post->tags->pluck('id'), ['class'=>'form-control','multiple'=>true]) !!}  --}}
            {!! Form::select('tags_list[]', App\Tag::pluck('name','id'), null, ['class'=>'form-control','multiple'=>true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Contenu') !!}
            {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label>
                {!! Form::checkbox('online', 1) !!}
                En ligne?
            </label>            
        </div>
        <button><span class="btn btn-primary">Envoyer</span></button>
    {!! Form::close() !!}