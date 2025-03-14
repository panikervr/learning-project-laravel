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

        Schema::create('iks_admins_warns', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('target_id');
            $table->integer('duration');
            $table->string('reason', 128);
            $table->integer('end_at')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('iks_bans', function (Blueprint $table) {
            $table->id();
            $table->integer('steam_id');
            $table->string('ip', 32)->nullable();
            $table->string('name', 128)->nullable();
            $table->integer('duration');
            $table->string('reason', 128);
            $table->tinyInteger('ban_type')->default(0)->comment('0 - SteamId, 1 - Ip, 2 - Both');
            $table->integer('server_id')->nullable();
            $table->integer('admin_id');
            $table->integer('unbanned_by')->nullable();
            $table->string('unban_reason', 128)->nullable();
            $table->timestamps();
            $table->integer('end_at')->nullable();
            $table->softDeletes('deleted_at')->nullable();
        });

        Schema::create('iks_comms', function (Blueprint $table) {
            $table->id();
            $table->integer('steam_id');
            $table->string('ip', 32)->nullable();
            $table->string('name', 128)->nullable();
            $table->tinyInteger('mute_type')->comment('	0 - voice(mute), 1 - chat(gag), 2 - both(silence)');
            $table->integer('duration');
            $table->string('reason', 128);
            $table->integer('server_id')->nullable();
            $table->integer('admin_id');
            $table->integer('unbanned_by')->nullable();
            $table->string('unban_reason', 128)->nullable();
            $table->timestamps();
            $table->integer('end_at')->nullable();
            $table->softDeletes('deleted_at')->nullable();
        });

        Schema::create('iks_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('flags', 32);
            $table->integer('immunity');
            $table->string('comment', 255)->nullable();
        });

        Schema::create('iks_groups_limitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('iks_groups');
            $table->string('limitation_key', 64);
            $table->string('limitation_value', 32);
        });

        Schema::create('iks_servers', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 32)->comment('ip:port');
            $table->string('name', 64);
            $table->string('rcon', 128)->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable();
        });

        Schema::create('iks_admins', function (Blueprint $table) {
            $table->id();
            $table->string('steam_id', 17);
            $table->string('name', 64);
            $table->string('flags', 32)->nullable();
            $table->integer('immunity')->nullable();
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('iks_groups');
            $table->string('discord')->nullable();
            $table->string('vk')->nullable();
            $table->integer('is_disabled')->default(0);
            $table->integer('end_at')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });

        Schema::create('iks_admin_to_server', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('iks_admins');
            $table->unsignedBigInteger('server_id')->nullable();
            $table->foreign('server_id')->references('id')->on('iks_servers');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iks_admin');
    }
};
