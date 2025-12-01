<?php

namespace Database\Seeders;

use App\Models\AdministradoresModelo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminPasswordSeeder extends Seeder
{
    public function run()
    {
        $administradores = AdministradoresModelo::all();
        
        foreach ($administradores as $admin) {
            // Si la contraseña no está encriptada (es texto plano como "1234")
            if ($admin->contrasena === '1234' || $admin->contrasena === '123') {
                $admin->update([
                    'contrasena' => Hash::make($admin->contrasena)
                ]);
            }
        }
        
        $this->command->info('Contraseñas de administradores encriptadas correctamente');
    }
}