<?php session_start();
class homepage extends CI_Controller
{
    public function index()
    {
        if(empty($_SESSION['UserName']))
        {
            $this->load->helper("url");
            redirect(base_url("login"));
        }
        $this->load->helper("url");
        $this->load->view("homepage_view");
    }
}