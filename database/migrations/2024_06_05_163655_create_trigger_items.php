<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TRIGGER `item_ins_after_insert` AFTER INSERT ON `item_ins` FOR EACH ROW BEGIN
                UPDATE items
                SET stock = stock + NEW.in_quantity
                WHERE items.id = NEW.item_id;
            END;
        ");
        DB::statement("
            CREATE TRIGGER `item_ins_after_update` AFTER UPDATE ON `item_ins` FOR EACH ROW BEGIN
                UPDATE items
                SET stock = stock - OLD.in_quantity + NEW.in_quantity
                WHERE items.id = NEW.item_id;
            END;
        ");
        DB::statement("
            CREATE TRIGGER `item_ins_after_delete` AFTER DELETE ON `item_ins` FOR EACH ROW BEGIN
                UPDATE items
                SET stock = stock - OLD.in_quantity
                WHERE items.id = OLD.item_id;
            END;
        ");

        DB::statement("
            CREATE TRIGGER `item_outs_after_insert` AFTER INSERT ON `item_outs` FOR EACH ROW BEGIN
                UPDATE items
                SET stock = stock - NEW.out_quantity
                WHERE items.id = NEW.item_id;
            END;
        ");
        DB::statement("
            CREATE TRIGGER `item_outs_after_update` AFTER UPDATE ON `item_outs` FOR EACH ROW BEGIN
                UPDATE items
                SET stock = stock + OLD.out_quantity - NEW.out_quantity
                WHERE items.id = NEW.item_id;
            END;
        ");
        DB::statement("
            CREATE TRIGGER `item_outs_after_delete` AFTER DELETE ON `item_outs` FOR EACH ROW BEGIN
                UPDATE items
                SET stock = stock + OLD.out_quantity
                WHERE items.id = OLD.item_id;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS item_ins_after_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS item_ins_after_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS item_ins_after_update");
        DB::unprepared("DROP TRIGGER IF EXISTS item_outs_after_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS item_outs_after_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS item_outs_after_update");
    }
};
