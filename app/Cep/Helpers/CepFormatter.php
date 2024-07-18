<?php

namespace App\Cep\Helpers;

class CepFormatter
{
    public static function formatCepData(array $data)
    {
        return [
            'cep' => $data['cep'],
            'label' => "{$data['logradouro']}, {$data['localidade']}",
            'logradouro' => $data['logradouro'],
            'complemento' => $data['complemento'],
            'bairro' => $data['bairro'],
            'localidade' => $data['localidade'],
            'uf' => $data['uf'],
            'ibge' => $data['ibge'],
            'gia' => $data['gia'],
            'ddd' => $data['ddd'],
            'siafi' => $data['siafi'],
        ];
    }
}
