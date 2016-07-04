<?php

//customer route


Route::group(['prefix' => 'customer', 'middleware' => ['web']], function () {
    //
  Route::get('product-list', function(Illuminate\Http\Request $request){
    $product = App\Products::paginate(10);
    
    return response()->json($product);
//     return echo 'halooo';
  });
});