<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Status::class)->create([
            'status' => "Não iniciado",
        ]);

        factory(Status::class)->create([
            'status' => "iniciado",
        ]);

        factory(Status::class)->create([
            'status' => "Em andamento",
        ]);

        factory(Status::class)->create([
            'status' => "Pausado",
        ]);

        factory(Status::class)->create([
            'status' => "Concluído",
        ]);

        factory(Status::class)->create([
            'status' => "Cancelado",
        ]);
    }
}
