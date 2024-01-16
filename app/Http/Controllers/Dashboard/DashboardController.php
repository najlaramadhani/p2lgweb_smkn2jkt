<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tetap = Employee::where('id_status', '=', 1)->count();
        $percobaan = Employee::where('id_status', '=', 2)->count();
        $resign = Employee::where('id_status', '=', 3)->count();
        $wanita = Employee::where('gender', '=', 'Wanita')->count();
        $pria = Employee::where('gender', '=', 'Pria')->count();
        $departement = Departement::withCount('employees')->get();
        return view('dashboard.index', ['tetap' => $tetap, 'percobaan' => $percobaan, 'resign' => $resign, 'wanita' => $wanita, 'pria' => $pria, 'departement' => $departement]);
    }
}
