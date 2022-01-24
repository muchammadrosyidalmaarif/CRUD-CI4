<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKota;
use App\Models\ModelProvinsi;

class KotaController extends BaseController
{
    public function index()
    {
        $pprovinsi=new ModelProvinsi();
        $kotaa= new ModelKota();
        $data =[
            'tampilkota' => $kotaa->getAll(),
            'provinsi' => $pprovinsi->findAll()
        ];
            return view('city/kota', $data);
    }

    public function new()
    {
        $pprovinsi= new ModelProvinsi();
        $data =[
            'tampildata' => $pprovinsi->findAll(),
        ];
        return view('city/addkota', $data);
    }

    public function create()
    {
        $pprovinsi= new ModelKota();
        $pprovinsi->insert([
           'nama_kota' => $this->request->getVar('nama_kota'),
           'id_provinsi' => $this->request->getVar('id_provinsi'),
           'jml_penduduk' => $this->request->getVar('jml_penduduk'),
         
       ]);
      
       return redirect()->to(site_url('kota'))->with('sucess', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pprovinsi= new ModelProvinsi();
        $kotaa= new ModelKota();
         $data=[
            'id_kota'=>$kotaa->where('id_kota', $id)->first(),
            'tampildata' => $pprovinsi->findAll(),   

        ];
       
         return view('city/formeditkota', $data);
    }

    public function update($id)
    {
        $nama_kota=  $this->request->getVar('nama_kota');
        $id_provinsi = $this->request->getVar('id_provinsi');
        $jml_penduduk = $this->request->getVar('jml_penduduk');
        $kotaa= new ModelKota();
        $kotaa->update($id,[
            'nama_kota' => $nama_kota,
            'id_provinsi'=> $id_provinsi,
            'jml_penduduk' => $jml_penduduk,

          
        ]);
       
        return redirect()->to('kota')->with('sucess', 'Data Berhasil Diupdate!');
    }
}
