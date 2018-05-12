<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 12.05.2018
 * Time: 1:32
 */

class Zakaznici extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Zakaznici_model');
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
        $data['zakaznici'] = $this->Zakaznici_model->getRows();
        $data['title'] = 'Zakaznici List';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('zakaznici/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o teplote
    public function view($id){
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['zakaznici'] = $this->Zakaznici_model->getRows($id);
            $data['title'] = $data['zakaznici']['Meno'];
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('zakaznici/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/zakaznici');
        }
    }

    // pridanie zaznamu
    public function add()
    {
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Meno', 'Meno zakaznika',  'required');
            $this->form_validation->set_rules('Priezvisko', 'Priezvisko zakaznika', 'required');
            $this->form_validation->set_rules('Telefon', 'Cislo telefonu zakaznika', 'required');
            $this->form_validation->set_rules('Email', 'Email zakaznika', 'required|valid_email');
            $postData = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
            );
            if ($this->form_validation->run() == true) {
                $insert = $this->Zakaznici_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Zakaznik bol pridaný.');
                    redirect('zakaznici/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Pridaj zakaznika';
        $data['action'] = 'Pridaj';
        $this->load->view('templates/header', $data);
        $this->load->view('zakaznici/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data = array();
        $postData = $this->Zakaznici_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Meno', 'Meno zakaznika',  'required');
            $this->form_validation->set_rules('Priezvisko', 'Priezvisko zakaznika', 'required');
            $this->form_validation->set_rules('Telefon', 'Cislo telefonu zakaznika', 'required');
            $this->form_validation->set_rules('Email', 'Email zakaznika', 'required|valid_email');
            $postData = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Telefon' => $this->input->post('Telefon'),
                'Email' => $this->input->post('Email'),
            );
            if ($this->form_validation->run() == true) {
                $update = $this->Zakaznici_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Zakaznik upravený.');
                    redirect('zakaznici/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Uprav zakaznika';
        $data['action'] = 'Úprava';
        $this->load->view('templates/header', $data);
        $this->load->view('zakaznici/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = $this->Zakaznici_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Zakaznik bol odstránený.');
            } else {
                $this->session->set_userdata('error_msg', 'Chyba, skúste znovu.');
            }
        }
        redirect('zakaznici/');
    }
}