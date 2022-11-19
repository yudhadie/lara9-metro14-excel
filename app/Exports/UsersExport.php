<?php

// namespace App\Exports;

// use App\Models\User;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class UsersExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return User::all();
//     }
// }

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function view(): View
    {
        return view('admin.setting.export.user', [
            'users' => User::all()
        ]);
    }
}
