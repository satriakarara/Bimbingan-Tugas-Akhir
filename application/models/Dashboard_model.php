<?php

    class Dashboard_model extends CI_model{

        public function jumlahDosen(){
            // ambil id dospem 1 dan 2 dari tabel tugasakhir
            $this->db->select('id2, id3');
            $this->db->from('tugasakhir');
            return $this->db->get()->result_array();
        }

       
        public function jumlahDosen1(){
            // ambil id2 terus jumlahin id2 ada berapa, trus id2 namanya siapa
            $this->db->select('id2, u1.nama as nama, COUNT(id2) as total');
            $this->db->from('tugasakhir');
            $this->db->where('ta_accepted', 2);
            $this->db->group_by('id2'); 
            $this->db->join('user u1', 'u1.id=tugasakhir.id2');
            return $this->db->get()->result_array();
        }

        public function jumlahDosen2(){
           // ambil id3 terus jumlahin id3 ada berapa, trus id3 namanya siapa
            $this->db->select('id3, u1.nama as nama, COUNT(id3) as total');
            $this->db->from('tugasakhir');
            $this->db->group_by('id3'); 
            $this->db->join('user u1', 'u1.id=tugasakhir.id3');
            return $this->db->get()->result_array();
        }
    }
?>