<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AllModel;


class ManageAll extends ResourceController
{
    protected $model;
    protected $format    = 'json';
   

    public function __construct()
    {
        $this->helpers = ['url', 'file'];
        $this->model = new AllModel();

    }

    public function login()
    {
        // Retrieve POST data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validate the input
        if (empty($username) || empty($password)) {
            return $this->fail('Username and Password are required', 400);
        }

        // Check user credentials
        $user = $this->model->login($username, $password);

        // Check if login is successful
        if ($user) {
            // Prepare the response data
            $response = [
                'success' => true,
                'message' => 'Login successful',
                'user' => $user
            ];

            return $this->respond($response);
        } else {
            return $this->failUnauthorized('Invalid username or password');
        }
    }

    public function register_post()
{
    // Get the POST data
    $username = $this->request->getPost('username');
    $fullname = $this->request->getPost('fullname');
    $email = $this->request->getPost('email');
    $usernohp = $this->request->getPost('usernohp');
    $password = $this->request->getPost('password');

    // Call the register method to insert data into the database
    $model = new AllModel(); // Replace YourModelName with your actual model name
    $result = $model->register($username, $fullname, $email, $usernohp, $password);

    // Check the result and respond accordingly
    if ($result['success']) {
        return $this->respondCreated($result);
    } else {
        return $this->fail($result['message'], 500);
    }
}


    public function index()
    {
        $data = $this->model->get_data();
        return $this->respond($data);
    }

    public function getAgenda()
    {
        $data = $this->model->get_agenda();
        return $this->respond($data);
    }

    public function getPenimbangan()
    {
        $data = $this->model->get_penimbangan();
        return $this->respond($data);
    }

    public function getProfil($id)
    {
        $data = $this->model->getProfil($id);
        return $this->respond($data);
    }

    public function updateProfil($id)
    {
        // Mengambil data dari request
        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'usernohp' => $this->request->getVar('usernohp'),
        ];
    
        // Memanggil metode updateProfil dari model dengan memberikan kedua parameter yang diperlukan
        $result = $this->model->updateProfil($id, $data);
    
        if ($result) {
            $response = [
                'message' => 'Data Profil berhasil diubah'
            ];
            return $this->respond($response);
        } else {
            $response = [
                'message' => 'Gagal mengubah data Profil'
            ];
            return $this->respond($response, 500);
        }
    }
    
    public function getImunisasi($idanak)
    {
        $data = $this->model->get_imunisasi($idanak);
        return $this->respond($data);
    }

    
}