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
                'EMPCODE'=> '111111',
                'TITLE_TH'=> 'คุณ',
                'FIRST_NAME_TH'=> 'ผู้ดูแล',
                'LAST_NAME_TH'=> 'ระบบ',
                // 'EMAILINTRA'=>'admin@tot.co.th',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'pittawat',
                'EMPCODE'=> '222222',
                'TITLE_TH'=> 'นาย',
                'FIRST_NAME_TH'=> 'พิทวัส',
                'LAST_NAME_TH'=> 'อักษรเสือ',
                // 'EMAILINTRA'=>'pittawatmengg@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'nattawut',
                'EMPCODE'=> '333333',
                'TITLE_TH'=> 'นาย',
                'FIRST_NAME_TH'=> 'ณัฐวุฒิ',
                'LAST_NAME_TH'=> 'สุพร',
                // 'EMAILINTRA'=>'nattawut1613@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'pranus',
                'EMPCODE'=> '444444',
                'TITLE_TH'=> 'นาย',
                'FIRST_NAME_TH'=> 'ปาณัสม์',
                'LAST_NAME_TH'=> 'สโมสร',
                // 'EMAILINTRA'=>'pranus@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'wanarat',
                'EMPCODE'=> '555555',
                'TITLE_TH'=> 'น.ส.',
                'FIRST_NAME_TH'=> 'วนารัตน์',
                'LAST_NAME_TH'=> 'โอวาท',
                // 'EMAILINTRA'=>'iicee.iceq@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ],
            [
                'email'=> 'Nipaporn',
                'EMPCODE'=> '666666',
                'TITLE_TH'=> 'น.ส.',
                'FIRST_NAME_TH'=> 'นิภาพร',
                'LAST_NAME_TH'=> 'ธนเดชวัฒนศรี',
                // 'EMAILINTRA'=>'amnnitha@gmail.com',
                'password'=> Hash::make('12345678'),
                'remember_token'=> str_random(10)
            ]

        ]);
    }
}
