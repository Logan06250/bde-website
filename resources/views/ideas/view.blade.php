@extends('layouts.app')
@section('content')
<div class="container">
            <h1>{{$idea['title']}}</h1>
            <h4>Par : {{$idea['creator']}}</h4>
                Nombre de vote : 
                <!-- {{$nbVote=0}} -->
                @foreach($votes as $vote)
                    @if($vote['idea_id']==$idea['id'])
                        <!-- {{$nbVote++}} -->
                    @endif
                @endforeach
                {{$nbVote}}
            </br>
                <em>{{$idea['description']}}</em>

            @if(Auth::check())
                @if(Auth::user()->isAdmin() || Auth::user()->isBDE())
                <p><div class="btn-group" role="group" aria-label="...">
                    <a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-success">Modifier</a>

                    @if($idea['visibility'])
                    <a href="{{action('IdeaController@private',$idea['id'])}}" class="btn btn-warning">Signaler</a>
                    @else
                    <a href="{{action('IdeaController@unPrivate',$idea['id'])}}" class="btn btn-warning">Remettre</a>
                    @endif
                    <a href="{{action('IdeaController@ideaEvent', $idea['id'])}}" class="btn btn-primary">Event</a>

                    </div></p>
                    <form action="{{action('IdeaController@destroy', $idea['id'])}}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                    @endif
                @endif
</div>
  @endsection