@extends('layouts.app')

@section('content')

    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <!-- Home of the shop -->
     <div class="jumbotron">
        <h1>Bienvenu sur la boutique du BDE Mister</h1>
        <p>Vous trouverez ici des truc bien et moins bien, cher et moins chers...</p>
     </div>

     <!-- Admin space -->
     <div class="row">
      <div class="col-sm-6 col-md-12">
        <div class="thumbnail">
          <div class="caption">
            <h3>Espace admin</h3>
            <br>
            <a href="{{action('ArticleController@create')}}" class="btn btn-success" role="button">Ajouter un article</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Display articles -->
    <div class="row">
      @foreach($articles as $article)
      @php
        $date=date('Y-m-d', $article['date']);
        @endphp
          <div class="col-ms-6 col-md-4">
            <div class="thumbnail">
              <img src="{{asset('/images')}}/{{$article['image']}}" alt="{{$article['name']}}">
              <div class="caption">
                <h3>{{$article['name']}}</h3>
                <p>{{$article['description']}}</p>
                <strong>{{$article['price']}} €</strong>
                <p><a href="#" class="btn btn-primary" role="button">Ajouter au panier</a> 
                <a href="{{action('ArticleController@edit', $article['id'])}}" class="btn btn-warning" role="button">Modifier</a> 
                <a href="{{action('ArticleController@destroy', $article['id'])}}" class="btn btn-danger" role="button">Supprimer</a></p>
             </div>
            </div>
          </div>
        
      @endforeach

      </div>
  </table>
  </div>
  </body>
</html>

@endsection
