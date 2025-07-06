<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder

{

/**

* Run the database seeds.

*/

public function run(): void

{

$data=[

[

'role_name'=>'admin',

'permission_name'=>'modifier les voitures'

],

[

'role_name'=>'utilisateur',

'permission_name'=>'louer une voiture'

]

];

foreach ($data as $item) {

$role=Role::firstOrCreate([

'name'=>$item['role_name']

]);

$permission=Permission::firstOrCreate([

'name'=>$item['role_name']

]);

$role->givePermissionTo($permission);

}

}

}