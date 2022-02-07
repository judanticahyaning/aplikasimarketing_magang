<?php
class modelProspect_sv extends CI_Model
{
    public const TABLE_NAME = 'prospect';
    public const TABLE_NAME2 = 'project';

    function getJoinProspect($kolom, $table1, $table2, $table3, $syarat1, $syarat2, $syarat3)
    {
        $this->db->select($kolom);
        $this->db->from($table1);
        $this->db->join($table2, $syarat1);
        $this->db->join($table3, $syarat2);
        $this->db->where($syarat3);
        $query = $this->db->get()->result();
        return $query;
    }

    function getJoinProject($kolom, $table1, $table2, $table3, $table4, $syarat1, $syarat2, $syarat3, $syarat5)

    {
        $this->db->select($kolom);
        $this->db->from($table1);
        $this->db->join($table2, $syarat1);
        $this->db->join($table3, $syarat2);
        $this->db->join($table4, $syarat3);
        $this->db->where($syarat5);
        $query = $this->db->get()->result();
        return $query;
    }
    function getJoinProspects($kolom, $table1, $table2, $syarat1, $syarat2)
    {
        $this->db->select($kolom);
        $this->db->from($table1);
        $this->db->join($table2, $syarat1);
        $this->db->where($syarat2);
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
                ->select($kolom) //function bawaan dari CI untuk akses databasenya
                ->get($table)
                ->result(); //return object
        }
    }
    public function getDataPic()
    {
        return $this->db->select('*')
            ->from('pic')
            ->get()
            ->result();
    }
    public function updateCust($cust)
    {
        $this->db->update('customer', $cust, array('id_customer' => $cust['id_customer']));
    }
    public function update($cf)
    {
        $getIdProspect = $cf['id_prospect'];
        $this->db->update('prospect', $cf, array('id_prospect' => $cf['id_prospect']));
        $data = $this->db->select('*')->from('prospect')->where('id_prospect', $getIdProspect)->get()->row();
        return $data;
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

    public function addProspect($pros)
    {
        $this->db->insert($this::TABLE_NAME, $pros);
    }
    public function addProject($pros)
    {
        $this->db->insert($this::TABLE_NAME2, $pros);
    }

    public function updateProspect($pros)
    {
        $this->db->update($this::TABLE_NAME, $pros, array('id_prospect' => $pros['id_prospect']));
    }

    public function addCust($table, $cust)
    {

        return $this->db
            ->insert($table, $cust);
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
    public function getDataAm()
    {
        return $this->db
            ->select('*')
            ->from('am')
            ->where(array('previlege' => 'am'))
            ->get()
            ->result();
    }
    public function delete($table, $where)
    {
        return $this->db
            ->where($where)
            ->delete($table);
    }
    public function updateProfil($profile)
    {
        $this->db->where('kode_am', $profile['kode_am']);
        $this->db->update('am', $profile);
    }
    public  function addAm($table, $am)
    {
        return $this->db->insert($table, $am);
    }
    public function getDataFile()
    {
        return  $this->db->select('*')
            ->from('document')
            ->get()
            ->result();
    }
}
