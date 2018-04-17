<!-- create.blade.php -->

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
            <input type="text" class="form-control" name="name" value="{{$idea->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{$idea->description}}">
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
                <lable>Visibility</lable>
                <select name="visibility">
                  <option value="1">Visible</option>
                  <option value="0">Not visible</option>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
          <input  value="{{$idea->id}}" type="hidden" name="id">  
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

