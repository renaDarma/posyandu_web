<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Resetpass extends BaseController
{
    public function index($userid)
    {
        $userModel = new UserModel();
        $data  = [
            'title' => 'Reset Password',
            'profil' => $userModel->find($userid),
        ];
        return view('profil/resetpass', $data);
    }

    public function resetPassword($userid)
    {
        $userid = $userid; // Ganti dengan ID pengguna yang ingin mereset password

        $userModel = new UserModel();

        $user = $userModel->find($userid); // Mengambil data pengguna berdasarkan ID

        if ($user) {
            // Validasi form input untuk password baru

            $newPassword = $this->request->getVar('password');
            $confirmPassword = $this->request->getVar('pass_confirm');

            if ($newPassword == $confirmPassword) {
                // Update password pengguna
                $userModel->update($userid, [
                    'password_hash' => password_hash($newPassword, PASSWORD_DEFAULT),
                ]);

                // Set pesan sukses
                $successMessage = 'Password berhasil direset';

                // Redirect kembali ke halaman /profil/resetpass dengan pesan sukses
                return redirect()->to('/')->with('pesan', $successMessage);
            } else {
                // Set pesan error
                $errorMessage = 'Password tidak cocok';

                // Redirect kembali ke halaman /profil/resetpass dengan pesan error
                return redirect()->to('/resetpass'.$this->request->getVar('id'))->with('error', $errorMessage);
            }
        } else {
            // Set pesan error
            $errorMessage = 'Pengguna dengan ID tersebut tidak ditemukan';

            // Redirect kembali ke halaman /profil/resetpass dengan pesan error
            return redirect()->to('/profil/resetpass')->with('error', $errorMessage);
        }
    }
}