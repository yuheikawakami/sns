@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">近況を投稿</div>
                <div class="panel-body">
                  <form action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" class="form-control" name="content" placeholder="今なにしてる？" value="{{ old('content') }}">
                    </div>
                    <div class="form-group">
                      <input type="file" name="picture">
                    </div>
                    <div class="row">
                      <button type="submit" name="post" class="btn btn-primary btn-sm pull-right" style="margin-right:20px">投稿する</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
     </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table">
            @foreach($posts as $post)

            <tr>
              <td>
                <p><small>近況を投稿しました
                     {{ date("Y/ n/ j  H:i", strtotime($post->created_at)) }}
                </p>
                <h4>{{ $post->content }}</h4>

                <form action="{{ action('PostsController@destroy', $post->id) }}" method="post" id="form_{{ $post->id }}">
                  {!! csrf_field() !!}
                  {!! method_field('delete') !!}

                  <button type="button" data-id="{{ $post->id }}" class="pull-right" onclick="deletePost(this);" >削除</button>
                </form>

                <button type="button" class="pull-right" onclick="location.href='{{ action('PostsController@edit', $post->id) }}'" >編集</button>


                <a href="{{ action('PostsController@show', $post->id)}}">コメントを読む</a>
                <p>コメント数：{{ $post->comment_count }}</p>


               </td>
             </tr>
             @endforeach
          </table>
         </div>
       </div>
      </div>
   </div>
</div>

<script>
function deletePost(e) {
  'use strict';

  if (confirm("削除しますか？")) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endsection
