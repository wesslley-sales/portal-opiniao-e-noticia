<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run(): void
    {

        $states = [
            [
                "id" => 11,
                "name" => "Rondônia",
                "uf" => "RO",
            ],
            [
                "id" => 12,
                "name" => "Acre",
                "uf" => "AC",
            ],
            [
                "id" => 13,
                "name" => "Amazonas",
                "uf" => "AM",
            ],
            [
                "id" => 14,
                "name" => "Roraima",
                "uf" => "RR",
            ],
            [
                "id" => 15,
                "name" => "Pará",
                "uf" => "PA",
            ],
            [
                "id" => 16,
                "name" => "Amapá",
                "uf" => "AP",
            ],
            [
                "id" => 17,
                "name" => "Tocantins",
                "uf" => "TO",
            ],
            [
                "id" => 21,
                "name" => "Maranhão",
                "uf" => "MA",
            ],
            [
                "id" => 22,
                "name" => "Piauí",
                "uf" => "PI",
            ],
            [
                "id" => 23,
                "name" => "Ceará",
                "uf" => "CE",
            ],
            [
                "id" => 24,
                "name" => "Rio Grande do Norte",
                "uf" => "RN",
            ],
            [
                "id" => 25,
                "name" => "Paraíba",
                "uf" => "PB",
            ],
            [
                "id" => 26,
                "name" => "Pernambuco",
                "uf" => "PE",
            ],
            [
                "id" => 27,
                "name" => "Alagoas",
                "uf" => "AL",
            ],
            [
                "id" => 28,
                "name" => "Sergipe",
                "uf" => "SE",
            ],
            [
                "id" => 29,
                "name" => "Bahia",
                "uf" => "BA",
            ],
            [
                "id" => 31,
                "name" => "Minas Gerais",
                "uf" => "MG",
            ],
            [
                "id" => 32,
                "name" => "Espírito Santo",
                "uf" => "ES",
            ],
            [
                "id" => 33,
                "name" => "Rio de Janeiro",
                "uf" => "RJ",
            ],
            [
                "id" => 35,
                "name" => "São Paulo",
                "uf" => "SP",
            ],
            [
                "id" => 41,
                "name" => "Paraná",
                "uf" => "PR",
            ],
            [
                "id" => 42,
                "name" => "Santa Catarina",
                "uf" => "SC",
            ],
            [
                "id" => 43,
                "name" => "Rio Grande do Sul",
                "uf" => "RS",
            ],
            [
                "id" => 50,
                "name" => "Mato Grosso do Sul",
                "uf" => "MS",
            ],
            [
                "id" => 51,
                "name" => "Mato Grosso",
                "uf" => "MT",
            ],
            [
                "id" => 52,
                "name" => "Goiás",
                "uf" => "GO",
            ],
            [
                "id" => 53,
                "name" => "Distrito Federal",
                "uf" => "DF",
            ],
        ];

        foreach ($states as $state) {
           State::query()->updateOrCreate(
                ['id' => $state['id']],
               $state
           );
        }
    }
}
