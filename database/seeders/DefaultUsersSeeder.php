<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Hash;
use SoDe\Extend\Text;

class DefaultUsersSeeder extends Seeder
{
    use Importable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new class implements ToModel
        {
            public function model(array $row)
            {
                if (!is_numeric($row[0])) return null;

                $dni = Text::fillStart(Text::keep($row[4], '0123456789'), '0', 8);
                
                $emails = array_map('trim', Text::split($row[3], '/'));
                $mainEmail = Text::keep(strtolower(end($emails)), 'abcdefghijklmnopqrstuvwxyz0123456789_-.@');

                $phones = array_map('trim', Text::split($row[5], '/'));
                $mainPhone = end($phones);

                User::updateOrCreate([
                    'email' => $mainEmail
                ], [
                    'name' => Text::toTitleCase($row[1]),
                    'lastname' => Text::toTitleCase($row[2]),
                    'phone' => Text::keep($mainPhone, '0123456789'),
                    'password' => Hash::make($dni),
                ])->assignRole('Customer');
            }
        }, 'storage/app/utils/DefaultUsers.xlsx');
    }
}
