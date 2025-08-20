<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admin.index');
    }
        public function users()
    {
        return view ('admin.users');
    }
        public function dataguru()
    {
        return view ('admin.dataguru');
    }
        public function datasiswa()
    {
        $siswas = Siswa::all();
        return view('admin.datasiswa', compact('siswas'));
    }
    
    
}
