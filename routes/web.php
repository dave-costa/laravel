<?php

use App\Cep\Controllers\CepController;
use Illuminate\Support\Facades\Route;

Route::get('/api/search/local/{ceps}', [CepController::class, 'search']);