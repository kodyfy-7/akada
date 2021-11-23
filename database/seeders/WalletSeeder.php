<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Wallet::create([
            'student_id' => 1,
            'account_balance' => '459000',
        ]);
        
        \App\Models\Wallet::create([
            'student_id' => 2,
            'account_balance' => '359000',
        ]);

        \App\Models\Wallet::create([
            'student_id' => 3,
            'account_balance' => '800000',
        ]);
        
    }
}
