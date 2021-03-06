<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        DB::table('groups')->insert(
            array(
                'name' => 'Administrator',
                'description' => 'Grup superuser (administrator)'
            )
        );

        DB::table('groups')->insert(
            array(
                'name' => 'Senbud',
                'description' => 'Departemen Seni dan Budaya'
            )
        );

        DB::table('groups')->insert(
            array(
                'name' => 'PnK',
                'description' => 'Departemen Pendidikan dan Keilmuan'
            )
        );

        DB::table('groups')->insert(
            array(
                'name' => 'Depor',
                'description' => 'Departemen Olahraga'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
