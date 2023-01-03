<?php

namespace App\Http\Controllers\Siode\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('siode.dashboard.dashboard');
    }
}