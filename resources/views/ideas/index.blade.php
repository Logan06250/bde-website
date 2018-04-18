@extends('layouts.app')
@section('content')
  <div class="container">
    @if(Auth::check())
      <a style="margin-bottom:10px" href="{{action('IdeaController@create')}}" class="btn btn-primary">Ajouter une idée</a><br />
    @endif
    <div class="row">
      @foreach($ideas as $idea)
      
        <div class="col-md-4">
          <div class="panel panel default" style="maxheight:300px;">
           <div class="panel-heading">
              <a class="panel-title" href="{{action('IdeaController@view',$idea['id'])}}">
              <h3>{{$idea['title']}}</h3></a>
            </div>
            <hr />
            <div class="panel-body" >
              {{$idea['description']}}
            </div>
            <!-- {{$nbVote = 0}} -->
                @foreach($votes as $vote)
                  @if($vote['idea_id'] == $idea['id'])
                    <!-- {{$nbVote++}} -->
                  @endif
                @endforeach
            {{$voted=false}}
                        @foreach($votes as $vote)
                            @if($vote['idea_id'] == $idea['id'] && $vote['user_id'] == Auth::user()->id)
                                <form style="margin-bottom:8px; margin-left:8px;" method="post" action="{{action('VoteController@destroy', $vote['id'])}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button  class="btn btn-danger" type="submit">Dévoter</button>
                                    Vote total : <span class="badge"> {{$nbVote}} </span>
                                </form>
                                <!-- {{$voted=true}} -->
                                @break
                            @endif
                        @endforeach
                        @if($voted==false)
                       
                            <form style="margin-bottom:8px; margin-left:8px;" method="post" action="{{url('votes')}}" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <input value="{{$idea['id']}}" type="hidden" class="form-control" name="idea_id">
                                <input value="{{Auth::user()->id}}" type="hidden" class="form-control" name="user_id">
                                <button  class="btn btn-primary" type="submit" style="text-align:right">Voterr</button>
                                Vote total : <span class="badge"> {{$nbVote}} </span>
                            </form>
                        @endif
                        
                        
          </div>
        </div>
      @endforeach
@endsection
