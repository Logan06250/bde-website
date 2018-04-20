@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-sm-0 col-md-12">

            <table class="table table-striped">
                
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Prix unitaire</th>
                        <th>Quantité </th>
                        <th>Prix</th>
                    </tr>
                </thead>

                <tbody>

                <?php 
                
                $itemsPrice = 0; 
                $itemPrice = 0;

                ?>

                @foreach ($itemsKeys as $itemKey)
                    <tr>
                    @foreach ($articles as $article)

                        @if($article['id'] == $itemKey)  

                            <td>{{$article['name']}}</td>
                            <td>{{$article['price']}}€</td>
                            <td>{{$items[$article['id']]}}</td>
                            <?php $itemPrice = $article['price'] * $items[$article['id']]; ?>
                            <td>{{$itemPrice}}</td>

                            <?php
                            
                            $itemsPrice = $itemsPrice + $itemPrice;
                            
                            ?>
                            
                      
                        @endif
                        
                    @endforeach 

                    </tr>

                @endforeach

                </tbody>

            </table>

            


            <h3>TOTAL: {{$itemsPrice}} € </h3>
            <p>En tant qu'association loi 1901 a but non lucratif, nous ne faisont pas payer la TVA :)</p>


            <a href="" class="btn btn-success" role="button">Valider mon panier</a>
            <a href="" class="btn btn-danger" role="button">Vider mon panier</a>                     

        </div>

    </div>

</div>

@endsection