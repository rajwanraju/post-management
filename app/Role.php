<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'slug', 'name',
    ];

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
     }
}
