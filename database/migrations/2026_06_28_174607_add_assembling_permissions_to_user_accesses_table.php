<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_accesses', function (Blueprint $table) {
            if (! Schema::hasColumn('user_accesses', 'assembling_create')) {
                $table->boolean('assembling_create')->default(false)->after('assembling');
            }

            if (! Schema::hasColumn('user_accesses', 'assembling_edit')) {
                $table->boolean('assembling_edit')->default(false)->after('assembling_create');
            }

            if (! Schema::hasColumn('user_accesses', 'assembling_delete')) {
                $table->boolean('assembling_delete')->default(false)->after('assembling_edit');
            }
        });
    }

    public function down(): void
    {
        Schema::table('user_accesses', function (Blueprint $table) {
            if (Schema::hasColumn('user_accesses', 'assembling_delete')) {
                $table->dropColumn('assembling_delete');
            }

            if (Schema::hasColumn('user_accesses', 'assembling_edit')) {
                $table->dropColumn('assembling_edit');
            }

            if (Schema::hasColumn('user_accesses', 'assembling_create')) {
                $table->dropColumn('assembling_create');
            }
        });
    }
};