<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pembeli Satu
        
        DB::table('transactions')->insert([
            'user_id' => "2",
            'transaction_date' => date("2021-01-10 09:45:00"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "2",
            'transaction_date' => date("2022-01-11 09:45:00"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "2",
            'transaction_date' => date("2022-01-12 09:45:00"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "2",
            'transaction_date' => date("2022-01-13 09:45:00"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "2",
            'transaction_date' => date("2022-01-14 09:45:00"),
        ]);


        // Pembeli Dua

        DB::table('transactions')->insert([
            'user_id' => "3",
            'transaction_date' => date("2022-02-20 10:50:15"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "3",
            'transaction_date' => date("2022-02-21 10:50:15"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "3",
            'transaction_date' => date("2022-02-22 10:50:15"),
        ]);


        // Pembeli Tiga

        DB::table('transactions')->insert([
            'user_id' => "4",
            'transaction_date' => date("2022-03-30 11:55:30"),
        ]);
        DB::table('transactions')->insert([
            'user_id' => "4",
            'transaction_date' => date("2022-03-31 11:55:30"),
        ]);
    }
}
