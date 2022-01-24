<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProvinsi;
use CodeIgniter\HTTP\Request;

class ProvinsiController extends BaseController
{
    protected $pprovinsi;
  
   
//menampilkan halaman data
    public function index()
    {
        $pprovinsi= new ModelProvinsi();
        $data =[
            'tampildata' => $pprovinsi->findAll(),
        ];
       return view('province/provinsi', $data);
    }

    //proses create data
    public function create()
    {
        $pprovinsi= new ModelProvinsi();
         $pprovinsi->insert([
            'nama_provinsi' => $this->request->getVar('nama_provinsi'),
          
        ]);
       
        return redirect()->to(site_url('provinsi'))->with('sucess', 'Data Berhasil Ditambahkan!');
    }

    //menampilkan halaman insert
    public function new()
    {
        return view('province/addprov');
    }

    //menampilkan halaman edit
    public function edit($id)
    {
        $pprovinsi= new ModelProvinsi();
       $data=[
            'id_provinsi'=>$pprovinsi->where('id_provinsi', $id)->first(),   
        ];
        //var_dump($data);die;
         return view('province/formeditprov', $data);
    }

    public function update($id)
    {
        $nama_provinsi=  $this->request->getVar('nama_provinsi');
       
        $pprovinsi= new ModelProvinsi();
        $pprovinsi->update($id,[
            'nama_provinsi' => $nama_provinsi

          
        ]);
       
        return redirect()->to('provinsi')->with('sucess', 'Data Berhasil Diupdate!');
    }
        
    

    public function delete($id)
    {
        $pprovinsi= new ModelProvinsi();
       $pprovinsi->delete($id);
       return redirect()->to('provinsi')->with('sucess', 'Data Berhasil Dihapus!');
    }

  
}
