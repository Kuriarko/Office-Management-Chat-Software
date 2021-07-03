<?php
class Mycontroller extends CI_controller
{
   function __construct()
   {
		parent::__construct();
		$this->load->database();
		 $this->load->helper(array('form','url','file','text')); 
		$this->load->library('session');
   }
   
   function index()
   {
	   $this->load->view('login');
   }
   
   function studentlogin()
   {
	  $this->load->view('studentlogin'); 
   }
   
   function admin_managerlogin()
   {
	 $this->load->view('admin_managerlogin');  
   }
   
   function studentlogindo()
   {
	 
	    $data=array("phone"=>$this->input->post('phone'),"password"=>$this->input->post('password'));
	    $query=$this->db->get_where("users",$data);
		 $res=$query->result_array();
    if ($res)
	{
  	 
	  $phone=$this->input->post('phone');
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getusers($phone);
	 
	  $array = array(
	  'phone' => $this->input->post('phone'),
	  'name' => $data['records']->name
	  );
	  
	  $this->session->set_userdata($array);
	  
	  $this->load->view('studentheader',$data);
	  $this->load->view('studentdash');
	}
	else
	   
     $this->load->view('studentloginerror');  
   }
   
   function user_home(){
	   $phone=$this->session->userdata('phone');
	    $this->load->model('Statemedical');
	   $data['records']=$this->Statemedical->getusers($phone);
	   
	   $this->load->view('studentheader',$data);
	  $this->load->view('studentdash');
	   
   }
   
   
   
   function adminlogin()
   {
	    $data=array("email"=>$this->input->post('email'),"password"=>$this->input->post('password'));
	    $query=$this->db->get_where("admin",$data);
		 $res=$query->result_array();
    if ($res)
	{
  	 
	  
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin();
	  $array = array(
	  'email'=>$this->input->post('email'),
	  'name' => $data['records']->name,
	  'phone'=> $data['records']->phone
	  );
	  $this->session->set_userdata($array);
      $this->load->view('adminheader',$data);
	  $this->load->view('admindash');
	}
	else
	  //echo "Wrong userid or password";  
     $this->load->view('loginerror');
   }
   
   function admin_home(){
	    $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin();
	   $this->load->view('adminheader',$data);
	  $this->load->view('admindash');
   }
   
      function admin_managerlogindo()
   {
	   $email1=$this->input->post('email');
	    $data=array("email"=>$this->input->post('email'),"password"=>$this->input->post('password'));
	    $query=$this->db->get_where("admin_manager",$data);
		 $res=$query->result_array();
    if ($res)
	{
  	 
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin_manager($email1);
	  $array = array(
	  'email'=>$this->input->post('email'),
	  'name' => $data['records']->name,
	  'phone' => $data['records']->phone
	  );
	  $this->session->set_userdata($array);
      $this->load->view('admin_managerheader',$data);
	  $this->load->view('admin_managerdash');
	}
	else
	  //echo "Wrong userid or password";  
     $this->load->view('manager_loginerror');
   }
   
   function mgr_home(){
	   $email = $this->session->userdata('email');
	    $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin_manager($email);
	  $this->load->view('admin_managerheader',$data);
	  $this->load->view('admin_managerdash');
   }
   
   function loadadmindash()
   {
	   $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin();
      $this->load->view('adminheader',$data);
	  $this->load->view('admindash');
   }
   
   function addusers()
   {
	   if($this->session->userdata('email'))
	   {
	     $this->load->model('Statemedical');
	     $data['records']=$this->Statemedical->getadmin();
		 $data1['records']=$this->Statemedical->getuid();
         $this->load->view('adminheader',$data);
		 $this->load->view('adduser',$data1);
		 
	   }
	   else
	   {
		   $this->load->view('login');
	   }
   
   }
   
      function addadmin_managers()
   {
	   if($this->session->userdata('email'))
	   {
	     $this->load->model('Statemedical');
	     $data['records']=$this->Statemedical->getadmin();
		
         $this->load->view('adminheader',$data);
		 $this->load->view('addadmin_managers');
		 
	   }
	   else
	   {
		   $this->load->view('login');
	   }
   
   }
   
      function manageraddusers()
   {
	   if($this->session->userdata('email'))
	   {
		   $email=$this->session->userdata('email');
	     $this->load->model('Statemedical');
	     $data['records']=$this->Statemedical->getadmin_manager($email);
		 $data1['records']=$this->Statemedical->getuid();
         $this->load->view('admin_managerheader',$data);
		 $this->load->view('manager_adduser',$data1);
		 
	   }
	   else
	   {
		   $this->load->view('admin_managerlogin');
	   }
   
   }
   
   function adduserdo()
   {
	  $data=array("uid"=>$this->input->post('uid'),"name"=>$this->input->post('name'),"email"=>$this->input->post('email'),"password"=>$this->input->post('password'),"department"=>$this->input->post('department'),"phone"=>$this->input->post('phone'));
	  $data1=array("name"=>$this->input->post('name'));
	  $data2=array("email"=>$this->input->post('email'),"uid"=>$this->input->post('uid'));
	  $data3=array("phone"=>$this->input->post('phone'),"uid"=>$this->input->post('uid'));
	  
	  $uid=$this->input->post('uid');
	  $uid=$uid+1;
	 
	  $this->load->model('Statemedical');
	  $this->Statemedical->addusers($data);
	  $this->Statemedical->addusername($data1);
	  $this->Statemedical->adduseremail($data2);
	  $this->Statemedical->adduserphone($data3);
	  $this->Statemedical->updateuid($uid);
	
	  $data['records']=$this->Statemedical->getadmin();
	  $data1['records']=$this->Statemedical->getuid();
      $this->load->view('adminheader',$data);
	  $this->load->view('adduser1',$data1);

   }
   
      function addadmin_managersdo()
   {
	  $data=array("name"=>$this->input->post('name'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"password"=>$this->input->post('password'));
	  
	  $this->load->model('Statemedical');
	  $this->Statemedical->addadmin_managers($data);
	  
	  print "<script type=\"text/javascript\">alert('Admin Manager added succesfully');</script>";
	  
	  
	  $this->addadmin_managers();
	  
	 // $data['records']=$this->Statemedical->getadmin();
	 // $data1['records']=$this->Statemedical->getuid();
      //$this->load->view('adminheader',$data);
	  //$this->load->view('addadmin_managers',$data1);

   }
   
      function manager_adduserdo()
   {
	  $data=array("uid"=>$this->input->post('uid'),"name"=>$this->input->post('name'),"email"=>$this->input->post('email'),"password"=>$this->input->post('password'),"department"=>$this->input->post('department'),"phone"=>$this->input->post('phone'));
	  $data1=array("name"=>$this->input->post('name'));
	  $data2=array("email"=>$this->input->post('email'),"uid"=>$this->input->post('uid'));
	  $data3=array("phone"=>$this->input->post('phone'),"uid"=>$this->input->post('uid'));
	  
	  $uid=$this->input->post('uid');
	  $uid=$uid+1;
	 
	  $this->load->model('Statemedical');
	  $this->Statemedical->addusers($data);
	  $this->Statemedical->addusername($data1);
	  $this->Statemedical->adduseremail($data2);
	  $this->Statemedical->adduserphone($data3);
	  $this->Statemedical->updateuid($uid);
	
	  $data['records']=$this->Statemedical->getadmin_manager();
	  $data1['records']=$this->Statemedical->getuid();
      $this->load->view('admin_managerheader',$data);
	  $this->load->view('manager_adduser1',$data1);

   }
   
   function viewusers()
   {
	  if($this->session->userdata('email')) 
	  {
		  $this->load->model('Statemedical');
		  $data['records']=$this->Statemedical->viewuser();
	      $data1['records']=$this->Statemedical->getadmin();
          $this->load->view('adminheader',$data1);
	      $this->load->view('viewuser',$data); 
	  }
	  else
	   {
		   $this->load->view('login');
	   }
   }
   
      function viewAdmin_manager()
   {
	  if($this->session->userdata('email')) 
	  {
		  $this->load->model('Statemedical');
		  $data['records']=$this->Statemedical->viewAdmin_manager();
	      $data1['records']=$this->Statemedical->getadmin();
          $this->load->view('adminheader',$data1);
	      $this->load->view('viewAdmin_manager',$data); 
	  }
	  else
	   {
		   $this->load->view('login');
	   }
   }
   
      function manager_viewusers()
   {
	  if($this->session->userdata('email')) 
	  {
		  $this->load->model('Statemedical');
		  $data['records']=$this->Statemedical->viewuser();
	      $data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
          $this->load->view('admin_managerheader',$data1);
	      $this->load->view('mgr_viewuser',$data); 
	  }
	  else
	   {
		   $this->load->view('admin_managerlogin');
	   }
   }
   
   function adminlogout()
   {
	   unset($_SESSION['email']);
       $this->index();
   }
   
   function studentlogout()
   {
	   unset($_SESSION['email']);
       $this->studentlogin();
   }
   
   function managerlogout()
   {
	   unset($_SESSION['email']);
       $this->admin_managerlogin();
   }
   
   function newdiary()
   {
	  if($this->session->userdata('email')) 
      {
		  
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin();
	  $data1['records']=$this->Statemedical->viewuser();
	  
	    $data1['country'] = $this->Statemedical->fetch_diarytype();


      $this->load->view('adminheader',$data);
	  $this->load->view('towhom',$data1);
	  
	  }		
      
      else
	  {
	   $this->load->view('login');
  
	  }		  
   }
   
     function newdiary_admin_manager()
   {
	  if($this->session->userdata('email')) 
      {
		  
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin();
	
	  $data1['records']=$this->Statemedical->viewAdmin_manager();
	    $data1['country'] = $this->Statemedical->fetch_diarytype();


      $this->load->view('adminheader',$data);
	  $this->load->view('towhom1',$data1);
	  
	  }		
      
      else
	  {
	   $this->load->view('login');
  
	  }		  
   }
   
    function newdiary_admin_manager1()
   {
	  if($this->session->userdata('email')) 
      {
		  
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
	
	  $data1['records']=$this->Statemedical->viewAdmin_manager();
	    $data1['country'] = $this->Statemedical->fetch_diarytype();


      $this->load->view('admin_managerheader',$data);
	  $this->load->view('adminmanager_towhom1',$data1);
	  
	  }		
      
      else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }		  
   }
   
