<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;

class UsersImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'  => $row['name'],
            'email' => $row['email'],
            'password'    => Hash::make($row['password']),
        ]);
    }

    public function rules(): array
    {
        return [
             '*.email' => ['email','unique:users,email']
        ];
    }

    public function onFailure(Failure ...$failures)
    {

    }

}
