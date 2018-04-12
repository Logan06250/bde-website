@extends('layouts.app')

@section('content')
<div class="container">
    <tbody>
    @if($event->visibility==1)
        @php
            $date=date('Y-m-d', $event['date']);
            @endphp
        <tr>
            <div class="card">
            <div class="card-header">
            <h4><td>{{$event['name']}}</td></h4>
            </div>
            <div class="card-body">
                <h5><td>{{$date}}</td></h5>
                <p class="card-text"><td>{{$event['description']}}</td></p>
                <img src="{{asset('/images')}}/{{$event['image']}}" alt="{{$event['name']}}">
            </div>
            </div>

            </td>
        </tr>
    @endif
    </tbody>
</div>
@endsection