<?php
class modelProspect_am extends CI_Model
{
    public const TABLE_NAME = 'prospect';
    public const TABLE_NAME2 = 'project';

    public function search_blog($nama)
    {
        $this->db->like('nama_customer', $nama, 'both');
        $this->db->order_by('nama_customer', 'ASC');
        $this->db->limit(10);
        return $this->db->get('customer')->result();
    }


    function getJoinProspect($kolom, $table1, $table2, $syarat1, $syarat2)
    {
        $this->db->select($kolom);
        $this->db->from($table1);
        $this->db->join($table2, $syarat1);
        $this->db->where($syarat2);
        $this->db->where('prospect.id_am = ' . $this->session->userdata('id_am'));
        $query = $this->db->get()->result();
        return $query;
    }

    function getJoinProject($kolom, $table1, $table2, $table3, $syarat1, $syarat2, $syarat3)
    {
        $this->db->select($kolom);
        $this->db->from($table1);
        $this->db->join($table2, $syarat1);
        $this->db->join($table3, $syarat2);
        $this->db->where($syarat3);
        $this->db->where('project.id_am = ' . $this->session->userdata('id_am'));
        $query = $this->db->get()->result();
        return $query;
    }


    public function getData($kolom, $table, $where = false)
    {
        if ($where) {
            return $this->db
                ->select($kolom) //function bawaan dari CI untuk akses databasenya
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
        $this->db->select('count(activity.id_customer) AS n');
        $this->db->from('activity');
        $this->db->join('customer', 'activity.id_am= ' . $this->session->userdata('id_am'));
        $this->db->where('activity.id_customer = customer.id_customer');
        $this->db->where('activity.done=1');
        $this->db->group_by('customer.id_customer');
        $this->db->order_by('customer.nama_customer');
        $query = $this->db->get()->result();
        return $query;
    }


    public function delete($table, $where)
    {
        return $this->db
            ->where($where) //untuk menampung syaratnya
            ->delete($table); //ini yang akan dihapus
    }
    public function updateCust($cust)
    {
        $this->db->update('customer', $cust, array('id_customer' => $cust['id_customer']));
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
    public function addProspectReturnId($pros)
    {
        $this->db->insert($this::TABLE_NAME, $pros);
        return $this->db->insert_id();
    }
    public function updateProject($pro)
    {
        $this->db->update($this::TABLE_NAME2, $pro, array('id_project' => $pro['id_project']));
    }
    public function updateProfile($profile)
    {
        $this->db->where('kode_am', $profile['kode_am']);
        $this->db->update('am', $profile);
    }
    public function addCust($table, $cust)
    {
        $this->db //sudah bawaan dari CI
            ->insert($table, $cust); //function insert bawaan dari CI
        $idCust = $this->db->insert_id();
        return $idCust;
    }
    public function getDataCustomer()
    {
        return $this->db->select('*')
            ->from('customer')
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
    public function getDataFile()
    {
        return  $this->db->select('*')
            ->from('document')
            ->get()
            ->result();
    }
    public function insertFile($file)
    {
        $this->db->insert('document', $file);
    }
    public function updateFile($file)
    {
        $this->db->update('document', $file);
    }
    public function deleteFile($file, $idProject)
    {
        $this->db->where('document.id_project', $idProject);
        $this->db->where_not_in('document.id_doc', $file);
        $this->db->delete('document');
    }
    public function deleteAllFile($idProject)
    {
        $this->db->where('document.id_project', $idProject);
        $this->db->delete('document');
    }
}
