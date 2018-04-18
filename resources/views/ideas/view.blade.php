@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
            <h1>{{$idea['title']}}</h1>
            <h5>{{$idea['creator']}}</h5>
            <h5>
                Nombre de vote : 
                <!-- {{$nbVote=0}} -->
                @foreach($votes as $vote)
                    @if($vote['idea_id']==$idea['id'])
                        <!-- {{$nbVote++}} -->
                    @endif
                @endforeach
                {{$nbVote}}
            </h5></br>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="row">
                <div class="col-xs-6 col-sm-4">
                    @if(Auth::check())
                </div>
                <div class="col-xs-6 col-sm-4">
                @if(Auth::user()->isAdmin() || Auth::user()->isBDE())
                    <a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-warning">Modifier</a>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-4">
                    @if($idea['visibility'])
                    <a href="{{action('IdeaController@private',$idea['id'])}}" class="btn btn-warning">Signaler</a>
                    @else
                    <a href="{{action('IdeaController@unPrivate',$idea['id'])}}" class="btn btn-warning">Remettre</a>
                    @endif
                    <a href="{{action('IdeaController@ideaEvent', $idea['id'])}}" class="btn btn-primary">Event</a>
                </div>
                <div class="col-xs-6 col-sm-4"> 
                    <form action="{{action('IdeaController@destroy', $idea['id'])}}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
    {{$idea['description']}}
</div>
  @endsection