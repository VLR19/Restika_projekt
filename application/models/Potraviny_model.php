<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 13.05.2018
 * Time: 2:02
 */

class Potraviny_model extends CI_Model
{

    public function __construct() { }



    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('idPotraviny, Nazov, Druh, Cena');
            $query = $this->db->get_where('potraviny', array('idPotraviny' => $id));
            return $query->row_array();
        } else {
            $this->db->select('idPotraviny, Nazov, Druh, Cena');
            $query = $this->db->get('potraviny');
            return $query->result_array();
        }
    }



    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('potraviny', $data);
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
            $update = $this->db->update('potraviny', $data, array('idPotraviny' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id)
    {
        $delete = $this->db->delete('potraviny', array('idPotraviny' => $id));
        return $delete ? true : false;
    }
}