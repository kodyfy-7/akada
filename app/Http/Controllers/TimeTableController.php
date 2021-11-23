<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TimeTable;

use DB;

class TimeTableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $monday = DB::table('time_tables')
                                ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                                ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                                ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                                ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                                ->where('classrooms.id', '=', 1)
->where('week_days.day', '=', 'Monday')
->orderBy('time_tables.period_id', 'asc')
                                ->get();
                                
$tuesday = DB::table('time_tables')
                                ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                                ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                                ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                                ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                                ->where('classrooms.id', '=', 1)
->where('week_days.day', '=', 'Tuesday')
->orderBy('time_tables.period_id', 'asc')
                                ->get();
                                
$wednesday = DB::table('time_tables')
                                ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                                ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                                ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                                ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                                ->where('classrooms.id', '=', 1)
->where('week_days.day', '=', 'Wednesday')
->orderBy('time_tables.period_id', 'asc')
                                ->get();
                                
$thursday = DB::table('time_tables')
                                ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                                ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                                ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                                ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                                ->where('classrooms.id', '=', 1)
->where('week_days.day', '=', 'Thursday')
->orderBy('time_tables.period_id', 'asc')
                                ->get();
                                
$friday = DB::table('time_tables')
                                ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                                ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                                ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                                ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                                ->where('classrooms.id', '=', 1)
->where('week_days.day', '=', 'Friday')
->orderBy('time_tables.period_id', 'asc')
                                ->get();
            return view('welcome', compact('monday', 'tuesday', 'wednesday', 'thursday', 'friday'));
      
    }
}