      function manager_newdiary()
   {
	  if($this->session->userdata('email')) 
      {
		  
	  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
	  $data1['records']=$this->Statemedical->viewuser();
	  
	    $data1['country'] = $this->Statemedical->fetch_diarytype();


      $this->load->view('admin_managerheader',$data);
	  $this->load->view('manager_towhom',$data1);
	  
	  }		
      
      else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }		  
   }
   
   function fetch_reccat()
   {
	   if($this->input->post('diarytype_id'))
  {
	  $this->load->model('Statemedical');
   echo $this->Statemedical->fetch_reccat($this->input->post('diarytype_id'));
  }
   }
   
   function towhomdo()
   {
	   if($this->session->userdata('email'))
	   {
		   $diary_type=$this->input->post('diary_type');
		   if($diary_type == "Receiving")
		   {
			   
			  $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin();
		   $data1['records1']=$this->Statemedical->fetchdate();
		   $data1['records']=$this->Statemedical->getphoneemail($whom);
		   $this->load->view('adminheader',$data);
		   $this->load->view('adddiary',$data1, array('error' => ' ' ));   
		   }
		   
		   else{
			  
			    $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin();
		   $data1['records1']=$this->Statemedical->fetchdate1();
		   $data1['records']=$this->Statemedical->getphoneemail($whom);
		   $this->load->view('adminheader',$data);
		   $this->load->view('adddiary',$data1, array('error' => ' ' ));
		   }
	   
	   }
       else
	  {
	   $this->load->view('login');
  
	  }		   
   }
   
      function towhomdo1()
   {
	   if($this->session->userdata('email'))
	   {
		   $diary_type=$this->input->post('diary_type');
		   if($diary_type == "Receiving")
		   {
			   
			  $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin();
		   $data1['records1']=$this->Statemedical->fetchdate();
		   $data1['records']=$this->Statemedical->getphoneemail1($whom);
		   $this->load->view('adminheader',$data);
		   $this->load->view('adddiary',$data1, array('error' => ' ' ));   
		   }
		   
		   else{
			  
			    $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin();
		   $data1['records1']=$this->Statemedical->fetchdate1();
		   $data1['records']=$this->Statemedical->getphoneemail1($whom);
		   $this->load->view('adminheader',$data);
		   $this->load->view('adddiary',$data1, array('error' => ' ' ));
		   }
	   
	   }
       else
	  {
	   $this->load->view('login');
  
	  }		   
   }
   
         function ITtowhomdo1()
   {
	     $diary_type=$this->input->post('diary_type');
		   if($diary_type == "Receiving")
		   {
			   
			  $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin();
		   $data1['records1']=$this->Statemedical->fetchdate();
		   $data1['records']=$this->Statemedical->getphoneemail1($whom);
		   $this->load->view('adminheader',$data);
		   $this->load->view('ITadddiary',$data1, array('error' => ' ' ));   
		   }
		   
		   else{
			  
			    $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin();
		   $data1['records1']=$this->Statemedical->fetchdate1();
		   $data1['records']=$this->Statemedical->getphoneemail1($whom);
		   $this->load->view('adminheader',$data);
		   $this->load->view('ITadddiary',$data1, array('error' => ' ' ));
		   }
	   
	 	   
   }
   
      function adminmanager_towhomdo1()
   {
	   if($this->session->userdata('email'))
	   {
		   $diary_type=$this->input->post('diary_type');
		   if($diary_type == "Receiving")
		   {
			   
			  $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		   $data1['records1']=$this->Statemedical->fetchdate();
		   $data1['records']=$this->Statemedical->getphoneemail1($whom);
		   $this->load->view('admin_managerheader',$data);
		   $this->load->view('adddiary_adminmanager',$data1, array('error' => ' ' ));   
		   }
		   
		   else{
			  
			    $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		   $data1['records1']=$this->Statemedical->fetchdate1();
		   $data1['records']=$this->Statemedical->getphoneemail1($whom);
		   $this->load->view('admin_managerheader',$data);
		   $this->load->view('adddiary_adminmanager',$data1, array('error' => ' ' ));
		   }
	   
	   }
       else
	  {
	   $this->load->view('addadmin_managerlogin');
  
	  }		   
   }
   
     function manager_towhomdo()
   {
	   if($this->session->userdata('email'))
	   {
		   $diary_type=$this->input->post('diary_type');
		   if($diary_type == "Receiving")
		   {
			   
			  $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		   $data1['records1']=$this->Statemedical->fetchdate();
		   $data1['records']=$this->Statemedical->getphoneemail($whom);
		   $this->load->view('admin_managerheader',$data);
		   $this->load->view('manager_adddiary',$data1, array('error' => ' ' ));   
		   }
		   
		   else{
			  
			    $whom=$this->input->post('whom');
		   $this->load->model('Statemedical');
		   $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		   $data1['records1']=$this->Statemedical->fetchdate1();
		   $data1['records']=$this->Statemedical->getphoneemail($whom);
		   $this->load->view('admin_managerheader',$data);
		   $this->load->view('manager_adddiary',$data1, array('error' => ' ' ));
		   }
	   
	   }
       else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }		   
   }
   
    function studenttowhomdo()
	 {
		 if($this->session->userdata('phone'))
		 {
			$diary_type=$this->input->post('diary_type');
          if($diary_type == "Receiving")
		  {
			  $whom=$this->input->post('whom');
			   $this->load->model('Statemedical');
			   $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
			$data1['bb']=$this->Statemedical->getusers($phone);
			$data1['records1']=$this->Statemedical->fetchdate();
			 $data1['records']=$this->Statemedical->getphoneemail($whom);
			 $this->load->view('studentheader',$data);
			 $this->load->view('studentadddiary',$data1, array('error' => ' ' ));
		  }	
          else{
			   $whom=$this->input->post('whom');
			    $this->load->model('Statemedical');
				 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
			$data1['bb']=$this->Statemedical->getusers($phone);
			$data1['records1']=$this->Statemedical->fetchdate1();
			 $data1['records']=$this->Statemedical->getphoneemail($whom);
			 $this->load->view('studentheader',$data);
			 $this->load->view('studentadddiary',$data1, array('error' => ' ' ));
			  
		  }
	
		 }
       else
	  {
	   $this->load->view('studentlogin');
  
	  }			 
	 }
	 
	  function studenttowhomdo1()
	 {
		 if($this->session->userdata('phone'))
		 {
			$diary_type=$this->input->post('diary_type');
          if($diary_type == "Receiving")
		  {
			  $whom=$this->input->post('whom');
			   $this->load->model('Statemedical');
			   $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
			$data1['bb']=$this->Statemedical->getusers($phone);
			$data1['records1']=$this->Statemedical->fetchdate();
			 $data1['records']=$this->Statemedical->getphoneemail1($whom);
			 $this->load->view('studentheader',$data);
			 $this->load->view('studentadddiary1',$data1, array('error' => ' ' ));
		  }	
          else{
			   $whom=$this->input->post('whom');
			    $this->load->model('Statemedical');
				 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
			$data1['bb']=$this->Statemedical->getusers($phone);
			$data1['records1']=$this->Statemedical->fetchdate1();
			 $data1['records']=$this->Statemedical->getphoneemail1($whom);
			 $this->load->view('studentheader',$data);
			 $this->load->view('studentadddiary1',$data1, array('error' => ' ' ));
			  
		  }
	
		 }
       else
	  {
	   $this->load->view('studentlogin');
  
	  }			 
	 }
	 
	 function uploaddocsdo()
	 {
			//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	echo $this->upload->display_errors();
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
}

 $data=array("diary_no"=>$this->input->post('diary_no'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"file_name"=>$fn,"uploaded_by"=>$this->session->userdata('name'));
$this->load->model('Statemedical');
 $this->Statemedical->uploaddocs($data);
 
 print "<script type=\"text/javascript\">alert('Document Uploaded successfully');</script>";
// $this->assigneddiariestables();

$id=$this->input->post('diary_no');
 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
 $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			$this->load->view('studentheader',$data);
			$this->load->view('viewdiarydocs',$data1);

	 }
	 
	 	 function manager_uploaddocsdo()
	 {
			//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	echo $this->upload->display_errors();
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
}

 $data=array("diary_no"=>$this->input->post('diary_no'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"file_name"=>$fn,"uploaded_by"=>$this->session->userdata('name'));
$this->load->model('Statemedical');
 $this->Statemedical->uploaddocs($data);
 
 print "<script type=\"text/javascript\">alert('Document Uploaded successfully');</script>";
// $this->assigneddiariestables();

$id=$this->input->post('diary_no');
 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
 $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			$this->load->view('admin_managerheader',$data);
			$this->load->view('viewdiarydocs',$data1);

	 }
	 
	 function admin_uploaddocsdo()
	 {
			//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	echo $this->upload->display_errors();
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
}

 $data=array("diary_no"=>$this->input->post('diary_no'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"file_name"=>$fn,"uploaded_by"=>$this->session->userdata('name'));
$this->load->model('Statemedical');
 $this->Statemedical->uploaddocs($data);
 
 print "<script type=\"text/javascript\">alert('Document Uploaded successfully');</script>";
// $this->assigneddiariestables();

$id=$this->input->post('diary_no');
 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin();
 $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			$this->load->view('adminheader',$data);
			$this->load->view('viewdiarydocs',$data1);

	 }
	 
	 function viewdiarydocs()
   {
	   if($this->session->userdata('phone'))
	   {
		   $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
            $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
 			
			$this->load->view('studentheader',$data);
			$this->load->view('viewdiarydocs',$data1);
	   }
	   
	   else
		 {
			$this->load->view('studentlogin'); 
		 }
	   
   }
   
   	 function manager_viewdiarydocs()
   {
	   if($this->session->userdata('email'))
	   {
		   $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
            $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
 			
			$this->load->view('admin_managerheader',$data);
			$this->load->view('viewdiarydocs',$data1);
	   }
	   
	   else
		 {
			$this->load->view('admin_managerlogin'); 
		 }
	   
   }
   
    function admin_viewdiarydocs()
   {
	   if($this->session->userdata('email'))
	   {
		   $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin();
            $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
 			
			$this->load->view('adminheader',$data);
			$this->load->view('viewdiarydocs',$data1);
	   }
	   
	   else
		 {
			$this->load->view('login'); 
		 }
	   
   }
	 
	 
	 function adminuploaddocsdo()
	 {
		 
		 $binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	echo $this->upload->display_errors();
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
}

 $data=array("diary_no"=>$this->input->post('diary_no'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"file_name"=>$fn,"uploaded_by"=>$this->session->userdata('name'));
$this->load->model('Statemedical');
 $this->Statemedical->uploaddocs($data);
 
 print "<script type=\"text/javascript\">alert('Document Uploaded successfully');</script>";
 //$this->diarystatus();
 $id= $this->input->post('diary_no');
  $data['records']=$this->Statemedical->getadmin(); 
			  $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			 $this->load->view('adminheader',$data);
			 $this->load->view('viewdiarydocs1',$data1);
		 
	 }
	 
	 	 function manager_adminuploaddocsdo()
	 {
		 
		 $binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	echo $this->upload->display_errors();
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
}

 $data=array("diary_no"=>$this->input->post('diary_no'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"file_name"=>$fn,"uploaded_by"=>$this->session->userdata('name'));
$this->load->model('Statemedical');
 $this->Statemedical->uploaddocs($data);
 
 print "<script type=\"text/javascript\">alert('Document Uploaded successfully');</script>";
 //$this->diarystatus();
 $id= $this->input->post('diary_no');
  $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			  $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			 $this->load->view('admin_managerheader',$data);
			 $this->load->view('manager_viewdiarydocs1',$data1);
		 
	 }
	 
	 
   function admincheckdocs()
   {
	    if($this->session->userdata('email')) 
		{
			 $id=$this->uri->segment('3');
		     $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin(); 
			  $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			 $this->load->view('adminheader',$data);
			 $this->load->view('viewdiarydocs1',$data1);
			 
		}
		
		 else
	  {
	   $this->load->view('login');
  
	  }	
		
   }
   
   function userupdate()
   {
	   if($this->session->userdata('email')) {
		   $id=$this->uri->segment('3');
		     $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin(); 
			 $data1['records']=$this->Statemedical->userupdate($id);
			  $this->load->view('adminheader',$data);
			  $this->load->view('userupdate',$data1);
		   
	   }
	    else
	  {
	   $this->load->view('login');
  
	  }	
	   
   }
   
      function ITupdate()
   {
		   $id=$this->uri->segment('3');
		     $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin(); 
			 $data1['records']=$this->Statemedical->ITupdate($id);
			  $this->load->view('adminheader',$data);
			  $this->load->view('IT_update',$data1);
		 
   }
   
      function mgr_userupdate()
   {
	   
		   $id=$this->uri->segment('3');
		   $email = $this->session->userdata('email');
		     $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin_manager($email); 
			 $data1['records']=$this->Statemedical->userupdate($id);
			  $this->load->view('admin_managerheader',$data);
			  $this->load->view('mgr_userupdate',$data1);
		   
	   
	 	
	   
   }
   
   function userupdatedo(){
	   if($this->session->userdata('email')){
		    $this->load->model('Statemedical');
			$data=array("name"=>$this->input->post("name"),"email"=>$this->input->post("email"),"password"=>$this->input->post("password"),"department"=>$this->input->post("department"),"phone"=>$this->input->post("phone"));
			$id=$this->input->post("uid");
			$this->Statemedical->userupdatedo($data,$id);
			$this->viewusers();

	   }
	    else
	  {
	   $this->load->view('login');
  
	  }	
   }
   
    function ITupdatedo(){
		    $this->load->model('Statemedical');
			$data=array("name"=>$this->input->post("name"),"email"=>$this->input->post("email"),"password"=>$this->input->post("password"),"phone"=>$this->input->post("phone"));
			$id=$this->input->post("aid");
			$this->Statemedical->ITupdatedo($data,$id);
			$this->viewAdmin_manager();

   }
   
      function mgr_userupdatedo(){
	  
		    $this->load->model('Statemedical');
			$data=array("name"=>$this->input->post("name"),"email"=>$this->input->post("email"),"password"=>$this->input->post("password"),"department"=>$this->input->post("department"),"phone"=>$this->input->post("phone"));
			$id=$this->input->post("uid");
			$this->Statemedical->userupdatedo($data,$id);
			$this->manager_viewusers();

   }
   
     function manager_admincheckdocs()
   {
	    if($this->session->userdata('email')) 
		{
			 $id=$this->uri->segment('3');
		     $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			  $data1['records']=$this->Statemedical->getdiarydocs($id);
			$this->session->set_flashdata('diary_no',$id);
			 $this->load->view('admin_managerheader',$data);
			 $this->load->view('manager_viewdiarydocs1',$data1);
			 
		}
		
		 else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }	
		
   }
	 
	 

   function adddiarydo()
   {
	  
	//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"receiving_category"=>$this->input->post('receiving_category'));
   
if($diary_type == "Despatch")
{
	$var1=$this->input->post('ref_rec_no');
	if(!empty($var1))
	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
   
   if(empty($var1))
   	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null);

}

    
	$data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>null,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
	
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
	$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"receiving_category"=>$this->input->post('receiving_category'));
	  
    if($diary_type == "Despatch")
	{
		$var1=$this->input->post('ref_rec_no');
	    if(!empty($var1))
				$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"ref_receiving_no"=>$this->input->post('ref_rec_no'));

         if(empty($var1))
	     $data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn);

	}



	
	 $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>$fn,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
}
	
      print "<script type=\"text/javascript\">alert('Record successfully stored.Diary number:".$this->input->post('diary_no')."');</script>";
	  $type=$this->input->post('diary_type');
	  if($type == "Receiving")
	  {
		 $this->db->query("UPDATE sequence SET sequence_no=sequence_no+1"); 
	  }
	  else{
		 $this->db->query("UPDATE sequence1 SET sequence_no=sequence_no+1");  
	  }
	  
     $this->newdiary();
  
   }
   
   
     function ITadddiarydo()
   {
	  
	//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"receiving_category"=>$this->input->post('receiving_category'));
   
if($diary_type == "Despatch")
{
	$var1=$this->input->post('ref_rec_no');
	if(!empty($var1))
	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
   
   if(empty($var1))
   	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null);

}

    
	$data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>null,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
	
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
	$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"receiving_category"=>$this->input->post('receiving_category'));
	  
    if($diary_type == "Despatch")
	{
		$var1=$this->input->post('ref_rec_no');
	    if(!empty($var1))
				$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"ref_receiving_no"=>$this->input->post('ref_rec_no'));

         if(empty($var1))
	     $data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn);

	}



	
	 $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>$fn,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
}
	
      print "<script type=\"text/javascript\">alert('Record successfully stored.Diary number:".$this->input->post('diary_no')."');</script>";
	  $type=$this->input->post('diary_type');
	  if($type == "Receiving")
	  {
		 $this->db->query("UPDATE sequence SET sequence_no=sequence_no+1"); 
	  }
	  else{
		 $this->db->query("UPDATE sequence1 SET sequence_no=sequence_no+1");  
	  }
	  
     $this->newdiary_admin_manager();
  
   }
   
     function manager_adddiarydo()
   {
	  
	//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"receiving_category"=>$this->input->post('receiving_category'));
   
if($diary_type == "Despatch")
{
	$var1=$this->input->post('ref_rec_no');
	if(!empty($var1))
	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
   
   if(empty($var1))
   	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null);

}

    
	$data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>null,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
	
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
	$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"receiving_category"=>$this->input->post('receiving_category'));
	  
    if($diary_type == "Despatch")
	{
		$var1=$this->input->post('ref_rec_no');
	    if(!empty($var1))
				$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"ref_receiving_no"=>$this->input->post('ref_rec_no'));

         if(empty($var1))
	     $data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn);

	}



	
	 $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>$fn,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
}
	
      print "<script type=\"text/javascript\">alert('Record successfully stored.Diary number:".$this->input->post('diary_no')."');</script>";
	  $type=$this->input->post('diary_type');
	  if($type == "Receiving")
	  {
		 $this->db->query("UPDATE sequence SET sequence_no=sequence_no+1"); 
	  }
	  else{
		 $this->db->query("UPDATE sequence1 SET sequence_no=sequence_no+1");  
	  }
	  
     $this->manager_newdiary();
  
   }
   
        function manager_adddiarydo1()
   {
	  
	//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"receiving_category"=>$this->input->post('receiving_category'));
   
if($diary_type == "Despatch")
{
	$var1=$this->input->post('ref_rec_no');
	if(!empty($var1))
	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
   
   if(empty($var1))
   	  $data = array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null);

}

    
	$data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>null,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
	
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
	$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"receiving_category"=>$this->input->post('receiving_category'));
	  
    if($diary_type == "Despatch")
	{
		$var1=$this->input->post('ref_rec_no');
	    if(!empty($var1))
				$data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"ref_receiving_no"=>$this->input->post('ref_rec_no'));

         if(empty($var1))
	     $data=array("assignment_date"=>$this->input->post('date')."at".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn);

	}



	
	 $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>$fn,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));
	  $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   $this->Statemedical->adddiaryfiles($data4);
}
	
      print "<script type=\"text/javascript\">alert('Record successfully stored.Diary number:".$this->input->post('diary_no')."');</script>";
	  $type=$this->input->post('diary_type');
	  if($type == "Receiving")
	  {
		 $this->db->query("UPDATE sequence SET sequence_no=sequence_no+1"); 
	  }
	  else{
		 $this->db->query("UPDATE sequence1 SET sequence_no=sequence_no+1");  
	  }
	  
     $this->newdiary_admin_manager1();
  
   }
   
   function setsequence()
   {
	    if($this->session->userdata('email'))
		{
			$this->load->model('Statemedical');
			$data1['records']=$this->Statemedical->getadmin();
			$data2['bb']=$this->Statemedical->fetchdate();
            $this->load->view('adminheader',$data1);
			$this->load->view('setsequence',$data2);
			
		}
     else
	  {
	   $this->load->view('login');
  
	  }			
   }
   
      function manager_setsequence()
   {
	    if($this->session->userdata('email'))
		{
			$this->load->model('Statemedical');
			$data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			$data2['bb']=$this->Statemedical->fetchdate();
            $this->load->view('admin_managerheader',$data1);
			$this->load->view('manager_setsequence',$data2);
			
		}
     else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }			
   }
   
      function setsequence1()
   {
	    if($this->session->userdata('email'))
		{
			$this->load->model('Statemedical');
			$data1['records']=$this->Statemedical->getadmin();
			$data2['bb']=$this->Statemedical->fetchdate1();
            $this->load->view('adminheader',$data1);
			$this->load->view('setsequence1',$data2);
			
		}
     else
	  {
	   $this->load->view('login');
  
	  }			
   }
   
         function manager_setsequence1()
   {
	    if($this->session->userdata('email'))
		{
			$this->load->model('Statemedical');
			$data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			$data2['bb']=$this->Statemedical->fetchdate1();
            $this->load->view('admin_managerheader',$data1);
			$this->load->view('manager_setsequence1',$data2);
			
		}
     else
	  {
	   $this->load->view('manager_headerlogin');
  
	  }			
   }
   
   function setsequencedo()
   {
	  $data=array("sequence_no"=>$this->input->post('sequence'),"modified_on"=>$this->input->post('date'),"type"=>"Receiving");
	   $this->load->model('Statemedical');
      $this->Statemedical->setsequence($data);
	  $this->setsequence();
	  
   
   }
   
    function manager_setsequencedo()
   {
	  $data=array("sequence_no"=>$this->input->post('sequence'),"modified_on"=>$this->input->post('date'),"type"=>"Receiving");
	   $this->load->model('Statemedical');
      $this->Statemedical->setsequence($data);
	  $this->manager_setsequence();
	  
   
   }
   
   function setsequencedo1()
   {
	  $data=array("sequence_no"=>$this->input->post('sequence'),"modified_on"=>$this->input->post('date'),"type"=>"Despatch");
	   $this->load->model('Statemedical');
      $this->Statemedical->setsequence1($data);
	  $this->setsequence1();
	  
   
   }
   
   function manager_setsequencedo1()
   {
	  $data=array("sequence_no"=>$this->input->post('sequence'),"modified_on"=>$this->input->post('date'),"type"=>"Despatch");
	   $this->load->model('Statemedical');
      $this->Statemedical->setsequence1($data);
	  $this->manager_setsequence1();
	  
   
   }
   
   public function queryWithProperTypes($sql) {

  $query = $this->db->query($sql);
  $fields = $query->field_data();
  $result = $query->result_array();

  foreach ($result as $r => $row) {
    $c = 0;
    foreach ($row as $header => $value) {

      // fix variables types according to what is expected from
      // the database, as CodeIgniter get all as string.

      // $c = column index (starting from 0)
      // $r = row index (starting from 0)
      // $header = column name
      // $result[$r][$header] = that's the value to fix. Must
      //                        reference like this because settype
      //                        uses a pointer as param

      $field = $fields[$c];

      switch ($field->type) {

        case MYSQLI_TYPE_LONGLONG: // 8 = bigint
        case MYSQLI_TYPE_LONG: // 3 = int
        case MYSQLI_TYPE_TINY: // 1 = tinyint
        case MYSQLI_TYPE_SHORT: // 2 = smallint
        case MYSQLI_TYPE_INT24: // 9 = mediumint
        case MYSQLI_TYPE_YEAR: // 13 = year
          settype($result[$r][$header], 'integer');
          break;

        case MYSQLI_TYPE_DECIMAL: // 0 = decimal
        case MYSQLI_TYPE_NEWDECIMAL: // 246 = decimal
        case MYSQLI_TYPE_FLOAT: // 4 = float
        case MYSQLI_TYPE_DOUBLE: // 5 = double
          settype($result[$r][$header], 'float');
          break;

        case MYSQLI_TYPE_BIT: // 16 = bit
          settype($result[$r][$header], 'boolean');
          break;

      }

      $c = $c + 1;
    }
  }

  return $result;
}

