<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('detalle_ventas')) {
            Schema::create('detalle_ventas', function (Blueprint $table) {
                // PK int autoincrement (para empatar con ventas.id int)
                $table->increments('id');

                // FK a ventas (int) + cascada
                $table->unsignedInteger('ventas_id');
                $table->foreign('ventas_id')
                    ->references('id')->on('ventas')
                    ->onDelete('cascade');

                // FK a productos (ajusta a unsignedBigInteger si productos.id es BIGINT)
                $table->unsignedInteger('producto_id')->nullable();
                $table->foreign('producto_id')
                    ->references('id')->on('productos');

                // Copias de datos al momento de la venta
                $table->string('descripcion');             // nombre/desc del producto en el momento
                $table->string('unidad', 20)->default('UND');
                $table->enum('lista_precio', ['venta','mayorista'])->default('venta');

                // Detalle numérico
                $table->integer('cantidad');
                $table->decimal('precio_unitario', 12, 2);
                $table->decimal('subtotal', 12, 2);

                $table->timestamps();
                $table->softDeletes();

                // Índices útiles
                $table->index(['ventas_id']);
                $table->index(['producto_id']);
            });
        }
    }

    public function down(): void
    {
        // Elimina FK antes de tirar la tabla (por seguridad en algunos motores)
        if (Schema::hasTable('detalle_ventas')) {
            Schema::table('detalle_ventas', function (Blueprint $table) {
                try { $table->dropForeign(['ventas_id']); } catch (\Throwable $e) {}
                try { $table->dropForeign(['producto_id']); } catch (\Throwable $e) {}
            });
        }
        Schema::dropIfExists('detalle_ventas');
    }
};
