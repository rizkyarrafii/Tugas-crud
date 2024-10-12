<?php 

class PegawaiModel extends CI_Model{



    public function get_data() {
        // Using query builder for the JOIN query
        $this->db->select('*');
        $this->db->from('pegawai a');
        $this->db->join('ruangan b', 'a.id_ruangan = b.id_ruangan');
        
        // You can return the result as an array or object
        $query = $this->db->get();
        
        return $query->result(); // Use result_array() if you prefer an associative array
    }


    public function submit() {
        // Aturan validasi form
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('namaruang', 'Nama Ruang', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form dengan error
            $this->load->view('pegawai_form');
        } else {
            // Jika validasi sukses, simpan data ke database atau proses lebih lanjut
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'tanggallahir' => $this->input->post('tanggallahir'),
                'namaruang' => $this->input->post('namaruang')
            );

            // Simpan data atau lakukan sesuatu dengan data di sini, contoh simpan ke database:
            // $this->db->insert('pegawai', $data);

            // Tampilkan pesan sukses atau redirect
            $data['success'] = "Data pegawai berhasil disimpan!";
            $this->load->view('pegawai_form', $data);
        }
    }


}










?>