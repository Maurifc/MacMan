<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClienteTableSeeder::class);
        $this->call(ComputadorTableSeeder::class);
        $this->call(TelefoneTableSeeder::class);
        $this->call(EnderecoTableSeeder::class);
    }
}
