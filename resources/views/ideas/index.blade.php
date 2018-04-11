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
          <th colspan="2">Action</th>
        </tr>
      </thead>
        <tbody>  
          @foreach($ideas as $idea)
            <tr>
              <td>{{$idea['id']}}</td>
              <td>{{$idea['title']}}</td>
              <td>{{$idea['creator']}}</td>
              <td>{{$idea['description']}}</td>  
              @if(Auth::check() && (Auth::user()->role==4 || Auth::user()->role==3));
                <td><a href="{{action('IdeaController@edit', $idea['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                  <form action="{{action('IdeaController@destroy', $idea['id'])}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              @endif
            </tr>
          @endforeach
        </tbody>
    </table>
      <a href="{{action('IdeaController@create')}}" class="btn btn-primary">Create</a>
    </div>
  @endsection