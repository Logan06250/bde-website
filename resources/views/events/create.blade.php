return redirect('ideas')->with('sucess','Information supprimer');<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Events page</h2><br/>
      <form method="post" action="{{url('events')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <em>Ne doit contenir que des lettres et des chiffres de 2 à 15 caractères</em>
            <input type="text" class="form-control" name="name" pattern="[A-za-z0-9]+" minlength="2" maxlength="15">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Description">Description:</label>
              <em>Ne doit contenir plus de 150 caractères</em>
              <input type="text" class="form-control" name="description" maxlength="150">
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
            <div class="form-group col-md-4">
                <lable>Evenement du mois</lable>
                <select name="eventMois">
                  <option value="1">Non</option>
                  <option value="0">Oui</option>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
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

