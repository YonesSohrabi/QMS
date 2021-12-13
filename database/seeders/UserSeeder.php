<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'علی',
            'family' => 'مقیمی',
            'email' => 'ali@ali.com',
            'phone' => '09180042703',
            'nati_code' => '4000133133',
            'role' => 'teacher',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'سعید',
            'family' => 'سوادی',
            'email' => 'saeed@saeed.com',
            'phone' => '09180042754',
            'nati_code' => '4000124124',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'یونس',
            'family' => 'سهرابی',
            'email' => 'yones@yones.com',
            'phone' => '09180042743',
            'nati_code' => '4000123123',
            'role' => 'admin',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'محمد',
            'family' => 'رضوانی',
            'email' => 'mmd@mmd.com',
            'phone' => '09181242743',
            'nati_code' => '4001233123',
            'role' => 'teacher',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'پریسا',
            'family' => 'محمدی',
            'email' => 'parisa@parisa.com',
            'phone' => '09181200743',
            'nati_code' => '4001244123',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'فاطمه',
            'family' => 'عبادی',
            'email' => 'fateme@fateme.com',
            'phone' => '09181218743',
            'nati_code' => '3001244123',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'محسن',
            'family' => 'صمدی',
            'email' => 'mohsen@mohsen.com',
            'phone' => '09181018743',
            'nati_code' => '4000244123',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'پرنیا',
            'family' => 'ساداتی',
            'email' => 'parnia@parnia.com',
            'phone' => '09281218743',
            'nati_code' => '4000244987',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'رضا',
            'family' => 'محمودیان',
            'email' => 'reza@reza.com',
            'phone' => '09381218743',
            'nati_code' => '4008524987',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'آرین',
            'family' => 'نجفی',
            'email' => 'arian@arian.com',
            'phone' => '09187218243',
            'nati_code' => '3800244987',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'سپهر',
            'family' => 'بهشتی',
            'email' => 'sepehr@sepehr.com',
            'phone' => '09187298243',
            'nati_code' => '3812244987',
            'role' => 'teacher',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'سینا',
            'family' => 'لطفی',
            'email' => 'sina@sina.com',
            'phone' => '09381231231',
            'nati_code' => '3800844987',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'سینا',
            'family' => 'سحرخیز',
            'email' => 'sina@sahar.com',
            'phone' => '09384564561',
            'nati_code' => '3800456987',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'امیرحسین',
            'family' => 'یعقوبی',
            'email' => 'amir@amir.com',
            'phone' => '09387897891',
            'nati_code' => '3800789789',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'امین',
            'family' => 'مهری',
            'email' => 'amin@amin.com',
            'phone' => '09389519518',
            'nati_code' => '3821789789',
            'role' => 'student',
            'password' => Hash::make('123'),
        ]);
    }
}
