<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToAnimals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->unsignedBigInteger('genus_id');
            $table->foreign('genus_id')
            ->references('id')
            ->on('genera')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            Schema::enableForeignKeyConstraints();

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
        Schema::table('animals', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('animals_genus_id_foreign');
            $table->dropColumn('genus_id');
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('animals_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
