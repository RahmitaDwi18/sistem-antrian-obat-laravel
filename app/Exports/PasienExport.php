<?php

namespace App\Exports;

use App\Models\Patient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PasienExport implements FromCollection, WithHeadings, ShouldQueue, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function headings(): array
    {
        return [
            'No',
            'No. Antrain',
            'Ruang poli',
            'Nama',
            'Umur',
            'Gender',
            'Gejala',
            'Resep',
            'Tanggal Antrian',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {

        $startDate = $this->startDate;
        $endDate = $this->endDate;

        $data = [];
        $_data = Patient::when(($this->startDate && $this->endDate), function ($query) use ($startDate, $endDate) {
            return $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        })
            ->get();

        $n = 1;
        foreach ($_data as $patients) {
            $data[] = [
                $n,
                // $patients->id,
                $patients->no_queue,
                $patients->poly_name,
                $patients->name,
                $patients->age,
                $patients->gender,
                $patients->symptom,
                $patients->recipe,
                $patients->created_at,
            ];

            $n++;
        }

        return collect($data);


        // return Patient::all();
    }

    // public function map($patients): array
    // {
    //     return [
    //         $patients->id,
    //         $patients->no_queue,
    //         $patients->poly_name,
    //         $patients->name,
    //         $patients->age,
    //         $patients->gender,
    //         $patients->symptom,
    //         $patients->recipe,
    //         $patients->created_at,
    //     ];
    // }
}
