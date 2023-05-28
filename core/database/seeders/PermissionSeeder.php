<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->id = 1;
        $permission->name = "dashboard";
        $permission->display_name = "Dashboard";
        $permission->submodule_id = 0;
        $permission->guard_name = "admin";
        $permission->save();

        //administration
        $permission = new Permission();
        $permission->id = 4;
        $permission->name = "adminsite_text";
        $permission->display_name = "adminsite Text";
        $permission->submodule_id = 3;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 8;
        $permission->name = "administration";
        $permission->display_name = "Administration";
        $permission->submodule_id = 0;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 9;
        $permission->name = "admin_user_list";
        $permission->display_name = "Admin User List";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 10;
        $permission->name = "admin_user_add";
        $permission->display_name = "Admin User Add";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 11;
        $permission->name = "admin_user_edit";
        $permission->display_name = "Admin User Edit";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 12;
        $permission->name = "admin_user_delete";
        $permission->display_name = "Admin User Delete";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 13;
        $permission->name = "role_list";
        $permission->display_name = "Role List";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 14;
        $permission->name = "role_add";
        $permission->display_name = "Role Add";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 15;
        $permission->name = "role_edit";
        $permission->display_name = "Role Edit";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 16;
        $permission->name = "role_delete";
        $permission->display_name = "Role Delete";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 17;
        $permission->name = "role_view";
        $permission->display_name = "Role View";
        $permission->submodule_id = 8;
        $permission->guard_name = "admin";
        $permission->save();

        //Email setting
        $permission = new Permission();
        $permission->id = 2;
        $permission->name = "email_setting";
        $permission->display_name = "Email Setting";
        $permission->submodule_id = 0;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 18;
        $permission->name = "email_configure";
        $permission->display_name = "Email Configure";
        $permission->submodule_id = 2;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 19;
        $permission->name = "email_template";
        $permission->display_name = "Email Template";
        $permission->submodule_id = 2;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 20;
        $permission->name = "email_template_edit";
        $permission->display_name = "Email Template Edit";
        $permission->submodule_id = 2;
        $permission->guard_name = "admin";
        $permission->save();

        //setting
        $permission = new Permission();
        $permission->id = 21;
        $permission->name = "system_setting";
        $permission->display_name = "General Setting";
        $permission->submodule_id = 0;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 22;
        $permission->name = "site_setting";
        $permission->display_name = "Site Setting";
        $permission->submodule_id = 21;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 23;
        $permission->name = "database_backup";
        $permission->display_name = "Database Backup";
        $permission->submodule_id = 21;
        $permission->guard_name = "admin";
        $permission->save();

        $permission = new Permission();
        $permission->id = 3;
        $permission->name = "manage_language";
        $permission->display_name = "Manage Language";
        $permission->submodule_id = 0;
        $permission->guard_name = "admin";
        $permission->save();      

         // Payment_permission
         $permission = new Permission();
         $permission->id = 56;
         $permission->name = "user";
         $permission->display_name = "User";
         $permission->submodule_id = 0;
         $permission->guard_name = "admin";
         $permission->save();
 
         $permission = new Permission();
         $permission->id = 57;
         $permission->name = "user_list";
         $permission->display_name = "User List";
         $permission->submodule_id = 56;
         $permission->guard_name = "admin";
         $permission->save();
    }
}
