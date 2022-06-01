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
        \DB::table('users')->insert([
            [
                'user_id' => '00800',
                'name' => 'hiroki',
                'email' => 'hiroki@yahoo.co.jp',
                'password' => 'hiroki',
            ],
            
            [
                'user_id' => '00801',
                'name' => 'sayuri',
                'email' => 'sayuri@yahoo.co.jp',
                'password' => 'sayuri',

            ],
            
            [
                'user_id' => '00802',
                'name' => 'dan',
                'email' => 'dan@yahoo.co.jp',
                'password' => 'dan',
            ],
            
        ]);
        
        /*
        // 1レコード
        $user = new \App\User([
            'user_id' => '00800'
        ]);
        $user->save();
        
        // 2レコード
        $user = new \App\User([
            'user_id' => '00801'
        ]);
        $user->save();
        
        // 3レコード
        $user = new \App\User([
            'user_id' => '00802'
        ]);
        $user->save();*/
    }
}
    