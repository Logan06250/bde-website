@extends('layouts.app')

@section('content')
 <!-- Page Content -->
 <div class="container">
<td><a href="{{url('/setCookie')}}" class="btn btn-warning">vider le panier</a></td>

<?php
use App\Article;
//  add cookie of user in variable value
$value = Cookie::get(Auth::user()->name);
// add array pieces with id of item
$pieces = explode(":", $value);
// dellette the last item
array_pop($pieces);
// count the number of item
$result = count($pieces);


$prix = 0 ;

$products = App\Article::all();
$nombre = array_count_values($pieces);



?>

<table class="table table-striped">
<thead>
      <tr>
        
        <th>nombre</th>
        <th>nom</th>
        <th>description</th>
        <th>Prix</th>
        <th>Prix total</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($nombre as $cle => $valeur) { ?>
    <?php //foreach ($pieces as &$piece) { ?>

      @foreach($products as $product)
      <tr>
      <?php
      $test = "{$product->id}";
       if( $test == $cle ) { ?>
       <?php $tot = $product['price']   * $valeur ?>
        
        <td> {{$valeur}} </td>
        <td>{{$product['name']}}</td>
        <td>{{$product['description']}}</td>
        <td>{{$product['price']}}</td>
        <td>{{$tot}}</td>
        <?php $prix = $prix + $tot ?> 
     <?php } ?>
        
       

      </tr>
      @endforeach
      <?php } //}
      //echo $prix; ?>
    </tbody>
</table>
<?php $tva = number_format(( $prix / 100 ) * 5.5 , 2 );
$ttc = $prix - $tva ; ?>
<div class="card text-right" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><font size="+3">Votre Panier</font></h5>
    <p class="card-text">
    <ul class="list-group list-group-flush">
    <li class="list-group-item">TOTAL TTC : <font color="red"><font size="+3">{{$prix}}</font></font> </li>
    <li class="list-group-item">Dont TVA 5.5% :<font size="+1"> {{$tva}} </font></li>
    <li class="list-group-item">Soit  HT :<font size="+1"> {{$ttc}}</font></li>
  </ul>
    
    </p>
    <a href="#" class="btn btn-primary">valider le panier</a>
  </div>
</div>

</div>
<!-- /.container -->

@endsection

