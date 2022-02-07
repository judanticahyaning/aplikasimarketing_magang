<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity_sv extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kode_am')) {
            redirect('login?pesan=Silakan Login dahulu');
        }
        $this->load->model("modelActivity_sv");
        $this->load->library('form_validation');
        error_reporting(0);
    }

    // bagian sidebar plan
    public function index()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['activities'] = $this->modelActivity_sv->getJoinActivity(
            "*",
            "activity",
            "am",
            "type_act",
            "stage",
            "customer",
            "am.id_am=activity.id_am",
            "type_act.id_type=activity.id_type",
            "stage.id_stage=activity.id_stage",
            "customer.id_customer=activity.id_customer",
            "activity.done=1",
            "time"
        );

        $data['title'] = 'Activity';
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/activity',  $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function menu()
    {
        $this->load->view('sv/menu');
    }
    public function profile()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['title'] = 'Profile';

        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/profile', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function customer()
    {
        $data['title'] = 'Customer Engagement';
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['customers'] =  $this->modelActivity_sv->getCustomer();
        $data['am'] = $this->modelActivity_sv->getDataAm();
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/customer', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function dataCustomer()
    {
        $data['title'] = 'Customer Data';
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['customer'] = $this->modelActivity_sv->getDataCustomer();
        $data['pic'] = $this->modelActivity_sv->getDataPic();
        $data['am'] = $this->modelActivity_sv->getDataAm();

        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/dataCustomer', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function log()
    {

        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['plans'] = $this->modelActivity_sv->getJoinActivity(
            "*",
            "activity",
            "type_act",
            "stage",
            "customer",
            "am",
            "type_act.id_type=activity.id_type",
            "stage.id_stage=activity.id_stage",
            "customer.id_customer=activity.id_customer",
            "activity.done=activity.done",
            "am.id_am=activity.id_am",
            "am.id_am=activity.id_am"
        );

        $data['title'] = 'Log';
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/log', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function am()
    {
        $data['title'] = 'AM';
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        if ($_GET['id']) {
            $id_delete = $_GET['id'];
            $this->modelActivity_sv->delete("am", array('id_am' => $id_delete));
        }
        $data['am'] = $this->modelActivity_sv->getDataAm();
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/am', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function plan()
    {
        $data['title'] = 'Plan';
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['plans'] = $this->modelActivity_sv->getJoinActivity(
            "*",
            "activity",
            "type_act",
            "stage",
            "customer",
            "am",
            "type_act.id_type=activity.id_type",
            "stage.id_stage=activity.id_stage",
            "customer.id_customer=activity.id_customer",
            "activity.done=0",
            "am.id_am=activity.id_am"
        );
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/plan', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function about()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['title'] = 'About';
        $data['customer'] = $this->modelActivity_sv->getDataCustomer();
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/about', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function privacy()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['title'] = 'Privacy Policy';
        $data['customer'] = $this->modelActivity_sv->getDataCustomer();
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/privacy', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function version()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_sv->getData("*", "am", $where);
        $data['title'] = 'Version';
        $data['customer'] = $this->modelActivity_sv->getDataCustomer();
        $this->load->view('sv/activity_template/header', $data);
        $this->load->view('sv/activity_template/topbar', $data);
        $this->load->view('sv/activity_template/sidebar', $data);
        $this->load->view('sv/activity/version', $data);
        $this->load->view('sv/activity_template/footer', $data);
    }
    public function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->modelActivity_sv->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'            => $row->nama_customer,
                        'id'            => $row->id_customer
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function update($id_activity)
    {
        $update = [
            'id_activity' => $id_activity, 'done' => '1',
        ];
        $this->modelActivity_sv->update($update);
        redirect(base_url('activity_sv/index'));
    }
    public function updateAM()
    {
        $update = array(
            'id_am' => $this->input->post('EditId'),
            'kode_am' => $this->input->post('EditKode'),
            'nama_am' => $this->input->post('EditNama'),
            'password' => $this->input->post('EditPassword'),
        );
        $this->modelActivity_sv->updateAM($update);
        redirect(base_url('activity_sv/am'));
    }
    public function getCust($id)
    {
        $data = $this->modelActivity_sv->getCustomerbyAM($id);
        echo json_encode($data);
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

        $this->modelActivity_sv->updateProfil($profile);
        redirect('/Activity_sv/profile');
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
        $this->modelActivity_sv->updateCust($cust);
        $id_customer = $this->input->post('EditIdCust', true);
        $deletePIC = $this->modelActivity_sv->delete("pic", array('id_customer' => $id_customer));
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
            $this->modelActivity_sv->addCust('pic', $data);
        }
        redirect('/Activity_sv/dataCustomer');
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
        $this->modelActivity_sv->addAm("am", $am);
        redirect('/Activity_sv/am');
    }
}
