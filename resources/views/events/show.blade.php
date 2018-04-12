<!doctype html>

<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title> Site du BDE CESI NICE </title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="BDE Website">
        <meta name="author" content="Logan Lamouar, Montet Bastien, Pierrini Eva, Le Rest Sylvain">

        <!-- This website is using:  https://www.bootstrapcdn.com/ -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>


    </head>


    <body>
        @include('header');

        <tbody>
      
            @foreach($events as $event)
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
            @endforeach
         </tbody>

        @include('footer');

    </body>
</html>

