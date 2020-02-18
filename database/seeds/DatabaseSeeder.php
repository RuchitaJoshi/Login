<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $toTruncate = ['users', 'posts'];

    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

//        factory(\App\User::class,10)->create();
//        factory(\App\Post::class,10)->create();


        $users = [
            [
                'name' => 'ruchita',
                'email' => 'ruchi@gmail.com',
                'password' =>'ruchi123',
                'role_id' => 1,
                'is_active'    =>  1,
                'photo_id' => 1,
                'remember_token' => null
            ]
            ];

        foreach ($users as $user)
        {
            User::create($user);
        }

        factory(\App\User::class,10)->create()->each(function ($user){
            $user->post()->save(factory(App\Post::class)->make());
        });

        factory(\App\Category::class,10)->create();
        factory(\App\Comment::class,10)->create()->each(function ($comment){
            $comment->replies()->save(factory(\App\CommentReply::class)->make());
        });


        // $this->call(UsersTableSeeder::class);
    }
}
