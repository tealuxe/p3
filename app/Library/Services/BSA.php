<?php
namespace App\Library\Services;

class BSA
{
    public function poundsToKilograms($pounds)
    {
        return $pounds / 2.2046;
    }

    public function heightToCentimeters($feet, $inches)
    {
        return ($feet * 30.46) + ($inches * 2.54);
    }

    public function squareMetersToSquareFeet($squaremeters)
    {
        return ($squaremeters * 10.7639);
    }

    public function squareMetersToBasketballs($squaremeters)
    {
        return ($squaremeters / 0.1787151264);
    }

    // BSA [m2] (male) = Weight [kg]0.38 x Height [cm]1.24 x 0.000579479
    // BSA [m2] (female) = Weight [kg]0.46 x Height [cm]1.08 x 0.000975482
    // http://www.bmi-calculator.net/bsa-calculator/
    public function bsaCalculate($gender, $pounds, $feet, $inches)
    {
        if ($gender == "Male") {
            $bsa = 0.000579479 * ($this->poundsToKilograms($pounds) ** 0.38) * ($this->heightToCentimeters($feet, $inches) ** 1.24);

            return $bsa;
        } else {
            $bsa = 0.000975482 * ($this->poundsToKilograms($pounds) ** 0.46) * ($this->heightToCentimeters($feet, $inches) ** 1.08);

            return $bsa;
        }
    }
}