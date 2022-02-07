<?php
class modelActivity_sv extends CI_Model
{
    public const TABLE_NAME = 'activity';

    public function search_blog($nama)
    {
        $this->db->like('nama_customer', $nama, 'both');
        $this->db->order_by('nama_customer', 'ASC');
        $this->db->limit(10);
        return $this->db->get('customer')->result();
    }

    function getJoinActivity($kolom, $table1, $table2, $table3, $table4, $table5, $syarat1, $syarat2, $syarat3, $syarat4, $syarat5)
    {
        //$this->db->group_by('time');
        $this->db->select($kolom);
        $this->db->from($table1); //activity
        $this->db->join($table2, $syarat1); //am- am.id_am=activity.id_am 
        $this->db->join($table3, $syarat2); //type- type_act.id_type=activity.id_type
        $this->db->join($table4, $syarat3); //stage- stage.id_stage=activity.id_stage
        $this->db->join($table5, $syarat4); //customer- customer.id_customer=activity.id_customer
        $this->db->where($syarat5); //activity.done=1 ,time
        //$this->db->order_by('time', 'ASC');
        $query = $this->db->get()->result();
        return $query;
    }
    public function getData($kolom, $table, $where = false)
    {
        if ($where) {
            return $this->db
                ->select($kolom)
                ->from($table)
                ->where($where)
                ->get()
                ->row();
        } else {
            return $this->db
                ->select($kolom)
                ->get($table)
                ->result();
        }
    }
    public function updateCust($cust)
    {
        $this->db->update('customer', $cust, array('id_customer' => $cust['id_customer']));
    }
    function updateData($table, $set, $where)
    {
        return $this->db
            ->where($where)
            ->update($table, $set);
    }
    public function update($done)
    {
        $this->db->update('activity', $done, array('id_activity' => $done['id_activity']));
    }
    function insertData($table, $value)
    {
        return $this->db
            ->insert($table, $value);
    }

    public function getCustomer()
    {
        $this->db->select('activity.id_activity');
        $this->db->select('customer.nama_customer');
        $this->db->select('COUNT(activity.id_customer) AS n');
        $this->db->from('activity');
        $this->db->join('customer', 'activity.id_customer = customer.id_customer');
        $this->db->group_by('activity.id_customer');
        $this->db->order_by('customer.nama_customer');
        $this->db->where('activity.done=1');
        $query = $this->db->get()->result();
        return $query;
    }
    public function getCustomerbyAM($id)
    {
        $this->db->select('activity.id_activity');
        $this->db->select('customer.nama_customer');
        $this->db->select('COUNT(activity.id_customer) AS n');
        $this->db->from('activity');
        $this->db->join('customer', 'activity.id_am= ' . $id);
        $this->db->where('activity.id_customer=customer.id_customer');
        $this->db->group_by('activity.id_customer');
        $this->db->order_by('customer.nama_customer');
        $this->db->where('activity.done=1');
        $query = $this->db->get()->result();
        return $query;
    }
    public function updateProfil($profile)
    {
        $this->db->where('kode_am', $profile['kode_am']);
        $this->db->update('am', $profile);
    }
    public function updateAM($dataAM)
    {
        $this->db->where('id_am', $dataAM['id_am']);
        $this->db->update('am', $dataAM);
    }
    public function getDataCustomer()
    {
        return $this->db->select('*')
            ->from('customer')
            ->join('am', 'customer.id_am=am.id_am')
            ->get()
            ->result();
    }
    public function getDataPic()
    {
        return $this->db->select('*')
            ->from('pic')
            ->get()
            ->result();
    }
    public function getDataAm()
    {
        return $this->db
            ->select('*') //function bawaan dari CI untuk akses databasenya
            ->from('am')
            ->where(array('previlege' => 'am'))
            ->get()
            ->result();
    }
    public function delete($table, $where)
    {
        return $this->db
            ->where($where) //untuk menampung syaratnya
            ->delete($table); //ini yang akan dihapus
    }
    public  function addAm($table, $am)
    {
        return $this->db->insert($table, $am);
    }
    public function addCust($table, $cust)
    {
        $this->db //sudah bawaan dari CI
            ->insert($table, $cust); //function insert bawaan dari CI
        $idCust = $this->db->insert_id();
        return $idCust;
    }
}
