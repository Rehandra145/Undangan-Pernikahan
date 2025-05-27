<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\Auth;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Guest::where('user_id', Auth::id())->get(['name', 'alamat']);
    }

    public function headings(): array
    {
        return ['Name', 'Alamat'];
    }

    // Tambahkan styling untuk worksheet
    public function styles(Worksheet $sheet)
    {
        // Memberi style ke baris pertama (header)
        return [
            1 => [ // Baris ke-1
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'], // Teks putih
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => '000000' // Hitam
                    ],
                ],
            ],
        ];
    }
}
