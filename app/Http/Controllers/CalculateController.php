<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\BSA;

// for old data: https://stackoverflow.com/questions/38461677/what-is-the-best-practice-to-show-old-value-when-editing-a-form-in-laravel

class CalculateController extends Controller
{
    public function main(Request $request)
    {
        return view('main')->with([
            'bsa' => $request->session()->get('bsa'),
            'bsaSquareFeet' => $request->session()->get('bsaSquareFeet'),
            'basketballs' => $request->session()->get('basketballs'),
            'gender' => $request->session()->get('gender'),
            'pounds' => $request->session()->get('pounds'),
            'feet' => $request->session()->get('feet'),
            'inches' => $request->session()->get('inches')
        ]);
    }

    public function calculate(Request $request, BSA $bsaServiceInstance)
    {
        // validate form using laravel builtin method
        $request->validate([
            'genderInput' => 'required',
            'weightInput' => 'required|gt:0',
            'heightFeet' => 'required|gt:0',
            'heightInches' => 'required',
        ]);

        $gender = $request->input('genderInput');
        $pounds = $request->input('weightInput');
        $feet = $request->input('heightFeet');
        $inches = $request->input('heightInches');

        // calculate using bsaService
        // consulted for bsa Service instructions:
        // https://code.tutsplus.com/tutorials/how-to-register-use-laravel-service-providers--cms-28966
        $bsa = $bsaServiceInstance->bsaCalculate($gender, $pounds, $feet, $inches);

        return redirect('/')->with([
            'bsa' => $bsa,
            'bsaSquareFeet' => $bsaServiceInstance->squareMetersToSquareFeet($bsa),
            'gender' => $gender,
            'pounds' => $pounds,
            'feet' => $feet,
            'inches' => $inches,
            'basketballs' => $bsaServiceInstance->squareMetersToBasketballs($bsa)
        ]);
    }
}