function diarystatus()
{
	if($this->session->userdata('email'))
	{
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin();
		  $data['records1']=$this->Statemedical->fetchdiaries();
          $this->load->view('adminheader',$data1);
		  $this->load->view('diarystatus1',$data);
		  
	}
	else{
		$this->load->view('login');
	}
}

function manager_diarystatus()
{
	if($this->session->userdata('email'))
	{
		$email=$this->session->userdata('email');
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin_manager($email);
		  $data['records1']=$this->Statemedical->fetchdiaries();
          $this->load->view('admin_managerheader',$data1);
		  $this->load->view('manager_diarystatus1',$data);
		  
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function assigneddiariestables()
{
	if($this->session->userdata('phone'))
	{
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		
		$this->load->view('studentheader',$data);
		$this->load->view('userdiarytable',$data);

	}

	else{
		$this->load->view('studentlogin');
	}

}

function diaryhistory()
{
	if($this->session->userdata('phone'))
	{
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		
		$this->load->view('studentheader',$data);
		$this->load->view('diaryhistory',$data);

	}

	else{
		$this->load->view('studentlogin');
	}

}

function ITdiaryhistory()
{
	
		$this->load->model('Statemedical');
		$email=$this->session->userdata('email');
		$data['records']=$this->Statemedical->getadmin_manager($email);
		
		$this->load->view('admin_managerheader',$data);
		$this->load->view('ITdiaryhistory',$data);

}

function Secretarydiaryhistory()
{
	
		$this->load->model('Statemedical');
		$data['records']=$this->Statemedical->getadmin();
		
		$this->load->view('adminheader',$data);
		$this->load->view('Secretarydiaryhistory',$data);

}

function manager_assigneddiariestables()
{
	if($this->session->userdata('email'))
	{
		$this->load->model('Statemedical');
		
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		
		$this->load->view('admin_managerheader',$data);
		$this->load->view('managerdiarytable',$data);

	}

	else{
		$this->load->view('admin_managerlogin');
	}

}

function admin_assigneddiariestables()
{
	if($this->session->userdata('email'))
	{
		$this->load->model('Statemedical');
		
		$data['records']=$this->Statemedical->getadmin();
		
		$this->load->view('adminheader',$data);
		$this->load->view('admindiarytable',$data);

	}

	else{
		$this->load->view('login');
	}

}

function newdiarystatus()
{
	if($this->session->userdata('email'))
	{
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin();
		  $data['records1']=$this->Statemedical->fetchdiaries();
          $this->load->view('adminheader',$data1);
		  $this->load->view('newdiarystatus1',$data);
		  
	}
	else{
		$this->load->view('login');
	}
}

function manager_newdiarystatus()
{
	if($this->session->userdata('email'))
	{
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		  $data['records1']=$this->Statemedical->fetchdiaries();
          $this->load->view('admin_managerheader',$data1);
		  $this->load->view('manager_newdiarystatus1',$data);
		  
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function diarystatus1()
{
	if($this->session->userdata('email'))
	{
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin();
		  $data['records1']=$this->Statemedical->fetchapproveddiaries();
          $this->load->view('adminheader',$data1);
		  $this->load->view('diarystatus',$data);
		  
	}
	else{
		$this->load->view('login');
	}
}

function clickeddiaries()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
	
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin();
		  $data['records1']=$this->Statemedical->fetchclickeddiaries($id);
          $this->load->view('adminheader',$data1);
		  $this->load->view('diarystatus',$data);
		  
	}
	else{
		$this->load->view('login');
	}
}

function clickeddiaries_second()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
	
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		  $data['records1']=$this->Statemedical->fetchclickeddiaries($id);
          $this->load->view('admin_managerheader',$data1);
		  $this->load->view('manager_diarystatus',$data);
		  
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function manager_clickeddiaries()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
	
		  $this->load->model('Statemedical');
	      $data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		  $data['records1']=$this->Statemedical->fetchclickeddiaries($id);
          $this->load->view('admin_managerheader',$data1);
		  $this->load->view('manager_diarystatus',$data);
		  
	}
	else{
		$this->load->view('login');
	}
}

