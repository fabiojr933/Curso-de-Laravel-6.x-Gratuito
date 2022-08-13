<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create();
        /*
    User::create([
    'name'=> 'Fabio',
    'email'=> 'fabio@gmail.com',
    'password'=> bcrypt('123'),
    ]);

     */
    }
}
