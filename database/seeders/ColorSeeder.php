<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::firstOrCreate([
            'name'=>'vert',
            'code'=>'success',
        ]);
        Color::firstOrCreate([
            'name'=>'rouge clair',
            'code'=>'danger',
        ]);
        Color::firstOrCreate([
            'name'=>'bleu clair',
            'code'=>'info',
        ]);
        Color::firstOrCreate([
            'name'=>'bleu foncé',
            'code'=>'dark',
        ]);
        Color::firstOrCreate([
            'name'=>'jaune',
            'code'=>'warning',
        ]);
        Color::firstOrCreate([
            'name'=>'noir',
            'code'=>'black',
        ]);
        Color::firstOrCreate([
            'name'=>'grai',
            'code'=>'warning',
        ]);
        Color::firstOrCreate([
            'name'=>'bleu',
            'code'=>'body',
        ]);
        Color::firstOrCreate([
            'name'=>'gris',
            'code'=>'white-50',
        ]);
    }
    }

