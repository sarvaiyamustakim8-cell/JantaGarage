<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            if (!Schema::hasColumn('orders', 'payment_status')) {
                $table->string('payment_status')->default('pending');
            }

            if (!Schema::hasColumn('orders', 'payment_id')) {
                $table->string('payment_id')->nullable();
            }

            if (!Schema::hasColumn('orders', 'amount')) {
                $table->decimal('amount',10,2)->default(0);
            }

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_status','payment_id','amount']);
        });
    }
};