<?php namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App;
use Illuminate\Database\Eloquent\Collection;

class ESTInitRBAC extends BaseCommand
{
    // Entrust is an RBAC library... RBAC = "Role Based Access Control"
    protected $signature = 'est:init-rbac';

    protected $description = 'Initialize Role Based Access Control';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Summer',
                'email' => 'cj@estgroupe.com',
                'password' => bcrypt('adminadmin'),
            ]);
        }
        $founder = Role::addRole('Founder', 'Founder');

        $visit_admin   = Permission::addPermission('visit_admin', 'Visit Admin');
        $manage_users  = Permission::addPermission('manage_users', 'Manage Users');

        $this->attachPermissions($founder, [
            $visit_admin,
            $manage_users,
        ]);

        if (!$user->hasRole($founder->name)) {
            $user->attachRole($founder);
        }

        $this->info('--');
        $this->info("Initialize RABC success -- ID: 1 and Name “{$user->name}” has founder permission");
        $this->info('--');
    }

    public function attachPermissions(Role $role, array $permissions)
    {
        $attach = [];

        $permissions = new Collection($permissions);

        $detach = [];
        foreach ($role->perms()->get() as $permission) {
            if ($permissions->where('name', $permission->name)->isEmpty()) {
                $detach[] = $permission;
            }
        }

        foreach ($permissions as $permission) {
            if (!$role->hasPermission($permission->name)) {
                $attach[] = $permission;
            }
        }

        $role->detachPermissions($detach);
        $role->attachPermissions($attach);
    }
}
