@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">投稿を編集</div>
                <div class="panel-body">
                  <form action="{{ url('/posts', $post->id) }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {!! method_field('patch') !!}

                    <div class="form-group">
                        <input type="text" class="form-control" name="content" placeholder="今なにしてる？" value="{{ old('content', $post->content) }}">
                    </div>
                    <div class="form-group">
                      <input type="file" name="picture">
                    </div>
                    <div class="row">
                      <button type="submit" name="post" class="btn btn-primary btn-sm pull-right" style="margin-right:20px">編集する</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
     </div>
</div>

@endsection
