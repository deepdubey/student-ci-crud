<?php 
  class Stud_model extends CI_Model{
    function insert_stud($data){
      $this->db->insert('stud', $data);
    }

    function edit_stud($data, $old_roll_no){
      $this->db->where('roll_no', $old_roll_no);
      $this->db->update('stud', $data);
    }

    function delete_stud($roll_no){
      $this->db->delete('stud', array('roll_no' => $roll_no));
    }

  } 
?>