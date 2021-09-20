<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'm_employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'del_flag', 'team_id',
        'email', 'first_name', 'last_name', 'gender', 'birthday',
        'address', 'avatar', 'salary', 'position', 'status', 'type_of_work',
    ];
    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
    public function scopeTeamId($query, $team_id)
    {
        return $query->where('team_id', '=', $team_id);
    }
    public function scopeGroupId( $group_id)
    {
        //return DB::table('m_teams')->select('group_id')->where('group_id', '=', $group_id);
        // return DB::table('m_teams')->whereHas('group_id', function($query){
        //     $query->whereIn($group_id);
        // })->get();
        return TeamModel::groupId($group_id);
    }

    public function scopeName($query, $search)
    {
        return $query->where('last_name', 'like', '%' . "$search" . '%');
    }
    public function scopeEmail($query, $email)
    {
        return $query->where('email', 'like', '%' . "$email" . '%');
    }
    public function team()
    {
        return $this->belongsTo(TeamModel::class);
    }

}
