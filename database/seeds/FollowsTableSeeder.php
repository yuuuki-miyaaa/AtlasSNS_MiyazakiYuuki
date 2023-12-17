<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('follows')->insert([
            'following_id' => '1',
            'followed_id' => '2',
            //followsテーブルに初期レコードを登録
        ]);
    }
}
