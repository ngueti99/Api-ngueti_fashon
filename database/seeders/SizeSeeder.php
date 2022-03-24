<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::firstOrCreate([
            'name'=>'S'
        ]);
        Size::firstOrCreate([
            'name'=>'M'
        ]);
        Size::firstOrCreate([
            'name'=>'L'
        ]);
        Size::firstOrCreate([
            'name'=>'XL'
        ]);
        Size::firstOrCreate([
            'name'=>'XS'
        ]);
        Size::firstOrCreate([
            'name'=>'XXL'
        ]);
        Size::firstOrCreate([
            'name'=>'XXS'
        ]);
        Size::firstOrCreate([
            'name'=>'XXS'
        ]);
        Size::firstOrCreate([
            'name'=>'TU'
        ]);
        Size::firstOrCreate([
            'name'=>'T1'
        ]);
        Size::firstOrCreate([
            'name'=>'T2'
        ]);
        Size::firstOrCreate([
            'name'=>'T3'
        ]);
        for ($i=20; $i < 53; $i++) {
            Size::firstOrCreate([
                'name'=>$i
            ]);
        }
    }
}
