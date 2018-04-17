@extends('layouts.app')
@section('content')
  <div class="container">
    @if(Auth::check())
        <a href="{{action('IdeaController@create')}}" class="btn btn-primary">Ajouter une idée</a><br />
    @endif
    <div class="row">
      @foreach($ideas as $idea)
        <div class="panel panel default" style="maxheight:300px;">
          <div class="panel-heading">
            <a href="{{action('IdeaController@view',$idea['id'])}}">
            <h1 class="panel-title">{{$idea['title']}}</h1></a>
            <p>Vote total
              <!-- {{$nbVote = 0}} -->
              @foreach($votes as $vote)
                @if($vote['idea_id'] == $idea['id'])
                  <!-- {{$nbVote++}} -->
                @endif
              @endforeach
              {{$nbVote}}
            </p>
          </div>
          <div class="panel-body">
            {{$idea['description']}}
          </div>
        </div>
      @endforeach
@endsection
