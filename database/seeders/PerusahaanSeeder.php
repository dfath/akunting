<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $row = 0;
        if (($handle = fopen( __DIR__ . "/perusahaan.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($row) {
                    \DB::table('perusahaan')->insert([
                        'id' => intval($data[0]),
                        'nama' => $data[1],
                    ]);
                }
                $row++;
            }
            fclose($handle);
        }
    }
}
