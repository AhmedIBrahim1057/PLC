<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    public $successStatus = 200;


    public function index(Request $request) {

//        if(!can('access_logs')) return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);

        $offset = ($request->offset)?$request->offset:0;
        $limit = ($request->limit)?$request->limit:10;

        $query =  DB::table('logs')->select('logs.*','users.id as user_id','users.ar_name')
            ->leftJoin('users','users.id','=','logs.user_id');

        if($request->search_text) {
            $textSearch = mb_ereg_replace(" ", "%", getFTS($request->search_text));
            $query->where(\DB::raw("CONCAT(COALESCE(logs.old_value,''), ' ', COALESCE(logs.new_value,''))") , "like", "%$textSearch%");
        }

        $direction = ($request->order_direction) ? $request->order_direction : 'ASC';
        if ($request->order_by == null) {
            $query->orderBy('logs.created_at', 'DESC');
        } else {
            $query->orderBy("logs.$request->order_by", $direction);
        }

        if($limit>0) {
            $query->offset($offset);
            $query->limit($limit+1);
        }
        $logs = $query->get()->toArray();

        $actions = DB::table('logs')->groupBy('action')->pluck('action');
        return response()->json(['logs' => $logs, 'actions' => $actions], $this->successStatus);
    }

    public function get(Request $request, Log $log) {

//        if(!can('access_logs')) return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);
        $log->user;
        return response()->json(['log' => $log], $this->successStatus);
    }
}
