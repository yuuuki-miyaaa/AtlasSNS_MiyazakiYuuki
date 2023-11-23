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
        //
        DB::table('users')->insert([
            'username' => 'テストユーザー',
            'mail' => 'test@lull.com',
            'password' => Hash::make('test'),
            'images' => 'icon1.png',
            //DBのusersテーブルに上記値を入れる
            //Hash::make関数でパスワードを保護(ハッシュ化する)
        ]);
    }
}
