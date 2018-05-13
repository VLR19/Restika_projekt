<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 13.05.2018
 * Time: 2:02
 */

class Potraviny extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Potraviny_model');
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
        $data['potraviny'] = $this->Potraviny_model->getRows();
        $data['title'] = 'Potraviny List';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('potraviny/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o teplote
    public function view($id){
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['potraviny'] = $this->Potraviny_model->getRows($id);
            $data['title'] = $data['potraviny']['Nazov'];
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('potraviny/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/potraviny');
        }
    }

    // pridanie zaznamu
    public function add()
    {
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Nazov', 'Nazov',  'required');
            $this->form_validation->set_rules('Druh', 'Druh', 'required');
            $this->form_validation->set_rules('Cena', 'Cena', 'required');
            $postData = array(
                'Nazov' => $this->input->post('Nazov'),
                'Druh' => $this->input->post('Druh'),
                'Cena' => $this->input->post('Cena'),
            );
            if ($this->form_validation->run() == true) {
                $insert = $this->Potraviny_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Potravina bola pridana.');
                    redirect('potraviny/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Pridaj potravinu';
        $data['action'] = 'Pridaj';
        $this->load->view('templates/header', $data);
        $this->load->view('potraviny/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data = array();
        $postData = $this->Potraviny_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Nazov', 'Nazov',  'required');
            $this->form_validation->set_rules('Druh', 'Druh', 'required');
            $this->form_validation->set_rules('Cena', 'Cena', 'required');
            $postData = array(
                'Nazov' => $this->input->post('Nazov'),
                'Druh' => $this->input->post('Druh'),
                'Cena' => $this->input->post('Cena'),
            );
            if ($this->form_validation->run() == true) {
                $update = $this->Potraviny_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Potravina upravený.');
                    redirect('potraviny/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Uprav potravinu';
        $data['action'] = 'Úprava';
        $this->load->view('templates/header', $data);
        $this->load->view('potraviny/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = $this->Potraviny_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Potravina bola odstránena.');
            } else {
                $this->session->set_userdata('error_msg', 'Chyba, skúste znovu.');
            }
        }
        redirect('potraviny/');
    }
}