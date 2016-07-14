<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Entities\Car;
use App\Entities\Feature;
use App\Entities\MakeYear;
use App\Entities\Model;
use Illuminate\Support\Facades\Request;

Route::get('/', ['as'=>'inicio', function () {
    return view('welcome');
}]);

Route::get('bootstrap', function () {
    return view('bootstrap');
});

Route::get('autocomplete/users', function () {
   $term=Request::get('term');
    return \App\User::findByName($term);
});

Route::get('dropdowns', function () {
    return view('components/dropdowns');
});

Route::get('makeyears/{make_id}',['as'=>'makeyears', function ($make_id) {

    $year= MakeYear::where('make_id',$make_id)
        ->select('id as value', 'year as text')
        ->orderby('year','DESC')
        ->get();
    //dd($year);
    //array_unshift($year,['value'=>'','text'=>'Select valuee']);

    return $year;
}]);

Route::get('models/{makeyear_id}',['as'=>'models', function ($makeyear_id) {
    $models=  Model::where('makeyear_id',$makeyear_id)
        ->select('id as value', 'name as text')
        ->orderby('name','DESC')
        ->get();
   // array_unshift($models,['value'=>'','text'=>'Select valuee']);
    return $models;
    }]);
Route::get('features', function () {

    $car= Car::first();
    $features=  Feature::orderby('name','ASC')
        ->lists('name','id')->toArray();
    $currentFeatures=$car->features()->lists('feature_id')->toArray();





    return view('components/features', compact('features','car'));
});

Route::post('features', function () {
    
    $car= Car::first();

    $features=Feature::whereIn('id',Request::get('features'))->get();
    $car->features()->sync($features);


   return redirect()->to('features');
});

Route::get('autocomplete/demo',function(){
    return view('components/autocomplete_demo');

});
