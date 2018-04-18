@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-sm-0 col-md-12"></div>
            <table class="table table-striped">   
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        @foreach($articles as $article)
                            @if($article['id'] == $item)
                                <td>{{$article['name']}}</td>
                                <td>{{$article['price']}}</td>
                            @endif
                        @endforeach           
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection