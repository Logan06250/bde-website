@extends('layouts.app')

@section('content')

    <div class="container">
    <br/>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br/>
     @endif

     <!-- Home of the shop -->
     <div class="jumbotron">
        <h2>Bienvenue sur la boutique du BDE Mister</h2>
        <p>Tu trouveras ici des trucs bien et moins bien, chers et moins chers...</p>
        <a href="{{url('/panier')}}" class="btn btn-primary" role="button">Mon panier</a>
     </div>

     <!-- Admin space -->
     <div class="row">
      <div class="col-sm-6 col-md-12">
        <div class="thumbnail">
          <div class="caption">
            <h3>Espace admin</h3>
            <br/>
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
                <p>{{$article['category']}}</p>
                <p>{{$article['description']}}</p>
                <p>Vendu : {{$article['sold']}}</p>
                <strong>{{$article['price']}} €</strong>
                <br/>
                <br/>
                <p> <a href="{{url('/addarticles' , $article->id)}}" class="btn btn-primary" >Ajouter au panier</a> 
                  <hr/>

                  <a href="{{action('ArticleController@edit', $article['id'])}}" class="btn btn-warning" role="button">Modifier</a>
                  <br/>
                  <br/>
                  <form action="{{action('ArticleController@destroy', $article['id'])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                  </form> </p>
                  
             </div>
            </div>
          </div>
        
      @endforeach

      </div>
  </table>
  </div>

@endsection