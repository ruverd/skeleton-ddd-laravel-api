<?php
use Illuminate\Database\Seeder;
use App\Domain\User\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin')
        ]);
        factory(User::class,100)->create();
    }
}