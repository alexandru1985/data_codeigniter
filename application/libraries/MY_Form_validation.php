<?php

class MY_form_validation extends CI_Form_validation
{

    function test()
    {
        echo "Testing the extended Form Validation library";
    }



function strong_pass($value,$params)
{

  $this->CI->form_validation->set_message('strong_pass','The %s message');
  $score = 0;
    if (preg_match('|\d|', $value)) {
        $score++;
    }
    if (preg_match('|[A-z]|', $value)) {
        $score++;
    }
    if (preg_match('|\W|', $value)) {
        $score++;
    }
    if (strlen($value)>=8) {
        $score++;
    }

    if ($score < 0) {
        return false;
    }
    return true;
}
}