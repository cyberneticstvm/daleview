<?php

namespace Database\Seeders;

use App\Models\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::create([
            'name' => 'Admin',
            'dash' => 'dash-admin',
        ]);
        UserRole::create([
            'name' => 'Reception',
            'dash' => 'dash-reception',
        ]);
        UserRole::create([
            'name' => 'Clinical Supervisor',
            'dash' => 'dash-clinical-supervisor',
        ]);
        UserRole::create([
            'name' => 'Intake Counsellor',
            'dash' => 'dash-intake-counsellor',
        ]);
        UserRole::create([
            'name' => 'Laboratory',
            'dash' => 'dash-laboratory',
        ]);
        UserRole::create([
            'name' => 'Case Manager',
            'dash' => 'dash-case-manager',
        ]);
        UserRole::create([
            'name' => 'Staff Nurse',
            'dash' => 'dash-staff-nurse',
        ]);
        UserRole::create([
            'name' => 'Pharmacy',
            'dash' => 'dash-pharmacy',
        ]);
        UserRole::create([
            'name' => 'Security',
            'dash' => 'dash-security',
        ]);
    }
}
