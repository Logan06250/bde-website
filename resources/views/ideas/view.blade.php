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
                    <!-- scan the votes table to increment and display the total number of vote -->
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
                    <!-- check if the uses is connected and display buttons if it's true -->
                        {{$voted=false}}
                        @foreach($votes as $vote)
                        <!-- use a loop to scan the votes table -->
                            @if($vote['idea_id'] == $idea['id'] && $vote['user_id'] == Auth::user()->id)
                            <!-- verify if the connected user already vote for the idea. If it's true, display the un-vote button -->
                                <form method="post" action="{{action('VoteController@destroy', $vote['id'])}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Dévoter</button>
                                </form>
                                <!-- {{$voted=true}} -->
                                @break
                            @endif
                        @endforeach
                        @if($voted==false)
                        <!-- if the connected user haven't voted yet, display the vote button -->
                            <form method="post" action="{{url('votes')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input value="{{$idea['id']}}" type="hidden" class="form-control" name="idea_id">
                                <input value="{{Auth::user()->id}}" type="hidden" class="form-control" name="user_id">
                                <button class="btn btn-primary" type="submit">Voter</button>
                            </form>
                        @endif
                </div>
                <div class="col-xs-6 col-sm-4">
                @if(Auth::user()->isAdmin() || Auth::user()->isBDE())
                    <a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-warning">Modifier</a>
                </div>
                <div class="clearfix visible-xs-block"></div>
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