<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            
            'role_name' => 'admin',
            
        ]);
        DB::table('user_roles')->insert([
            
            'role_name' => 'coach',
            
        ]);
        DB::table('user_roles')->insert([
            
            'role_name' => 'parent',
            
        ]);
        DB::table('user_roles')->insert([
            
            'role_name' => 'child',
            
        ]);
    }
}
