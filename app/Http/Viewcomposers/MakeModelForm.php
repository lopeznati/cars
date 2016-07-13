<?php
namespace  App\Http\Viewcomposers;
use App\Entities\Make;
use App\Entities\MakeYear;
use App\Entities\Model;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

/**
 * Created by PhpStorm.
 * User: 09-MAPPLICS
 * Date: 13/7/2016
 * Time: 9:56 AM
 */


class MakeModelForm
{
    public function  compose(View $view){
        $makeForm = Request::only('make_id', 'makeyear_id', 'model_id');

        $makes = Make::orderBy('name', 'ASC')
            ->lists('name', 'id')
            ->toArray();
        $makeYears = $models = array();

        if ($makeForm['make_id'] != null) {
            $makeYears = MakeYear::where('make_id', $makeForm['make_id'])
                ->orderBy('year', 'DESC')
                ->lists('year', 'id')
                ->toArray();

            if ($makeForm['makeyear_id'] != null) {
                $models = Model::where('makeyear_id', $makeForm['makeyear_id'])
                    ->orderBy('name', 'ASC')
                    ->lists('name', 'id')
                    ->toArray();
            }
        }

        $view->with(compact('makeForm', 'makes', 'makeYears', 'models'));
    }


}