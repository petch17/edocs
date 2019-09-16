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
                'email'=> 'admin',
                // 'EMAILINTRA'=>'admin@tot.co.th',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'pittawat',
                // 'EMAILINTRA'=>'pittawatmengg@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'nattawut',
                // 'EMAILINTRA'=>'nattawut1613@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'pranus',
                // 'EMAILINTRA'=>'pranus@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'wanarat',
                // 'EMAILINTRA'=>'iicee.iceq@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'Nipaporn',
                // 'EMAILINTRA'=>'amnnitha@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ]

        ]);
    }
}
