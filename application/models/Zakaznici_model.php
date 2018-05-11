<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 07.05.2018
 * Time: 8:16
 */

class Restika_model
{
    function getRows($id= "") {
        if(!empty($id)){
            $query = $this->db->get_where('zakaznici', array('id' => $id));
            return $query->row_array();
        }else{
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
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('zakaznici', $data,
                array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('zakaznici',array('id'=>$id));
        return $delete?true:false;
    }

}