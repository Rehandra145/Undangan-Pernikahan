<?php

namespace App\Imports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Guest([
            'name'  => $row['name'],
            'alamat' => $row['alamat'],
            'user_id'=>Auth::id()
        ]);
    }
}
