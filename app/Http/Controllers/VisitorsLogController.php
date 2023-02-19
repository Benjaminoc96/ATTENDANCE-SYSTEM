<?php

namespace App\Http\Controllers;

use App\Models\Visitorslog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorsLogController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
        $to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");
        $title = 'Visitors Log List';
        return view('visitors.visitorslog', [
            'title' => $title,
            'from' => $from,
            'to' => $to,
        ])->with('findVisitorsLogs', Visitorslog::all());
    }






    public function visitortoday()
    {

        $from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
        $to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");

        $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
        $created_at_query = date($castToDate);

        $visitor_today = DB::select("SELECT DISTINCT v_visitors_logs.created_at, v_visitors_logs.updated_at,  v_visitors_logs.name, v_visitors_logs.contact, v_visitors_logs.department, v_visitors_logs.staff, v_visitors_logs.purpose FROM v_visitors_logs where DATE(v_visitors_logs.created_at) = '{$created_at_query}' ");

        $title = 'Visits Today';
        return view('visitors.visittoday', [
            'title' => $title,
            'from' => $from,
            'to' => $to
        ])->with('findVisitorsLogs', $visitor_today);

    }









    public function visitorsnotloggedout()
    {
        $title = "Visitors Not Logged Out Today";

        $from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
        $to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");

        $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
        $created_at_query = date($castToDate);

        $created_at = DB::select("SELECT DISTINCT v_visitors_logs.created_at, v_visitors_logs.name, v_visitors_logs.contact, v_visitors_logs.department, v_visitors_logs.staff, v_visitors_logs.purpose, logs.log_type FROM v_visitors_logs inner join logs on logs.visitors_id  = v_visitors_logs.visitors_id where logs.visitors_id  = v_visitors_logs.visitors_id and v_visitors_logs.timeout IS NULL and logs.log_type NOT IN ('OUT') and DATE(v_visitors_logs.created_at) = '{$created_at_query}' ");

        return view('visitors.visitorsnotloggedout', [
            'title' => $title,
            'from' => $from,
            'to' => $to
        ])->with('findVisitorsLogs', $created_at);

    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
