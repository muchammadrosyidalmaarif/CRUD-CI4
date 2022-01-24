<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKota extends Model
{
    protected $table='kota';
    protected $primaryKey='id_kota';
    protected $returnType='object';
    protected $allowedFields=['nama_kota', 'id_provinsi', 'jml_penduduk'];
    protected $validationRules=[
        'nama_kota'=>'required|min_length[3]',
    ];
    //validasi
    protected $validationMessages=[
        'nama_kota' => [
            'required'=>'Harus diisi',
            'min_length'=>'Minimal 3 karakter',
        ]
        ];
    protected $skipValidation=false;

    public function getAll()
    {
        $builder = $this->db->table('kota');
        $builder->join('provinsi', 'provinsi.id_provinsi = kota.id_provinsi', 'inner');
        $query = $builder->get();
        return $query->getResult();
    }
}
