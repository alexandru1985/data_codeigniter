<?php

class Mhome extends CI_Model
{

    function view()
    {
        $data = $this->db->get('users');
        if ($data->num_rows() > 0) {

            foreach ($data->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
    }

    function submit()
    {
        $arr = array(
             
            'name' => $this->input->post('txtname'),
            'tel' => $this->input->post('txttel'),
            'city' => $this->input->post('txtcity'),
            'state' => $this->input->post('txtstate'),
        );
        $this->db->insert('users', $arr);
        if ($this->db->affected_rows() > 0) {

            redirect(base_url() . 'test');
        }
    }
    function edit($a)
    {
      
        $query = $this->db->get_where('users',  array('id' => $a))->row();
        return $query;
    
    }
      function update()
    {
        $arr = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('txtname'),
            'tel' => $this->input->post('txttel'),
            'city' => $this->input->post('txtcity'),
            'state' => $this->input->post('txtstate'),
        );
        $update=   $this->db->update('users', $arr, array('id' => $_POST['id']));
        if ($update == true) {

            redirect(base_url() . 'test');
        }
    }
    function delete($a)
    {
      
        $query = $this->db->delete('users',  array('id' => $a));
        return $query;
    
    }

}
