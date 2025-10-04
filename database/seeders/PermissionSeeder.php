<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission; // <- si usas App\Models\Permission que extiende, cámbialo

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $guard = 'web';

        $grupos = [
            // Configuración del sistema
            'configuración' => ['Ver','Crear','Editar','Eliminar'],

            // Opción de menú
            'opcion menu' => ['Ver','Crear','Editar','Eliminar'],

            // Seguridad
            'permisos' => ['Ver','Crear','Editar','Eliminar'],
            'roles'    => ['Ver','Crear','Editar','Eliminar'],
            'usuarios' => ['Ver','Crear','Editar','Eliminar'],

            // ---- Módulos del negocio ----
            'ventas'           => ['Ver','Crear','Editar','Eliminar'],
            'detalle ventas'   => ['Ver'], // usualmente solo ver
            'clientes'         => ['Ver','Crear','Editar','Eliminar'],
            'productos'        => ['Ver','Crear','Editar','Eliminar'],
            'inventario'       => ['Ver','Editar'], // crea si manejas ingresos por compras
            'compras'          => ['Ver','Crear','Editar','Eliminar'], // si manejas compras
            'proveedores'      => ['Ver','Crear','Editar','Eliminar'],
            'categorías'       => ['Ver','Crear','Editar','Eliminar'],
            'unidades de medida' => ['Ver','Crear','Editar','Eliminar'],
        ];

        foreach ($grupos as $recurso => $acciones) {
            foreach ($acciones as $accion) {
                $name = sprintf('%s %s', $accion, ucfirst($recurso)); // p.ej. "Ver Ventas"
                Permission::firstOrCreate(
                    ['name' => $name, 'guard_name' => $guard],
                    [] // attrs extra si quieres
                );
            }
        }
    }
}
