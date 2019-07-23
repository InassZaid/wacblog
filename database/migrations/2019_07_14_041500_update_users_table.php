<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->date('birthday')->after('remember_token')->nullabel();
            $table->string('avatar')->after('birthday')->nullabel();
            $table->string('country')->after('avatar')->nullabel();
            $table->string('username')->after('id')->nullabel()->unique();
            $table->string('lastname')->after('name')->nullabel();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('birthday');
            $table->dropColumn('avatar');
            $table->dropColumn('country');
            $table->dropColumn('username');
            $table->dropColumn('lastname');
        });
    }
}
