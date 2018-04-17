@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Actualité du BDE</div>
                <div class="panel-body"> 
                    <hr/><h1> Evenements à venir </h1><hr/>
                    @foreach($events as $event)
                        @php
                            $date=date('Y-m-d', $event['date']);
                        @endphp
                        <tr>
                            <div class="card">
                                <div class="card-header">
                                  <h4><td>{{$event['name']}}</td></h4>
                                </div>
                                <div class="card-body">
                                   <h5><td> Le : {{$date}}</td></h5>
                                    <p class="card-text"><td>{{$event['description']}}</td></p>
                                    <a href="/events/{{$event['id']}}">
                                         <img src="{{asset('/images')}}/{{$event['image']}}" alt="{{$event['name']}}">
                                    </a>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Propositions de nos étudiants :</div>
                <div class="panel-body">                  
                    @foreach($ideas as $idea)
                        <tr>
                            <div class="card">
                                <div class="card-header">
                                  <h4><td>{{$idea['name']}}</td></h4>
                                </div>
                                <div class="card-body">
                                    <p> Par {{$idea['creator']}} </p>
                                    <p><b> {{$idea['title']}} </b></p>
                                    <p class="card-text"><td>Description : {{$idea['description']}}</td></p>
                                </div>
                            </div>
                        </tr>
                        <hr/>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
