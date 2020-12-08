<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TinTuc', function (Blueprint $table) {
            $table->index('NoiBat');
            $table->index('TieuDe');
//            $table->index('NoiDung');
//            $table->index('TomTat');
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TinTuc', function (Blueprint $table) {
            //
        });
    }
}
