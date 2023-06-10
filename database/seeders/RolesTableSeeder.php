<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('roles')->get()->count() == 0){
            $adminTable = DB::table('roles')->insert(
                [
                    'name' => 'Admin',
                    'description' => 'Admin'
                ],
                [
                    'name' => 'User',
                    'description' => 'User',
                ]
            );

        }else
        {
            echo "Roles table is not empty.";
        }
    }
}
