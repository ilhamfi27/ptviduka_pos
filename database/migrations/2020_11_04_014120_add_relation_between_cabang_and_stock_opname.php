<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationBetweenCabangAndStockOpname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stok_opnames', function (Blueprint $table) {
            $table->bigInteger('cabang_id')->unsigned()
                ->nullable()
                ->default(null);
            $table->foreign('cabang_id')
                ->references('cabang_id')
                ->on('cabangs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stok_opnames', function (Blueprint $table) {
            $table->dropForeign(['cabang_id']);
            $table->dropColumn('cabang_id');
        });
    }
}
