<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."Libraries/Server.php";
Class Mahasiswa extends Server {

    //service get
    function service_get()
    {
        //panggil model ""Mmahasiswa"
        $this ->load ->model("Mmahasiswa","mdl",TRUE);
        //panggil method "ambil data"
        $hasil = $this -> mdl ->ambil_data();
        //tampilkan  dalam format "JSON"
        $this->response(array("mhs"=> $hasil),200);

    }
    //service delete
    function service_delete()
    {
         //panggil model ""Mmahasiswa"
         $this ->load ->model("Mmahasiswa","mdl",TRUE);
         //ambil parameter "npm" sebagai dasar penghapusan data 
         $token = $this->delete("npm");
         //panggil method "hapus data"
         $hasil = $this->mdl->hapus_data (base64_encode($token));
         //jika data mahasiswa berhasil dihapus
         if($hasil == 1)
         {
            //tampilkan status dalam format "JSON"
            $this->response(array("status" => "Data Berhasil Dihapus"),200);
         }
         //jika data mahasiswa gagal dihapus
         else
        {
            //tampilkan status dalam format "JSON"
            $this->response(array("status" => "Data Gagal Dihapus !"),200);
        }

    }
    //service post
    function service_post()
    {
        //panggil model ""Mmahasiswa"
        $this ->load ->model("Mmahasiswa","mdl",TRUE);
        $data = array(
            "npm" => $this->post("npm"),
            "nama" => $this->post("nama"),
            "telepon" => $this->post("telepon"),
            "jurusan" => $this->post("jurusan"),
        );

            //$data{"npm"} = $this->post("npm");
            //$data{"nama"} = $this->post("nama");

            //$data = $this->post("npm");
            //$data= $this->post("nama");

            //panggil method "simpan_data"
            $hasil =$this->mdl->simpan_data
            ($data ["npm"], $data  ["nama"], $data  ["telepon"], $data  ["jurusan"],base64_encode($data["npm"]));
            //jika data mahasiswa tidak ditemukan
            if ($hasil == 0)
            {
                    //tampilkan status dalam format "JSON"
                    $this->response(array("status" => "Data Berhasil Disimpan!"),200);
           
            }
            //jika data mahasiswa ditemukan
            else
            {
                //tampilkan status dalam format "JSON"
                $this->response(array("status" => "Data Gagal Disimpan!"),200);
                
            }


    }
    //service put

    function service_put()
    {
        
    }
}
