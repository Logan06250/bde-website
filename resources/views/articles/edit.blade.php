@extends('layouts.app')

@section('content')

<div class="container">

      <h2>Modification de l article</h2>
        <br/>
        <form method="post" action="{{action('ArticleController@update', $id)}}" enctype="multipart/form-data">
        {{csrf_field()}}        
        <input name="_method" type="hidden" value="PATCH">
        

        <!-- Edit name -->
        <div class="row">
          <div class="col-md-0"></div>
          <div class="form-group col-md-4">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" name="name" value="{{$article->name}}">
          </div>
        </div>

        <!-- Edit Description -->
        <div class="row">
          <div class="col-md-0"></div>
            <div class="form-group col-md-4">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description" value="{{$article->description}}">
            </div>
          </div>

          <!-- Change article category -->
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

          <!-- Change image -->
          <div class="row">
            <div class="col-md-0"></div>
              <div class="form-group col-md-4">
                <label for="Image">Image :</label>
                <input type="file" name="image" value="{{$article->image}}">    
            </div>
          </div>

          <!-- Edit price -->

            <div class="row">
          <div class="col-md-0"></div>
            <div class="form-group col-md-4">
              <label for="price">Prix :</label>
              <input type="text" class="form-control" name="price" value="{{$article->price}}">
            </div>
          </div>

          <!-- Update changes -->
          <div class="form-group col-md-0" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>

      </form>
    </div>

    @endsection