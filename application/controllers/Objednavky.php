<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 13.05.2018
 * Time: 0:28
 */

class Objednavky extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Objednavky_model');
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
        $data['objednavky'] = $this->Objednavky_model->getRows();
        $data['title'] = 'Objednavky List';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('objednavky/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o teplote
    public function view($id){
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['objednavky'] = $this->Objednavky_model->getRows($id);
            $data['title'] = $data['Objednavky']['idObjednavky'];
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('objednavky/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/objednavky');
        }
    }

    // pridanie zaznamu
    public function add()
    {
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Datum_objednavky', 'Datum objednavky',  'required');
            $this->form_validation->set_rules('Suma', 'Suma objednavky', 'required');
            $this->form_validation->set_rules('idRezervacia', 'Rezervacia', 'required');
            $postData = array(
                'Datum_objednavky' => $this->input->post('Datum_objednavky'),
                'Suma' => $this->input->post('Suma'),
                'idRezervacia' => $this->input->post('idRezervacia'),
            );
            if ($this->form_validation->run() == true) {
                $insert = $this->Objednavky_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Objednavka bola pridana.');
                    redirect('objednavky/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Pridaj objednavku';
        $data['action'] = 'Pridaj';
        $this->load->view('templates/header', $data);
        $this->load->view('objednavky/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data = array();
        $postData = $this->Objednavky_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Datum_objednavky', 'Datum objednavky',  'required');
            $this->form_validation->set_rules('Suma', 'Suma objednavky', 'required');
            $this->form_validation->set_rules('idRezervacia', 'Rezervacia', 'required');
            $postData = array(
                'Datum_objednavky' => $this->input->post('Datum_objednavky'),
                'Suma' => $this->input->post('Suma'),
                'idRezervacia' => $this->input->post('idRezervacia'),
            );
            if ($this->form_validation->run() == true) {
                $update = $this->Objednavky_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Objednavka upravena.');
                    redirect('objednavky/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Uprav objednavku';
        $data['action'] = 'Úprava';
        $this->load->view('templates/header', $data);
        $this->load->view('objednavky/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = $this->Objednavky_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Objednavka bola odstránena.');
            } else {
                $this->session->set_userdata('error_msg', 'Chyba, skúste znovu.');
            }
        }
        redirect('objednavky/');
    }
}