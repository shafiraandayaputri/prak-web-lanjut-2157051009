<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        //
        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm="")
    {
        
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,            
            'npm' => $npm,
        ];


        return view('profile', $data);
    }

    public function create()
    {
        // $kelas = [
        //     [
        //         'id'=>1 ,
        //         'nama_kelas' => 'A',
        //     ],
        //     [
        //         'id'=> 2,
        //         'nama_kelas' => 'B',
        //     ],
        //     [
        //         'id'=> 3,
        //         'nama_kelas' => 'C',
        //     ],
        //     [
        //         'id'=> 4,
        //         'nama_kelas' => 'D',
        //     ],
        // ];

        // $kelasModel = new KelasModel();

        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user',$data);
    }
    
    public function store()
    {

        $rules = [
            'npm' => [
                'rules' => 'required|min_length[10]|max_length[10]|is_unique[user.npm]',
                'errors' => [
                    'isunique' => 'NPM tidak boleh sama',
                    'required' => 'NPM Tidak Boleh Kosong',
                    'min_length' => 'NPM Harus 10 Digit',
                    'max_length' => 'NPM Harus 10 Digit',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->to('/user/create');
        }

            
            $path = 'assets/uploads/img/';
            $foto = $this->request->getFile('foto');
            $name = $foto->getRandomName();
            if ($foto->move($path, $name)) {
            $foto = base_url($path . $name);
        }

            $this->userModel->saveUser([
                'nama' => $this->request->getVar('nama'),
                'id_kelas' => $this->request->getVar('kelas'),
                'npm' => $this->request->getVar('npm'),
                'foto' => $foto
            ]);

            return redirect()->to('/user');
        }

    public function show($id) {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];

        return view('profile', $data);
    }
}