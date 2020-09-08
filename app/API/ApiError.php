<?php

namespace App\Api;

class ApiError
{

    const ERROR_TESTE = 'Houve um arro ao realizar operacao - ERROR TESTE';


    public static function errorMessage($cod)
    {
        return [
            'msg' => ApiError::ERROR_TESTE,
            'cod' => $cod,
        ];
    }
}



?>



