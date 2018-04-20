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
        @auth
        <a href="{{action('ArticleController@showCart')}}" class="btn btn-primary" role="button">Mon panier</a>
        @endauth
     </div>

    <!-- Display articles -->
    <div class="row">
      @foreach($articles as $article)

        @if ( $priceMin <= $article['price'] && $article['price'] <= $priceMax)
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
                        <strong>{{$article['price']}} €</strong>
                        @auth
                        <br/>
                        <br/>
                        <p> <a href="{{action('ArticleController@addToCart', $article['id'])}}" class="btn btn-primary" role="button">Ajouter au panier</a> 
                        <hr/>

                        @endauth                                  
                    </div>
                    </div>
                </div>

          @endif
        
      @endforeach

      </div>
  </table>
  </div>

@endsection
