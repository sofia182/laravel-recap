<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libri = config('database.books');

        foreach ($libri as $libro) {
          $nuovo_libro = new Book();
          $nuovo_libro->fill($libro);
          $nuovo_libro->save();
        }
    }
}
