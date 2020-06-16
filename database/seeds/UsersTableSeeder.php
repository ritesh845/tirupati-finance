<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::create(
    		[
	    		'id'    => '1',
	    		'name'  => 'super_admin',
    		]    		
    	);
        Role::create(
            [
                'id'    => '2',
                'name'  => 'admin',
            ]       
        );
        Role::create([
                'id'    => '3',
                'name'  => 'employee'
            ]
        );
        Role::create(
            [
                'id'    => '4',
                'name'  => 'client',  
            ]       
        );

        $user = User::create([
        	'name'              => 'Super Admin',
        	'email'             => 'admin@testing.com',
            'mobile'             => '1234567890',
        	'password'          => Hash::make('admin@845'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'mobile_verified_at' => date('Y-m-d H:i:s'),
            'status' => 'A',
        ]);

        $user->assignRole('super_admin');

        $user1 = User::create([
            'name'              => 'Tirupati Finance',
            'email'             => 'tirupatifinance@gmail.com',
            'mobile'             => '1234567891',
            'password'          => Hash::make('admin@845'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'mobile_verified_at' => date('Y-m-d H:i:s'),
            'status' => 'A',
        ]);

        
        $user1->assignRole('admin');

    }
}
