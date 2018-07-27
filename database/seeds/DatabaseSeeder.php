<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('categoris')->insert([
        	['name'=>'Dien thoai'],
        	['name'=>'Laptop'],
        	['name'=>'tivi'],
        ]);*/
       $this->call('CategoryDatabaseSeeder');
        $this->call(SuppliersTableSeeder::class);
    }

}
class CategoryDatabaseSeeder extends Seeder
{
	public function run()
	{
		DB::table('categories')->insert([
			['name'=>'dien thoai'],
			['name'=>'laptop'],
			['name'=>'tivi'],
		]);
	}
}
