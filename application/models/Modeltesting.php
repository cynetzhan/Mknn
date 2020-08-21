<?php
class Modeltesting extends CI_Model
{
    var $table = 'testing'; //nama tabel dari database
    var $column_order = array(null,'nis','nama_siswa','jenkel','rapor_ind','usbn_ind','rapor_ing','usbn_ing','rapor_mtk','usbn_mtk','rapor_ipa','usbn_ipa','rapor_ips','usbn_ips','minat','nilai_iq', 'kelas',null); //Sesuaikan dengan field
    var $column_search = array('nis','nama_siswa','jenkel','minat'); //field yang diizin untuk pencarian 
    var $order = array('nis' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function simpan($nis, $nama_siswa, $jenkel, $rapor_ind, $usbn_ind, $rapor_ing, $usbn_ing, $rapor_mtk, $usbn_mtk, $rapor_ipa, $usbn_ipa, $rapor_ips, $usbn_ips, $minat, $nilai_iq, $kelas)
    {
        $simpan = [
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'jenkel' => $jenkel,
            'rapor_ind' => $rapor_ind,
            'usbn_ind' => $usbn_ind,
            'rapor_ing' => $rapor_ing,
            'usbn_ing' => $usbn_ing,
            'rapor_mtk' => $rapor_mtk,
            'usbn_mtk' => $usbn_mtk,
            'rapor_ipa' => $rapor_ipa,
            'usbn_ipa' => $usbn_ipa,
            'rapor_ips' => $rapor_ips,
            'usbn_ips' => $usbn_ips,
            'minat' => $minat,
            'nilai_iq' => $nilai_iq,
            'kelas' => $kelas
        ];
        $this->db->insert('testing', $simpan);
    }

    public function ambildata($nis)
    {
        return $this->db->get_where('testing', ['nis' => $nis]);
    }

    public function update($nis, $nama_siswa, $jenkel, $rapor_ind, $usbn_ind, $rapor_ing, $usbn_ing, $rapor_mtk, $usbn_mtk, $rapor_ipa, $usbn_ipa, $rapor_ips, $usbn_ips, $minat, $nilai_iq, $kelas){

        $simpan = [
            'nama_siswa' => $nama_siswa,
            'jenkel' => $jenkel,
            'rapor_ind' => $rapor_ind,
            'usbn_ind' => $usbn_ind,
            'rapor_ing' => $rapor_ing,
            'usbn_ing' => $usbn_ing,
            'rapor_mtk' => $rapor_mtk,
            'usbn_mtk' => $usbn_mtk,
            'rapor_ipa' => $rapor_ipa,
            'usbn_ipa' => $usbn_ipa,
            'rapor_ips' => $rapor_ips,
            'usbn_ips' => $usbn_ips,
            'minat' => $minat,
            'nilai_iq' => $nilai_iq,
            'kelas' => $kelas
        ];

        $this->db->where('nis', $nis);
        $this->db->update('testing', $simpan);
    }

    public function hapus($nis)
    {
        return $this->db->delete('testing', ['nis' => $nis]);
    }

    public function import_data($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('testing', $data);
        }
    }

    public function get(){
        return $this->db->get($this->table);
    }

    public function simpan_tranformasi($data){
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('normalisasi', $data);
        }
    }
    
}