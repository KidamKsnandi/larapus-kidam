<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role;
        $adminRole->name = "Admin";
        $adminRole->display_name = "Admin Larapus";
        $adminRole->save();

        $memberRole = new Role;
        $memberRole->name = "Member";
        $memberRole->display_name = "Member Larapus";
        $memberRole->save();

        // Membuat sample admin
        $admin = new User;
        $admin->name = "Admin Larapus";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt("rahasia");
        $admin->save();
        $admin->attachRole($adminRole);

        //Membuat sample member
        $member = new User;
        $member->name = "Member Larapus";
        $member->email = "member@gmail.com";
        $member->password = bcrypt("rahasia");
        $member->save();
        $member->attachRole($memberRole);
    }
}
