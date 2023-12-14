<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assigned_role extends Model
{
    use HasFactory;
    protected $table = "assigned_roles";
    protected $fillable = [
        'user_id', 'permission_id',
    ];

    public function getPermissionsAttribute()
    {
        return explode(',', $this->attributes['permission_id']);
    }

}
