<?php

namespace App\Models;

use CodeIgniter\Model;

class AllModel extends Model
{
    // public function get_data()
    // {
    //     $data = $this->db->get('users')->result();
    //     return $data;
    // }

    // public function login($username, $password)
    // {
    //     $data = $this->db->table('users')
    //     ->where(['username' => $username, 'password_hash' => $password])
    //     ->get()->getRow();

    //     // $data_old = $this->db->get_where('users', ['email' => $email, 'password' => $password])->row();

    //     if ($data) {
    //         $result = [
    //             "data" => $data
    //         ];
    //     } else {
    //         $result = [
    //             "data" => $data
    //         ];
    //     }
    //     return $result;
    // }

    public function login($username, $password)
    {
        // Check if the username exists
        $user = $this->db->table('users')
            ->where('users.username', $username)
            ->join('anak', 'users.id = anak.iduser', 'left')
            ->get()
            ->getRowArray();
    
        if ($user) {
            // Verify the password by directly comparing the plain text passwords
            if (password_verify($password, $user['password_hash'])) {
                // Password is correct, return the user data
                return [
                    "success" => true,
                    "message" => "Login successful",
                    "data" => $user
                ];
            } else {
                // Password is incorrect
                return [
                    "success" => false,
                    "message" => "Invalid password"
                ];
            }
        } else {
            // Username not found
            return [
                "success" => false,
                "message" => "Invalid username"
            ];
        }
    }

