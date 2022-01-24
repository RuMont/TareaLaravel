<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->id();
            $table->string('dni', 9)->unique();
            $table->string('name', 200);
            $table->string('surname', 200);
            $table->date('birth_date');
            $table->foreignId('centre_id')->constrained('centres')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
