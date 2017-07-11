<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(User::where('login', 'admin')->first() === null){
        $admin = new User();
        $admin->name = 'Administrador';
        $admin->login = 'admin';
        $admin->password = bcrypt('admin');

        $admin->save();
      }

      echo "Tabela 'users' semeada\n";
    }
}
