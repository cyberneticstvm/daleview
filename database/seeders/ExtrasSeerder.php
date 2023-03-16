<?php

namespace Database\Seeders;

use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtrasSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Extra::create([
            'name' => 'Male',
            'category' => 'gender',
        ]);
        Extra::create([
            'name' => 'Female',
            'category' => 'gender',
        ]);
        Extra::create([
            'name' => 'Transgender',
            'category' => 'gender',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'gender',
        ]);
        Extra::create([
            'name' => 'Married',
            'category' => 'mstatus',
        ]);
        Extra::create([
            'name' => 'Unmarried',
            'category' => 'mstatus',
        ]);
        Extra::create([
            'name' => 'Widow',
            'category' => 'mstatus',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'mstatus',
        ]);
        Extra::create([
            'name' => 'Primary School',
            'category' => 'education',
        ]);
        Extra::create([
            'name' => 'High School',
            'category' => 'education',
        ]);
        Extra::create([
            'name' => 'Graduate',
            'category' => 'education',
        ]);
        Extra::create([
            'name' => 'Post Graduate',
            'category' => 'education',
        ]);
        Extra::create([
            'name' => 'Doctorate',
            'category' => 'education',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'education',
        ]);
        Extra::create([
            'name' => 'Part Time',
            'category' => 'employment',
        ]);
        Extra::create([
            'name' => 'Full Time',
            'category' => 'employment',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'employment',
        ]);
        Extra::create([
            'name' => 'Malayalam',
            'category' => 'language',
        ]);
        Extra::create([
            'name' => 'Tamil',
            'category' => 'language',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'language',
        ]);
        Extra::create([
            'name' => 'Adhaar',
            'category' => 'id',
        ]);
        Extra::create([
            'name' => 'Voter ID Card',
            'category' => 'id',
        ]);
        Extra::create([
            'name' => 'Pancard',
            'category' => 'id',
        ]);
        Extra::create([
            'name' => 'Driving License',
            'category' => 'id',
        ]);
        Extra::create([
            'name' => 'Passport',
            'category' => 'id',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'id',
        ]);
        Extra::create([
            'name' => 'SUD',
            'category' => 'reason',
        ]);
        Extra::create([
            'name' => 'Mental Health Problems',
            'category' => 'reason',
        ]);
        Extra::create([
            'name' => 'Counselling',
            'category' => 'reason',
        ]);
        Extra::create([
            'name' => 'Smoking Cessation',
            'category' => 'reason',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'reason',
        ]);
        Extra::create([
            'name' => 'Self',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Family',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Police',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Excise',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Pvt Counsellor',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Psychiatrist',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Social Worker',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Recovering Addicts',
            'category' => 'referral',
        ]);
        Extra::create([
            'name' => 'Other',
            'category' => 'referral',
        ]);
    }
}
