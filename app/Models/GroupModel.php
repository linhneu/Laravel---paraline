<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GroupModel extends Model
{
    use HasFactory;

    protected $table = 'm_groups';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'del_flag', 
    ];
    protected static function booted()
    {
        static::addGlobalScope('getList', function (Builder $builder)
        {
            $builder->where('del_flag', DEL_FLAG_ACTIVE);
        });
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst($name);
    }
}
