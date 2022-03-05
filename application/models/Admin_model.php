<?php

    class Admin_model extends CI_model{

        public function getAllMahasiswa(){

            
            $this->db->select('*')
                    ->from('user')
                    ->join('tugasakhir', 'user.id = tugasakhir.id1');
            $query= $this->db->get();

            return $query->result();
        }

        public function getId($id){
            return $id;
        }

        public function getAllTugasAkhir(){
            $this->db->select('*');
                $this->db->from('tugasakhir');
                $this->db->join('user', 'user.id=tugasakhir.id1');
                return $this->db->get()->result_array();
        }
        public function namaDosen(){
            $this->db->select('nama');
            $this->db->from('user');
            $this->db->join('tugasakhir', 'user.id=tugasakhir.id2');
            return $this->db->get()->result_array();

        }
        public function belumSempro(){

            
            // $query= $this->db->get_where('tugasakhir',['ta_status'=> 'Belum Seminar Proposal']);
            // return $query->result_array();

            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id1 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Belum Seminar Proposal');

            return $this->db->get()->result_array();
        }
        public function belumSemproDosen(){

            
            // $query= $this->db->get_where('tugasakhir',['ta_status'=> 'Belum Seminar Proposal']);
            // return $query->result_array();

            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id2 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Belum Seminar Proposal');
            return $this->db->get()->result_array();
        }
        

        public function sudahSempro(){

            
            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id1 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Sudah Seminar Proposal');

            return $this->db->get()->result_array();
        }
        public function sudahSemproDosen(){

            
            // $query= $this->db->get_where('tugasakhir',['ta_status'=> 'Belum Seminar Proposal']);
            // return $query->result_array();

            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id2 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Sudah Seminar Proposal');
            return $this->db->get()->result_array();
        }
        public function sudahSemhas(){

            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id1 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Sudah Seminar Hasil');

            return $this->db->get()->result_array();
        }
        public function sudahSemhasDosen(){

            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id2 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Sudah Seminar Hasil');

            return $this->db->get()->result_array();
        }
        public function sudahUjian(){

            
            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id1 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Sudah Ujian TA');

            return $this->db->get()->result_array();
        }
        public function sudahUjianDosen(){

            
            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->join('user', 'tugasakhir.id2 = user.id');
            $this->db->where('tugasakhir.ta_status', 'Sudah Ujian TA');

            return $this->db->get()->result_array();
        }
    }
?>