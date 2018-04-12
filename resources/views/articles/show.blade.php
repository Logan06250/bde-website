@extends('layouts.app')

@section('content')

    <div class="container">
    <br/>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <h1> </h1>
     <br/>

    <div class="row">

        
          <div class="col-ms-6 col-md-4">
            <div class="thumbnail">
            <img src="{{asset('/images')}}/{{$article['image']}}" alt="{{$article['name']}}">
              <div class="caption">
                <h3>{{$article['name']}}</h3>
                <p>{{$article['description']}}</p>
                <strong>{{$article['price']}} €</strong>
                <br/>
                <a href="{{action('ArticleController@edit', $article['id'])}}" class="btn btn-warning" role="button">Modifier</a> 
                <a href="{{action('ArticleController@destroy', $article['id'])}}" class="btn btn-danger" role="button">Supprimer</a></p>
             </div>
            </div>
          </div>
        
      

      </div>
  </table>
  </div>

@endsection