<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function index()
    {
        $this->load->model('mhome');
        $row['dt'] = $this->mhome->view();
        $this->load->view('data_view', $row);
    }

    public function add()
    {
        $this->load->view('add');
    }

    public function submit()
    {
        $this->load->model('mhome');
        $this->mhome->submit();
    }

    public function edit()
    {
        $this->load->model('mhome');
        $kd = $this->uri->segment(3);
        $dt = $this->mhome->edit($kd);
        $data['kd'] = $dt->id;
        $data['nm'] = $dt->name;
        $data['no'] = $dt->tel;
        $data['ct'] = $dt->city;
        $data['st'] = $dt->state;
        $this->load->view('edit', $data);
    }

    public function update()
    {
        $this->load->model('mhome');
        $this->mhome->update();
    }

    public function del()
    {
        $this->load->model('mhome');
        $kd = $this->uri->segment(3);
        $this->mhome->delete($kd);
        redirect(base_url() . 'test');
    }

}
