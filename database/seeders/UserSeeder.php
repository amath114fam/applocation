<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UserSeeder extends Seeder

{

/**

* Run the database seeds.

*/

public function run(): void

{

$users = [

[

'name' => 'Alice',

'email' => 'alice@example.com',

'role' => 'admin'

],

];

foreach ($users as $userData) {

// Créez l'utilisateur avec un mot de passe par défaut

$user = User::firstOrCreate(

[

'name' => $userData['name'],

'email' => $userData['email'],

'password' => Hash::make('azerty') // Mot de passe par défaut

]

);

$role = Role::firstOrCreate(['name' => $userData['role']]);

// Assignez le rôle à l'utilisateur

$user->assignRole($role);

}

}

}