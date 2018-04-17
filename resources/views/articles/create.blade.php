@extends('layouts.app')

@section('content')
<div class="container">
      <h2>Ajouter un article à la boutique</h2><br/>
      <form method="post" action="{{url('articles')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        <!-- article name -->
        <div class="row">
          <div class="col-md-0"></div>
          <div class="form-group col-md-4">
            <label for="Name">Nom :</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>

        <!-- article description -->
        <div class="row">
          <div class="col-md-0"></div>
            <div class="form-group col-md-4">
              <label for="Description">Description :</label>
              <input type="text" class="form-control" name="description">
            </div>
          </div>

        <!-- article image -->
        <div class="row">
          <div class="col-md-0"></div>
          <div class="form-group col-md-4">
            <label for="Image">Image :</label>
            <input type="file" name="image">    
         </div>
        </div>
        
        <!-- article price -->
        <div class="row">
          <div class="col-md-0"></div>
            <div class="form-group col-md-4">
              <label for="Price">Prix :</label>
              <input type="text" class="form-control" name="price">
            </div>
        </div>


        <!-- article category -->
        <div class="row">
          <div class="col-md-0"></div>
            <div class="form-group col-md-4">
                <lable>Catégorie</lable>
                <select name="category">
                  <option value="">--</option>
                  <option value="Vêtement">Vêtements</option>
                  <option value="Evénement">Evènemtents</option>
                  <option value="Accessoires">Accessoires</option>  
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-0"></div>
              <div class="form-group col-md-4">
                <label for="Description">Si aucune catégorie ci-dessus ne correspond à votre atricle vous pouvez l'ajouter ici:</label>
                <input type="text" class="form-control" name="category">
              </div>
            </div> 
        
        <!-- button for add article -->
        <div class="row">
          <div class="col-md-0"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Ajouter l'article</button>
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
