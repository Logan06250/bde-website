@extends('layouts.app')
@section('content')
  <div class="container">
    @if(Auth::check())
        <a href="{{action('IdeaController@create')}}" class="btn btn-primary">Ajouter une idée</a><br />
    @endif
    <div class="row">
      @foreach($ideas as $idea)
      
        <div class="col-md-4">
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
            <hr />
            <div class="panel-body">
              {{$idea['description']}}
            </div>
            {{$voted=false}}
                        @foreach($votes as $vote)
                            @if($vote['idea_id'] == $idea['id'] && $vote['user_id'] == Auth::user()->id)
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
                       
                            <form method="post" action="{{url('votes')}}" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <input value="{{$idea['id']}}" type="hidden" class="form-control" name="idea_id">
                                <input value="{{Auth::user()->id}}" type="hidden" class="form-control" name="user_id">
                                <button class="btn btn-primary" type="submit" style="text-align:right">Voter</button>
                            </form>
                        @endif
          </div>
        </div>
      @endforeach
@endsection
