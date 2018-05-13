<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 13.05.2018
 * Time: 0:28
 */

class Objednavky_model extends CI_Model
{

    public function __construct() { }



    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('objednavky.idObjednavky, objednavky.Datum_objednavky, objednavky.Suma, rezervacia.Typ_akcii as Nazov akcii, rezervacia.idRezervacia as idRezervacia')
                ->join('rezervacia','objednavky.Rezervacia_idRezervacia = rezervacia.idRezervacia');
            $query = $this->db->get_where('objednavky', array('objednavky.idObjednavky' => $id));
            return $query->row_array();
        } else {
            $this->db->select('objednavky.idObjednavky, objednavky.Datum_objednavky, objednavky.Suma, rezervacia.Typ_akcii as Nazov akcii, rezervacia.idRezervacia as idRezervacia')
                ->join('rezervacia','objednavky.Rezervacia_idRezervacia = rezervacia.idRezervacia');
            $query = $this->db->get('objednavky');
            return $query->result_array();
        }
    }



    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('objednavky', $data);
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
            $update = $this->db->update('objednavky', $data, array('idObjednavky' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id)
    {
        $delete = $this->db->delete('objednavky', array('idObjednavky' => $id));
        return $delete ? true : false;
    }
}