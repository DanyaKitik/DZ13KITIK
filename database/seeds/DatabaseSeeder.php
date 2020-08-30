<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Post::class,10)->create()->each(function ($post){
//            $categories = factory(\App\Category::class,20)->make();
//            $post->categories()->save($categories->random(1));
//        });
//        factory(\App\Category::class,10)->create()->each(function ($category){
//           $category->posts()->save(factory(\App\Post::class)->make(['category_id'=>$category->id]));
//        });
//        factory(\App\Category::class,10)->create();
        $tags = factory(\App\Tag::class,20)->create();
        $categories = factory(\App\Category::class,10)->create();

        factory(\App\User::class,10)->create()->each(function ($user) use ($categories,$tags){

//            dd($categories->random());
           $user->posts()->save(factory(\App\Post::class)->make(['user_id' => $user->id,'category_id' => $categories->random()->id]))
               ->tags()->attach($tags->pluck('id')->random(rand(3,5)));




        });
    }
}
