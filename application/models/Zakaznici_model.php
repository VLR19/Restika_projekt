<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 07.05.2018
 * Time: 8:16
 */

class Zakaznici_model extends CI_Model
{

    public function __construct() { }



    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('idZakaznici, Meno, Priezvisko, Telefon, Email');
            $query = $this->db->get_where('zakaznici', array('idZakaznici' => $id));
            return $query->row_array();
        } else {
            $this->db->select('idZakaznici, Meno, Priezvisko, Telefon, Email');
            $query = $this->db->get('zakaznici');
            return $query->result_array();
        }
    }



    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('zakaznici', $data);
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
            $update = $this->db->update('zakaznici', $data, array('idZakaznici' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id)
    {
        $delete = $this->db->delete('zakaznici', array('idZakaznici' => $id));
        return $delete ? true : false;
    }
}
