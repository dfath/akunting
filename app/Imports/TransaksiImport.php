<?php

namespace App\Imports;

use App\Models\Akun;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TransaksiImport implements ToCollection, WithHeadingRow, WithValidation, WithMapping
{
    use Importable;

    /**
     * Collection of akun
     */
    private $baganAkun;

    public function __construct()
    {
        $this->baganAkun = Akun::all();
    }

    /**
     * @param Collection $rows
     *
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $this->createTransaksi($row);
        }
    }

    public function rules(): array
    {
        return [
            '*.tanggal' => ['required', 'date'],
            '*.kas_bank' => ['required'],
            '*.akun' => ['required', Rule::in($this->getKasBankAkunIds())],
            '*.debit' => ['nullable', 'numeric'],
            '*.kredit' => ['nullable', 'numeric'],
        ];
    }

    private function createTransaksi(Collection $row)
    {
        Transaksi::create([
            'perusahaan_id' => $this->getPerusahaanId($row),
            'akun_id' => $this->getAkunId($row),
            'tipe' => $this->getTipeKasBank($row),
            'waktu_bayar' => $this->getWaktuBayar($row),
            'jumlah' => $this->getJumlah($row),
        ]);

        Transaksi::create([
            'perusahaan_id' => $this->getPerusahaanId($row),
            'akun_id' => $this->getAkunId($row),
            'tipe' => $this->getTipeAkun($row),
            'waktu_bayar' => $this->getWaktuBayar($row),
            'jumlah' => $this->getJumlah($row),
        ]);
    }

    public function map($row): array
    {
        $row['tanggal'] = Date::excelToDateTimeObject($row['tanggal']);

        return $row;
    }

    private function getKasBankAkunIds()
    {
        $kasBankAkun = $this->baganAkun->filter(function ($akun) {
            return $akun->kategori_id === Kategori::KAS_BANK;
        });

        return $kasBankAkun->modelKeys();
    }

    private function getPerusahaanId(Collection $row)
    {
        return $this->baganAkun->find($row['akun'])->perusahaan_id;
    }

    private function getAkunId(Collection $row)
    {
        return $row['akun'];
    }

    private function getTipeKasBank(Collection $row)
    {
        return isset($row['debit']) ? Transaksi::TIPE_DEBIT : Transaksi::TIPE_KREDIT;
    }

    private function getTipeAkun(Collection $row)
    {
        return isset($row['debit']) ? Transaksi::TIPE_KREDIT : Transaksi::TIPE_DEBIT;
    }

    private function getWaktuBayar(Collection $row)
    {
        return $row['tanggal']->format('Y-m-d h:m:s');
    }

    private function getJumlah(Collection $row)
    {
        return isset($row['debit']) ? $row['debit'] : $row['kredit'];
    }
}
