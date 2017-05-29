<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'nombre'=>'Nombre',
            'apellido'=>'Apellido',
            'email'=>'test@test.com',
            'password'=>bcrypt('12345'),
            'type'=>'admin'
        ]);
    }
}
