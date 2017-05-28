<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnToDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dictionaries', function (Blueprint $table) {
            $table->string('category')->nullable()->change();
            $table->string('option_link')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dictionaries', function (Blueprint $table) {
            $table->string('category')->comment('정의 대상 키워드 카테고리');
            $table->string('option_link')->comment('키워드 정의에 도움이되는 추가정보 URL');
        });
    }
}
