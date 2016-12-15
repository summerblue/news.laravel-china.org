<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Cache;
use DB;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];

    public static function addRole($name, $display_name = null, $description = null)
    {
        $role = Role::query()->where('name', $name)->first();
        if (!$role) {
            $role = new Role(['name' => $name]);
        }
        $role->display_name = $display_name;
        $role->description  = $description;
        $role->save();

        return $role;
    }
}
