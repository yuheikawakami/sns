@extends('layouts.app')
@section('content')

<div class="col-xs-8 col-xs-offset-2">

	<p>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</p>
<h2>{{ $post->content }}</h2>

<hr/>

<p>コメント一覧</p>
<ul>
@foreach($post->comments as $show_body)
	<li>{{ $show_body->body }}</li><br/>
@endforeach
</ul>


@if(Session::has('message'))
	<div class="bg-info">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif


@foreach($errors->all() as $message)
	<p class="bg-danger">{{ $message }}</p>
@endforeach

<form action="{{ action('CommentsController@store', $post->id) }}" method="post">
  {{ csrf_field() }}

<div class="form-group">
  <div class="">
    <textarea name="body" rows="8" cols="40"></textarea>
  </div>
</div>

<input type="hidden"  value="$post->id">

<div class="form-group">
  <button type="submit" class="btn btn-primary">投稿する</button>
</div>

</form>


</div>


@endsection
