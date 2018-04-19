@extends('layouts.app')

@section('content')
<div class="container">
      <h2>Edit A Form</h2><br  />
        <form method="post" action="{{action('IdeaController@update', $id)}}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="creator">Createur :</label>
            <input type="text" class="form-control" name="creator" value="{{$idea->creator}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="title">Titre</label>
              <em>Ne doit contenir que des lettres de 2 à 15 caractères</em>
              <input type="text" class="form-control" name="title" value="{{$idea->title}}" pattern="[A-za-z]+" minlength="2" maxlength="15">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">Descritpion:</label>
              <em>Ne doit pas contenir plus de 150 caractères</em>
              <input type="text" class="form-control" name="description" value="{{$idea->description}}" maxlength="150">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
@endsection