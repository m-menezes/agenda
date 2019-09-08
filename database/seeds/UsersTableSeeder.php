<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(){
        // Usuário base
        $user = [
            'name'=>"admin",
            'email'=>"admin@admin.com",
            'password'=>bcrypt("12345678"),
        ];
        if(User::where('email','=',$user['email'])->count()){
            $usuario = User::where('email','=',$user['email'])->first();
            $usuario->update($user);
        }else{
            User::create($user);
        }
        // Popula banco com usuários randomicos
        factory(App\User::class, 10)->create();
    }
}
