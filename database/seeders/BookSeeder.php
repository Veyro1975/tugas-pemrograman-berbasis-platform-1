<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Buku;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title'       => 'Laravel 11 Up & Running',
                'author'      => 'Matt Stauffer',
                'isbn'        => '978-1098153stf',
                'price'       => 320000,
                'stock'       => 15,
                'description' => 'Panduan lengkap Laravel 11 dari dasar hingga mahir.',
            ],
            [
                'title'       => 'Clean Code',
                'author'      => 'Robert C. Martin',
                'isbn'        => '978-0132350884',
                'price'       => 275000,
                'stock'       => 8,
                'description' => 'Cara menulis kode yang bersih dan mudah dipelihara.',
            ],
            [
                'title'       => 'The Pragmatic Programmer',
                'author'      => 'David Thomas',
                'isbn'        => '978-0135957059',
                'price'       => 298000,
                'stock'       => 5,
                'description' => null,
            ],
        ];

        // Gunakan firstOrCreate agar tidak duplikat jika seed diulang
        foreach ($books as $data) {
            Buku::firstOrCreate(
                ['isbn' => $data['isbn']],
                $data
            );
        }
    }
}