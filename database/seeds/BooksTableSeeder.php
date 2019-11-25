<?php

use App\User;
use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(function ($user) {
            $user->books()->save(factory(Book::class)->make());
        });
    }
}