function userclickeddiaries()
{
	if($this->session->userdata('phone'))
	{
		$diary_no=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
	    $data1['records']=$this->Statemedical->singlefetchdiarybyusers($phone,$diary_no);
		$data['records']=$this->Statemedical->getusers($phone);
	    $this->load->view('studentheader',$data);
		$this->load->view('assigneddiaries',$data1);

	}
	else{
		$this->load->view('studentlogin');
	}

}

function managerclickeddiaries()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
	    $data1['records']=$this->Statemedical->singlefetchdiarybyusers($phone,$diary_no);
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
	    $this->load->view('admin_managerheader',$data);
		$this->load->view('manager_assigneddiaries',$data1);

	}
	else{
		$this->load->view('admin_managerlogin');
	}

}


function adminclickeddiaries()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
	    $data1['records']=$this->Statemedical->singlefetchdiarybyusers($phone,$diary_no);
		$data['records']=$this->Statemedical->getadmin();
	    $this->load->view('adminheader',$data);
		$this->load->view('admin_assigneddiaries',$data1);

	}
	else{
		$this->load->view('login');
	}

}


function assigneddiaries()
{
	if($this->session->userdata('phone'))
	{
		
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
	    $data1['records']=$this->Statemedical->fetchdiarybyusers($phone);
		$data['records']=$this->Statemedical->getusers($phone);
	    $this->load->view('studentheader',$data);
		$this->load->view('assigneddiaries',$data1);
		
	}
	else{
		$this->load->view('studentlogin');
	}
}



function forwarddiary(){
	if($this->session->userdata('phone'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getusers($phone);
		$data1['records']=$this->Statemedical->viewuser1($phone);
	    $this->load->view('studentheader',$data);
		$this->load->view('forwarddiary',$data1);
	
	}
	else{
		$this->load->view('studentlogin');
	}
}

function forwarddiary_adminmanager(){
	if($this->session->userdata('phone'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getusers($phone);
		$data1['records']=$this->Statemedical->viewadminmanager1($phone);
	    $this->load->view('studentheader',$data);
		$this->load->view('forwarddiary1',$data1);
	
	}
	else{
		$this->load->view('studentlogin');
	}
}

function forwarddiary_admin(){
	if($this->session->userdata('phone'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getusers($phone);
		$data1['records']=$this->Statemedical->viewadmin();
	    $this->load->view('studentheader',$data);
		$this->load->view('forwarddiary2',$data1);
	
	}
	else{
		$this->load->view('studentlogin');
	}
}

function manager_forwarddiary(){
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$data1['records']=$this->Statemedical->viewadminmanager1($phone);
	    $this->load->view('admin_managerheader',$data);
		$this->load->view('manager_forwarddiary',$data1);
	
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function ITtoUserdiary(){
	
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$data1['records']=$this->Statemedical->viewuser();
	    $this->load->view('admin_managerheader',$data);
		$this->load->view('manager_forwarddiary',$data1);
	

	
}

function admin_forwarddiary(){
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin();
		$data1['records']=$this->Statemedical->viewuser1($phone);
	    $this->load->view('adminheader',$data);
		$this->load->view('admin_forwarddiary',$data1);
	
	}
	else{
		$this->load->view('login');
	}
}

function manager_forwarddiary1(){
	
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$data1['records']=$this->Statemedical->viewadminmanager1($phone);
	    $this->load->view('admin_managerheader',$data);
		$this->load->view('manager_forwarddiary1',$data1);
	
	
	
}

function IT_forwarddiary1(){
	
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$data1['records']=$this->Statemedical->viewadminmanager1($phone);
	    $this->load->view('admin_managerheader',$data);
		$this->load->view('IT_forwarddiary1',$data1);
	
	
	
}

function admin_forwarddiary1(){
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin();
		$data1['records']=$this->Statemedical->viewadminmanager1($phone);
	    $this->load->view('adminheader',$data);
		$this->load->view('admin_forwarddiary1',$data1);
	
	}
	else{
		$this->load->view('login');
	}
}

function manager_forwarddiary2(){
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment(3);
		$this->load->model('Statemedical');
		$data1['records1']=$this->Statemedical->fetchsinglediary($id);
		$phone=$this->session->userdata('phone');
	    $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$data1['records']=$this->Statemedical->viewadmin();
	    $this->load->view('admin_managerheader',$data);
		$this->load->view('manager_forwarddiary2',$data1);
	
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function preworkforward()
{
	if($this->session->userdata('phone'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		$this->load->view('studentheader',$data);
		$this->load->view('postforwarddiary',$data1);
		
		
	}
	
	else
	{
		$this->load->view('studentlogin');
	}
}

function preworkforward1()
{
	if($this->session->userdata('phone'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail1($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		$this->load->view('studentheader',$data);
		$this->load->view('postforwarddiary',$data1);
		
		
	}
	
	else
	{
		$this->load->view('studentlogin');
	}
}

function preworkforward2()
{
	if($this->session->userdata('phone'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail2($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		$this->load->view('studentheader',$data);
		$this->load->view('postforwarddiary1',$data1);
		
		
	}
	
	else
	{
		$this->load->view('studentlogin');
	}
}

function manager_preworkforward()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$this->load->view('admin_managerheader',$data);
		$this->load->view('manager_postforwarddiary',$data1);
		
		
	}
	
	else
	{
		$this->load->view('admin_managerlogin');
	}
}

function admin_preworkforward()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin();
		$this->load->view('adminheader',$data);
		$this->load->view('admin_postforwarddiary',$data1);
		
		
	}
	
	else
	{
		$this->load->view('login');
	}
}

function manager_preworkforward1()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail2($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$this->load->view('admin_managerheader',$data);
		$this->load->view('manager_postforwarddiary',$data1);
		
		
	}
	
	else
	{
		$this->load->view('admin_managerlogin');
	}
}


function IT_preworkforward1()
{
	    $diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getITphoneemail2($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$this->load->view('admin_managerheader',$data);
		$this->load->view('IT_postforwarddiary',$data1);
	
}

function admin_preworkforward1()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->input->post('diary_no');
		$name=$this->input->post('name');
		$this->load->model('Statemedical');
		$data1['records']=$this->Statemedical->getphoneemail1($name);
		$data1['records1']=$this->Statemedical->givemediary($diary_no);
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin();
		$this->load->view('adminheader',$data);
		$this->load->view('admin_postforwarddiary1',$data1);
		
		
	}
	
	else
	{
		$this->load->view('login');
	}
}

function workforward()
{
	if($this->session->userdata('phone'))
	{
	  $diary_no=$this->input->post('diary_no'); 
	  $name=$this->input->post('name');
	  $phone=$this->input->post('phone');
      $data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('forward_date'),"time"=>$this->input->post('forward_time'),"whom"=>$this->session->userdata('name'));
	  $data1=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('name'),"forward_time"=>$this->input->post('forward_time'),"forward_date"=>$this->input->post('forward_date'));

	  $this->load->model('Statemedical');
	  $this->Statemedical->workforward($diary_no,$name);
	  $this->Statemedical->workforward1($diary_no,$phone);
	  $this->Statemedical->adddiaryforward($data1);
	  $this->Statemedical->insertcomments($data);
	  $this->assigneddiariestables();
	}
	else{
		$this->load->view('studentlogin');
	}
}

function manager_workforward()
{
	if($this->session->userdata('email'))
	{
	  $diary_no=$this->input->post('diary_no'); 
	  $name=$this->input->post('name');
	  $phone=$this->input->post('phone');
      $data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('forward_date'),"time"=>$this->input->post('forward_time'),"whom"=>$this->session->userdata('name'));
	  $data1=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('name'),"forward_time"=>$this->input->post('forward_time'),"forward_date"=>$this->input->post('forward_date'));

	  $this->load->model('Statemedical');
	  $this->Statemedical->workforward($diary_no,$name);
	  $this->Statemedical->workforward1($diary_no,$phone);
	  $this->Statemedical->adddiaryforward($data1);
	  $this->Statemedical->insertcomments($data);
	  $this->manager_assigneddiariestables();
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function IT_workforward()
{
	
	  $diary_no=$this->input->post('diary_no'); 
	  $name=$this->input->post('name');
	  $phone=$this->input->post('phone');
      $data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('forward_date'),"time"=>$this->input->post('forward_time'),"whom"=>$this->session->userdata('name'));
	  $data1=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('name'),"forward_time"=>$this->input->post('forward_time'),"forward_date"=>$this->input->post('forward_date'));

	  $this->load->model('Statemedical');
	  $this->Statemedical->workforward($diary_no,$name);
	  $this->Statemedical->workforward1($diary_no,$phone);
	  $this->Statemedical->adddiaryforward($data1);
	  $this->Statemedical->insertcomments($data);
	  $this->manager_assigneddiariestables();
	
}

function admin_workforward()
{
	if($this->session->userdata('email'))
	{
	  $diary_no=$this->input->post('diary_no'); 
	  $name=$this->input->post('name');
	  $phone=$this->input->post('phone');
      $data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('forward_date'),"time"=>$this->input->post('forward_time'),"whom"=>$this->session->userdata('name'));
	  $data1=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('name'),"forward_time"=>$this->input->post('forward_time'),"forward_date"=>$this->input->post('forward_date'));

	  $this->load->model('Statemedical');
	  $this->Statemedical->workforward($diary_no,$name);
	  $this->Statemedical->workforward1($diary_no,$phone);
	  $this->Statemedical->adddiaryforward($data1);
	  $this->Statemedical->insertcomments($data);
	  $this->admin_assigneddiariestables();
	}
	else{
		$this->load->view('login');
	}
}

function startworking()
{
	if($this->session->userdata('phone'))
	{
		$id=$this->uri->segment('3');
		
	  	$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		
		 $this->db->set(array(
            'diary_status'=>"in_progress"
           ));
    $this->db->where('id',$id);
    $this->db->update('diaries');
	
	$data1['records']=$this->Statemedical->fetchsinglediary($id);
		
		
	   $this->load->view('studentheader',$data);
	   
	   $this->load->view('startworking',$data1);
		
	}
	else{
		$this->load->view('studentlogin');
	}
}

function manager_startworking()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
		
	  	$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		
		 $this->db->set(array(
            'diary_status'=>"in_progress"
           ));
    $this->db->where('id',$id);
    $this->db->update('diaries');
	
	$data1['records']=$this->Statemedical->fetchsinglediary($id);
		
		
	   $this->load->view('admin_managerheader',$data);
	   
	   $this->load->view('manager_startworking',$data1);
		
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function admin_startworking()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
		
	  	$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin();
		
		 $this->db->set(array(
            'diary_status'=>"in_progress"
           ));
    $this->db->where('id',$id);
    $this->db->update('diaries');
	
	$data1['records']=$this->Statemedical->fetchsinglediary($id);
		
		
	   $this->load->view('adminheader',$data);
	   
	   $this->load->view('admin_startworking',$data1);
		
	}
	else{
		$this->load->view('login');
	}
}



function submitwork()
{
	if($this->session->userdata('phone'))
	{
		$id=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getusers($phone);
		$data1['records']=$this->Statemedical->fetchsinglediary($id);
		$this->load->view('studentheader',$data);
		$this->load->view('submitwork',$data1);
	}
	else{
		$this->load->view('studentlogin');
	}
}

function manager_submitwork()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
		$data1['records']=$this->Statemedical->fetchsinglediary($id);
		$this->load->view('admin_managerheader',$data);
		$this->load->view('manager_submitwork',$data1);
	}
	else{
		$this->load->view('admin_managerlogin');
	}
}

