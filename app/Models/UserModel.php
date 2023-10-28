<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'npm', 'id_kelas', 'foto'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function saveUser($data){
        $this->insert($data);
    }

    public function getUser($id = null)
    {
        if ($id != null) {
            return $this->select('user.*, kelas.nama_kelas')
                ->join('kelas', 'kelas.id = user.id_kelas')->find($id);
        }
        return $this->select('user.*, kelas.nama_kelas')
            ->join('kelas', 'kelas.id=user.id_kelas')->findAll();
    }

    public function updateUser($data, $id){
        return $this->update($id, $data);
    }

    public function deleteUser($id){
        return $this->delete($id);
    }

    // public function destroy($id)
    // {
    //     $result = $this->userModel->deleteUser($id);
    //     if (!$result){
    //         return redirect()->back()->with('error', "Gagal Menghapus Data");
    //     }

    //     return redirect()->to(base_url('/user'))
    //     ->with('success', 'Berhasil Menghapus Data');
    // }

    // public function show($id){
    //     $user = $this->userModel->getUser($id);

    //     $data = [
    //         'title' => 'Profile',
    //         'user'  => $user,
    //     ];

    //     return view('profile', $data);
    // }

}

