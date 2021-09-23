<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamModel extends Model
{
    use HasFactory;
    protected $table = 'm_teams';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'del_flag', 'group_id'
    ];
    public function group()
    {
        return $this->belongsTo(GroupModel::class);
    }
    /**
     * 
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected static function booted()
    {
        static::addGlobalScope('getList', function (Builder $builder) {
            $builder->where('del_flag', DEL_FLAG_ACTIVE);
        });
    }
    public function scopeGroupId($query, $group_id)
    {
        return $query->where('group_id', '=', $group_id);
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst($name);
    }
}