function admin_submitwork()
{
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$phone=$this->session->userdata('phone');
		$data['records']=$this->Statemedical->getadmin();
		$data1['records']=$this->Statemedical->fetchsinglediary($id);
		$this->load->view('adminheader',$data);
		$this->load->view('admin_submitwork',$data1);
	}
	else{
		$this->load->view('login');
	}
}

function worksubmitted()
{
	if($this->session->userdata('phone'))
	{
		$diary_no=$this->input->post('diary_no');
       
	   	 $this->db->set(array(
            'end_time'=>$this->input->post('end_time'),
			'submission_date'=>$this->input->post('submission_date')
           ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diarytimecalc');
	
	 $this->db->set(array(
            'diary_status'=>"Closed"
           ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diaries');

	
	$this->assigneddiariestables();
	}
	
	else{
		$this->load->view('studentlogin');
	}
	
}

function manager_worksubmitted()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->input->post('diary_no');
       
	   	 $this->db->set(array(
            'end_time'=>$this->input->post('end_time'),
			'submission_date'=>$this->input->post('submission_date')
           ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diarytimecalc');
	
	 $this->db->set(array(
            'diary_status'=>"Closed"
           ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diaries');

	
	$this->manager_assigneddiariestables();
	}
	
	else{
		$this->load->view('admin_managerlogin');
	}
	
}

function admin_worksubmitted()
{
	if($this->session->userdata('email'))
	{
		$diary_no=$this->input->post('diary_no');
       
	   	 $this->db->set(array(
            'end_time'=>$this->input->post('end_time'),
			'submission_date'=>$this->input->post('submission_date')
           ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diarytimecalc');
	
	 $this->db->set(array(
            'diary_status'=>"Closed"
           ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diaries');

	
	$this->admin_assigneddiariestables();
	}
	
	else{
		$this->load->view('login');
	}
	
}

function checkworkinghours()
{
	
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
		$email=$this->session->userdata('email');
		
		$this->load->model('Statemedical');
		
		
		$data1['records']=$this->Statemedical->fetchtime($id);
		
		 $data['records']=$this->Statemedical->getadmin();
      $this->load->view('adminheader',$data);
		
		$this->load->view('checkdiarytime',$data1);
		
	}
	else{
		$this->load->view('login');
	}
	
}

function manager_checkworkinghours()
{
	
	if($this->session->userdata('email'))
	{
		$id=$this->uri->segment('3');
		$email=$this->session->userdata('email');
		
		$this->load->model('Statemedical');
		
		
		$data1['records']=$this->Statemedical->fetchtime($id);
		
		 $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
      $this->load->view('admin_managerheader',$data);
		
		$this->load->view('manager_checkdiarytime',$data1);
		
	}
	else{
		$this->load->view('admin_managerlogin');
	}
	
}



function biss_hours($start, $end){

    $startDate = new DateTime($start);
    $endDate = new DateTime($end);
    $periodInterval = new DateInterval( "PT1H" );

    $period = new DatePeriod( $startDate, $periodInterval, $endDate );
    $count = 0;

    foreach($period as $date){

    $startofday = clone $date;
    $startofday->setTime(00,00);

    $endofday = clone $date;
    $endofday->setTime(23,59);

        if($date > $startofday && $date <= $endofday && !in_array($date->format('l'), array('Sunday','Saturday'))){

            $count++;
        }

    }
	
	//Get seconds of Start time
	$start_d = date("Y-m-d H:00:00", strtotime($start));
	$start_d_seconds = strtotime($start_d);
	$start_t_seconds = strtotime($start);
	$start_seconds = $start_t_seconds - $start_d_seconds;
							
	//Get seconds of End time
	$end_d = date("Y-m-d H:00:00", strtotime($end));
	$end_d_seconds = strtotime($end_d);
	$end_t_seconds = strtotime($end);
	$end_seconds = $end_t_seconds - $end_d_seconds;
									
	$diff = $end_seconds-$start_seconds;
	
	if($diff!=0):
		$count--;
	endif;
		
	$total_min_sec = date('i:s',$diff);
	
	return $count .":".$total_min_sec;
}

function workhourscalculation()
{
	if($this->session->userdata('email'))
	{
		$start_date=$this->input->post('assignment_date');
		$start_time=$this->input->post('start_time');
		
		$start=$start_date." ".$start_time;
		
		$end_date=$this->input->post('submission_date');
		$end_time=$this->input->post('end_time');
		
		$end=$end_date." ".$end_time;
		
		
		
	  print "<script type=\"text/javascript\">alert('The diary was with"." ".$this->input->post('email')." "."for"." ".$this->biss_hours($start,$end)."');</script>";
	  
	  $this->diarystatus();

	
	}
	else{
		$this->load->view('login');
	}
	
}

function manager_workhourscalculation()
{
	if($this->session->userdata('email'))
	{
		$start_date=$this->input->post('assignment_date');
		$start_time=$this->input->post('start_time');
		
		$start=$start_date." ".$start_time;
		
		$end_date=$this->input->post('submission_date');
		$end_time=$this->input->post('end_time');
		
		$end=$end_date." ".$end_time;
		
		
		
	  print "<script type=\"text/javascript\">alert('The diary was with"." ".$this->input->post('email')." "."for"." ".$this->biss_hours($start,$end)."');</script>";
	  
	  $this->manager_diarystatus();

	
	}
	else{
		$this->load->view('admin_managerlogin');
	}
	
}

public function diaries_page()
     {
           // POST data
	 $postData = $this->input->post();
	 
	 $this->load->model('Statemedical');

     // Get data
     $data = $this->Statemedical->getDiaries($postData);

     echo json_encode($data);
	 
	}


	public function userdiaries_page()
     {
		 $phone=$this->uri->segment('3');

           // POST data
	 $postData = $this->input->post();
	 
	 $this->load->model('Statemedical');

     // Get data
     $data = $this->Statemedical->usergetDiaries($postData,$phone);

     echo json_encode($data);
     }
	 
	 public function userdiarieshistory_page()
     {
			 $phone=$this->uri->segment('3');

           // POST data
	 $postData = $this->input->post();
	 
	 $this->load->model('Statemedical');

     // Get data
     $data = $this->Statemedical->usergetHistory($postData,$phone);

     echo json_encode($data);
     }
	 
	 
	 	 public function ITdiarieshistory_page()
     {
			 $phone=$this->uri->segment('3');

           // POST data
	 $postData = $this->input->post();
	 
	 $this->load->model('Statemedical');

     // Get data
     $data = $this->Statemedical->ITgetHistory($postData,$phone);

     echo json_encode($data);
     }
	 
	  	 public function Secretarydiarieshistory_page()
     {
			 $phone=$this->uri->segment('3');

           // POST data
	 $postData = $this->input->post();
	 
	 $this->load->model('Statemedical');

     // Get data
     $data = $this->Statemedical->ITgetHistory($postData,$phone);

     echo json_encode($data);
     }
	 


	 
	 public function diaries_page1()
	 {
		       // POST data
	 $postData = $this->input->post();
	 
	 $this->load->model('Statemedical');

     // Get data
     $data = $this->Statemedical->getDiaries1($postData);

     echo json_encode($data);
	 }
	 
	 function writecomment()
	 {
		 if($this->session->userdata('phone'))
		 {
			 $id=$this->uri->segment('3');
			 $phone=$this->session->userdata('phone');
			 $this->load->model('Statemedical');
		     $data['records']=$this->Statemedical->getusers($phone);
			 $data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $data1['records1']=$this->Statemedical->fetcheverycomment($id);
			 $this->load->view('studentheader',$data);
			 $this->load->view('writecomment',$data1);
		 }
		 else
		 {
			$this->load->view('studentlogin'); 
		 }
	 }
	 
	  function manager_writecomment()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			 $phone=$this->session->userdata('phone');
			 $this->load->model('Statemedical');
		     $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			 $data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $data1['records1']=$this->Statemedical->fetcheverycomment($id);
			 $this->load->view('admin_managerheader',$data);
			 $this->load->view('writecomment',$data1);
		 }
		 else
		 {
			$this->load->view('admin_managerlogin'); 
		 }
	 }
	 
	 
	   function IT_writecomment()
	 {
		 
			 $id=$this->uri->segment('3');
			 $phone=$this->session->userdata('phone');
			 $this->load->model('Statemedical');
		     $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			 $data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $data1['records1']=$this->Statemedical->fetcheverycomment($id);
			 $this->load->view('admin_managerheader',$data);
			 $this->load->view('ITwritecomment',$data1);
		
	 }
	 
	   function admin_writecomment()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			 $phone=$this->session->userdata('phone');
			 $this->load->model('Statemedical');
		     $data['records']=$this->Statemedical->getadmin();
			 $data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $data1['records1']=$this->Statemedical->fetcheverycomment($id);
			 $this->load->view('adminheader',$data);
			 $this->load->view('writecomment2',$data1);
		 }
		 else
		 {
			$this->load->view('login'); 
		 }
	 }
	 
	 function writecomment1()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			$this->load->model('Statemedical');
	        $data['records']=$this->Statemedical->getadmin();
			$data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $data1['records1']=$this->Statemedical->fetcheverycomment($id);
			$this->load->view('adminheader',$data);
			$this->load->view('writecomment1',$data1);
			
		 }
		 
		 else
		 {
			$this->load->view('login');
		 }	
	 }
	 
	  function manager_writecomment1()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			$this->load->model('Statemedical');
	        $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			$data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $data1['records1']=$this->Statemedical->fetcheverycomment($id);
			$this->load->view('admin_managerheader',$data);
			$this->load->view('manager_writecomment1',$data1);
			
		 }
		 
		 else
		 {
			$this->load->view('admin_managerlogin');
		 }	
	 }
	 
	 function commentsubmit()
	 {
		if($this->session->userdata('phone'))
		{
			$diary_no=$this->uri->segment('3');
			$data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"whom"=>$this->session->userdata('name'));

	        $this->load->model('Statemedical');
			$this->Statemedical->insertcomments($data);
			$this->writecomment();
			
		}
         else
		 {
			$this->load->view('studentlogin'); 
		 }		
	 }
	 
	 
	  function ITcommentsubmit()
	 {
		
			$diary_no=$this->uri->segment('3');
			$data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"whom"=>$this->session->userdata('name'));

	        $this->load->model('Statemedical');
			$this->Statemedical->insertcomments($data);
			$this->IT_writecomment();
				
	 }
	 
	  function admin_commentsubmit()
	 {
		if($this->session->userdata('email'))
		{
			$diary_no=$this->uri->segment('3');
			$data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"whom"=>$this->session->userdata('name'));

	        $this->load->model('Statemedical');
			$this->Statemedical->insertcomments($data);
			$this->admin_writecomment();
			
		}
         else
		 {
			$this->load->view('login'); 
		 }		
	 }
	 
	 	 function commentsubmit1()
	 {
		if($this->session->userdata('email'))
		{
			$diary_no=$this->uri->segment('3');
			$data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"whom"=>$this->session->userdata('name'));

	        $this->load->model('Statemedical');
			$this->Statemedical->insertcomments($data);
			$this->writecomment1();
			
		}
         else
		 {
			$this->load->view('studentlogin'); 
		 }		
	 }
	 
	 	 function manager_commentsubmit1()
	 {
		if($this->session->userdata('email'))
		{
			$diary_no=$this->uri->segment('3');
			$data=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments'),"date"=>$this->input->post('date'),"time"=>$this->input->post('time'),"whom"=>$this->session->userdata('name'));

	        $this->load->model('Statemedical');
			$this->Statemedical->insertcomments($data);
			$this->manager_writecomment1();
			
		}
         else
		 {
			$this->load->view('admin_managerlogin'); 
		 }		
	 }
	 
	 
	 function Checkdiaryreport()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			 //echo $id;
			$this->load->model('Statemedical');
	        $data['records']=$this->Statemedical->getadmin();
			$data1['records']=$this->Statemedical->getdiaryforward($id);
			$data1['records1']=$this->Statemedical->getdiarycomments($id);
			
			
            $this->load->view('adminheader',$data);
			$this->load->view('diaryreport',$data1);
		 }
		 else
		 {
			$this->load->view('login');
		 }	
	 }
	 
	  function Checkdiaryreport_second()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			 //echo $id;
			$this->load->model('Statemedical');
	        $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			$data1['records']=$this->Statemedical->getdiaryforward($id);
			$data1['records1']=$this->Statemedical->getdiarycomments($id);
			
			
            $this->load->view('admin_managerheader',$data);
			$this->load->view('diaryreport',$data1);
		 }
		 else
		 {
			$this->load->view('admin_managerlogin');
		 }	
	 }
	 
	  function manager_Checkdiaryreport()
	 {
		 if($this->session->userdata('email'))
		 {
			 $id=$this->uri->segment('3');
			 //echo $id;
			$this->load->model('Statemedical');
	        $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
			$data1['records']=$this->Statemedical->getdiaryforward($id);
			$data1['records1']=$this->Statemedical->getdiarycomments($id);
			
			
            $this->load->view('admin_managerheader',$data);
			$this->load->view('diaryreport',$data1);
		 }
		 else
		 {
			$this->load->view('admin_managerlogin');
		 }	
	 }
	 
	 function studentadddiary()
	 {
		 if($this->session->userdata('phone'))
		 {
			$this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
			$data1['bb']=$this->Statemedical->getusers($phone);
			$data1['records1']=$this->Statemedical->fetchdate();
			$data1['records']=$this->Statemedical->viewuser();
			 $data1['country'] = $this->Statemedical->fetch_diarytype();
	        $this->load->view('studentheader',$data);
			$this->load->view('studenttowhom',$data1);
			
			//$this->load->view('studentadddiary',$data1, array('error' => ' ' ));  
		 }
		 
		 else
		 {
			$this->load->view('studentlogin'); 
		 }	
	 }
	 
	  function adminmanager_adddiary()
	 {
		 if($this->session->userdata('phone'))
		 {
			$this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone);
			$data1['bb']=$this->Statemedical->getusers($phone);
			$data1['records1']=$this->Statemedical->fetchdate();
			$data1['records']=$this->Statemedical->viewAdmin_manager();
			 $data1['country'] = $this->Statemedical->fetch_diarytype();
	        $this->load->view('studentheader',$data);
			$this->load->view('studenttowhom1',$data1);
			
			//$this->load->view('studentadddiary',$data1, array('error' => ' ' ));  
		 }
		 
		 else
		 {
			$this->load->view('studentlogin'); 
		 }	
	 }
	 
	
	 
 function adddiarydo1()
   {
 
	//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
	 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"isapprove"=>1,"receiving_category"=>$this->input->post('receiving_category'));
  
