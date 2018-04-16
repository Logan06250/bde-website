<!-- create.blade.php -->

@extends('layouts.app')
@section('content')
  @if (Route::has('login'))
    @auth
      <div class="container">
        <h2>Merci de prendre le temps de créer une idée</h2><br/>
        <form method="post" action="{{url('ideas')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-4"></div>
           <div class="form-group col-md-4">
              <label for="Creator">Cette idée va être créer au nom de :</label>
              <input type="text" class="form-control" name="creator" value="{{Auth::user()->name}}" readonly="readonly">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Title">Titre :</label>
              <input type="text" class="form-control" name="title">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Description">Description :</label>
              <textarea type="text" class="form-control" name="description" style="height=300px;"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
              <input value ="{{Auth::user()->id}}" type="hidden" class="form-control" name="user_id">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    @else
    @endauth
  @endif
@endsection