<?php

namespace App\Http\Controllers\v0;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request)
    {
        $attendances = DB::select("
        select attendances.date,
       authentication.users.identification,
       authentication.users.first_lastname,
       authentication.users.second_lastname,
       authentication.users.first_name,
       authentication.users.second_name,
        min(ignug.workdays.start_time) as start_time,
        max(ignug.workdays.end_time) as end_time,
       sum(case when workdays.type_id = 1 then workdays.duration end) - sum(case when workdays.type_id = 2 then workdays.duration end) as duration,
       sum(case when workdays.type_id = 2 then workdays.duration end) as lunch
from ignug.attendances
         inner join ignug.teachers on attendances.attendanceable_id = teachers.id
         inner join ignug.workdays on attendances.id = workdays.workdayable_id
         inner join authentication.users on users.id = teachers.user_id
         inner join ignug.catalogues on attendances.type_id = catalogues.id
            where workdays.state_id <> 3 and users.state_id = 1
            and ignug.attendances.date between '" . $request->start_date . "' and '" . $request->end_date . "'" .
            "group by attendances.date,users.identification,users.first_lastname,users.second_lastname,users.first_name,users.second_name
            order by attendances.date, start_time, authentication.users.first_lastname;");

        return response()->json([
            'data' => [
                'type' => 'attendances',
                'attributes' => $attendances
            ]
        ], 200);
    }

    public function all2()
    {
        $users = User::where('state_id', '<>', 3)->with('attendances')->get();
        return $users;
        $teachers = $users->teacher()->where('state_id', '<>', 3)->get();
        return $teachers;
        $attendances = $teachers->attendances()->where('state_id', '<>', 3)->get();
        return $attendances;
        $attendance = Attendance::with(['workdays' => function ($query) {
            $query->where('state_id', '<>', 3);
        }])
            ->with(['tasks' => function ($query) {
                $query->where('state_id', '<>', 3);
            }])
            ->with(['teacher' => function ($query) {
                $query->where('state_id', '<>', 3);
            }])
            ->where('state_id', '<>', 3)
            ->get();
        return response()->json(
            [
                'data' => [
                    'type' => 'attendances',
                    'attributes' => $attendance
                ]
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
