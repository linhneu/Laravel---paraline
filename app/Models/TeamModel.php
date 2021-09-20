<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    public function scopeGroupId($query, $group_id)
    {
         return $query->where('group_id', '=', $group_id );
    }
    public function scopeName($query, $search)
    {
        return $query->where('name', 'like', '%' . "$search". '%' );
    }
}
