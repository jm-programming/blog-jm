<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {
    	factory(User::class, 1)->create();  
    	DB::table('users')->insert([
            'name' => 'Juan Manuel',
            'email' => 'juanm.pineda@outlook.com',
            'password' => bcrypt('secret'),
            'type' => 'admin'
        ]);	
      }
    
}
