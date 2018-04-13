@extends('layouts.app')

@section('content')

    <div class="container">
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

      <a style="margin-bottom:20px" href="{{action('EventController@create')}}" class="btn btn-success">AJouter un event</a>
    </br>
      @foreach($events as $event)
      <div class="panel panel-default">
      @php
        $date=date('Y-m-d', $event['date']);
        @endphp
        <div class="panel-heading">
            <h2 class="panel-title">{{$event['name']}}</h2>
        </div>
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-0">
                       <h3> Le {{$date}} </h3>

                        <img src="{{asset('/images')}}/{{$event['image']}}" alt="{{$event['name']}}">

        Description : <em>{{$event['description']}}</em>
                    </br>
          </div>
          <div class="col-md-7 col-md-offset-0">
          <ul class="list-group">
              <label for="Name">Commentaire :</label>
          @foreach($comments as $comment)
            @if($comment['event_id'] == $event['id'])
              <li class="list-group-item">
                <span class="badge">{{$comment['userName']}}</span>
                {{$comment['content']}}
                </br>
              </li>
            @endif
          @endforeach
          <li class="list-group-item">
            <span class="badge"><button type="submit" class="btn btn-info">Poster le commentaire</button></span>
            <form method="post" action="{{url('comments')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="form-group col-md-4">
                  <input type="textarea" class="form-control" name="content">
                  <input value ="{{$event['id']}}" type="hidden" class="form-control" name="id">
                  <input value ="{{Auth::user()->name}}" type="hidden" class="form-control" name="userName">

                </div>
              </div>
            </form>
          </li>
        </ul>
        </div>
        </div>
        <table>
            <tr>
                <td>
                    <a style="margin-right:20px" href="{{action('EventController@edit', $event['id'])}}" class="btn btn-warning">Edit</a>
                </td>
              <td>
          <form action="{{action('EventController@destroy', $event['id'])}}" method="post">
          {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
              </td>  
        </tr>
        </table>
        </div>
      </div>
      </div>
      @endforeach
    </tbody>
  @endsection