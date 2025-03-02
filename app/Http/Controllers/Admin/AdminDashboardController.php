<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.admindashboard'); // تأكد من أن لديك ملف عرض يسمى dashboard.blade.php في مجلد admin
    }
}

