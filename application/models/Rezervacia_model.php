<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 12.05.2018
 * Time: 22:48
 */

class Rezervacia_model extends CI_Model
{

    public function __construct() { }



    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('idRezervacia, Datum, Pocet_hosti, Typ_akcii, Pocet_stolov');
            $query = $this->db->get_where('rezervacia', array('idRezervacia' => $id));
            return $query->row_array();
        } else {
            $this->db->select('idRezervacia, Datum, Pocet_hosti, Typ_akcii, Pocet_stolov');
            $query = $this->db->get('rezervacia');
            return $query->result_array();
        }
    }



    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('rezervacia', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('rezervacia', $data, array('idRezervacia' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id)
    {
        $delete = $this->db->delete('rezervacia', array('idRezervacia' => $id));
        return $delete ? true : false;
    }
}