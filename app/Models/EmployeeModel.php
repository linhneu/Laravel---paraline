<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }
    public function setAddressAttribute($address)
    {
        $this->attributes['address'] = ucfirst($address);
    }
    public function scopeEmail($query, $email)
    {
        return $query->where('email', 'like', '%' . "$email" . '%');
    }
    public function scopeTeamId($query, $team_id)
    {
        return $query->where('team_id', '=', $team_id);
    }
    public function team()
    {
        return $this->belongsTo(TeamModel::class);
    }
    protected static function booted()
    {
        static::addGlobalScope('getList', function (Builder $builder)
        {
            $builder->where('del_flag', DEL_FLAG_ACTIVE);
        });
    }
}
