<?php

namespace App\Controllers;
use App\Models\ProfilModel;

class Profil extends BaseController
{
    protected $profilModel;
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function lihat($id)
    {
        $data  = [
            'title' => 'Edit Profil',
            'profil' => $this->profilModel->find($id),
        ];

        return view('profil/profil', $data);
    }

    public function edit_proadmin()
    {
    	// dd($this->request->getVar('usernohp'));
        $data = [
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'usernohp' => $this->request->getVar('usernohp'),
        ];
        $this->profilModel->save($data);
        session()->setFlashdata('pesan', 'Data profil berhasil diedit.');
        return redirect()->to('/profil/'.$this->request->getVar('id'));
    }

    public function edit_prokader()
    {
    	// dd($this->request->getVar('usernohp'));
        $data = [
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'usernohp' => $this->request->getVar('usernohp'),
        ];
        $this->profilModel->save($data);
        session()->setFlashdata('pesan', 'Data profil berhasil diedit.');
        return redirect()->to('/profiledit/'.$this->request->getVar('id'));
    }

    public function edit_promas()
    {
    	// dd($this->request->getVar('usernohp'));
        $data = [
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'usernohp' => $this->request->getVar('usernohp'),
        ];
        $this->profilModel->save($data);
        session()->setFlashdata('pesan', 'Data profil berhasil diedit.');
        return redirect()->to('/profilku/'.$this->request->getVar('id'));
    }
}