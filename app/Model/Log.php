<?php

namespace App\Model;

use App\Models\Archive\Archive;
use App\Models\Form\Form;
use App\Models\Organization\Organization;
use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public static function log($action, $model, $oldData = null, $newData = null , $url = null) {

        $log = new Log();
        $log->user_id = auth()->id();
        $log->action = $action;
        if(is_string($model)) {
            $log->model = $model;
            $log->model_id = 0;
        }
        else {
            $log->model = get_class($model);
            $log->model_id = $model->id;
        }
//        $log->url = $url? $url : Log::url($model);
        $log->old_value = json_encode($oldData, JSON_UNESCAPED_UNICODE);
        $log->new_value = json_encode($newData, JSON_UNESCAPED_UNICODE);

        if($log->user_id===null && ($log->model=="App\Models\User" || $log->model== get_class(new ResolvedUser()))) {
            $log->user_id = $log->model_id;
        }

        $log->save();

        return $log;
    }

    public static function url($model){
        switch ($model){
            case get_class(new User()): return "/users/$model->id";
            case get_class(new Organization()): return "/higher/organization/$model->id";
            case get_class(new Team()): return "/higher/team/$model->id";
            case get_class(new Archive()): return null;
            case get_class(new Form()): return null;
            default : null; //return request()->path();
        }
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id','id');
    }
}
