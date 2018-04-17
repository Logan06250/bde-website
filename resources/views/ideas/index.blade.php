@extends('layouts.app')
@section('content')
    <div class="container"><br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Titre</th>
          <th>Createur</th>
          <th>Description</th>
          <th>Nb vote</th>
          <th colspan="4">Action</th>
        </tr>
      </thead>
        <tbody>  
          @foreach($ideas as $idea)
            <tr>
            @if($idea['visibility'])
              <td>{{$idea['id']}}</td>
              <td>{{$idea['title']}}</td>
              <td>{{$idea['creator']}}</td>
              <td>{{$idea['description']}}</td>  
            @elseif($idea['visibility'] == false && (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isBDE())))
              <td>{{$idea['id']}}</td>
              <td>{{$idea['title']}}</td>
              <td>{{$idea['creator']}}</td>
              <td>{{$idea['description']}}</td> 
            @else
              @break
            @endif
              <td>
              <!-- {{$nbVote = 0}} -->
              @foreach($votes as $vote)
                @if($vote['idea_id'] == $idea['id'])
                  <!-- {{$nbVote++}} -->
                @endif
              @endforeach
              {{$nbVote}}
              </td>
              @if(Auth::check())
                <td>
                {{$voted=false}}
                @foreach($votes as $vote)
                  @if($vote['idea_id'] == $idea['id'] && $vote['user_id'] == Auth::user()->id)
                    <form  action="{{action('VoteController@destroy', $vote['id'])}}" method="post">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="DELETE">
                      <button TYPE="submit" class="btn btn-danger">Dévoter</button>
                    </form>
                    <!--{{$voted=true}}-->
                    @break 
                   @endif
                @endforeach
                  @if($voted==false)
                      <form method="post" action="{{url('votes')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input value ="{{$idea['id']}}" type="hidden" class="form-control" name="idea_id">
                      <input value ="{{Auth::user()->id}}" type="hidden" class="form-control" name="user_id">
                      <button TYPE="submit" class="btn btn-info">Voter</button>
                    </form>
                    @endif
                  @endif
                  </td>
                  @if(Auth::user()->isAdmin() || Auth::user()->isBDE())
                    <td><a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-warning">Edit</a></td>
                    @if($idea['visibility'])
                      <td><a href="{{action('IdeaController@private', $idea['id'])}}" class="btn btn-warning">Signaler</a></td>
                    @else
                      <td><a href="{{action('IdeaController@unPrivate', $idea['id'])}}" class="btn btn-warning">Remettre</a></td>
                    @endif
                    <td>
                      <form action="{{action('IdeaController@destroy', $idea['id'])}}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                    </td>
                    <td>
                    <a href="{{action('IdeaController@ideaEvent', $idea['id'])}}" class="btn btn-primary">Event</a>
                    </td>
              @endif
            </tr>
          @endforeach
        </tbody>
    </table>
      <a href="{{action('IdeaController@create')}}" class="btn btn-primary">Proposer une idée</a>
    </div>
  @endsection