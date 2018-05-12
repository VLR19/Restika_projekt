<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 12.05.2018
 * Time: 22:49
 */

class Rezervacia extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Rezervacia_model');
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
        $data['rezervacia'] = $this->Rezervacia_model->getRows();
        $data['title'] = 'Rezervacia List';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('rezervacia/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o teplote
    public function view($id){
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['rezervacia'] = $this->Rezervacia_model->getRows($id);
            $data['title'] = $data['Rezervacia']['idRezervacia'];
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('rezervacia/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/rezervacia');
        }
    }

    // pridanie zaznamu
    public function add()
    {
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Datum', 'Datum rezervacii',  'required');
            $this->form_validation->set_rules('Pocet_hosti', 'Pocet hosti', 'required');
            $this->form_validation->set_rules('Typ_akcii', 'Typ akcii', 'required');
            $this->form_validation->set_rules('Pocet_stolov', 'Pocet stolov na akciu', 'required');
            $this->form_validation->set_rules('idZakaznici', 'Zakaznik', 'required');
            $postData = array(
                'Datum' => $this->input->post('Datum'),
                'Pocet_hosti' => $this->input->post('Pocet_hosti'),
                'Typ_akcii' => $this->input->post('Typ_akcii'),
                'Pocet_stolov' => $this->input->post('Pocet_stolov'),
                'idZakaznici' => $this->input->post('idZakaznici'),
            );
            if ($this->form_validation->run() == true) {
                $insert = $this->Rezervacia_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Rezervacia bola pridana.');
                    redirect('rezervacia/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Pridaj rezervaciu';
        $data['action'] = 'Pridaj';
        $this->load->view('templates/header', $data);
        $this->load->view('rezervacia/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data = array();
        $postData = $this->Rezervacia_model->getRows($id);
        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Datum', 'Datum rezervacii',  'required');
            $this->form_validation->set_rules('Pocet_hosti', 'Pocet hosti', 'required');
            $this->form_validation->set_rules('Typ_akcii', 'Typ akcii', 'required');
            $this->form_validation->set_rules('Pocet_stolov', 'Pocet stolov na akciu', 'required');
            $this->form_validation->set_rules('idZakaznici', 'Zakaznik', 'required');
            $postData = array(
                'Datum' => $this->input->post('Datum'),
                'Pocet_hosti' => $this->input->post('Pocet_hosti'),
                'Typ_akcii' => $this->input->post('Typ_akcii'),
                'Pocet_stolov' => $this->input->post('Pocet_stolov'),
                'idZakaznici' => $this->input->post('idZakaznici'),
            );
            if ($this->form_validation->run() == true) {
                $update = $this->Rezervacia_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Rezervacia upravena.');
                    redirect('rezervacia/');
                } else {
                    $data['error_msg'] = 'Chyba, skúste znovu.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Uprav rezervaciu';
        $data['action'] = 'Úprava';
        $this->load->view('templates/header', $data);
        $this->load->view('rezervacia/add-edit', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = $this->Rezervacia_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Rezervacia bola odstránena.');
            } else {
                $this->session->set_userdata('error_msg', 'Chyba, skúste znovu.');
            }
        }
        redirect('rezervacia/');
    }
}