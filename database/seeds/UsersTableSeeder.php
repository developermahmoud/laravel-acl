<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user   = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Author')->first();
        $role_admin  = Role::where('name', 'Admin')->first();

        $user           = new User();
        $user->name     = 'mahmoud';
        $user->email    = 'mahmoud@yahoo.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_user);

        $author           = new User();
        $author->name     = 'ahmed';
        $author->email    = 'ahmed@yahoo.com';
        $author->password = bcrypt('123456');
        $author->save();
        $author->roles()->attach($role_author);

        $admin           = new User();
        $admin->name     = 'ali';
        $admin->email    = 'ali@yahoo.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}
