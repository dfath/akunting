<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $row = 0;
        if (($handle = fopen( __DIR__ . "/kategori.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row)
                DB::table('kategori')->insert([
                    'id' => intval($data[0]),
                    'nama' => $data[1],
                ]);
                $row++;
            }
            fclose($handle);
        }
    }
}
