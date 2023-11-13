<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaGuiches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guiches', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('localizacao');
            $table->string('nome_ref');
            $table->string('cor');

            $table->bigInteger('panel_id')->unsigned()->index();

            $table->foreign('panel_id')
                ->references('id')
                ->on('panels')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guiches');
    }
}
