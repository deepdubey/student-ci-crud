<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('stud_model');
    }

    public function index(){
      $studData=$this->db->get('stud');
      $result = $studData->result();
      // var_dump($result[0]->roll_no);
      $data['data'] = json_encode($result);
      $this->load->view('students', $data);
    }

    public function createSubmit()
    {
        $this->form_validation->set_rules('roll_no', 'Roll_no', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == false) {
          $response = array(
            'status' => 'error',
            'message' => validation_errors()
          );
        }
        else {
          $query = $this->db->get_where('stud', array('roll_no' => $this->input->post('roll_no', true))); //To check if student already exist

          if($query->result()){
            $response = array(
              'status' => 'error',
              'message' => 'This student already exist'
            );
          }else{
            $studData = array(
              'roll_no' => $this->input->post('roll_no', true),
              'name' => $this->input->post('name', true),
            );

            $this->stud_model->insert_stud($studData);

            $response = array(
              'status' => 'success',
            );
          }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function edit(){
      $roll_no = $this->uri->segment('3');
      $query = $this->db->get_where('stud', array('roll_no' => $roll_no));
      
      if($studentData = $query->result()){
        $data  = array(
          'status' => 'success',
          'record' => $studentData,
          'old_roll_no' => $roll_no
        );
      }


      $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function editSubmit()
    {
        $this->form_validation->set_rules('roll_no', 'Roll_no', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == false) {
          $response = array(
            'status' => 'error',
            'message' => validation_errors()
          );
        }
        else {
          $old_roll_no = $this->input->post('old_roll_no', true);
          $studData = array(
            'roll_no' => $this->input->post('roll_no', true),
            'name' => $this->input->post('name', true),
          );

          $this->stud_model->edit_stud($studData, $old_roll_no);
          
          $response = array(
              'status' => 'success',
              'message' => 'Updated Successfully'
          );
        }

        $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function delete(){
      $roll_no = $this->uri->segment('3');
      $this->stud_model->delete_stud($roll_no);
      redirect('/pages');
    }
}
?>