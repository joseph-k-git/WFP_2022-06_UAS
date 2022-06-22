<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('categories')->insert([
            'name' => 'ANALGESIK NARKOTIK', 
            'description' => '1.1. ANALGESIK NARKOTIK', 
        ]);

        // 2
        DB::table('categories')->insert([
            'name' => 'ANALGESIK NON NARKOTIK', 
            'description' => '1.2. ANALGESIK NON NARKOTIK', 
        ]);

        // 3
        DB::table('categories')->insert([
            'name' => 'ANTIPIRAI', 
            'description' => '1.3. ANTIPIRAI', 
        ]);

        // 4
        DB::table('categories')->insert([
            'name' => 'NYERI NEUROPATIK',
            'description' => '1.4. NYERI NEUROPATIK', 
        ]);

        // 5
        DB::table('categories')->insert([
            'name' => 'ANESTETIK LOKAL', 
            'description' => '2.1. ANESTETIK LOKAL', 
        ]);
        
        // 6
        DB::table('categories')->insert([
            'name' => 'ANESTETIK UMUM dan OKSIGEN',
            'description' => '2.2. ANESTETIK UMUM dan OKSIGEN', 
        ]);

        // 7
        DB::table('categories')->insert([
            'name' => 'OBAT untuk PROSEDUR PRE OPERATIF',
            'description' => '2.3. OBAT untuk PROSEDUR PRE OPERATIF', 
        ]);

        // 8
        DB::table('categories')->insert([
            'name' => 'ANTIALERGI dan OBAT untuk ANAFILAKSIS',
            'description' => '3. ANTIALERGI dan OBAT untuk ANAFILAKSIS', 
        ]);

        // 9
        DB::table('categories')->insert([
            'name' => 'ANTIDOT KHUSUS',
            'description' => '4.1. ANTIDOT KHUSUS', 
        ]);

        // 10
        DB::table('categories')->insert([
            'name' => 'ANTIDOT UMUM',
            'description' => '4.2. ANTIDOT UMUM', 
        ]);

        // 11
        DB::table('categories')->insert([
            'name' => 'ANTIMIGREN', 
            'description' => '7.1 ANTIMIGREN', 
        ]);

        // 12
        DB::table('categories')->insert([
            'name' => 'ANTIVERTIGO', 
            'description' => '7.2 ANTIVERTIGO', 
        ]);

        // 13
        DB::table('categories')->insert([
            'name' => 'IMUNOSUPRESAN', 
            'description' => '8.2 IMUNOSUPRESAN', 
        ]);

        // 14
        DB::table('categories')->insert([
            'name' => 'SITOTOKSIK', 
            'description' => '8.3 SITOTOKSIK', 
        ]);

        // 15
        DB::table('categories')->insert([
            'name' => 'DIURETIK', 
            'description' => '15.1 DIURETIK', 
        ]);

        // 16
        DB::table('categories')->insert([
            'name' => 'OBAT untuk HIPERTROFI PROSTAT', 
            'description' => '15.2 OBAT untuk HIPERTROFI PROSTAT', 
        ]);

        // 17
        DB::table('categories')->insert([
            'name' => 'HORMON ANTIDIURETIK', 
            'description' => '16.1 HORMON ANTIDIURETIK', 
        ]);

        // 18
        DB::table('categories')->insert([
            'name' => 'ANTIDIABETES', 
            'description' => '16.2 ANTIDIABETES', 
        ]);

        // 19
        DB::table('categories')->insert([
            'name' => 'TROMBOLITIK', 
            'description' => '17.5 TROMBOLITIK', 
        ]);
    }
}
