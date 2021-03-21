<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $inputs = [ 
           ['name'=>'php','description'=>'php'],
           ['name'=>'React','description'=>'React'],
           ['name'=>'IOS','description'=>'IOS'],
           ['name'=>'Android','description'=>'Android'],
           ['name'=>'Angular','description'=>'Angular'],
        ];
       
       foreach($inputs as $input){
           Category::create($input);
       }
    }
}
