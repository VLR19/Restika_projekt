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
        $this->load->view('temperatures/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o teplote
    public function view($id){
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['zakaznici'] = $this->Zakaznici_model->getRows($id);
            $data['title'] = $data['zakaznici']['measurement_date'];
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('temperatures/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/zakaznici');
        }
    }

    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();
        //zistenie, ci bola zaslana poziadavka na pridanie zaznamu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('measurement_date', 'date of
measurement', 'required');
            $this->form_validation->set_rules('zakaznici', 'zakaznici',
                'required');
            $this->form_validation->set_rules('sky', 'sky value', 'required');
            $this->form_validation->set_rules('user', 'user id', 'required');
            //priprava dat pre vlozenie
            $postData = array(
                'measurement_date' => $this->input->post('measurement_date'),
                'temperature' => $this->input->post('zakaznici'),
                'sky' => $this->input->post('sky'),
                'user' => $this->input->post('user'),
                'description' => $this->input->post('description'),
            );
            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Zakaznici_model->insert($postData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Temperature
has been added successfully.');
                    redirect('/zakaznici');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create Temperature';

 $data['action'] = 'Add';
 //zobrazenie formulara pre vlozenie a editaciu dat
 $this->load->view('templates/header', $data);
 $this->load->view('temperatures/add-edit', $data);
 $this->load->view('templates/footer');
}



// aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Zakaznici_model->getRows($id);
        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('measurement_date', 'date of
measurement', 'required');
            $this->form_validation->set_rules('temperature', 'temperature
value', 'required');
            $this->form_validation->set_rules('sky', 'sky value', 'required');
            $this->form_validation->set_rules('user', 'user id', 'required');
            // priprava dat pre aktualizaciu
            $postData = array(
                'measurement_date' => $this->input->post('measurement_date'),
                'temperature' => $this->input->post('temperature'),
                'sky' => $this->input->post('sky'),
                'user' => $this->input->post('user'),
                'description' => $this->input->post('description'),
            );
            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Zakaznici_model->update($postData, $id);
                if($update){
                    $this->session->set_userdata('success_msg', 'Temperature
has been updated successfully.');

 redirect('/zakaznici');
 }else{
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Edit';
        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('temperatures/add-edit', $data);
        $this->load->view('templates/footer');
    }



    // odstranenie dat
    public function delete($id){
        //overenie, ci id nie je prazdne
        if($id){
            //odstranenie zaznamu
            $delete = $this->Zakaznici_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Temperature has
been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems
occurred, please try again.');
            }
        }
        redirect('/zakaznici');
    }






}