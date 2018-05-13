<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 13.05.2018
 * Time: 1:24
 */

class Druhobjednavky_model extends CI_Model
{

    public function __construct() { }



    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('druh_objednavky.idDruh_objednavky, druh_objednavky.Mnozstvo, potraviny.Nazov as Nazov potraviny, potraviny.idPotraviny as idPotraviny, objednavky.Suma as Suma objednavky, objednavky.idObjednavky as idObjednavky')
                ->join('potraviny','druh_objednavky.Potraviny_idPotraviny = potraviny.idPotraviny')
                ->join('objednavky','druh_objednavky.Objednavky_idObjednavky = objednavky.idObjednavky');
            $query = $this->db->get_where('druh_objednavky', array('idDruh_objednavky' => $id));
            return $query->row_array();
        } else {
            $this->db->select('druh_objednavky.idDruh_objednavky, druh_objednavky.Mnozstvo, potraviny.Nazov as Nazov potraviny, potraviny.idPotraviny as idPotraviny, objednavky.Suma as Suma objednavky, objednavky.idObjednavky as idObjednavky')
                ->join('potraviny','druh_objednavky.Potraviny_idPotraviny = potraviny.idPotraviny')
                ->join('objednavky','druh_objednavky.Objednavky_idObjednavky = objednavky.idObjednavky');
            $query = $this->db->get('druh_objednavky');
            return $query->result_array();
        }
    }



    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('druh_objednavky', $data);
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
            $update = $this->db->update('druh_objednavky', $data, array('idDruh_objednavky' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id)
    {
        $delete = $this->db->delete('druh_objednavky', array('idDruh_objednavky' => $id));
        return $delete ? true : false;
    }
}