if($diary_type == "Despatch")
{
	$var1=$this->input->post('ref_rec_no');
	if(!empty($var1))
		 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"isapprove"=>1,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
    
	if(empty($var1))
	 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"isapprove"=>1);

}

     
	 $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	 
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>null,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));

	 $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   	   $this->Statemedical->adddiaryfiles($data4);
	
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
		  $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"isapprove"=>1,"receiving_category"=>$this->input->post('receiving_category'));
	  
	   if($diary_type == "Despatch")
	   {
		   $var1=$this->input->post('ref_rec_no');
	       if(!empty($var1))
		   $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"isapprove"=>1,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
		   
	     if(empty($var1))
		 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"isapprove"=>1);

	   }

      
	  $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	 
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>$fn,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));

	 $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   	   $this->Statemedical->adddiaryfiles($data4);
}
		


	  
      print "<script type=\"text/javascript\">alert('Record successfully stored.Diary number:".$this->input->post('diary_no')."');</script>";
	  $type=$this->input->post('diary_type');
	  if($type == "Receiving")
	  {
		 $this->db->query("UPDATE sequence SET sequence_no=sequence_no+1"); 
	  }
	  else{
		 $this->db->query("UPDATE sequence1 SET sequence_no=sequence_no+1");  
	  }
     $this->studentadddiary();  
   }
   
    function adddiarydo1_manager()
   {
 
	//the document upload script
$binod=array(

'upload_path'=>'./uploads',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
	 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"isapprove"=>1,"receiving_category"=>$this->input->post('receiving_category'));
  
if($diary_type == "Despatch")
{
	$var1=$this->input->post('ref_rec_no');
	if(!empty($var1))
		 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"isapprove"=>1,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
    
	if(empty($var1))
	 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>null,"isapprove"=>1);

}

     
	 $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	 
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>null,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));

	 $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   	   $this->Statemedical->adddiaryfiles($data4);
	
}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	
	$diary_type=$this->input->post('diary_type');
	
	if($diary_type == "Receiving")
		  $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"isapprove"=>1,"receiving_category"=>$this->input->post('receiving_category'));
	  
	   if($diary_type == "Despatch")
	   {
		   $var1=$this->input->post('ref_rec_no');
	       if(!empty($var1))
		   $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"isapprove"=>1,"ref_receiving_no"=>$this->input->post('ref_rec_no'));
		   
	     if(empty($var1))
		 $data=array("assignment_date"=>$this->input->post('date')." "."at"." ".$this->input->post('incoming_time'),"whom"=>$this->input->post('whom'),"subject"=>$this->input->post('subject'),"from_whom"=>$this->input->post('from_whom'),"generator_phone"=>$this->session->userdata('phone'),"phone"=>$this->input->post('phone'),"email"=>$this->input->post('email'),"receive_mode"=>$this->input->post('receive_mode'),"diary_type"=>$this->input->post('diary_type'),"comments"=>$this->input->post('comments'),"diary_no"=>$this->input->post('diary_no'),"file_no"=>$this->input->post('file_no'),"diary_status"=>"Open","file_name"=>$fn,"isapprove"=>1);

	   }

      
	  $data1=array("diary_no"=>$this->input->post('diary_no'),"email"=>$this->input->post('whom'),"incoming_time"=>$this->input->post('incoming_time'),"assignment_date"=>$this->input->post('date'));

$data2=array("diary_no"=>$this->input->post('diary_no'),"forwarded_to"=>$this->input->post('whom'),"forward_time"=>$this->input->post('incoming_time'),"forward_date"=>$this->input->post('date'));
$data3=array("diary_no"=>$this->input->post('diary_no'),"comments"=>$this->input->post('comments')." "."from"." ".$this->input->post('from_whom'),"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'),"whom"=>$this->input->post('from_whom'));
	 
	  $data4=array("diary_no"=>$this->input->post('diary_no'),"file_name"=>$fn,"date"=>$this->input->post('date'),"time"=>$this->input->post('incoming_time'));

	 $this->load->model('Statemedical');
      $this->Statemedical->adddiary($data);
	  $this->Statemedical->adddiarytime($data1);
	  $this->Statemedical->adddiaryforward($data2);
	   $this->Statemedical->adddiarycomments($data3);
	   	   $this->Statemedical->adddiaryfiles($data4);
}
		


	  
      print "<script type=\"text/javascript\">alert('Record successfully stored.Diary number:".$this->input->post('diary_no')."');</script>";
	  $type=$this->input->post('diary_type');
	  if($type == "Receiving")
	  {
		 $this->db->query("UPDATE sequence SET sequence_no=sequence_no+1"); 
	  }
	  else{
		 $this->db->query("UPDATE sequence1 SET sequence_no=sequence_no+1");  
	  }
     $this->adminmanager_adddiary();  
   }
   
   function diaryapproval()
   {
	   if($this->session->userdata('email')) 
	   {
		  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin();
	  $data1['records']=$this->Statemedical->fetchdiaries1();
	   $this->load->view('adminheader',$data);
	   $this->load->view('diaryapprove',$data1);
	  
	   }
	   
	   else
	  {
	   $this->load->view('login');
  
	  }	
   }
   
   function userdelete(){
	   if($this->session->userdata('email')) {
		   $id=$this->uri->segment('3');
		   $this->load->model('Statemedical');
		   $this->Statemedical->userdelete($id);
		   $this->viewusers();
		   
	   }
	     else
	  {
	   $this->load->view('login');
  
	  }
   }
   
     function ITcelluserdelete(){
		   $id=$this->uri->segment('3');
		   $this->load->model('Statemedical');
		   $this->Statemedical->userdelete($id);
		   $this->manager_viewusers();
		
   }
   
   function ITdelete(){
	 
		   $id=$this->uri->segment('3');
		   $this->load->model('Statemedical');
		   $this->Statemedical->ITdelete($id);
		   $this->viewAdmin_manager();
		   
	 
   }
   
     function Managerdiaryapproval()
   {
	   if($this->session->userdata('email')) 
	   {
		  $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
	  $data1['records']=$this->Statemedical->fetchdiaries1();
	   $this->load->view('admin_managerheader',$data);
	   $this->load->view('Managerdiaryapprove',$data1);
	  
	   }
	   
	   else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }	
   }
   
   function editfiledo()
   {
	   $diary_no=$this->uri->segment('3');
	   $this->load->model('Statemedical');
	   $data1['records']=$this->Statemedical->givemediary($diary_no);
	    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone); 
			$this->load->view('studentheader',$data);
			$this->load->view('editfiledo',$data1);
	   
   }
   
     function manager_editfiledo()
   {
	   $diary_no=$this->uri->segment('3');
	   $this->load->model('Statemedical');
	   $data1['records']=$this->Statemedical->givemediary($diary_no);
	    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			$this->load->view('admin_managerheader',$data);
			$this->load->view('manager_editfiledo',$data1);
	   
   }
   
        function admin_editfiledo()
   {
	   $diary_no=$this->uri->segment('3');
	   $this->load->model('Statemedical');
	   $data1['records']=$this->Statemedical->givemediary($diary_no);
	    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin(); 
			$this->load->view('adminheader',$data);
			$this->load->view('admin_editfiledo',$data1);
	   
   }
   
   function finaleditfileno()
   {
	   $diary_no=$this->input->post('diary_no');
	    $file_no=$this->input->post('file_no');
		$this->load->model('Statemedical');
		 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone); 
			$this->Statemedical->finaleditfileno($diary_no,$file_no); 
			
			$data1['records']=$this->Statemedical->pickfileno($diary_no);
			
			$this->load->view('studentheader',$data);
			
			$this->load->view('editfileno',$data1);
	
   }
   
   function manager_finaleditfileno()
   {
	   $diary_no=$this->input->post('diary_no');
	    $file_no=$this->input->post('file_no');
		$this->load->model('Statemedical');
		 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			$this->Statemedical->finaleditfileno($diary_no,$file_no); 
			
			$data1['records']=$this->Statemedical->pickfileno($diary_no);
			
			$this->load->view('admin_managerheader',$data);
			
			$this->load->view('manager_editfileno',$data1);
	
   }
   
      function admin_finaleditfileno()
   {
	   $diary_no=$this->input->post('diary_no');
	    $file_no=$this->input->post('file_no');
		$this->load->model('Statemedical');
		 $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin(); 
			$this->Statemedical->finaleditfileno($diary_no,$file_no); 
			
			$data1['records']=$this->Statemedical->pickfileno($diary_no);
			
			$this->load->view('adminheader',$data);
			
			$this->load->view('admin_editfileno',$data1);
	
   }
   
 function editfileno()
{
	$diary_no=$this->uri->segment('3');
	$this->load->model('Statemedical');
	$data1['records']=$this->Statemedical->pickfileno($diary_no);
	$phone=$this->session->userdata('phone');
	$data['records']=$this->Statemedical->getusers($phone);
	$this->load->view('studentheader',$data);
	$this->load->view('editfileno',$data1);
	
}

function manager_editfileno()
{
	$diary_no=$this->uri->segment('3');
	$this->load->model('Statemedical');
	$data1['records']=$this->Statemedical->pickfileno($diary_no);
	$phone=$this->session->userdata('phone');
	$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
	$this->load->view('admin_managerheader',$data);
	$this->load->view('manager_editfileno',$data1);
	
}

