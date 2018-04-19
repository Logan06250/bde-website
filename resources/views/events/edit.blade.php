@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Edit Event</h2><br  />
        <form method="post" action="{{action('EventController@update', $id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <em>Ne doit contenir que des lettres de 2 à 15 caractères</em>
            <input type="text" class="form-control" name="name" value="{{$event->name}}" pattern="[A-za-z]+" minlength="2" maxlength="15">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">Description:</label>
              <em>Ne doit contenir plus de 150 caractères</em>
              <input type="text" class="form-control" name="description" value="{{$event->description}}" maxlength="150">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="file" name="image">    
         </div>
        </div>
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong>Date (YYYY-MM-DD) : </strong>  
            <input class="date form-control"  type="text" id="datepicker" name="date">   
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
                <lable>Evenement du mois</lable>
                <select name="eventMois">
                  <option value="1"  @if($event->eventMois=="1") selected @endif>Non</option>
                  <option value="0"  @if($event->eventMois=="0") selected @endif>Oui</option>
                </select>
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
    <script type="text/javascript">  
      $('#datepicker').datepicker({ 
          autoclose: true,   
          format: 'dd-mm-yyyy'  
       });  
    </script>
@endsection
