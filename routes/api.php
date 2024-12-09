<?php

use App\Models\Cep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/search', function (Request $request) {
    $cep = $request->query('cep');

    // Valida se o CEP foi informado
    if (!$cep || !preg_match('/^[0-9]{8}$/', $cep)) {
        return response()->json([
            'status' => false,
            'message' => 'CEP inválido. Por favor, informe um CEP válido no formato 12345678.'
        ], 400);
    }

    $existingCep = Cep::where('cep', $cep)->first();
    if ($existingCep) {
        return response()->json([
            'status' => true,
            'data' => $existingCep,
            'message' => 'Dados retornados do banco de dados.',
        ]);
    }

    // Faz a requisição para a API ViaCEP
    $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

    // Verifica se a resposta foi bem-sucedida
    if ($response->failed() || isset($response['erro'])) {
        return response()->json([
            'status' => false,
            'message' => 'Não foi possível encontrar informações para o CEP fornecido.'
        ], 404);
    }

    $data = $response->json();
    $cepData = Cep::create([
        'cep' => $data['cep'],
        'logradouro' => $data['logradouro'] ?? null,
        'bairro' => $data['bairro'] ?? null,
        'localidade' => $data['localidade'] ?? null,
        'uf' => $data['uf'] ?? null,
        'ddd' => $data['ddd'] ?? null,
    ]);

    // Retorna a resposta da ViaCEP no formato JSON
    return response()->json([
        'status' => true,
        'data' => $cepData,
        'message' => 'Dados retornados e salvos no banco de dados.',
    ]);
});
