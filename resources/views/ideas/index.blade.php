@extends('layouts.app')
@section('content')



    <div class="container"><br />

        <div class="jumbotron">
      <h2>Bienvenue dans la boîte à idée</h2>
      <p>Ici tu pourras soumettre tes idées au BDE, mais aussi voter pour tes idées préférées.</p>
      <a href="{{action('IdeaController@create')}}" class="btn btn-primary">Soumettre une idée</a>
    </div>

    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif

         <div class="row">

          @foreach($ideas as $idea)

            <div class="col-ms-6 col-md-12">
            <div class="thumbnail">
                <h3>{{$idea['title']}}</h3>
                <p>{{$idea['description']}}</p>
                <p>{{$idea['creator']}}</p>
                <br/>
                <br/>
                @if(Auth::check() && (Auth::user()->isAdmin()) || Auth::user()->isBDE())
                <a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-warning">Edit</a>
                
                  <form action="{{action('IdeaController@destroy', $idea['id'])}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                
                  @endif
                
             </div>
            </div>
        
      @endforeach

      </div>

   
    </div>

  @endsection