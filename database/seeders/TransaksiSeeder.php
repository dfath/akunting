<?php

namespace Database\Seeders;

use App\Imports\TransaksiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $filename = __DIR__ . "/transaksi-2.xlsx";

        Excel::import(new TransaksiImport, $filename);
    }
}
