<?php

namespace App\services;

class Censurator
{
    private $listeInsulte = [
        "Connard",        "Va te faire foutre",        "Ferme ta gueule",
        "Bâtard",        "Trou du cul",        "Sac à merde",
        "Casse-couilles",        "Enfoiré",        "Tête de bite",
        "Fini à la pisse",        "Pétasse",        "Abruti",
        "con",        "conne",        "merde",
        "Pouffiasse",        "Petite bite",        "Bouffon",
        "Branleur",        "Grognasse",        "Couille molle",
        "Branquignole",        "Fils de chien",        "Salaud",
        "pute"
    ];

    public function purify(string $string)
    {
        $str_explode = explode(' ',$string);
        for($i = 0; $i<count($str_explode);$i++){
            if(in_array($str_explode[$i],$this->listeInsulte)){
                // method 1
                $str_explode[$i] = str_replace($str_explode[$i],'🤬',$str_explode[$i]);
                // method 2
                // $censor="";
                // for($j = 0; $j < strlen($str_explode[$i]); $j++){
                //     $censor .= "*";
                // }
                // $str_explode[$i] = $censor;
            }
        }
        return  implode(' ',$str_explode);
    }
}

