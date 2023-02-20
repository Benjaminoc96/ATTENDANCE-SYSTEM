<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashBoard extends Controller
{



    public function dashboard(){

        $title = "Dashboard";

        $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
        $created_at_query = date($castToDate);

        $total_visitors = Visitor::all();
        $count_total_visitors = $total_visitors->count();

        $total_visit_today = DB::select("SELECT * FROM visitors where DATE(created_at) = '{$created_at_query}'");
        $count_total_visit_today = count($total_visit_today);
        
        $total_login_today = DB::select("SELECT * FROM logs where log_type = 'IN' and DATE(created_at) = '{$created_at_query}'");
        $count_total_login_today = count($total_login_today);

        $total_logout_today = DB::select("SELECT * FROM logs where log_type = 'OUT' and DATE(created_at) = '{$created_at_query}'");
        $count_total_logout_today = count($total_logout_today);


        return view('dashboard.dashboard', [
        'title' => $title,
        'count_total_visitors' => $count_total_visitors,
        'count_total_visit_today' => $count_total_visit_today,
        'count_total_logout_today' => $count_total_logout_today,
        'count_total_login_today' => $count_total_login_today
        ]);

    }




}