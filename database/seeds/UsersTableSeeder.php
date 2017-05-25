<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departments')->insert([
          'name' => 'testdep1'
      ]);
      DB::table('departments')->insert([
          'name' => 'testdep2'
      ]);

      DB::table('groups')->insert([
          'name' => 'group1'
      ]);
      DB::table('groups')->insert([
          'name' => 'group2'
      ]);

      DB::table('roles')->insert([
          'name' => 'role1'
      ]);
      DB::table('roles')->insert([
          'name' => 'role2'
      ]);

      DB::table('companies')->insert([
          'name' => 'com1',
          'addr' => 'addr1',
          'tel' => 'tel1'
      ]);

      DB::table('users')->insert([
          'name' => 'admin',
          'firstname' => Ryan,
          'lastname' => B,
          'company_id' => '1',
          'department_id' => '1',
          'group_id' => '1',
          'role_id' => '1',
          'email' => 'admin@example.com',
          'password' => bcrypt('password'),
      ]);

      DB::table('settings')->insert([
          'name' => 'user.name',
          'active' => 1,
          'order' => 1
      ]);
      DB::table('settings')->insert([
          'name' => 'user.email',
          'active' => 1,
          'order' => 2
      ]);
      DB::table('settings')->insert([
          'name' => 'company.name',
          'active' => 1,
          'order' => 3
      ]);
      DB::table('settings')->insert([
          'name' => 'company.tel',
          'active' => 1,
          'order' => 4
      ]);
    }
}
