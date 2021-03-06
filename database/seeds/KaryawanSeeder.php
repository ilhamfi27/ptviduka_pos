<?php

use App\Karyawan;
use App\Umkm;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $umkm = Umkm::all();

        foreach ($umkm as $u) {
            factory(Karyawan::class, 15)->create([
                'umkm_id' => $u->umkm_id,
            ]);
        }
    }
}
