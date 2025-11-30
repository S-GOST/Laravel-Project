<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminPasswordSeeder extends Seeder
{
    public function run()
    {
        $administradores = AdministradoresModelo::all();
        
        foreach ($administradores as $admin) {
            // Si la contraseña no está encriptada (es texto plano como "1234")
            if ($admin->Contasena === '1234' || $admin->Contasena === '123') {
                $admin->update([
                    'Contasena' => Hash::make($admin->Contasena)
                ]);
            }
        }
        
        $this->command->info('Contraseñas de administradores encriptadas correctamente');
    }
}