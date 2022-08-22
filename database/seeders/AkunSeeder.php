<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $row = 0;
        if (($handle = fopen( __DIR__ . "/akun.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row)
                DB::table('akun')->insert([
                    'id' => intval($data[0]),
                    'induk_id' => intval($data[1]),
                    'nama' => $data[2],
                    'kategori_id' => intval($data[4]),
                    'perusahaan_id' => intval($data[6]),
                    'saldo_awal' => 0,
                ]);
                $row++;
            }
            fclose($handle);
        }
    }
}
