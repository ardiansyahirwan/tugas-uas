<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Jadwal Kuliah';
        $data['user'] = $this->User_model->getUser()->row_array();
        $data['jadwalkuliah'] = $this->Jadwal_model->getJadwal()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwalAdmin/index', $data);
        $this->load->view('templates/footer', $data);
    }


    // Agenda
    public function postAgenda()
    {
        $data['judul'] = 'Data Agenda';
        $data['user'] = $this->User_model->getUser()->row_array();
        $data['agenda'] = $this->db->get('agenda')->result_array();

        $this->form_validation->set_rules('agenda_nama', 'Nama Agenda', 'required|min_length[3]', [
            'required' => 'Nama agenda harus diisi',
            'min_length' => 'Nama agenda terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jadwalAdmin/v_agenda', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'agenda_nama' => $this->input->post('agenda_nama', true),
                'agenda_tanggal' => $this->input->post('agenda_tanggal', true),
                'agenda_deskripsi' => 'Kosong',
                'agenda_tempat' => $this->input->post('agenda_tempat', true),
                'agenda_waktu' => $this->input->post('agenda_waktu', true),
                'agenda_author' => $this->input->post('agenda_author', true),
                'image' => 'default.jpg'
            ];

            $this->ModelAgenda->simpanAgenda($data);
            redirect('jadwaladmin/postagenda');
        }
    }

    public function ubahAgenda()
    {
        $data['judul'] = 'Ubah Data Agenda';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['agenda'] = $this->ModelAgenda->bukuWhere(['agenda_id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
            'required' => 'Judul Buku harus diisi',
            'min_length' => 'Judul buku terlalu pendek'
        ]);
    }

    // HAPUS AGENDA
    public function hapusAgenda()
    {
        $where = ['agenda_id' => $this->uri->segment(3)];
        $this->ModelAgenda->hapusAgenda($where);
        redirect('agenda');
    }
}
