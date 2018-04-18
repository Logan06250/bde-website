@extends('layouts.app')

@section('content')
 <!-- Page Content -->
 <div class="container">
<td><a href="{{url('/setCookie')}}" class="btn btn-warning">vider le panier</a></td>

<div class="container">

    <div class="row">
        <div class="col-sm-0 col-md-12"></div>
            <table class="table table-striped">   
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Prix unitaire</th>
                        <th>Quantité </th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($itemsKeys as $itemKey)
                    <tr>
                    @foreach ($articles as $article)

                        @if($article['id'] == $itemKey)

                            <td>{{$article['name']}}</td>
                            <td>{{$article['price']}}€</td>
                            <td>{{$items[$article['id']]}}</td>
                            
                      
                        @endif
                        
                    @endforeach 

                    </tr>

                @endforeach

                </tbody>
            </table>


            <a href="" class="btn btn-success" role="button">Un bouton pour valider le panier</a>                 

        </div>
    </div>
</div>

</div>
<!-- /.container -->

@endsection