function admin_editfileno()
{
	$diary_no=$this->uri->segment('3');
	$this->load->model('Statemedical');
	$data1['records']=$this->Statemedical->pickfileno($diary_no);
	$phone=$this->session->userdata('phone');
	$data['records']=$this->Statemedical->getadmin();
	$this->load->view('adminheader',$data);
	$this->load->view('admin_editfileno',$data1);
	
}
   
   function docapprove()
   {
	  if($this->session->userdata('email'))
	  {
		  $diary_no=$this->uri->segment('3');
		 $this->load->model('Statemedical');
	  $data['records']=$this->Statemedical->getadmin(); 
	  $data1['records']=$this->Statemedical->givemediary($diary_no); 
	  $this->load->view('adminheader',$data);
	  $this->load->view('docapprove',$data1);
	  
	  }
      else
	  {
	   $this->load->view('login');
  
	  }		  
   }
   
   function diarydisapprove()
   {
	   if($this->session->userdata('email')) 
	   {
		 $id=$this->uri->segment('3');
		 $this->load->model('Statemedical');
		 $this->Statemedical->diarydisapprove($id);
		 $this->diaryapproval();
		 
	     
	   }
	    else
	  {
	   $this->load->view('login');
  
	  }	
	   
   }
   
    function diaryapprove()
   {
	   if($this->session->userdata('email')) 
	   {
		 $id=$this->uri->segment('3');
		 $this->load->model('Statemedical');
		 $this->Statemedical->diaryapprove($id);
		 $this->diaryapproval();
		 
	     
	   }
	    else
	  {
	   $this->load->view('login');
  
	  }	
	   
   }
   
   function uploaddocs()
   {
	  if($this->session->userdata('phone'))
	  {
		    $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getusers($phone); 
			$data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			$this->load->view('studentheader',$data);
			$this->load->view('uploaddocs',$data1);
	  }
	  
	  else
		 {
			$this->load->view('studentlogin'); 
		 }	
	  
  
   }
   
      function manager_uploaddocs()
   {
	  if($this->session->userdata('email'))
	  {
		    $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			$data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			$this->load->view('admin_managerheader',$data);
			$this->load->view('manager_uploaddocs',$data1);
	  }
	  
	  else
		 {
			$this->load->view('admin_managerlogin'); 
		 }	
	  
  
   }
   
   function admin_uploaddocs()
   {
	  if($this->session->userdata('email'))
	  {
		    $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
		    $phone=$this->session->userdata('phone'); 
			$data['records']=$this->Statemedical->getadmin(); 
			$data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			$this->load->view('adminheader',$data);
			$this->load->view('admin_uploaddocs',$data1);
	  }
	  
	  else
		 {
			$this->load->view('login'); 
		 }	
	  
  
   }
   
   function adminuploaddocs()
   {
	   if($this->session->userdata('email')) 
	   {
		   $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin(); 
			 $data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $this->load->view('adminheader',$data);
			 $this->load->view('adminuploaddocs',$data1);
	   }
	    else
	  {
	   $this->load->view('login');
  
	  }	
	   
   }
   
     function manager_adminuploaddocs()
   {
	   if($this->session->userdata('email')) 
	   {
		   $id=$this->uri->segment('3');
		    $this->load->model('Statemedical');
			 $data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			 $data1['records']=$this->Statemedical->fetchsinglediarybynumber($id);
			 $this->load->view('admin_managerheader',$data);
			 $this->load->view('manager_adminuploaddocs',$data1);
	   }
	    else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }	
	   
   }
  

   
   function checkDiaryNo()
   {
	     $diary_no=$this->input->post('diary_no');
    //$email=$this->input->post('email');
	
	$this->load->model('Statemedical');
    
    $result=$this->Statemedical->checkDiaryNo($diary_no);
    if($result)
    {
    echo  1;  
    }
    else
    {
    echo  0;  
    }
   }
   
   function deletedocs()
   {
	   if($this->session->userdata('email'))
	   {
		   $diary_no=$this->uri->segment('3');
		   $file_name=$this->uri->segment('4');
		   
		   $this->load->model('Statemedical');
		   $this->Statemedical->deletedocs($diary_no,$file_name);
		   
		   $this->admincheckdocs();
		 
	   }
	   
	    else
	  {
	   $this->load->view('login');
  
	  }	
	   
   }
   
      function manager_deletedocs()
   {
	   if($this->session->userdata('email'))
	   {
		   $diary_no=$this->uri->segment('3');
		   $file_name=$this->uri->segment('4');
		   
		   $this->load->model('Statemedical');
		   $this->Statemedical->deletedocs($diary_no,$file_name);
		   
		   $this->manager_admincheckdocs();
		 
	   }
	   
	    else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }	
	   
   }
   
   function entirediaryreport()
   {
	   if($this->session->userdata('email'))
	   {
		    $id=$this->uri->segment('3');
			$this->load->model('Statemedical');
			$data['records']=$this->Statemedical->getadmin(); 
			$data1['records']=$this->Statemedical->getdiaryforward($id);
			$data1['records1']=$this->Statemedical->getdiarycomments($id);
			$data1['records2']=$this->Statemedical->getdiarydocs($id);
			$data1['records3']=$this->Statemedical->pickstartenddates($id);
			$data1['records4']=$this->Statemedical->pickdiary($id);
			$this->load->view('adminheader',$data);
			$this->load->view('diaryreport1',$data1);
	   }
	   
	  else
	  {
	   $this->load->view('login');
  
	  }	
   }
   
      function manager_entirediaryreport()
   {
	   if($this->session->userdata('email'))
	   {
		    $id=$this->uri->segment('3');
			$this->load->model('Statemedical');
			$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
			$data1['records']=$this->Statemedical->getdiaryforward($id);
			$data1['records1']=$this->Statemedical->getdiarycomments($id);
			$data1['records2']=$this->Statemedical->getdiarydocs($id);
			$data1['records3']=$this->Statemedical->pickstartenddates($id);
			$data1['records4']=$this->Statemedical->pickdiary($id);
			$this->load->view('admin_managerheader',$data);
			$this->load->view('diaryreport1',$data1);
	   }
	   
	  else
	  {
	   $this->load->view('admin_managerlogin');
  
	  }	
   }
   
   public function get_excel_report()
   {
	  
	   $this->db->select('assignment_date, whom, subject, from_whom, receive_mode, diary_type, diary_no, file_no, diary_status');
	   
	   $this->db->where('diary_type',"Receiving");
	   $this->db->where('isapprove',0);

      
       $result = $this->db->get('diaries')->result_array();
	   
	   $timestamp = time();
	   $filename = 'Export_excel_' . $timestamp . '.xls';
	   
	   header("Content-Type: application/vnd.ms-excel");
	   header("Content-Disposition: attachment; filename=\"$filename\"");
	   
	   $isPrintHeader = false;
	   foreach ($result as $row){
		   if(!$isPrintHeader){
			   echo implode("\t", array_keys($row)) . "\n";
			   $isPrintHeader = true;
		   }
		   echo implode("\t", array_values($row)) . "\n";
		   
	   }
	   exit();
   }
   
      public function get_excel_report1()
   {
	  
	   $this->db->select('assignment_date, whom, subject, from_whom, receive_mode, diary_type, diary_no, file_no, diary_status');
	   
	   $this->db->where('diary_type',"Despatch");
	   $this->db->where('isapprove',0);

      
       $result = $this->db->get('diaries')->result_array();
	   
	   $timestamp = time();
	   $filename = 'Export_excel_' . $timestamp . '.xls';
	   
	   header("Content-Type: application/vnd.ms-excel");
	   header("Content-Disposition: attachment; filename=\"$filename\"");
	   
	   $isPrintHeader = false;
	   foreach ($result as $row){
		   if(!$isPrintHeader){
			   echo implode("\t", array_keys($row)) . "\n";
			   $isPrintHeader = true;
		   }
		   echo implode("\t", array_values($row)) . "\n";
		   
	   }
	   exit();
   }
   
   
     function chat(){
    $id=$this->session->userdata('email');
    $query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
    $query2=$this->db->get_where("messages",array('email'=>$id));
    $data2['records1']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->result();
	
	$this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data);
    $this->load->view('chat',$data2);
   
  }
  
  function chatbegin()
  {
	   $query2=$this->db->get("users");
       $data2['records2']=$query2->result();
	   
	   $this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data);
	
	$this->load->view('chatdummy',$data2);
	   
	   
	  
  }
  
  
   function chatadmintomgr()
  {
	   $query2=$this->db->get("admin_manager");
       $data2['records2']=$query2->result();
	   
	   $this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data);
	
	$this->load->view('chatadmintomgr',$data2);
	   
	   
	  
  }
  
   function manager_chatbegin()
  {
	   $query2=$this->db->get("users");
       $data2['records2']=$query2->result();
	   
	   $this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
    $this->load->view('admin_managerheader',$data);
	
	$this->load->view('manager_chatdummy',$data2);
	   
	   
	  
  }
  
     function IT_chatbegin()
  {
	  $email=$this->session->userdata('email');
	  
	  $this->db->where('email!=',$email);
	   $query2=$this->db->get("admin_manager");
       $data2['records2']=$query2->result();
	   
	   $this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email'));
    $this->load->view('admin_managerheader',$data);
	
	$this->load->view('IT_chatdummy',$data2);
	   
	   
	  
  }
  
  function show_customers()
  {
	  $phone=$this->session->userdata('phone');
	  $this->load->model('Statemedical');
	  $data=$this->Statemedical->fetchnotifications($phone);
	  
	  if(count($data) != 0)
	   echo count($data)." "."new messages from Secretary Sir";
	   
	   else
	   echo "No New Messages from Secretary,SMFWB";
	  
  }
  
  
    function giveadminmessages()
  {
	  $email=$this->session->userdata('email');
	  $this->load->model('Statemedical');
	  $data=$this->Statemedical->giveadminmessages($email);
	  
	  if(count($data) != 0)
	   echo count($data)." "."new messages from Secretary Sir";
	   
	   else
	   echo "No New Messages from Secretary,SMFWB";
	  
  }
  
  function change_notifications()
  {
	  $phone=$this->session->userdata('phone');
	  $this->load->model('Statemedical');
	  $data=$this->Statemedical->changenotifications($phone);
	  
  }
  
  function show_adminmessages()
  {
	  $email=$this->session->userdata('email');
	  $this->load->model('Statemedical');
	  $data=$this->Statemedical->show_adminmessages($email);
	  
	  if(count($data) != 0)
	  echo count($data)." "."new messages";
	  
	  else
	  echo "No New Messages";
	  
  }
  
  function show_adminmessages1()
  {
	  $email=$this->session->userdata('email');
	  $this->load->model('Statemedical');
	  $data1['records']=$this->Statemedical->viewuser();
	  
	  foreach($data1['records'] as $row){
		   $phone=$row->phone;
		 $data=$this->Statemedical->show_adminmessages1($email,$phone);
		 if(count($data)!=0)
		 echo nl2br ("\n".count($data)." "."new messages from"." ".$row->name);
		 
	  }
  }
  
  
    function show_adminmessages2()
  {
	  $email=$this->session->userdata('email');
	  $this->load->model('Statemedical');
	  $data1['records']=$this->Statemedical->viewAdmin_manager();
	  
	  foreach($data1['records'] as $row){
		   $email1=$row->email;
		 $data=$this->Statemedical->show_adminmessages2($email,$email1);
		 if(count($data)!=0)
		 echo nl2br ("\n".count($data)." "."new messages from"." ".$row->name);
		 
	  }
  }
  
  function show_usermessages()
  {
	  $phone=$this->session->userdata('phone');
	   $this->load->model('Statemedical');
	  $data1['records']=$this->Statemedical->viewuser();
	  
	    foreach($data1['records'] as $row){
		   $phone1=$row->phone;
		 $data=$this->Statemedical->show_usermessages($phone,$phone1);
		 if(count($data)!=0)
		 echo nl2br ("\n".count($data)." "."new messages from"." ".$row->name);
		 
	  }
  }
  
    function show_mgrmessages()
  {
	  $phone=$this->session->userdata('phone');
	   $this->load->model('Statemedical');
	  $data1['records']=$this->Statemedical->viewAdmin_manager();
	  
	    foreach($data1['records'] as $row){
		   $email=$row->email;
		 $data=$this->Statemedical->show_mgrmessages($phone,$email);
		 if(count($data)!=0)
		 echo nl2br ("\n".count($data)." "."new messages from"." ".$row->name);
	  
	  }
  }
  
    function show_mgrUsermessages()
  {
	  $email=$this->session->userdata('email');
	   $this->load->model('Statemedical');
	  $data1['records']=$this->Statemedical->viewuser();
	  
	    foreach($data1['records'] as $row){
		   $phone=$row->phone;
		 $data=$this->Statemedical->show_mgrmessages($email,$phone);
		 if(count($data)!=0)
		 echo nl2br ("\n".count($data)." "."new messages from"." ".$row->name);
	  
	  }
  }
  
      function show_ITmessages()
  {
	  $email=$this->session->userdata('email');
	   $this->load->model('Statemedical');
	  $data1['records']=$this->Statemedical->viewAdmin_manager();
	  
	    foreach($data1['records'] as $row){
		   $email1=$row->email;
		 $data=$this->Statemedical->show_ITmessages($email,$email1);
		 if(count($data)!=0)
		 echo nl2br ("\n".count($data)." "."new messages from"." ".$row->name);
	  
	  }
  }
  
    function chatbegin1()
  {
	  $phone = $this->session->userdata('phone');
	 $this->load->model('Statemedical');
     $phone=$this->session->userdata('phone'); 
	 $data['records']=$this->Statemedical->getusers($phone);
	 
	 $this->db->where('phone',$phone);
	 $query2=$this->db->get("messages");
    $data2['records1']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->row();
	
	 $this->load->view('studentheader',$data);
	 $this->load->view('chatuser',$data2);
	  
  }
  
  function chatbegin2(){
	   $email = $this->session->userdata('email');
	 $this->load->model('Statemedical');
    $email = $this->session->userdata('email');
	 $data['records']=$this->Statemedical->getadmin_manager($email);
	 
	 $this->db->where('it_email',$email);
	 $query2=$this->db->get("messages1");
    $data2['records1']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->row();
	
	  $email1=$data2['records3']->email;
	  $this->Statemedical->fucktheworld($email,$email1);
	 
	 $this->load->view('admin_managerheader',$data);
	 $this->load->view('chatmanager',$data2);
  }
  
       function chat1(){
    $id=$this->session->userdata('email');
    $query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
    $query2=$this->db->get_where("messages",array('email'=>$id));
    $data2['records1']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->result();
	
	$this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data);
    $this->load->view('chat1',$data2);
   
  }
  
    function dochat1(){
		$phone=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$data2['records']=$this->Statemedical->pickmsgbyphone($phone);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		$this->Statemedical->changeusernotifications($phone);
		
		
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data1);
	
	 $this->load->view('chat1',$data2);
	
  }
  
     function dochatadmintomgr(){
		$email=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$data2['records']=$this->Statemedical->pickmsgbyemail($email);
		$data2['bb']=$this->Statemedical->getadmin_manager($email);
		
		$this->Statemedical->changeadmin_mgrnotifications($email);
		
		
		$query2=$this->db->get("admin_manager");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data1);
	
	 $this->load->view('chatadmintomanager',$data2);
	
  }
  
      function manager_dochat1(){
		$phone=$this->uri->segment('3');
		$email=$this->session->userdata('email');
		$this->load->model('Statemedical');
		$data2['records']=$this->Statemedical->pickmgr_msg($phone,$email);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		$this->Statemedical->unsetmanagerUsernotification($phone,$email);
		
		
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin_manager");
    $data2['records3']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
    $this->load->view('admin_managerheader',$data1);
	
	 $this->load->view('manager_chat1',$data2);
	
  }
  
  
        function IT_dochat1(){
		$email=$this->uri->segment('3');
		$email1=$this->session->userdata('email');
		$this->load->model('Statemedical');
		$data2['records']=$this->Statemedical->pickIT_msg($email,$email1);
		$data2['bb']=$this->Statemedical->getadmin_manager($email);
		
		$this->Statemedical->unsetITnotification($email,$email1);
		
		
		
	 $this->db->where('email!=',$email1);
	$query3=$this->db->get("admin_manager");
    $data2['records2']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
    $this->load->view('admin_managerheader',$data1);
	
	 $this->load->view('ITchat1',$data2);
	
  }
  
  function userdochat1()
  {
	  $id=$this->session->userdata('phone');
	    $phone=$this->uri->segment('3');
		$this->load->model('Statemedical');
		$data2['records']=$this->Statemedical->pickusermsgbyphone($phone,$id);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		
		$this->Statemedical->unsetusernotification($phone,$id);
		
		$this->db->where('phone!=',$id);
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	
	$data['records']=$this->Statemedical->getusers($id);
	$this->load->view('studentheader',$data);
	$this->load->view('userchat1',$data2);
	  
  }
  
   function userdochat2()
  {
	  $id=$this->session->userdata('phone');
	  
	  $email=$this->uri->segment('3');
	    
		$this->load->model('Statemedical');
		$data2['records']=$this->Statemedical->pickmgr_msg($id,$email);
		$data2['bb']=$this->Statemedical->getadmin_manager($email);
		
		$this->Statemedical->unsetmanagernotification($id,$email);
		
		
		$query2=$this->db->get("admin_manager");
    $data2['records2']=$query2->result();
	
	
	$data['records']=$this->Statemedical->getusers($id);
	$this->load->view('studentheader',$data);
	$this->load->view('userchat2',$data2);
	  
  }
  
    function dochat(){
		$binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'email'=>$this->session->userdata('email'),'time' =>$time->format('H:i'),"isapprove"=>1,"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'email'=>$this->session->userdata('email'),'time' =>$time->format('H:i'),"isapprove"=>1,"file_name"=>$fn,"notification"=>0);

	
}
	 
    $this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addchat($data); 
	
	$phone = $this->input->post('cat_id');
	
	$data2['records']=$this->Statemedical->pickmsgbyphone($phone);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data1);
	
	 $this->load->view('chat1',$data2);
	
  }
  
  
   function dochatpermanent(){
		$binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("it_email"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'admin_email'=>$this->session->userdata('email'),'time' =>$time->format('H:i'),"isapprove"=>1,"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("it_email"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'admin_email'=>$this->session->userdata('email'),'time' =>$time->format('H:i'),"isapprove"=>1,"file_name"=>$fn,"notification"=>0);

	
}
	 
    $this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addmanagerchat($data); 
	
	$email = $this->input->post('cat_id');
	
	$data2['records']=$this->Statemedical->pickmsgbyemail($email);
		$data2['bb']=$this->Statemedical->getadmin_manager($email);
		
		$query2=$this->db->get("admin_manager");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin(); 
    $this->load->view('adminheader',$data1);
	
	 $this->load->view('chatadmintomanager',$data2);
	
  }
  
    function manager_dochat(){
		$binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf',
'max_size'=>4000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'email'=>$this->session->userdata('email'),'time' =>$time->format('H:i'),"isapprove"=>1,"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'email'=>$this->session->userdata('email'),'time' =>$time->format('H:i'),"isapprove"=>1,"file_name"=>$fn,"notification"=>0);

	
}
	 
    $this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addchat($data); 
	
	$phone = $this->input->post('cat_id');
	
	$data2['records']=$this->Statemedical->pickmsgbyphone($phone);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin_manager");
    $data2['records3']=$query3->result();
	
	$data1['records']=$this->Statemedical->getadmin_manager($this->session->userdata('email')); 
    $this->load->view('admin_managerheader',$data1);
	
	 $this->load->view('manager_chat1',$data2);
	
  }
  
  function userdochat()
  {
	  $binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>4000

);

