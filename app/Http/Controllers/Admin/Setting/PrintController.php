<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function user()
    {
        $user = User::all();
        $now = Carbon::now();

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                ->loadView('admin.setting.print.user', [
                    'title' => 'Data Users',
                    'users' => $user,
                    'now' => $now,
                 ])
                 ->setPaper('a4', 'potrait')
                 ->stream('Data Users.pdf');
    }
}
