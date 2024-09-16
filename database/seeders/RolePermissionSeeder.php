<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
        ]);

        $userSuperAdmin = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'avatar' => '/avatars/avatar-default.jpg',
            'occupation' => 'Web Developer',
            'connect' => 99999999,
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('@Reffy1234'),
        ]);

        $userSuperAdmin->assignRole($superAdminRole);

        $wallet = new Wallet([
            'balance' => 0,
        ]);

        $userSuperAdmin->wallet()->save($wallet);

        $permissions = [
            'manage categories',
            'manage tools',
            'manage projects',
            'manage project tools',
            'manage wallets',
            'manage applicants',

            'apply job',
            'topup wallet',
            'withdraw wallet',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        $clientRole = Role::firstOrCreate([
            'name' => 'client',
        ]);

        $clientPermissions = [
            'manage projects',
            'manage project tools',
            'manage applicants',
            'topup wallet',
            'withdraw wallet',
        ];

        $clientRole->syncPermissions($clientPermissions);

        $freelancerRole = Role::firstOrCreate([
            'name' => 'freelancer',
        ]);

        $freelancerPermissions = [
            'apply job',
            'withdraw wallet',
        ];

        $freelancerRole->syncPermissions($freelancerPermissions);
    }
}
