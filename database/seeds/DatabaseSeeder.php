<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //このrunメソッドが「sersTableSeeder」を呼び出すことで、そのファイル内のレコードを作成することができる
    }
}
