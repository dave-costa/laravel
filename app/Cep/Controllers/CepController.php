<?php

namespace App\Cep\Controllers;

use Illuminate\Support\Facades\Http;
use App\Cep\Helpers\CepFormatter;

class CepController
{
    public function search($ceps)
    {
        $cepsArray = explode(',', $ceps);
        $results = [];
        $invalidCeps = [];

        foreach ($cepsArray as $cep) {
            $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

            if ($response->successful() && !isset($response->json()['erro'])) {
                $data = $response->json();
                $results[] = CepFormatter::formatCepData($data);
            } else {
                $invalidCeps[] = $cep;
            }
        }

        if (count($invalidCeps) > 0) {
            $message = 'boa tentativa kkk, metendo uma de QA. Os seguintes CEPs não foram encontrados: ' . implode(', ', $invalidCeps);
            if (count($results) > 0) {
                $message .= '. O restante dos CEPs: ';
                return response()->json(['message' => $message, 'data' => $results], 400);
            }
            return response()->json(['message' => $message], 400);
        }

        return response()->json($results);
    }
}
