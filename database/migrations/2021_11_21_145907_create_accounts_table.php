<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(User::class)
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string('full_name');
            $table->string('phone');
            $table->text('address');


            $table->foreignIdFor(App\Models\Gender::class)
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignIdFor(App\Models\City::class)
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');


            $table->integer('age');

            $table->enum('status', ['active', 'blocked']);

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
        Schema::dropIfExists('accounts');
    }
}
