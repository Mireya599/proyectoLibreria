<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    private function fkExists(string $table, string $fkName): bool
    {
        $dbName = DB::getDatabaseName();
        $row = DB::selectOne("
            SELECT CONSTRAINT_NAME
            FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS
            WHERE CONSTRAINT_SCHEMA = ?
              AND TABLE_NAME = ?
              AND CONSTRAINT_NAME = ?
              AND CONSTRAINT_TYPE = 'FOREIGN KEY'
            LIMIT 1
        ", [$dbName, $table, $fkName]);

        return (bool) $row;
    }

    public function up(): void
    {
        // 0) Tipos objetivo:
        // unidad_medidas.id = INT (firmado) según tu DDL => unidad_id debe ser INT (firmado)

        // 1) Si existe la FK, drop FK primero
        if ($this->fkExists('detalle_ventas', 'detalle_ventas_unidad_id_foreign')) {
            Schema::table('detalle_ventas', function (Blueprint $table) {
                $table->dropForeign('detalle_ventas_unidad_id_foreign');
            });
        }

        // 2) Si la columna unidad_id existe pero tipo incorrecto y NO tienes doctrine/dbal,
        //    la manera segura es dropearla y recrearla.
        if (Schema::hasColumn('detalle_ventas', 'unidad_id')) {
            Schema::table('detalle_ventas', function (Blueprint $table) {
                $table->dropColumn('unidad_id');
            });
        }

        // 3) Crear la columna con el tipo correcto (INT firmado) y luego la FK
        Schema::table('detalle_ventas', function (Blueprint $table) {
            $table->integer('unidad_id')->nullable()->after('producto_id'); // INT firmado
        });

        // 4) Agregar FK (sólo si la columna existe)
        if (Schema::hasColumn('detalle_ventas', 'unidad_id')) {
            Schema::table('detalle_ventas', function (Blueprint $table) {
                $table->foreign('unidad_id')->references('id')->on('unidad_medidas');
            });
        }
    }

    public function down(): void
    {
        // Quitar FK si existe
        if ($this->fkExists('detalle_ventas', 'detalle_ventas_unidad_id_foreign')) {
            Schema::table('detalle_ventas', function (Blueprint $table) {
                $table->dropForeign('detalle_ventas_unidad_id_foreign');
            });
        }

        // Quitar columna si existe
        if (Schema::hasColumn('detalle_ventas', 'unidad_id')) {
            Schema::table('detalle_ventas', function (Blueprint $table) {
                $table->dropColumn('unidad_id');
            });
        }
    }
};
