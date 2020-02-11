<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentifikasi extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        // set validasi data
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
            'valid_email' => 'Email tidak valid',
            'required' => 'Email belum di isi'
        ]);

        $this->form_validation->set_rules('password', 'Email', 'required|trim', [
            'required' => 'Password belum di isi'
        ]);

        // run validasi
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $this->load->view('templates/aute-header', $data);
            $this->load->view('autentifikasi/index');
            $this->load->view('templates/aute-footer');
        } else {
            $this->login_();
        }
    }

    public function login_()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika User ada
        if ($user) {
            // Jika User aktif
            if ($user['is_active'] == 1) {
                // passwordnya sama atau engga
                if (password_verify($password, $user['password'])) {
                    // kalau sama
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // role_id nya apa ?
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert"> Password salah! </div>');
                    redirect('autentifikasi');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert"> Email belum di aktivasi </div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert"> Email tidak terdaftar </div>');
            redirect('autentifikasi');
        }
    }

    public function blok()
    {
        $data['judul'] = 'Access Blocked';
        $this->load->view('templates/header', $data);
        $this->load->view('autentifikasi/blok', $data);
    }


    public function logOut()
    {
        $array = array('email', 'role_id');
        $this->session->unset_userdata($array);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning text-center" role="alert">Anda sudah Log Out</div>');
        redirect('autentifikasi');
    }
}
