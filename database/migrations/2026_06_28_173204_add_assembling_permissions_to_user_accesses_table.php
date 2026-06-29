<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('user_accesses', function (Blueprint $table) {
        $table->boolean('assembling_create')->default(false)->after('assembling');
        $table->boolean('assembling_edit')->default(false)->after('assembling_create');
        $table->boolean('assembling_delete')->default(false)->after('assembling_edit');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('user_accesses', function (Blueprint $table) {
        $table->dropColumn([
            'assembling_create',
            'assembling_edit',
            'assembling_delete',
        ]);
    });
}
};
