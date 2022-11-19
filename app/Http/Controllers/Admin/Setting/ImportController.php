<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('admin.setting.import.index',[
            'title' => 'Import Data',
            'subtitle' => 'Import data dari excel',
            'breadcrumbs' => Breadcrumbs::render('import'),
            'user' => $user,
        ]);
    }

    public function user(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        Excel::import(new UsersImport,request()->file('file'));

        return back()->with('success', 'Data User berhasil ditambahkan');
    }
}
