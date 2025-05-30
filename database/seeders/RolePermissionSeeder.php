<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // créer des permissions
        $permission=['voir personne','modifier personne','supprimer'];
        foreach ($permission as $permit) {
            Permission::UpdateOrCreate([
                'name'=>$permit
            ]);
        }
        // créer des role
        $roleadmin=Role::UpdateOrCreate(['name'=>'admin']);
        $roleutilisateur=Role::UpdateOrCreate(['name'=>'client']);
        // Affecter un rôle a une permission
        $roleadmin->syncPermissions(Permission::all());
        $roleutilisateur->syncPermissions(['modifier personne','supprimer']);
        $admin=User::create([
            'name'=>'bamba',
            'email'=>'admin@gmail.com',
            'password'=>'admin12345@'
        ]);
        $admin->assignRole($roleadmin);
        $roleutilisateur=User::create([
            'name'=>'',
            'email'=>'',
            'password'=>''
        ]);
        $roleutilisateur->assignRole($roleutilisateur);
    
    
    }
}
