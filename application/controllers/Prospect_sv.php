<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prospect_sv extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kode_am')) {
            redirect('login?pesan=Silakan Login dahulu');
        }
        $this->load->library('form_validation');

        $this->load->model("modelProspect_sv");
        error_reporting(0);
    }

    public function index()
    {

        $kode_am = $this->session->userdata('kode_am');
        $where = array('kode_am' => $kode_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['prospects'] = $this->modelProspect_sv->getJoinProspect("*", "prospect", "customer", "am", "customer.id_customer=prospect.id_customer", "am.id_am=prospect.id_am", "prospect.cf!='100'");
        $data['title'] = 'Prospect';
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/prospect', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function project()
    {
        $data['projects'] = $this->modelProspect_sv->getJoinProject("*", "project", "customer", "prospect", "am", "customer.id_customer=project.id_customer", "prospect.id_prospect=project.id_prospect", "am.id_am=project.id_am", "prospect.cf='100'");
        $data['title'] = 'Project';
        $kode_am = $this->session->userdata('kode_am');
        $where = array('kode_am' => $kode_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/project', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function profile()
    {
        $kode_am = $this->session->userdata('kode_am');
        $where = array('kode_am' => $kode_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'Profile';
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/profile', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function customer()
    {
        $kode_am = $this->session->userdata('kode_am');
        $where = array('kode_am' => $kode_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'Customer Engagement';
        $data['customers'] = $this->modelProspect_sv->getCustomer();
        $data['am'] = $this->modelProspect_sv->getDataAm();

        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/customer', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function dataCustomer()
    {
        $kode_am = $this->session->userdata('kode_am');
        $where = array('kode_am' => $kode_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'Customer Data';
        $data['customer'] = $this->modelProspect_sv->getDataCustomer();
        $data['pic'] = $this->modelProspect_sv->getDataPic();
        $data['am'] = $this->modelProspect_sv->getDataAm();

        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/dataCustomer', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function about()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'About';
        $data['customer'] = $this->modelProspect_sv->getDataCustomer();
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/about', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function privacy()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'Privacy Policy';
        $data['customer'] = $this->modelProspect_sv->getDataCustomer();
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/privacy', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function version()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'Version';
        $data['customer'] = $this->modelProspect_sv->getDataCustomer();
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/version', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function log()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        $data['title'] = 'Log';
        $data['prospects'] = $this->modelProspect_sv->getJoinProspects("*", "prospect", "customer", "customer.id_customer=prospect.id_customer", "prospect.cf=prospect.cf");

        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/log', $data);
        $this->load->view('sv/prospect_template/footer', $data);
    }
    public function am()
    {
        $data['title'] = 'AM';
        $kode_am = $this->session->userdata('kode_am');
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelProspect_sv->getData("*", "am", $where);
        if ($_GET['id']) {
            $id_delete = $_GET['id'];
            $this->modelProspect_sv->delete("am", array('id_am' => $id_delete));
        }
        $data['am'] = $this->modelProspect_sv->getDataAm();
        $this->load->view('sv/prospect_template/header', $data);
        $this->load->view('sv/prospect_template/topbar', $data);
        $this->load->view('sv/prospect_template/sidebar', $data);
        $this->load->view('sv/prospect/am', $data);
        $this->load->view('sv/prospect_template/footer', $data);
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


    public function getCust($id)
    {
        $data = $this->modelProspect_sv->getCustomerbyAM($id);
        echo json_encode($data);
    }

    public function editCustomer()
    {
        $cust = array(
            'id_am' => $this->input->post('amCust'),
            'id_customer' => $this->input->post('EditIdCust'),
            'nama_customer' => $this->input->post('EditNameCust'),
            'segment' => $this->input->post('SegmentCust'),
            'email' => $this->input->post('Email'),
            'contact' => $this->input->post('Contact')
        );
        $this->modelProspect_sv->updateCust($cust);
        $id_customer = $this->input->post('EditIdCust', true);
        $deletePIC = $this->modelProspect_sv->delete("pic", array('id_customer' => $id_customer));
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
            $this->modelProspect_sv->addCust('pic', $data);
        }
        redirect('/Prospect_sv/dataCustomer');
    }
    public function updateAM()
    {
        $update = array(
            'id_am' => $this->input->post('EditId'),
            'kode_am' => $this->input->post('EditKode'),
            'nama_am' => $this->input->post('EditNama'),
            'password' => $this->input->post('EditPassword'),
        );
        $this->modelProspect_sv->updateAM($update);
        redirect(base_url('Prospect_sv/am'));
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

        $this->modelProspect_sv->UpdateProfil($profile);
        redirect('/Prospect_sv/profile');
    }
    public function AddAm()
    {
        $am = array(
            'kode_am' => $this->input->post('code_am'),
            'nama_am' => $this->input->post('am_name'),
            'password' => $this->input->post('password'),
            'foto_am' => 'photo.jpg',
            'previlege' => 'AM'
        );
        $this->modelProspect_sv->addAm("am", $am);
        redirect('/Prospect_sv/am');
    }
    public function getFile()
    {
        $data = $this->modelProspect_sv->getDataFile();
        echo json_encode($data);
    }
}
