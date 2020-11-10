<?php

namespace Database\Seeders;

use App\Models\Todos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //leert den Datensatz, falls vorher schon Daten drin waren
        DB::table('todos')->truncate();
        //erstellt mittels der Todos Factory 10 Testdatensätze
        //und schreiben diese in unsere Tabelle Todos
        Todos::factory()
            ->count(10)
            ->create();
    }
}
