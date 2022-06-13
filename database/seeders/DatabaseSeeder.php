<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::create([
            'name' => 'Usuário de teste',
            'email' => config('env.API_USER_EMAIL'),
            'password' => bcrypt( config('env.API_USER_PASSWORD') ),
            'job_title' => 'Gerente administrativo'
        ]);

        \App\Models\Evento::create([
            'nome' => 'Roberto da Silda',
            'nome_evento' => 'Eleição da Pandora',
            'codigo_evento' => '7747',
            'token' => '9dc19260-ff58-4cf2-a5f4-e2f297595fab'
        ]);

        \App\Models\Assembleia::create([
            'nome' => 'Roberto da Silda',
            'nome_evento' => 'Eleição da Pandora',
            'codigo_evento' => '7747'

        ]);
    }
}
