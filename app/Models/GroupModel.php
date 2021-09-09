<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;

    protected $table = 'm_groups';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'del_flag', 
    ];
    
}
