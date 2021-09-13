<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function scopeTeamId($query, $team_id)
    {
        return $query->where('team_id', '=', $team_id);
    }
    public function team()
    {
        return $this->belongsTo(TeamModel::class);
    }
    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}