$this->load->library("upload",$binod);
if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>$fn,"notification"=>0);
	
}

$this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->adduserchat($data); 
	
	$id = $this->session->userdata('phone');
	$phone = $this->input->post("receiver");
	
	$data2['records']=$this->Statemedical->pickusermsgbyphone($phone,$id);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		$this->db->where('phone!=',$id);
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	
	$data['records']=$this->Statemedical->getusers($id);
	$this->load->view('studentheader',$data);
	$this->load->view('userchat1',$data2);
  
  }
  
  
    function ITdochat()
  {
	  $binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);
if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>$fn,"notification"=>0);
	
}

$this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addITchat($data); 
	
	$email1 = $this->session->userdata('email');
	$email = $this->input->post("receiver");
	
	$data2['records']=$this->Statemedical->pickIT_msg($email,$email1);
		$data2['bb']=$this->Statemedical->getadmin_manager($email);
		
		$this->db->where('email!=',$email1);
		$query2=$this->db->get("admin_manager");
    $data2['records2']=$query2->result();
	
	
	$data['records']=$this->Statemedical->getadmin_manager($email1);
	$this->load->view('admin_managerheader',$data);
	$this->load->view('ITchat1',$data2);
  
  }
  
    function user_mgrdochat()
  {
	  $binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);
if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>$fn,"notification"=>0);
	
}

$this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->adduser_mgrchat($data); 
	
	$id = $this->session->userdata('phone');
	$email = $this->input->post("receiver");
	
	$data2['records']=$this->Statemedical->pickmgr_msg($id,$email);
		$data2['bb']=$this->Statemedical->getadmin_manager($email);
		
		
		$query2=$this->db->get("admin_manager");
    $data2['records2']=$query2->result();
	
	
	$data['records']=$this->Statemedical->getusers($id);
	$this->load->view('studentheader',$data);
	$this->load->view('userchat2',$data2);
 
  }
  
  
     function user_mgrdochat1()
  {
	  $binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);
if(!$this->upload->do_upload('userfile'))
{
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>null,"notification"=>0);
	
}

else{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	$time = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
    $data=array("sender"=>$this->input->post("sender"),"receiver"=>$this->input->post("receiver"),"message"=>$this->input->post("message"),'time' =>$time->format('H:i'),"file_name"=>$fn,"notification"=>0);
	
}

$this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->adduser_mgrchat($data); 
	
	$id = $this->session->userdata('email');
	$phone = $this->input->post("receiver");
	
	$data2['records']=$this->Statemedical->pickmgr_msg1($id,$phone);
		$data2['bb']=$this->Statemedical->getusers($phone);
		
		
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	
	$data['records']=$this->Statemedical->getadmin_manager($id);
	$this->load->view('admin_managerheader',$data);
	$this->load->view('manager_chat1',$data2);
 
  }
  
      function douserchat(){
		  		$binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	
	 $time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'email'=>$this->input->post('email'),'time' =>$time->format('H:i'),"isapprove"=>0,"file_name"=>null,"notification"=>0);

}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	 $time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'email'=>$this->input->post('email'),'time' =>$time->format('H:i'),"isapprove"=>0,"file_name"=>$fn,"notification"=>0);

}
	
    $this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addchat($data); 
	
	$phone = $this->input->post('cat_id');
	
	$data2['records1']=$this->Statemedical->pickmsgbyphone($phone);
		$data1['records']=$this->Statemedical->getusers($phone);
		
		$query2=$this->db->get("users");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->row();
	
	
    $this->load->view('studentheader',$data1);
	
	 $this->load->view('chatuser',$data2);
	
  }
  
  
     function domgrchat(){
		  		$binod=array(

'upload_path'=>'./uploads/chat',
'allowed_types'=>'jpg|png|jpeg|pdf|docx',
'max_size'=>5000

);

$this->load->library("upload",$binod);

if(!$this->upload->do_upload('userfile'))
{
	
	 $time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("it_email"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'admin_email'=>$this->input->post('email'),'time' =>$time->format('H:i'),"isapprove"=>0,"file_name"=>null,"notification"=>0);

}
else
{
	$fd=$this->upload->data();
	$fn=$fd['file_name'];
	 $time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("it_email"=>$this->input->post("cat_id"), "message"=>$this->input->post("message"),'admin_email'=>$this->input->post('email'),'time' =>$time->format('H:i'),"isapprove"=>0,"file_name"=>$fn,"notification"=>0);

}
	
    $this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addmanagerchat($data); 
	
	$email = $this->input->post('cat_id');
	
	$data2['records1']=$this->Statemedical->pickmsgbyemail($email);
		$data1['records']=$this->Statemedical->getadmin_manager($email);
		
		$query2=$this->db->get("admin_manager");
    $data2['records2']=$query2->result();
	
	$query3=$this->db->get("admin");
    $data2['records3']=$query3->row();
	
	
    $this->load->view('admin_managerheader',$data1);
	
	 $this->load->view('chatmanager',$data2);
	
  }
  
  
  function studentchat(){
	   $phone=$this->session->userdata('phone'); 
  
    
	
	$this->db->where('phone!=',$phone);
	$query3=$this->db->get("users");
    $data2['records2']=$query3->result();
   
	$this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getusers($phone);
    $this->load->view('studentheader',$data);
    $this->load->view('chatdummy1',$data2);
    
  }
  
    function studentchat2(){
	   $phone=$this->session->userdata('phone'); 
  
	
	$query3=$this->db->get("admin_manager");
    $data2['records2']=$query3->result();
   
	$this->load->model('Statemedical');
	$data['records']=$this->Statemedical->getusers($phone);
    $this->load->view('studentheader',$data);
    $this->load->view('chatdummy2',$data2);
    
  }
  
    function studentdochat(){
    $time = new DateTime('now', new DateTimeZone('Asia/Kolkata'));    
    $data=array("phone"=>$this->session->userdata('phone'), "message"=>$this->input->post("message"),'email'=>$this->input->post('email'),'time' =>$time->format('H:i'),'isapprove'=>0);
    $this->session->set_flashdata('msg1',"message sent Successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	$this->load->model('Statemedical');
    $response=$this->Statemedical->addchat($data); 
    $this->studentchat();
  }
  
 
}
?>