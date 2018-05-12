<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 13.05.2018
 * Time: 1:25
 */

class Druhobjednavky extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Druhobjednavky_model');
    }

    public function index(){
        $data = array();
        //ziskanie sprav zo session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['druh_objednavky'] = $this->Druhobjednavky_model->getRows();
        $data['title'] = 'Druhobjednavky List';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('druh_objednavky/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o teplote
    public function view($id){
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['druh_objednavky'] = $this->Druhobjednavky_model->getRows($id);
            $data['title'] = $data['Druh_objednavky']['idDruh_objednavky'];
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('druh_objednavky/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/druh_objednavky');
        }
    }

    // pridanie zaznamu
    public function add()
    {
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Mnozstvo', 'Mnozstvo objednanych potravin',  'required');
            $this->form_validation->set_rules('idPotraviny', 'Potraviny', 'required');
            $this->form_validation->set_rules('idObjednavky', 'Objednavky', 'required');
            $postData = array(
                'Mnozstvo' => $this->input->post('Mnozstvo'),
                'idPotraviny' => $this->input->post('idPotraviny'),
                'idObjednavky' => $this->input->post('idObjednavky'),
            );
            if ($this->form_validation->run() == true) {
                $insert = $this->Druhobjednavky_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Druh objednavky bol pridan.');
                    redirect('druh_objednavky/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Pridaj druh objednavky';
        $data['action'] = 'Pridaj';
        $this->load->view('templates/header', $data);
        $this->load->view('druh_objednavky/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data = array();
        $postData = $this->Druhobjednavky_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Mnozstvo', 'Mnozstvo objednanych potravin',  'required');
            $this->form_validation->set_rules('idPotraviny', 'Potraviny', 'required');
            $this->form_validation->set_rules('idObjednavky', 'Objednavky', 'required');
            $postData = array(
                'Mnozstvo' => $this->input->post('Mnozstvo'),
                'idPotraviny' => $this->input->post('idPotraviny'),
                'idObjednavky' => $this->input->post('idObjednavky'),
            );
            if ($this->form_validation->run() == true) {
                $update = $this->Druhobjednavky_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Druh objednavky upraveny.');
                    redirect('druh_objednavky/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Uprav druh objednavky';
        $data['action'] = 'Úprava';
        $this->load->view('templates/header', $data);
        $this->load->view('druh_objednavky/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = $this->Druhobjednavky_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Druh objednavky bol odstráneny.');
            } else {
                $this->session->set_userdata('error_msg', 'Chyba, skúste znovu.');
            }
        }
        redirect('druh_objednavky/');
    }
}