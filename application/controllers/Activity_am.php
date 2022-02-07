<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity_am extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kode_am')) {
            redirect('login?pesan=Silakan Login dahulu');
        }
        $this->load->model("modelActivity_am");
        $this->load->library('form_validation');
        error_reporting(0);
    }

    public function index()
    {
        if ($_GET['id']) {
            $id_activity = $_GET['id'];
            $delete = $this->modelActivity_am->delete("activity", array('id_activity' => $id_activity));
            redirect('activity_am/index');
        }
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['plans'] = $this->modelActivity_am->getJoinPlan(
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
            "am.id_am='$id_am'",
            "am.id_am=activity.id_am"
        );
        $data['customers'] =  $this->modelActivity_am->getDataCustomer();
        $data['title'] = 'Plan';
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/plan', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function menu()
    {
        $this->load->view('am/menu');
    }
    public function activity()
    {
        $data['title'] = 'Activity';

        if ($_GET['id']) {
            $id_activity = $_GET['id'];
            $delete = $this->modelActivity_am->delete("activity", array('id_activity' => $id_activity));
            redirect('activity_am/activity');
        }
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['activities'] = $this->modelActivity_am->getJoinActivity(
            "*",
            "activity",
            "type_act",
            "stage",
            "customer",
            "am",
            "type_act.id_type=activity.id_type",
            "stage.id_stage=activity.id_stage",
            "customer.id_customer=activity.id_customer",
            "activity.done=1",
            "am.id_am='$id_am'",
            "am.id_am=activity.id_am"
        );
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/activity', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function profile()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['title'] = 'Profile';
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/profile', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function customer()
    {
        $data['title'] = 'Customer Engagement';
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['customers'] =  $this->modelActivity_am->getCustomer();
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/customer', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function dataCustomer()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['title'] = 'Customer Data';
        $data['customer'] = $this->modelActivity_am->getDataCustomer();
        $data['pic'] = $this->modelActivity_am->getDataPic();
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/dataCustomer', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function about()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['title'] = 'About';
        $data['customer'] = $this->modelActivity_am->getDataCustomer();
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/about', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function privacy()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['title'] = 'Privacy Policy';
        $data['customer'] = $this->modelActivity_am->getDataCustomer();
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/privacy', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function version()
    {
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['title'] = 'Version';
        $data['customer'] = $this->modelActivity_am->getDataCustomer();
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/version', $data);
        $this->load->view('am/activity_template/footer', $data);
    }
    public function log()
    {
        $data['title'] = 'Log';
        $id_am = $this->session->userdata('id_am');
        $where = array('id_am' => $id_am);
        $data['profile'] = $this->modelActivity_am->getData("*", "am", $where);
        $data['plans'] = $this->modelActivity_am->getJoinActivity(
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
            "am.id_am='$id_am'",
            "am.id_am=activity.id_am"
        );
        $this->load->view('am/activity_template/header', $data);
        $this->load->view('am/activity_template/topbar', $data);
        $this->load->view('am/activity_template/sidebar', $data);
        $this->load->view('am/activity/log', $data);
        $this->load->view('am/activity_template/footer', $data);
    }


    public function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->modelActivity_am->search_blog($_GET['term']);
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
            'id_activity' => $id_activity, 'done' => 1,
        ];
        $this->modelActivity_am->update($update);
        redirect(base_url('activity_am/index'));
    }

    public function getCust()
    {
        $data = $this->modelActivity_am->getCustomer();
        echo json_encode($data);
    }

    public function getCustomers()
    {
        $data = $this->modelActivity_am->getCustomer();
        return $data;
    }

    public function addActivity()
    {
        $time = explode("-", $this->input->post('time'));
        $date = $time[2] . '-' . $time[1] . '-' . $time[0];
        $activity = array(
            'name_activity' => $this->input->post('name_activity'),
            'id_type' => $this->input->post('type'),
            'id_am' => $this->session->userdata('id_am'),
            'id_customer' => $this->input->post('id_customer'),
            'id_stage' => $this->input->post('stage'),
            'note' => $this->input->post('note'),
            'time' => $date,
            'done' => $this->input->post('done')

        );
        $this->modelActivity_am->addActivity($activity);
        redirect('/Activity_am/activity');
    }
    public function addPlan()
    {
        $time = explode("-", $this->input->post('time'));
        $date = $time[2] . '-' . $time[1] . '-' . $time[0];
        $plan = array(
            'name_activity' => $this->input->post('name_activity'),
            'id_type' => $this->input->post('type'),
            'id_customer' => $this->input->post('id_customer'),
            'id_stage' => $this->input->post('stage'),
            'note' => $this->input->post('note'),
            'time' => $date,
            'id_am' => $this->session->userdata('id_am')
        );
        $this->modelActivity_am->addPlan($plan);
        redirect('/Activity_am/index');
    }

    public function UpdatePlan()
    {
        $time = explode("-", $this->input->post('EditTime'));
        $date = $time[2] . '-' . $time[1] . '-' . $time[0];
        $plan = [
            'id_activity' => $this->input->post('EditIdPlan'),
            'name_activity' => $this->input->post('EditNamePlan'),
            'id_type' => $this->input->post('EditType'),
            'id_customer' => $this->input->post('EditIdCust'),
            'id_stage' => $this->input->post('EditStage'),
            'time' => $date,
            'note' => $this->input->post('EditNote'),
        ];
        $this->modelActivity_am->UpdatePlan($plan);
        redirect('/Activity_am/index');
    }
    public function UpdateActivity()
    {
        $time = explode("-", $this->input->post('EditTime'));
        $date = $time[2] . '-' . $time[1] . '-' . $time[0];
        $Activity = [
            'id_activity' => $this->input->post('EditIdAct'),
            'name_activity' => $this->input->post('EditNameAct'),
            'id_type' => $this->input->post('EditType'),
            'id_customer' => $this->input->post('EditIdCust'),
            'id_stage' => $this->input->post('EditStage'),
            'time' => $date,
            'note' => $this->input->post('EditNote'),
        ];
        $this->modelActivity_am->UpdatePlan($Activity);
        redirect('/Activity_am/Activity');
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
        $id_customer = $this->modelActivity_am->addCust('customer', $cust);

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
                $this->modelActivity_am->addCust('pic', $data);
            }
        }

        redirect('/Activity_am/dataCustomer');
    }
    public function editCustomer()
    {
        $cust = array(
            'id_customer' => $this->input->post('EditIdCust'),
            'nama_customer' => $this->input->post('EditNameCust'),
            'segment' => $this->input->post('SegmentCust'),
            'email' => $this->input->post('Email'),
            'contact' => $this->input->post('Contact'),
        );
        $this->modelActivity_am->updateCust($cust);
        $id_customer = $this->input->post('EditIdCust', true);
        $deletePIC = $this->modelActivity_am->delete("pic", array('id_customer' => $id_customer));
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
            $this->modelActivity_am->addCust('pic', $data);
        }
        redirect('/Activity_am/dataCustomer');
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
        $this->modelActivity_am->updateProfil($profile);
        redirect('/Activity_am/profile');
    }

    public function getPic($id_customer)
    {
        $a = $this->modelActivity_am->getPic($id_customer);
        return $a;
    }

    public function deleteCust()
    {
        if ($_GET['id']) {
            $idCust = $_GET['id'];
            $deletePIC = $this->modelActivity_am->delete("pic", array('id_customer' => $idCust));
            $deleteCust = $this->modelActivity_am->delete("customer", array('id_customer' => $idCust));
            redirect('activity_am/dataCustomer');
        }
    }
}
