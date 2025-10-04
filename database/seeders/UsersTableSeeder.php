<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $this->upsertUserSoftDeleteAware('dev', [
            'name'              => 'Developer',
            'email'             => 'dev@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin'),
            'remember_token'    => Str::random(10),
        ], ['Developer']);

        $this->upsertUserSoftDeleteAware('Super', [
            'name'              => 'Super Admin',
            'email'             => 'super@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123'),
            'remember_token'    => Str::random(10),
        ], ['Superadmin']);

        $this->upsertUserSoftDeleteAware('Admin', [
            'name'              => 'Administrador',
            'email'             => 'admin@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123'),
            'remember_token'    => Str::random(10),
        ], ['Admin']);

        $this->upsertUserSoftDeleteAware('Tester', [
            'name'              => 'Tester',
            'email'             => 'tester@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123'),
            'remember_token'    => Str::random(10),
        ], ['Tester']);

        // Si quieres usuarios demo aleatorios, no fijes username ni email a valores repetidos
        // \App\Models\User::factory(6)->create(); // ← solo si tu factory genera email/username únicos
    }

    /**
     * Crea/actualiza usuario por username.
     * Soporta SoftDeletes: si existe soft-deleted, lo restaura y actualiza.
     */
    protected function upsertUserSoftDeleteAware(string $username, array $attrs, array $roles = []): void
    {
        /** @var \App\Models\User $u */
        $u = User::withTrashed()->where('username', $username)->first();

        if ($u) {
            if ($u->trashed()) {
                $u->restore();
            }
            $u->fill($attrs);
            // No cambies username si es único
            $u->save();
        } else {
            $u = new User($attrs);
            $u->username = $username;
            $u->save();
        }

        if (method_exists($u, 'syncRoles') && $roles) {
            $u->syncRoles($roles);
        }
    }
}
