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
          <th colspan="3">Action</th>
        </tr>
      </thead>
        <tbody>  
          @foreach($ideas as $idea)
            <tr>
              <td>{{$idea['id']}}</td>
              <td>{{$idea['title']}}</td>
              <td>{{$idea['creator']}}</td>
              <td>{{$idea['description']}}</td>  
              <td>
              
              <!-- {{$nbVote = 0}} -->
              @foreach($votes as $vote)
                @if($vote['idea_id'] == $idea['id'])
                  <!-- {{$nbVote++}} -->
                @endif
              @endforeach
              {{$nbVote}}
              </td>
              @if(Auth::check() && (Auth::user()->isAdmin()) || Auth::user()->isBDE())
                <td><a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                  <form action="{{action('IdeaController@destroy', $idea['id'])}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              @endif
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
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
      <a href="{{action('IdeaController@create')}}" class="btn btn-primary">Create</a>
    </div>
  @endsection