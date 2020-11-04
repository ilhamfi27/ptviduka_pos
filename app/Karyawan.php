<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $primaryKey = 'karyawan_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'tanggal_bergabung',
        'umkm_id',
        'cabang_id',
    ];

    public function umkm()
    {
        return $this->belongsTo('App\Umkm', 'umkm_id', 'umkm_id');
    }

    public function cabang()
    {
        return $this->belongsTo('App\Cabang', 'cabang_id', 'cabang_id');
    }

    public function wasBelongsTo($owner, $role = 'umkm')
    {
        if ($role == 'cabang') {
            return $this->cabang_id == $owner->cabang_id;
        } else if ($role == 'umkm') {
            return $this->umkm_id == $owner->umkm_id;
        }

    }
}
