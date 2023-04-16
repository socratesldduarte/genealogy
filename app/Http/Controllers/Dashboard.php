<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        //number of families
        $countUsers = Family::find(session('family'))->users()->count();
        $countPeople = Family::find(session('family'))->people()->count();

        return view('dashboard', compact(['countPeople', 'countUsers']));
    }
}
