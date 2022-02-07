<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prospect_am extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('kode_am')) {
      redirect('login?pesan=Silakan Login dahulu');
    }
    $this->load->model("modelProspect_am");
    error_reporting(0);
  }

  public function index()
  {
    $kode_am = $this->session->userdata('kode_am');
    $where = array('kode_am' => $kode_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['prospects'] = $this->modelProspect_am->getJoinProspect("*", "prospect", "customer", "customer.id_customer=prospect.id_customer", "prospect.cf!='100' and prospect.cf!='0'");
    $data['title'] = 'Prospect';

    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/prospect', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function project()
  {
    $data['title'] = 'Project';
    $data['projects'] = $this->modelProspect_am->getJoinProject("*", "project", "customer", "prospect", "customer.id_customer=project.id_customer", "prospect.id_prospect=project.id_prospect", "prospect.cf='100'");
    $data['title'] = 'Project';
    $kode_am = $this->session->userdata('kode_am');
    $where = array('kode_am' => $kode_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['files'] = $this->modelProspect_am->getDataFile();

    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/project', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function profile()
  {
    $data['title'] = 'Profile';
    $kode_am = $this->session->userdata('kode_am');
    $where = array('kode_am' => $kode_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/profile', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function dataCustomer()
  {
    $data['title'] = 'Customer Data';
    $kode_am = $this->session->userdata('kode_am');
    $where = array('kode_am' => $kode_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['customer'] = $this->modelProspect_am->getDataCustomer();
    $data['pic'] = $this->modelProspect_am->getDataPic();
    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/dataCustomer', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function customer()
  {
    $data['title'] = 'Customer Engagement';
    $kode_am = $this->session->userdata('kode_am');
    $where = array('kode_am' => $kode_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['customers'] = $this->modelProspect_am->getCustomer();

    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/customer', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function log()
  {
    $data['title'] = 'Log';
    $kode_am = $this->session->userdata('kode_am');
    $where = array('kode_am' => $kode_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['prospects'] = $this->modelProspect_am->getJoinProspect("*", "prospect", "customer", "customer.id_customer=prospect.id_customer", "prospect.cf=prospect.cf");
    $data['title'] = 'Log';

    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/log', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function about()
  {
    $id_am = $this->session->userdata('id_am');
    $where = array('id_am' => $id_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['title'] = 'About';
    $data['customer'] = $this->modelProspect_am->getDataCustomer();
    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/about', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function privacy()
  {
    $id_am = $this->session->userdata('id_am');
    $where = array('id_am' => $id_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['title'] = 'Privacy Policy';
    $data['customer'] = $this->modelProspect_am->getDataCustomer();
    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/privacy', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }
  public function version()
  {
    $id_am = $this->session->userdata('id_am');
    $where = array('id_am' => $id_am);
    $data['profile'] = $this->modelProspect_am->getData("*", "am", $where);
    $data['title'] = 'Version';
    $data['customer'] = $this->modelProspect_am->getDataCustomer();
    $this->load->view('am/prospect_template/header', $data);
    $this->load->view('am/prospect_template/topbar', $data);
    $this->load->view('am/prospect_template/sidebar', $data);
    $this->load->view('am/prospect/version', $data);
    $this->load->view('am/prospect_template/footer', $data);
  }

  public function get_autocomplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->modelProspect_am->search_blog($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $arr_result[] = array(
            'label'         => $row->nama_customer,
            'id'            => $row->id_customer
          );
        echo json_encode($arr_result);
      }
    }
  }

  public function addCust()
  {

    $cust = array(
      'nama_customer' => $this->input->post('nameCust'),
      'segment' => $this->input->post('segmentCust'),
      'email' => $this->input->post('emailCust'),
      'contact' => $this->input->post('contactCust'),
      'id_am' => $this->session->userdata('id_am')
    );
    $id_customer = $this->modelProspect_am->addCust('customer', $cust);

    if (!empty($this->input->post('namaPIC'))) {

      $name = $this->input->post('namaPIC', true);
      $email = $this->input->post('emailPIC', true);
      $telp = $this->input->post('telpPIC', true);
      foreach ($name as $i => $nama) { // need index to match other properties
        $data = array(
          'nama_pic' => $nama,
          'id_customer' => $id_customer,
          'telp' => isset($telp[$i]) ? $telp[$i] : '',
          'email' => isset($email[$i]) ? $email[$i] : ''
        );
        $this->modelProspect_am->addCust('pic', $data);
      }
    }

    redirect('/Prospect_am/dataCustomer');
  }

  public function getCust()
  {
    $data = $this->modelProspect_am->getCustomer();
    echo json_encode($data);
  }
  public function getFile()
  {
    $data = $this->modelProspect_am->getDataFile();
    echo json_encode($data);
  }

  public function addProspect()
  {
    if ($this->input->post('cf') == '100') {
      $pros = array(
        'nama_project' => $this->input->post('nama_project'),
        'cf' => $this->input->post('cf'),
        'id_customer' => $this->input->post('id_customer'),
        'est_value' => $this->input->post('est_value'),
        'lead' => $this->input->post('lead'),
        'id_am' => $this->session->userdata('id_am')
      );
      $idProspect = $this->modelProspect_am->addProspectReturnId($pros);

      $dataProject = array(
        'id_prospect' => $idProspect,
        'id_am' => $this->session->userdata('id_am'),
        'id_customer' => $this->input->post('id_customer'),
        'revenue' => $this->input->post('est_value'),
        'est_gross' => '0',
        'start' => '0000-00-00',
        'end' => '0000-00-00'
      );
      $this->modelProspect_am->addProject($dataProject);
    } else {
      $pros = array(
        'nama_project' => $this->input->post('nama_project'),
        'cf' => $this->input->post('cf'),
        'id_customer' => $this->input->post('id_customer'),
        'est_value' => $this->input->post('est_value'),
        'lead' => $this->input->post('lead'),
        'id_am' => $this->session->userdata('id_am')
      );
      $this->modelProspect_am->addProspect($pros);
    }
    redirect('/Prospect_am/index');
  }

  public function UpdateProspect()
  {
    if ($this->input->post('EditCf') == '100') {
      $pros = [
        'id_prospect' => $this->input->post('EditIdProspect'),
        'nama_project' => $this->input->post('EditNameProspect'),
        'id_customer' => $this->input->post('EditIdCust'),
        'cf' => $this->input->post('EditCf'),
        'est_value' => $this->input->post('EditEstValue'),
        'lead' => $this->input->post('EditLead'),
      ];
      $data['$pros'] =  $this->modelProspect_am->UpdateProspect($pros);
      $dataProject = [
        'id_prospect' => $this->input->post('EditIdProspect'),
        'id_am'            => $this->session->userdata('id_am'),
        'id_customer'       => $this->input->post('EditIdCust'),
        'revenue' => $this->input->post('EditEstValue'),
        'est_gross' => '0',
        'start' => '0000-00-00',
        'end' => '0000-00-00'
      ];

      $this->modelProspect_am->addProject($dataProject);
    } else {
      $pros = [
        'id_prospect' => $this->input->post('EditIdProspect'),
        'nama_project' => $this->input->post('EditNameProspect'),
        'id_customer' => $this->input->post('EditIdCust'),
        'cf' => $this->input->post('EditCf'),
        'est_value' => $this->input->post('EditEstValue'),
        'lead' => $this->input->post('EditLead'),
      ];
      $data['$pros'] =  $this->modelProspect_am->UpdateProspect($pros);
    }
    redirect('/Prospect_am/index');
  }

  public function UpdateProject()
  {
    $revenue = $this->input->post('EditRevenue');
    $estgross =   $this->input->post('EditEstGross');
    $start = $this->input->post('EditStart');
    $end =   $this->input->post('EditEnd');

    if ($this->input->post('EditRevenue') == null) {
      $revenue = 0;
    }
    if ($this->input->post('EditEstGross') == null) {
      $estgross = 0;
    }
    if ($this->input->post('EditStart') == null) {
      $start = '0000-00-00';
    }
    if ($this->input->post('EditEnd') == null) {
      $end = '0000-00-00';
    }

    if ($check_doc = $this->input->post('listFile[]')) {
      $idProject = $this->input->post('EditIdProject');
      $this->modelProspect_am->deleteFile($check_doc, $idProject);
    } else if ($this->input->post('listFile[]') == null) {
      $idProject = $this->input->post('EditIdProject');
      $this->modelProspect_am->deleteAllFile($idProject);
    }

    $pros = [
      'id_prospect' => $this->input->post('EditIdProspect'),
      'nama_project' => $this->input->post('EditNameProspect')
    ];
    $pro = [
      'id_project' => $this->input->post('EditIdProject'),
      'id_customer' => $this->input->post('EditIdCust'),
      'revenue' => $revenue,
      'est_gross' => $estgross,
      'start' => $start,
      'end' => $end,
    ];
    $data['$pro'] =  $this->modelProspect_am->UpdateProject($pro);
    $data['$pros'] = $this->modelProspect_am->UpdateProspect($pros);
    $get_file = $_FILES['nama_doc']['name'];


    if ($get_file[0]) {
      $jumlah_file = count($get_file);
      for ($i = 0; $i < $jumlah_file; $i++) {
        $config['upload_path']          = './assets/file';
        $config['allowed_types']        = 'jpg|png|pdf|xlsx|docx';

        $config['file_name']            = $get_file[$i];
        $this->load->library('upload', $config);
        $file = [
          'id_project' => $this->input->post('EditIdProject'),
          'nama_doc' => $get_file[$i]
        ];
        $_FILES['file']['name']     = $_FILES['nama_doc']['name'][$i];
        $_FILES['file']['type']     = $_FILES['nama_doc']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['nama_doc']['tmp_name'][$i];
        $_FILES['file']['error']    = $_FILES['nama_doc']['error'][$i];
        $_FILES['file']['size']     = $_FILES['nama_doc']['size'][$i];

        if (!$this->upload->do_upload('file')) {
          redirect('/Prospect_am/project');
        } else {
          $data = array('upload_data' => $this->upload->data());
        }
        $this->modelProspect_am->InsertFile($file);
        redirect('/Prospect_am/project');
      }
    }
    redirect('/Prospect_am/project');
  }


  public function getCustomer()
  {
    $this->db->select('activity.id_activity');
    $this->db->select('customer.nama_customer');
    $this->db->select('count(activity.id_customer) AS n');
    $this->db->from('activity');
    $this->db->join('customer', 'activity.id_customer = customer.id_customer');
    $this->db->group_by('activity.id_customer');
    $this->db->order_by('customer.nama_customer');
    $query = $this->db->get()->result();
    return $query;
  }

  public function editCustomer()
  {
    $cust = array(
      'id_customer' => $this->input->post('EditIdCust'),
      'nama_customer' => $this->input->post('EditNameCust'),
      'segment' => $this->input->post('SegmentCust'),
      'email' => $this->input->post('Email'),
      'contact' => $this->input->post('Contact'),
      'id_am' => $this->session->userdata('id_am')
    );
    $this->modelProspect_am->updateCust($cust);
    $id_customer = $this->input->post('EditIdCust', true);
    $deletePIC = $this->modelProspect_am->delete("pic", array('id_customer' => $id_customer));
    $name = $this->input->post('namaPIC', true);
    $email = $this->input->post('emailPIC', true);
    $telp = $this->input->post('telpPIC', true);
    foreach ($name as $i => $nama) { // need index to match other properties
      $data = array(
        'nama_pic' => $nama,
        'id_customer' => $id_customer,
        'telp' => isset($telp[$i]) ? $telp[$i] : '',
        'email' => isset($email[$i]) ? $email[$i] : ''
      );
      $this->modelProspect_am->addCust('pic', $data);
    }

    redirect('/Prospect_am/dataCustomer');
  }

  public function update($id_prospect)
  {
    $update = ['id_prospect' => $id_prospect, 'cf' => '100'];

    $result = $this->modelProspect_am->update($update);

    $dataProject = [
      'id_prospect' => $result->id_prospect,
      'id_am'            => $result->id_am,
      'id_customer'       => $result->id_customer,
      'revenue' => '',
      'est_gross' => '',
      'start' => '',
      'end' => ''
    ];

    $this->modelProspect_am->addProject($dataProject);
    redirect(base_url('prospect_am/index'));
  }
  public function fail($id_prospect)
  {
    $update = ['id_prospect' => $id_prospect, 'cf' => '0'];

    $result = $this->modelProspect_am->update($update);
    redirect(base_url('prospect_am/index'));
  }
  public function UpdateProfile()
  {
    $data = $this->input->post();
    $cekFoto = $_FILES['foto_am']['name'];
    if ($cekFoto != null) {
      $profile = array(
        'kode_am' => $data['kode_am'],
        'nama_am' => $data['name_am'],
        'password' => $data['password'],
        'foto_am' => $_FILES['foto_am']['name']
      );
      $config['upload_path']  = './assets/image';
      $config['allowed_types'] = 'jpg|png|gif|jpeg';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_am')) {
        echo "Upload Gagal";
        die();
      } else {
        $foto_am = $this->upload->data('foto_am');
      }
    } else {
      $profile = array(
        'kode_am' => $data['kode_am'],
        'nama_am' => $data['name_am'],
        'password' => $data['password'],
      );
    }


    $this->modelProspect_am->updateProfile($profile);
    redirect('/Prospect_am/profile');
  }
  public function deleteCust()
  {
    if ($_GET['id']) {
      $idCust = $_GET['id'];
      $deletePIC = $this->modelProspect_am->delete("pic", array('id_customer' => $idCust));
      $deleteCust = $this->modelProspect_am->delete("customer", array('id_customer' => $idCust));
      redirect('Prospect_am/dataCustomer');
    }
  }
}
