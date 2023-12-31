<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToGenera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genera', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            Schema::enableForeignKeyConstraints();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genera', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('genera_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
