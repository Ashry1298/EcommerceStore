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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('full_address');
            $table->string('phone');
            $table->string('email');
            $table->float('sub_total');
            $table->enum('status', [
                'pending',
                'shipping',
                'rejected',
                'delivered',
                'closed',
            ])->default('pending');
            $table->text('status_notes')->nullable();
            $table->float('total');
            // $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); //stop Untill adding MultiAuthentication
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
