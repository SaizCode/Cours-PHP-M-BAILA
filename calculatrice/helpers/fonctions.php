<?php
//Tester si un nombre est vide
function  isEmpty($nbre,$sms=null){

    if(empty($nbre) && $nbre != 0){
        if($sms==null){
            $sms="Le Nombre  est Obligatoire";
        }
        return $sms;

       }
}
function  isNumeric($nbre,$sms=null){

    if(!is_numeric($nbre)){

    
        if($sms==null){
            $sms="Le Nombre  doit etre un Numerique";
        }
        return $sms;

    }
}

function getValuePOST($name){ 

    return (isset($_POST[$name])) ? $_POST[$name] : null ;
}

function isErrors(array $errors){

    while(count($errors)){

        $val = array_shift($errors);

        if($val){

            return true;
        }

    }

    return false;
}