    function register($username, $fullname, $email, $usernohp, $password) {
        // Load the database library
        $db = \Config\Database::connect();
    
        // Check if password is not null
        if (is_null($password)) {
            return [
                'success' => false,
                'message' => 'Password cannot be null'
            ];
        }
    
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
        // Build the data array
        $data = [
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'usernohp' => $usernohp,
            'password_hash' => $passwordHash,
        ];
    
        try {
            // Insert the data into the database
            $db->table('users')->insert($data);
            return [
                'success' => true,
                'message' => 'Registration successful',
                'user' => $data
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    public function get_agenda()
    {
        return $this->db->table('agenda')
            ->join('kader', 'agenda.idkader = kader.idkader', 'left')
            ->select('agenda.*, kader.idkader as idkader, kader.kadernama as kadernama')
            ->orderBy('agenda.idagenda', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function get_penimbangan()
    {
        return $this->db->table('penimbangan')
        ->join('anak','penimbangan.idanak = anak.idanak','left')
        ->join('ortu','penimbangan.idortu = ortu.idortu','left')
        ->select('penimbangan.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr,
                    ortu.idortu, ortu.ibunama, ortu.ayahnama')
        ->orderBy('penimbangan.idpenimbangan','DESC')
        ->get() 
        ->getResultObject();
    }

    public function getProfil($id) {
        return $this->db->table('users')
                        ->select('id, username, email, fullname, usernohp')
                        ->where('id', $id)
                        ->get()
                        ->getFirstRow();
    }

    public function updateProfil($id, $data) {
        return $this->db->table('users')
                        ->where('id', $id)
                        ->update($data);
    }

    public function get_imunisasi($idanak)
    {
        return $this->db->table('imunisasi')
            ->join('anak', 'imunisasi.idanak = anak.idanak', 'left')
            ->join('ortu', 'imunisasi.idortu = ortu.idortu', 'left')
            ->select('imunisasi.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr, ortu.idortu, ortu.ibunama, ortu.ayahnama')
            ->where('imunisasi.idanak', $idanak)
            ->orderBy('imunisasi.idimunisasi', 'DESC')
            ->get()
            ->getResultObject();
    }



    // public function get_produk_terlaris()
    // {
    //     $query = "
    //         SELECT p.id, p.id_mitra, c.name as id_category, p.nama_produk, p.image, p.type, p.harga, p.stok, p.deskripsi
    //         FROM product p
    //         JOIN category c ON c.id = p.id_category
    //         ORDER BY p.created_date DESC
    //         LIMIT 3
    //     ";
    //     $data = $this->db->query($query)->result();
    //     $modifiedData = $this->modify_data($data, 'produk');
    //     return $modifiedData;
    // }

    // public function get_category()
    // {
    //     $data = $this->db->get('category')->result();
    //     $modifiedData = $this->modify_data($data, 'category');
    //     return $modifiedData;
    // }

    // public function get_detail_produk($id)
    // {
    //     $query = "
    //         SELECT p.id, p.id_mitra, c.name as id_category, p.nama_produk, p.image, p.type, p.harga, p.stok, p.deskripsi
    //         FROM product p
    //         JOIN category c ON c.id = p.id_category
    //         WHERE p.id = $id
    //     ";
    //     $data = $this->db->query($query)->result();
    //     $modifiedData = $this->modify_data($data, 'produk');
    //     return $modifiedData;
    // }

    // public function insert_keranjang($product_id, $user_id, $qty, $price)
    // {
    //     $cekData = $this->db->get_where('keranjang', ['product_id' => $product_id, 'user_id' => $user_id])->row();
    //     if ($cekData) {
    //         $this->db->where(['product_id' => $product_id, 'user_id' => $user_id])
    //             ->update('keranjang', [
    //                 'qty' => $cekData->qty + $qty,
    //                 'updated_date' => date('Y-m-d H:i:s')
    //             ]);
    //     } else {
    //         $data = [
    //             'product_id' => $product_id,
    //             'user_id' => $user_id,
    //             'qty' => $qty,
    //             'price' => $price,
    //             'created_date' => date('Y-m-d H:i:s'),
    //             'updated_date' => date('Y-m-d H:i:s'),
    //             'is_deleted' => 0
    //         ];
    //         $this->db->insert('keranjang', $data);
    //     }
    //     return [
    //         "success" => "true",
    //         'message' => 'Data keranjang berhasil disimpan'
    //     ];
    // }

    // public function get_keranjang()
    // {
    //     $query = "
    //     SELECT k.id, p.id AS product_id, k.user_id, u.name AS nama_user, c.name AS nama_category,
    //     p.id_mitra, (SELECT um.name FROM st_user um WHERE um.id = p.id_mitra) AS nama_mitra,
    //     (SELECT um.image FROM st_user um WHERE um.id = p.id_mitra) AS image_mitra,
    //     k.qty, p.nama_produk, p.image, p.type, p.harga, p.stok, p.deskripsi
    //     FROM keranjang k
    //     JOIN product p ON k.product_id = p.id
    //     JOIN st_user u ON u.id = k.user_id
    //     JOIN category c ON c.id = p.id_category
    //     WHERE k.user_id = 1
    // ";
    //     $data = $this->db->query($query)->result();
    //     $modifiedData = $this->modify_data($data, 'produk');

    //     $result = [];
    //     foreach ($modifiedData as $key => $value) {
    //         $mitraFound = false;
    //         foreach ($result as &$item) {
    //             if ($item["id_mitra"] == $value->id_mitra) {
    //                 $item["produk"][] = [
    //                     "id" => $value->id,
    //                     "id_mitra" => $value->id_mitra,
    //                     "id_product" => $value->product_id,
    //                     "nama_produk" => $value->nama_produk,
    //                     "image" => $value->image,
    //                     "type" => $value->type,
    //                     "harga" => $value->harga,
    //                     "qty" => $value->qty,
    //                     "deskripsi" => $value->deskripsi,
    //                     "gambar_url" => $value->gambar_url,
    //                 ];
    //                 $mitraFound = true;
    //                 break;
    //             }
    //         }
    //         if (!$mitraFound) {
    //             $result[] = [
    //                 "id" => $value->id,
    //                 "id_mitra" => $value->id_mitra,
    //                 "nama_mitra" => $value->nama_mitra,
    //                 "image_mitra" => base_url('assets/image/user/' . $value->image_mitra),
    //                 "produk" => [
    //                     [
    //                         "id" => $value->id,
    //                         "id_mitra" => $value->id_mitra,
    //                         "id_product" => $value->product_id,
    //                         "nama_produk" => $value->nama_produk,
    //                         "image" => $value->image,
    //                         "type" => $value->type,
    //                         "harga" => $value->harga,
    //                         "qty" => $value->qty,
    //                         "deskripsi" => $value->deskripsi,
    //                         "gambar_url" => $value->gambar_url,
    //                     ]
    //                 ]
    //             ];
    //         }
    //     }
    //     return $result;
    // }
    // public function get_mitra()
    // {
    //     $data = $this->db->get_where('st_user', ['id_credential' => 2, 'is_aktif' => 1])->result();
    //     $modifiedData = $this->modify_data($data, 'user');
    //     return $modifiedData;
    // }

    // public function delete_keranjang($id)
    // {
    //     $this->db->delete('keranjang', ['id' => $id]);
    //     return [
    //         "success" => "true",
    //         'message' => 'Data keranjang berhasil dihapus'
    //     ];
    // }

    // public function update_qty_keranjang($id, $qty)
    // {
    //     $this->db->update('keranjang', ['qty' => $qty], ['id' => $id]);
    //     return [
    //         "success" => "true",
    //         'message' => 'Data keranjang berhasil diupdate'
    //     ];
    // }

    // private function modify_data($data, $type)
    // {
    //     $modifiedData = [];
    //     foreach ($data as $item) {
    //         if ($type == 'produk') {
    //             $namaGambar = $item->image;
    //             $gambarUrl = base_url('assets/image/produk/' . $namaGambar);
    //             $item->gambar_url = $gambarUrl;
    //         } elseif ($type == 'category') {
    //             $namaGambar = $item->image;
    //             $gambarUrl = base_url('assets/image/category/' . $namaGambar);
    //             $item->gambar_url = $gambarUrl;
    //         } elseif ($type == 'user') {
    //             $namaGambar = $item->image;
    //             $gambarUrl = base_url('assets/image/user/' . $namaGambar);
    //             $item->gambar_url = $gambarUrl;
    //         }
    //         $modifiedData[] = $item;
    //     }
    //     return $modifiedData;
    // }
}