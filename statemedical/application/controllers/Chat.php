<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
		
		$this->load->helper(array('form','url','file','text'));
        
        $this->load->model('Chat_model');
    }


    public function index()
    {
        $this->load->view('chat');
    }
}