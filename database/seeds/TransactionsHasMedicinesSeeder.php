<?php

use Illuminate\Database\Seeder;

class TransactionsHasMedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction_id = 0;


        // Pembeli Satu
        
        DB::table('transactions_has_medicines')->insert(
        [
            // transaction 1
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "1", // fentanil inj 0,05 mg/mL (i.m./i.v.)
                'quantity' => 2,
                'price' => 10000,
            ],
            [
                'transaction_id' => $transaction_id,
                'medicine_id' => "8", // asam mefenamat susp 100 mg/5 mL
                'quantity' => 1,
                'price' => 15000,
            ],
            
            // transaction 2
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "4", // hidromorfon tab lepas lambat 8 mg
                'quantity' => 1,
                'price' => 10000,
            ],
            [
                'transaction_id' => $transaction_id,
                'medicine_id' => "11", // ibuprofen* tab 200 mg
                'quantity' => 2,
                'price' => 8000,
            ],
            
            // transaction 3
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "6", // kodein tab 10 mg
                'quantity' => 1,
                'price' => 10000,
            ],
            
            // transaction 4
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "10", // asam mefenamat tab 500 mg
                'quantity' => 3,
                'price' => 12000,
            ],
            
            // transaction 5
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "13", // ketoprofen inj 50 mg/5 mL
                'quantity' => 1,
                'price' => 22000,
            ],
        ]);


        // Pembeli Dua
        
        DB::table('transactions_has_medicines')->insert(
        [
            // transaction 6
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "15", // alopurinol tab 100 mg*
                'quantity' => 15,
                'price' => 17500,
            ],
            [
                'transaction_id' => $transaction_id,
                'medicine_id' => "16", // alopurinol tab 300 mg
                'quantity' => 10,
                'price' => 17500,
            ],
            [
                'transaction_id' => $transaction_id,
                'medicine_id' => "17", // kolkisin tab 500 mg
                'quantity' => 5,
                'price' => 16500,
            ],
            
            // transaction 7
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "18", // bupivakain inj 0,5%
                'quantity' => 3,
                'price' => 12250,
            ],
            [
                'transaction_id' => $transaction_id,
                'medicine_id' => "19", // lidokain inj 0,5%
                'quantity' => 6,
                'price' => 12250,
            ],
            
            // transaction 8
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "6", // kodein tab 10 mg
                'quantity' => 1,
                'price' => 10000,
            ],
        ]);


        // Pembeli Tiga
        
        DB::table('transactions_has_medicines')->insert(
        [
            // transaction 9
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "46", // propanolol tab 10 mg
                'quantity' => 7,
                'price' => 25250,
            ],
            
            // transaction 10
            [
                'transaction_id' => (++$transaction_id),
                'medicine_id' => "47", // betahistin tab 6 mg
                'quantity' => 5,
                'price' => 25250,
            ],
            [
                'transaction_id' => $transaction_id,
                'medicine_id' => "48", // betahistin tab 24 mg
                'quantity' => 3,
                'price' => 35000,
            ],
        ]);
    }
}
