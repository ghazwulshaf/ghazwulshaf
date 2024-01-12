<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        $datas = [
            'pageTitle' => 'Profile',
            'title' => 'Profile',
        ];

        return view('dashboard.profile.index', $datas);
    }
}
