<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProvinsi extends Model
{
    protected $table='provinsi';
    protected $primaryKey='id_provinsi';
    protected $returnType='object';
    protected $allowedFields=['nama_provinsi'];
    protected $validationRules=[
        'nama_provinsi'=>'required|min_length[3]',
    ];
    //validasi
    protected $validationMessages=[
        'nama_provinsi' => [
            'required'=>'Harus diisi',
            'min_length'=>'Minimal 3 karakter',
        ]
        ];
    protected $skipValidation=false;
}
