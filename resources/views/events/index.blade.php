@extends('layouts.app')

@section('content')

    <div class="container">
    <br />


    <div class="jumbotron">
      <h2>Bienvenue sur la page des évènements</h2>
      <p>Ici tu trouveras tous les infortmations des évènements à venir et passés.</p>
    </div>

    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    
      @foreach($events as $event)
      @php
        $date=date('Y-m-d', $event['date']);
        @endphp

<div class="row">
      <div class="col-sm-6 col-md-12">
          <div class="thumbnail">
            <div class="media">
              <div class="media-left">
                <a href="#">
                <img class="media-object" src="{{asset('/images')}}/{{$event['image']}}" alt="...">
                </a>
              </div>
            <div class="media-body">
              <h4 class="media-heading">{{$event['name']}}</h4>
              <p>{{$event['description']}}</p>
              <p class="date">{{$date}}</p>
            </div>
          </div>
        </div>
        

        <a href="{{action('EventController@edit', $event['id'])}}" class="btn btn-warning">Modifier</a>
          <form action="{{action('EventController@destroy', $event['id'])}}" method="post">
          {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Supprimer</button>
          </form>

      
      </div>
    </div>
        


        <a href="{{action('EventController@edit', $event['id'])}}" class="btn btn-warning">Modifier</a>
          <form action="{{action('EventController@destroy', $event['id'])}}" method="post">
          {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Supprimer</button>
          </form>

  </div>
  @endsection