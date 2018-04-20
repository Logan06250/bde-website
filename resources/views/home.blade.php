@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">Actualité du BDE</div>
                <div class="panel-body"> 
                    <hr/><h1> Evenements du mois </h1><hr/>
                    @foreach($events as $event)
                        @if($event['eventMois'] == 0)
                        @php
                            $date=date('Y-m-d', $event['date']);
                        @endphp
                        <tr>
                            <div class="card">
                                <div class="card-header">
                                  <h2><td>{{$event['name']}}</td></h2>
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
                        @endif
                    @endforeach
                    <hr/><h1> La boutique ! </h1><hr/>
                    <a class="btn btn-info" href="{{ url('articles') }}"><i class="fas fa-shopping-cart"></i> Venez découvrir des articles en tout genre sponsorisés par votre BDE !</a>
                    <p>
                    </p>
                </div>
                <div class="panel-heading"><h1>Nous trouver !</h1></div>
                 <div class="panel-body"> 
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.102377528351!2d7.03866055151005!3d43.62522807901966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cc2ba4e8d1e871%3A0x713ccfad9fc7b0c!2s1240+Route+des+Dolines%2C+06560+Valbonne!5e0!3m2!1sfr!2sfr!4v1524210758694" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                 </div>
            </div>
        </div>
        <div class="col-lg-3">
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
