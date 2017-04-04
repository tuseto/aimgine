<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $password = \Illuminate\Support\Facades\Hash::make('tuseto');
        DB::table('users')->insert(
                array(
                    'username' => 'tuseto',
                    'name' => 'Todor Petrov',
                    'email' => 'tuseto@email.com',
                    'password' => $password,
                    'isAdmin' => '1',
                    'role' => '0'
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('username', 'tuseto')->delete();
    }
}
