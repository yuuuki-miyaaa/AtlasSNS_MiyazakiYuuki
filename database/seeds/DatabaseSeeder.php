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
        //このrunメソッドが「UsersTableSeeder」を呼び出すことで、そのファイル内のレコードを作成することができる

        $this->call(PostsTableSeeder::class);
        //このrunメソッドが「PostsTableSeeder」を呼び出す

        $this->call(FollowsTableSeeder::class);
    }
}
