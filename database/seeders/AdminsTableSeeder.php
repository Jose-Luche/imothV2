<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() == 0){
            if(DB::table('users')->get()->count() == 0){
                $adminTable = DB::table('admins')->insert([
                    'firstName' => 'Super',
                    'lastName' => 'Admin',
                    'email' => 'superadmin@gmail.com',
                    'phone' => '254700000000',
                ]);
                $userTable = DB::table('users')->insert([
                    'email' => 'superadmin@gmail.com',
                    'password' => bcrypt('admin123'),
                    'userType' => 1,
                    'refId' => 1,
                    'role' => 1,
                    'status'=>true
                ]);
            }else
            {
                echo "Admins table is not empty.";
            }
        }else
        {
            echo "Users table is not empty.";
        }
    }
}
