<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class USERSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('USER')->delete();
        DB::table('USER')->insert([
        'PSEUDO_USER' => 'lyra',
        'PWD_USER' => 0000,
        'NAME_USER' => 'Barthes',
        'SURNAME_USER' => 'Louis',
        'MAIL_USER' => 'louisbarthes1@gmail.com',
        'AGE_USER' => 20,
        'SUBDATE_USER' => "2023-03-29",
        'BIO_USER' => 'Je suis le patron des admins',
        'LEVEL_USER' => 100,
        'ADMIN' => true,
        'FORMATION_STUDENT' => 'BUT MMI',
        'YEAR_STUDENT' => 2,
        'SCHOOL_PROF' => '',
        'TEACHING_PROF' => '',
        ]);
    }
}
