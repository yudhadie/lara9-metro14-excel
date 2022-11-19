<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function user()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }
}
