<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrintController extends Controller
{
    public function user()
    {
        $user = User::all();
        $now = Carbon::now();
        $ttd = 'ID:'.Auth::user()->id.', Name:'.Auth::user()->name.', Time:'.$now;

        $pdf = PDF::loadView('admin.setting.print.user', [
            'title' => 'Data Users',
            'users' => $user,
            'now' => $now,
            'ttd' => $ttd,
        ]);
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Data Users.pdf');
    }

    public function usersave()
    {
        $user = User::all();
        $now = Carbon::now();
        $ttd = 'ID:'.Auth::user()->id.', Name:'.Auth::user()->name.', Time:'.$now;

        $pdf = PDF::loadView('admin.setting.print.user', [
            'title' => 'Data Users',
            'users' => $user,
            'now' => $now,
            'ttd' => $ttd,
        ]);
        $pdf->setPaper('a4', 'potrait');

        Storage::put('report/user.pdf', $pdf->output());
        return redirect()->route('import.index')->with('success', 'Data PDF User berhasil di simpan');

    }
}
