@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Modération du commentaire</h2><br  />
        <form method="post" action="{{action('CommentController@update', $id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="form-group col-md-4">
              <label for="description">Contenu du commentaire :</label>
              <input type="text" class="form-control" name="content" value="{{$comment->content}}">
            </div>
          </div>
        <div class="row">
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success btn-lg" >Modifier le commentaire</button>
          </div>
        </div>
      </form>
      <form  action="{{action('CommentController@destroy', $id)}}" method="post">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <button class="btn btn-danger btn-lg" type="submit">Supprimer le commentaire</button>
      </form></span>
    </div>
@endsection
