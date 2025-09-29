<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detalle_ventas', function (Blueprint $table) {
            // agregar columna producto_id si no existe
            if (!Schema::hasColumn('detalle_ventas', 'producto_id')) {
                $table->unsignedBigInteger('producto_id')->nullable()->after('ventas_id');

                // clave foránea a productos.id (BIGINT UNSIGNED)
                $table->foreign('producto_id')
                    ->references('id')->on('productos');
            }
            if (!Schema::hasColumn('detalle_ventas', 'descripcion')) {
                $table->string('descripcion')->nullable()->after('producto_id');
            }
            if (!Schema::hasColumn('detalle_ventas', 'unidad')) {
                $table->string('unidad', 20)->default('UND')->after('descripcion');
            }
            if (!Schema::hasColumn('detalle_ventas', 'lista_precio')) {
                $table->enum('lista_precio', ['venta','mayorista'])->default('venta')->after('unidad');
            }

        });
    }

    public function down(): void
    {
        Schema::table('detalle_ventas', function (Blueprint $table) {
            // quitar FK y columna
            try { $table->dropForeign(['producto_id']); } catch (\Throwable $e) {}
            if (Schema::hasColumn('detalle_ventas', 'producto_id')) {
                $table->dropColumn('producto_id');
            }
        });
    }
};
