<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keyword')->comment('정의 대상 키워드');
            $table->string('category')->comment('정의 대상 키워드 카테고리');
            $table->string('defined_keyword')->comment('키워드 정의');
            $table->string('option_link')->comment('키워드 정의에 도움이되는 추가정보 URL');
            // index는 컬럼에 인덱스건다
            // unsigned는 음수 불가능 하게함
            // user table의 id를 쓰려고할때는 관례로 "테이블명_id"로 써주면 라라벨이 알아서 동작함
            $table->integer('user_id')->unsigned()->index()->comment('키워드 정의자');
            // 외래키 걸어줌
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionaries');
    }
}
