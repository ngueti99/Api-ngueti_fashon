<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::firstOrCreate([
            'name'=>'Addidas',
            'description'=>'marque francaise',
        ]);
        Brand::firstOrCreate([
            'name'=>'Nike',
            'description'=>'marque ameriquaine',
        ]);
        Brand::firstOrCreate([
            'name'=>'Lacoste',
        ]);
        Brand::firstOrCreate([
            'name'=>'Puma',
        ]);
        Brand::firstOrCreate([
            'name'=>'Roxy',
        ]);
        Brand::firstOrCreate([
            'name'=>'Oasics',
        ]);
        Brand::firstOrCreate([
            'name'=>'Umbro',
        ]);
        Brand::firstOrCreate([
            'name'=>'Speedo',
        ]);
        Brand::firstOrCreate([
            'name'=>'New balance',
        ]);
        Brand::firstOrCreate([
            'name'=>'Odlo',
        ]);
        Brand::firstOrCreate([
            'name'=>'Lotto',
        ]);
        Brand::firstOrCreate([
            'name'=>'Lafuma',
        ]);
    }
}
