<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsertypeToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('admin', function ($table) {
            $table->string('usertype')->default('admin');
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('usertype');
        });
    }
}

