<?php

use Illuminate\Database\Seeder;
use App\Models\MappingType;

class MappingTypeTableSeeder extends Seeder{
    public function run(){
        MappingType::create([
            'type' => 'Rampa',
        ]);
        MappingType::create([
            'type' => 'Aclive/Declive',
        ]);
        MappingType::create([
            'type' => 'Estacionamento preferencial',
        ]);
        MappingType::create([
            'type' => 'Faixa de pedestres',
        ]);
        MappingType::create([
            'type' => 'Local adaptado',
        ]);
        MappingType::create([
            'type' => 'Rua asfaltada',
        ]);
    }
}
