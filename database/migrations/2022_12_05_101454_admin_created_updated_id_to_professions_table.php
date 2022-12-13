<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('professions')){
            Schema::table('professions', function (Blueprint $table) {
                $table->foreignId('admin_created_id')->after('profession')->nullable()->constrained('admins');
                $table->foreignId('admin_updated_id')->after('admin_created_id')->nullable()->constrained('admins');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('admin_updated_id');
            $table->dropConstrainedForeignId('admin_created_id');

        });
    }
};


