<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCacheTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('bool_1')->default(false);
            $table->boolean('bool_2')->default(false);
            $table->boolean('bool_3')->default(false);
            $table->boolean('bool_4')->default(false);
            $table->boolean('bool_5')->default(false);
            $table->boolean('bool_6')->default(false);
            $table->boolean('bool_7')->default(false);
            $table->boolean('bool_8')->default(false);
            $table->boolean('bool_9')->default(false);
            $table->boolean('bool_10')->default(false);
            $table->string('string_1');
            $table->string('string_2');
            $table->string('string_3');
            $table->string('string_4');
            $table->string('string_5');
            $table->string('string_6');
            $table->string('string_7');
            $table->string('string_8');
            $table->string('string_9');
            $table->string('string_10');
            $table->float('float_1');
            $table->float('float_2');
            $table->float('float_3');
            $table->float('float_4');
            $table->float('float_5');
            $table->float('float_6');
            $table->float('float_7');
            $table->float('float_8');
            $table->float('float_9');
            $table->float('float_10');
            $table->timestamp('timestamp_1');
            $table->timestamp('timestamp_2');
            $table->timestamp('timestamp_3');
            $table->timestamp('timestamp_4');
            $table->timestamp('timestamp_5');
            $table->timestamp('timestamp_6');
            $table->timestamp('timestamp_7');
            $table->timestamp('timestamp_8');
            $table->timestamp('timestamp_9');
            $table->timestamp('timestamp_10');
            $table->integer('integer_1');
            $table->integer('integer_2');
            $table->integer('integer_3');
            $table->integer('integer_4');
            $table->integer('integer_5');
            $table->integer('integer_6');
            $table->integer('integer_7');
            $table->integer('integer_8');
            $table->integer('integer_9');
            $table->integer('integer_10');
            $table->timestamps();
            $table->softDeletes();
            $table->index('bool_1');
            $table->index('bool_2');
            $table->index('bool_3');
            $table->index('bool_4');
            $table->index('bool_5');
            $table->index('bool_6');
            $table->index('bool_7');
            $table->index('bool_8');
            $table->index('bool_9');
            $table->index('bool_10');
            $table->index('string_1');
            $table->index('string_2');
            $table->index('string_3');
            $table->index('string_4');
            $table->index('string_5');
            $table->index('string_6');
            $table->index('string_7');
            $table->index('string_8');
            $table->index('string_9');
            $table->index('string_10');
            $table->index('float_1');
            $table->index('float_2');
            $table->index('float_3');
            $table->index('float_4');
            $table->index('float_5');
            $table->index('float_6');
            $table->index('float_7');
            $table->index('float_8');
            $table->index('float_9');
            $table->index('float_10');
            $table->index('timestamp_1');
            $table->index('timestamp_2');
            $table->index('timestamp_3');
            $table->index('timestamp_4');
            $table->index('timestamp_5');
            $table->index('timestamp_6');
            $table->index('timestamp_7');
            $table->index('timestamp_8');
            $table->index('timestamp_9');
            $table->index('timestamp_10');
            $table->index('integer_1');
            $table->index('integer_2');
            $table->index('integer_3');
            $table->index('integer_4');
            $table->index('integer_5');
            $table->index('integer_6');
            $table->index('integer_7');
            $table->index('integer_8');
            $table->index('integer_9');
            $table->index('integer_10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
