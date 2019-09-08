<?php

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // Popula banco com eventos randomicos
        factory(App\Eventos::class, 30)->create();
    }
}
