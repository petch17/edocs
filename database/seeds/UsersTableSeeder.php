<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();

        $user->insert([
            [
                'name'=> 'admin',
                'email'=>'admin@tot.co.th',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'name'=> 'pittawat',
                'email'=>'pittawatmengg@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'name'=> 'nattawut',
                'email'=>'nattawut1613@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ], 
            [
                'name'=> 'pranus',
                'email'=>'pranus@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'name'=> 'wanarat',
                'email'=>'iicee.iceq@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ], 
            [
                'name'=> 'Nipaporn',
                'email'=>'amnnitha@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ]
            
        ]);
    }
}
