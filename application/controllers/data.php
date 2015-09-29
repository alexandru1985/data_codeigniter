<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller
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
    function allowed_chars($param)
    {
        echo "You passed '$param'";
    }

    function md5_test($pass)
    {
        echo md5($pass);
    }

    function sha1_test($pass)
    {
        echo sha1($pass);
    }

    function sha1_test2($pass)
    {
        $this->load->library('encrypt');
        echo $this->encrypt->sha1($pass);
    }

    function encode()
    {
        $message = "Encoded message";
        $this->load->library('encrypt');
        echo $this->encrypt->encode($message);
    }

    function decode()
    {
        $encoded_message = "wtFJTUfrffA8k9YDubf4xJvqiNO1PT144i8J+wbvj6G2tH4hUkBE3qJspQWlfcjnl0xoVUK5W752+javTiDCEw==";
        $this->load->library('encrypt');
        echo $this->encrypt->decode($encoded_message);
    }

    function encode_with_key($key)
    {
        $message = "Encoded message";
        $this->load->library('encrypt');
        echo $this->encrypt->encode($message, $key);
    }

    function decode_with_key($key)
    {
        $encoded_message = "Ve8831Y0AwUIviC1ho7KIzFSLx2Yyed7embQF9Wh2/Dv7lNbP326zccwuOvasu4MXb9itEE8Ysd6bs3laIYuIQ==";
        $this->load->library('encrypt');
        echo $this->encrypt->decode($encoded_message, $key);
    }

    function sql()
    {
        $this->load->library('database');
        $name = "Doe";
        $query = "SELECT * FORM users WHERE name ='" . mysql_real_escape_string($name) . "'";
        $query = "SELECT * FORM users WHERE name ='" . $this->db->escape_str($name) . "'";
        $query = "SELECT * FORM users WHERE name LIKE '%" . $this->db->escape_like_str($name) . "%'";

        // no excaping needed
        $this->db->select('*')->from('users')->where('name', $name);
    }

    function xss_filter()
    {// filterd by config
        $this->input->post('comment');
        // xss
        $string=$this->input->post('comment', true);
        $clean_string = $this->input->xss_clean($string);
    }
}
