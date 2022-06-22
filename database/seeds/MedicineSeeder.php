<?php

use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id = 0;


        // 1.1. ANALGESIK NARKOTIK
        $category_id += 1;

        // fentanil
        DB::table('medicines')->insert([
            [
                'generic_name' => 'fentanil',
                'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
                'restriction_formula' => '5 amp/kasus.',
                'price' => 10000,
                'description' => '
a) inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.
b) patch:
- Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
- Tidak untuk nyeri akut.
                ',
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fentanil',
                'form' => 'patch 12,5 mcg/jam',
                'restriction_formula' => '10 patch/bulan.',
                'price' => 10000,
                'description' => '
a) inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.
b) patch:
- Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
- Tidak untuk nyeri akut.
                ',
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fentanil',
                'form' => 'patch 25 mcg/jam',
                'restriction_formula' => '10 patch/bulan.',
                'price' => 10000,
                'description' => '
a) inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.
b) patch:
- Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
- Tidak untuk nyeri akut.
                ',
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // hidromorfon
        DB::table('medicines')->insert([
            [
                'generic_name' => 'hidromorfon',
                'form' => 'tab lepas lambat 8 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'hidromorfon',
                'form' => 'tab lepas lambat 16 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // kodein
        DB::table('medicines')->insert([
            [
                'generic_name' => 'kodein',
                'form' => 'tab 10 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'kodein',
                'form' => 'tab 20 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);


        // 1.2. ANALGESIK NON NARKOTIK
        $category_id += 1;

        // asam mefenamat
        DB::table('medicines')->insert([
            [
                'generic_name' => 'asam mefenamat',
                'form' => ' susp 100 mg/5 mL',
                'restriction_formula' =>'1 btl/kasus.',
                'price' => 15000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => '1',
                'faskes2' => '1',
                'faskes3' => '1',
                'image' => 'asammefenamat100.jpg',
            ],
            [
                'generic_name' => 'asam mefenamat',
                'form' => 'kaps 250 mg',
                'restriction_formula' => '30 kaps/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'asammefenamat250.jpg',
            ],
            [
                'generic_name' => 'asam mefenamat',
                'form' => 'tab 500 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 12000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'asammefenamat500.jpg',
            ],
        ]);

        // ibuprofen*
        DB::table('medicines')->insert([
            [
                'generic_name' => 'ibuprofen*',
                'form' => 'tab 200 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 8000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'ibuprofen200.jpg',
            ],
            [
                'generic_name' => 'ibuprofen*',
                'form' => 'tab 400 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price' => 9500,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'ibuprofen400.jpg',
            ],
            /*[
                'generic_name' => 'ibuprofen*',
                'form' => 'susp 100 mg/5 mL',
                'restriction_formula' => '1 btl/kasus.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'ibuprofen*',
                'form' => 'susp 200 mg/5 mL',
                'restriction_formula' => '1 btl/kasus.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ]*/
        ]);

        // ketoprofen
        DB::table('medicines')->insert([
            [
                'generic_name' => 'ketoprofen',
                'form' => 'inj 50 mg/5 mL',
                'restriction_formula' => null,
                'price' => 22000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'ketoprofen50.jpg',
            ],
            [
                'generic_name' => 'ketoprofen',
                'form' => 'sup 100 mg',
                'restriction_formula' => '2 sup/hari, maks 3 hari.',
                'price' => 25000,
                'description' => "Untuk nyeri sedang sampai berat pada pasien yang tidak dapat menggunakan analgesik secara oral.",
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'ketoprofen100.jpg',
            ],
        ]);


        // 1.3. ANTIPIRAI
        $category_id += 1;

        // alopurinol
        DB::table('medicines')->insert([
            [
                'generic_name' => 'alopurinol',
                'form' => 'tab 100 mg*',
                'restriction_formula' => "30 tab/bulan.",
                'price' => 17500,
                'description' => "Tidak diberikan pada saat nyeri akut.",
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'alopurinol100.jpg',
            ],
            [
                'generic_name' => 'alopurinol',
                'form' => 'tab 300 mg',
                'restriction_formula' => "30 tab/bulan.",
                'price' => 17500,
                'description' => "Tidak diberikan pada saat nyeri akut.",
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'alopurinol300.jpg',
            ],
        ]);

        // kolkisin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'kolkisin',
                'form' => 'tab 500 mg',
                'restriction_formula' => "30 tab/bulan.",
                'price' => 16500,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'kolkisin.png',
            ],
        ]);

        // probenesid
        /*DB::table('medicines')->insert([
            [
                'generic_name' => 'probenesid',
                'form' => 'tab 500 mg',
                'restriction_formula' => "30 tab/bulan.",
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);*/


        // 2.1. ANESTETIK LOKAL
        $category_id += 1;

        // bupivakain
        DB::table('medicines')->insert([
            [
                'generic_name' => 'bupivakain',
                'form' => 'inj 0,5%',
                'restriction_formula' => null,
                'price' => 12250,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => 'bupivakain.jpeg',
            ],
        ]);

        // bupivakain heavy
        /*DB::table('medicines')->insert([
            [
                'generic_name' => 'bupivakain heavy',
                'form' => 'inj 0,5% + glukosa 8%',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => "Khusus untuk analgesia spinal.",
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // etil klorida
        /*DB::table('medicines')->insert([
            [
                'generic_name' => 'etil klorida',
                'form' => 'spray 100 mL',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);*/

        // lidokain
        DB::table('medicines')->insert([
            [
                'generic_name' => 'lidokain',
                'form' => 'inj 0,5%',
                'restriction_formula' => null,
                'price' => 12250,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => '1',
                'faskes2' => '1',
                'faskes3' => '1',
                'image' => 'lidokain05.jpg',
            ],
            [
                'generic_name' => 'lidokain',
                'form' => 'spray topikal 10%',
                'restriction_formula' => null,
                'price' => 12250,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => '1',
                'faskes2' => '1',
                'faskes3' => '1',
                'image' => 'lidokain10.jpg',
            ],
        ]);


        // 2.2. ANESTETIK UMUM dan OKSIGEN
        $category_id += 1;

        // deksmedetomidin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'deksmedetomidin',
                'form' => 'inj 100 mcg/mL',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => "Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.",
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // desfluran
        DB::table('medicines')->insert([
            [
                'generic_name' => 'desfluran',
                'form' => 'ih',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // halotan
        DB::table('medicines')->insert([
            [
                'generic_name' => 'halotan',
                'form' => 'ih',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => '
a) Tidak boleh digunakan berulang.
b) Tidak untuk pasien dengan gangguan fungsi hati.
                ',
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // 2.3. OBAT untuk PROSEDUR PRE OPERATIF
        $category_id += 1;

        // atropin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'atropin',
                'form' => 'inj 0,25 mg/mL (i.v./s.k.)',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // diazepam
        DB::table('medicines')->insert([
            [
                'generic_name' => 'diazepam',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // midazolam
        DB::table('medicines')->insert([
            [
                'generic_name' => 'midazolam',
                'form' => 'inj 1 mg/mL (i.v.)',
                'restriction_formula' => '
- Dosis rumatan: 1 mg/jam (24 mg/hari).
- Dosis premedikasi: 8 vial/kasus.
                ',
                'price' => 10000,
                'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum.',
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'midazolam',
                'form' => 'inj 5 mg/mL (i.v.)',
                'restriction_formula' => '
- Dosis rumatan: 1 mg/jam (24 mg/hari).
- Dosis premedikasi: 8 vial/kasus.
                ',
                'price' => 10000,
                'description' => '
Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum.
Dapat digunakan untuk sedasi pada pasien ICU dan HCU.
                ',
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // 3. ANTIALERGI dan OBAT untuk ANAFILAKSIS
        $category_id += 1;

        // deksametason
        DB::table('medicines')->insert([
            [
                'generic_name' => 'deksametason',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '20 mg/hari.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // difenhidramin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'difenhidramin',
                'form' => 'inj 10 mg/mL (i.v./i.m.)',
                'restriction_formula' => '30 mg/hari.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // epinefrin (adrenalin)
        DB::table('medicines')->insert([
            [
                'generic_name' => 'epinefrin (adrenalin)',
                'form' => 'inj 1 mg/mL',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // 4.1. ANTIDOT KHUSUS
        $category_id += 1;

        // atropin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'atropin',
                'form' => 'tab 0,5 mg',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'atropin',
                'form' => 'inj 0,25 mg/mL (i.v.)',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // efedrin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'efedrin',
                'form' => 'inj 50 mg/mL',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // kalsium glukonat
        DB::table('medicines')->insert([
            [
                'generic_name' => 'kalsium glukonat',
                'form' => 'inj 10%',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // 4.2. ANTIDOT UMUM
        $category_id += 1;

        // magnesium sulfat
        DB::table('medicines')->insert([
            [
                'generic_name' => 'magnesium sulfat',
                'form' => 'serb',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // 5. ANTIEPILEPSI - ANTIKONVULSI
        $category_id += 1;

        // diazepam
        DB::table('medicines')->insert([
            [
                'generic_name' => 'diazepam',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU.',
                'price' => 10000,
                'description' => 'Tidak untuk i.m.',
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'diazepam',
                'form' => 'enema 5 mg/2,5 mL',
                'restriction_formula' => '2 tube/hari, bila kejang.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'diazepam',
                'form' => 'enema 10 mg/2,5 mL',
                'restriction_formula' => '2 tube/hari, bila kejang.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // fenitoin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'fenitoin',
                'form' => 'kaps 30 mg*',
                'restriction_formula' => '90 kaps/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fenitoin',
                'form' => 'kaps 100 mg*',
                'restriction_formula' => '120 kaps/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fenitoin',
                'form' => 'inj 50 mg/mL',
                'restriction_formula' => 'Untuk status epileptikus, dapat diberikan hingga dosis 15 - 30 mg/kgBB di Faskes Tk. 2 dan 3.',
                'price' => 10000,
                'description' => 'Dapat digunakan untuk status konvulsivus.',
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);

        // fenobarbital
        DB::table('medicines')->insert([
            [
                'generic_name' => 'fenobarbital',
                'form' => 'tab 30 mg*',
                'restriction_formula' => '120 tab/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fenobarbital',
                'form' => 'tab 100 mg*',
                'restriction_formula' => '60 tab/bulan.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fenobarbital',
                'form' => 'inj 50 mg/mL',
                'restriction_formula' => '40 mg/kgBB.',
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 1,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
            [
                'generic_name' => 'fenobarbital',
                'form' => 'inj 100 mg/mL',
                'restriction_formula' => null,
                'price' => 10000,
                'description' => null,
                'category_id' => $category_id,
                'faskes1' => 0,
                'faskes2' => 1,
                'faskes3' => 1,
                'image' => null,
            ],
        ]);


        // 7.1. ANTIMIGREN
        $category_id += 1;

        // propanolol
        DB::table('medicines')->insert([
            [
                'generic_name' => 'propranolol',
                'form' => 'tab 10 mg',
                'restriction_formula' =>'',
                'price' => 25250,
                'description' =>'',
                'category_id' => $category_id,
                'faskes1' => '1',
                'faskes2' => '1',
                'faskes3' => '1',
                'image' => 'propranolol.jpg',
            ],
        ]);



        // 7.2. ANTIVERTIGO
        $category_id += 1;

        // betahistin
        DB::table('medicines')->insert([
            [
                'generic_name' => 'betahistin',
                'form' => 'tab 6 mg',
                'restriction_formula' => 'Untuk vertigo perifer:
- BPPV: 1 minggu.
- non BPPV: 30 tab/bulan',
                'price' => 25250,
                'description' => 'Hanya untuk sindrom meniere atau vertigo perifer. Untuk sindrom meniere atau vertigo non BPPV hanya di Faskes Tk. 2 dan 3',
                'category_id' => $category_id,
                'faskes1' => '1',
                'faskes2' => '1',
                'faskes3' => '1',
                'image' => 'betahistin6.jpg',
             ],
             [
                'generic_name' => 'betahistin',
                'form' => 'tab 24 mg',
                'restriction_formula' => '90 tab/bulan.',
                'price' => 35000,
                'description' => 'Hanya untuk sindrom meniere atau vertigo perifer. Untuk sindrom meniere atau vertigo non BPPV hanya di Faskes Tk. 2 dan 3',
                'category_id' => $category_id,
                'faskes1' => '0',
                'faskes2' => '1',
                'faskes3' => '1',
                'image' => 'betahistin24.jpg',
             ],
        ]);
    }
}
