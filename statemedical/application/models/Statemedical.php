<?php
class Statemedical extends CI_Model
{
 function __construct()
 {
  parent::__construct();
 }

function addusers($data)
{
	$this->db->insert("users",$data);
}

function addadmin_managers($data)
{
	$this->db->insert("admin_manager",$data);
}

function viewuser()
{
	$query=$this->db->query("select * from users");
	return $query->result();
}

function viewAdmin_manager()
{
	$query=$this->db->query("select * from admin_manager");
	return $query->result();
}

function getadmin()
{
	$query=$this->db->query("select * from admin");
	return $query->row();
}

function selectadmin_manager()
{
	$query=$this->db->query("select * from admin_manager");
	return $query->result();
}

function getadmin_manager($email)
{
	$this->db->where('email',$email);
	$query=$this->db->get('admin_manager');
	return $query->row();
}

function getusers($phone)
{
	$this->db->where('phone',$phone);
	$query = $this->db->get('users');
	return $query->row();
}
function adddiary($data)
{
	$this->db->insert("diaries",$data);
}

function adddiarytime($data1)
{
	$this->db->insert("diarytimecalc",$data1);
}

function adddiaryforward($data2)
{
	$this->db->insert("diaryforward",$data2);
}

function adddiarycomments($data3)
{
	$this->db->insert("comments",$data3);
}

function adddiaryfiles($data4)
{
	$this->db->insert("documents",$data4);
}

function uploaddocs($data)
{
	$this->db->insert("documents",$data);
}

function setsequence($data)
{
	$this->db->query("Delete from sequence");
	
	$this->db->insert("sequence",$data);
	
}

function setsequence1($data)
{
	$this->db->query("Delete from sequence1");
	
	$this->db->insert("sequence1",$data);
	
	
}

function fetchdate()
{
	$query=$this->db->query("select * from sequence");
	return $query->row();
}

function fetchdate1()
{
	$query=$this->db->query("select * from sequence1");
	return $query->row();
}


function fetchsequence_no()
{
	$query=$this->db->query("select sequence_no from sequence");
	return $query;
}

function fetchdiaries()
{
	$query=$this->db->query("select * from diaries");
	return $query->result();
}

function fetchdiaries1()
{
	$this->db->where('isapprove',1);
	$query = $this->db->get('diaries');
	return $query->result();
}


function fetchdiarybyusers($phone)
{
	$array=array(
	'phone'=>$phone,
	'isapprove'=>0
	);
	$this->db->where($array);
	$query = $this->db->get('diaries');
	return $query->result();
}

function singlefetchdiarybyusers($phone,$diary_no)
{
	$array=array(
		'phone'=>$phone,
		'isapprove'=>0,
		'diary_no'=>$diary_no
		);
		$this->db->where($array);
		$query = $this->db->get('diaries');
		return $query->result();
}

 function viewuser1($phone)
{
	$this->db->where('phone !=',$phone);
    $query= $this->db->get('users');
	return $query->result();
}

 function viewadminmanager1($phone)
{
	$this->db->where('phone !=',$phone);
    $query= $this->db->get('admin_manager');
	return $query->result();
}
 function viewadmin()
{
    $query= $this->db->get('admin');
	return $query->result();
}

 function viewadmin1()
{
    $query= $this->db->get('admin');
	return $query->row();
}

function fetchsinglediary($id)
{
	$this->db->where('id',$id);
	$query = $this->db->get('diaries');
	return $query->row();
}

function workforward($diary_no,$name)
{
	  $this->db->set(array(
            'whom'=>$name
            ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diaries');

}

function workforward1($diary_no,$phone)
{
	  $this->db->set(array(
            'phone'=>$phone
            ));
    $this->db->where('diary_no',$diary_no);
    $this->db->update('diaries');

}

function fetchtime($id)
{
	$this->db->where('diary_no',$id);
	$query = $this->db->get('diarytimecalc');
	return $query->row();
}

 public function get_diaries()
     {
          return $this->db->get("diaries");
     }
	 
	 public function receiving_diaries()
	 {
		 $array = array(
		 'diary_type'=>"Receiving",
		 'isapprove'=>0
		 );
		 $this->db->where($array);
		 return $this->db->get("diaries");
	 }
	 
	 public function despatch_diaries()
	 {
		 $array = array(
		 'diary_type'=>"Despatch",
		 'isapprove'=>0
		 );
		$this->db->where($array);
		 return $this->db->get("diaries"); 
	 }

function insertcomments($data)
{
	$this->db->insert("comments",$data);
	
}

function fetchsinglediarybynumber($id)
{
	$this->db->where('diary_no',$id);
	$query = $this->db->get('diaries');
	return $query->row();
}

function getdiaryforward($id)
{
	$this->db->where('diary_no',$id);
	$query = $this->db->get('diaryforward');
	return $query->result();
}

function getdiarycomments($id)
{
	$this->db->where('diary_no',$id);
	$query = $this->db->get('comments');
	return $query->result();
}

function diarydisapprove($id)
{
	$this->db->where('id',$id);
	$this->db->delete('diaries');
}

function diaryapprove($id)
{
	 $this->db->set(array(
            'isapprove'=>0
            ));
    $this->db->where('id',$id);
    $this->db->update('diaries');
}

function finaleditfileno($diary_no,$file_no){
	$this->db->set(array(
            'file_no'=>$file_no
            ));
			
			$this->db->where('diary_no',$diary_no);
    $this->db->update('diaries');
	
}

function getuid()
{
	$query=$this->db->get('uidsequence');
	return $query->row();
}



function addusername($data1)
{
	$this->db->insert("username",$data1);
}

function adduseremail($data2)
{
	$this->db->insert("useremail",$data2);
}

function adduserphone($data3)
{
	$this->db->insert("userphone",$data3);
}

function updateuid($uid)
{
	$this->db->set(array(
            'uid'=>$uid
            ));
   
    $this->db->update('uidsequence');
	
}

function getphoneemail($whom)
{
	$this->db->where('name',$whom);
	$query=$this->db->get('users');
	return $query->row();
}

function getphoneemail1($whom)
{
	$this->db->where('name',$whom);
	$query=$this->db->get('admin_manager');
	return $query->row();
}

function getphoneemail2($whom)
{
	$this->db->where('name',$whom);
	$query=$this->db->get('admin');
	return $query->row();
}

function getITphoneemail2($whom)
{
	$this->db->where('name',$whom);
	$query=$this->db->get('admin_manager');
	return $query->row();
}

function fetchapproveddiaries()
{
	
	$this->db->where('isapprove',0);
	$query=$this->db->get('diaries');
	return $query->result();
}

function fetchclickeddiaries($id)
{
	$array= array(
		

		'diary_no'=>$id,
		'isapprove'=>0


	);
	$this->db->where($array);
	$query=$this->db->get('diaries');
	return $query->result();
}

function givemediary($diary_no)
{
	$this->db->where('diary_no',$diary_no);
	$query=$this->db->get('diaries');
	return $query->row();
}

function getDiaries($postData=null)
{
	$response = array();

	## Read value
	$draw = $postData['draw'];
	$start = $postData['start'];
	$rowperpage = $postData['length']; // Rows display per page
	$columnIndex = $postData['order'][0]['column']; // Column index
	$columnName = $postData['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
	$searchValue = $postData['search']['value']; // Search value

	## Search 
	$searchQuery = "";
	if($searchValue != ''){
	   $searchQuery = " (diary_no like '%".$searchValue."%' or file_no like '%".$searchValue."%' or diary_status like '%".$searchValue."%' or whom like'%".$searchValue."%' or subject like'%".$searchValue."%' or assignment_date like'%".$searchValue."%' or receive_mode like'%".$searchValue."%') ";
	}

	## Total number of records without filtering
	$this->db->select('count(*) as allcount');
	$this->db->where('diary_type',"Receiving");
	$this->db->where('isapprove',0);
	$records = $this->db->get('diaries')->result();
	$totalRecords = $records[0]->allcount;

	## Total number of record with filtering
	$this->db->select('count(*) as allcount');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('diary_type',"Receiving");
	   $this->db->where('isapprove',0);
	$records = $this->db->get('diaries')->result();
	$totalRecordwithFilter = $records[0]->allcount;

	## Fetch records
	$this->db->select('*');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('diary_type',"Receiving");
	   $this->db->where('isapprove',0);
	$this->db->order_by($columnName, $columnSortOrder);
	$this->db->limit($rowperpage, $start);
	$records = $this->db->get('diaries')->result();

	$data = array();

	foreach($records as $record ){

	   $data[] = array( 
		  "diary_no"=>$record->diary_no,
		  "file_no"=>$record->file_no,
		  "subject"=>$record->subject,
		  "whom"=>$record->whom,
		  "diary_status"=>$record->diary_status,
		 
		  "receiving_category"=>$record->receiving_category,
		  "receive_mode"=>$record->receive_mode,
		  "assignment_date"=>$record->assignment_date
		  
	   ); 
	}

	## Response
	$response = array(
	   "draw" => intval($draw),
	   "iTotalRecords" => $totalRecords,
	   "iTotalDisplayRecords" => $totalRecordwithFilter,
	   "aaData" => $data
	);

	return $response; 

}


function usergetDiaries($postData=null,$phone)
{
	$response = array();

	## Read value
	$draw = $postData['draw'];
	$start = $postData['start'];
	$rowperpage = $postData['length']; // Rows display per page
	$columnIndex = $postData['order'][0]['column']; // Column index
	$columnName = $postData['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
	$searchValue = $postData['search']['value']; // Search value

	## Search 
	$searchQuery = "";
	if($searchValue != ''){
	   $searchQuery = " (diary_no like '%".$searchValue."%' or diary_status like '%".$searchValue."%' or file_no like '%".$searchValue."%' or subject like'%".$searchValue."%' or assignment_date like'%".$searchValue."%' or receive_mode like'%".$searchValue."%') ";
	}

	## Total number of records without filtering
	$this->db->select('count(*) as allcount');
	$this->db->where('phone',$phone);
	$this->db->where('isapprove',0);
	$records = $this->db->get('diaries')->result();
	$totalRecords = $records[0]->allcount;

	## Total number of record with filtering
	$this->db->select('count(*) as allcount');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('phone',$phone);
	   $this->db->where('isapprove',0);
	$records = $this->db->get('diaries')->result();
	$totalRecordwithFilter = $records[0]->allcount;

	## Fetch records
	$this->db->select('*');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('phone',$phone);
	   $this->db->where('isapprove',0);
	$this->db->order_by($columnName, $columnSortOrder);
	$this->db->limit($rowperpage, $start);
	$records = $this->db->get('diaries')->result();

	$data = array();

	foreach($records as $record ){

	   $data[] = array( 
		  "diary_no"=>$record->diary_no,
		  "subject"=>$record->subject,
		  "file_no"=>$record->file_no,
		 
		  "diary_status"=>$record->diary_status,
		 
		  "receive_mode"=>$record->receive_mode,
		  "assignment_date"=>$record->assignment_date
		  
	   ); 
	}

	## Response
	$response = array(
	   "draw" => intval($draw),
	   "iTotalRecords" => $totalRecords,
	   "iTotalDisplayRecords" => $totalRecordwithFilter,
	   "aaData" => $data
	);

	return $response; 

}



function usergetHistory($postData=null,$phone)
{
	$response = array();

	## Read value
	$draw = $postData['draw'];
	$start = $postData['start'];
	$rowperpage = $postData['length']; // Rows display per page
	$columnIndex = $postData['order'][0]['column']; // Column index
	$columnName = $postData['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
	$searchValue = $postData['search']['value']; // Search value

	## Search 
	$searchQuery = "";
	if($searchValue != ''){
	   $searchQuery = " (diary_no like '%".$searchValue."%' or diary_status like '%".$searchValue."%' or file_no like '%".$searchValue."%' or subject like'%".$searchValue."%' or assignment_date like'%".$searchValue."%' or receive_mode like'%".$searchValue."%') ";
	}

	## Total number of records without filtering
	$this->db->select('count(*) as allcount');
	$this->db->where('generator_phone',$phone);
	
	$records = $this->db->get('diaries')->result();
	$totalRecords = $records[0]->allcount;

	## Total number of record with filtering
	$this->db->select('count(*) as allcount');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('generator_phone',$phone);
	  
	$records = $this->db->get('diaries')->result();
	$totalRecordwithFilter = $records[0]->allcount;

	## Fetch records
	$this->db->select('*');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('generator_phone',$phone);
	  
	$this->db->order_by($columnName, $columnSortOrder);
	$this->db->limit($rowperpage, $start);
	$records = $this->db->get('diaries')->result();

	$data = array();

	foreach($records as $record ){

	   $data[] = array( 
		  "diary_no"=>$record->diary_no,
		  "subject"=>$record->subject,
		  "file_no"=>$record->file_no,
		 
		  "diary_status"=>$record->diary_status,
		 
		  "receive_mode"=>$record->receive_mode,
		  "assignment_date"=>$record->assignment_date
		  
	   ); 
	}

	## Response
	$response = array(
	   "draw" => intval($draw),
	   "iTotalRecords" => $totalRecords,
	   "iTotalDisplayRecords" => $totalRecordwithFilter,
	   "aaData" => $data
	);

	return $response; 

}

function ITgetHistory($postData=null,$phone)
{
	$response = array();

	## Read value
	$draw = $postData['draw'];
	$start = $postData['start'];
	$rowperpage = $postData['length']; // Rows display per page
	$columnIndex = $postData['order'][0]['column']; // Column index
	$columnName = $postData['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
	$searchValue = $postData['search']['value']; // Search value

	## Search 
	$searchQuery = "";
	if($searchValue != ''){
	   $searchQuery = " (diary_no like '%".$searchValue."%' or diary_status like '%".$searchValue."%' or file_no like '%".$searchValue."%' or subject like'%".$searchValue."%' or assignment_date like'%".$searchValue."%' or receive_mode like'%".$searchValue."%') ";
	}

	## Total number of records without filtering
	$this->db->select('count(*) as allcount');
	$this->db->where('generator_phone',$phone);
	
	$records = $this->db->get('diaries')->result();
	$totalRecords = $records[0]->allcount;

	## Total number of record with filtering
	$this->db->select('count(*) as allcount');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('generator_phone',$phone);
	  
	$records = $this->db->get('diaries')->result();
	$totalRecordwithFilter = $records[0]->allcount;

	## Fetch records
	$this->db->select('*');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('generator_phone',$phone);
	  
	$this->db->order_by($columnName, $columnSortOrder);
	$this->db->limit($rowperpage, $start);
	$records = $this->db->get('diaries')->result();

	$data = array();

	foreach($records as $record ){

	   $data[] = array( 
		  "diary_no"=>$record->diary_no,
		  "subject"=>$record->subject,
		  "file_no"=>$record->file_no,
		 
		  "diary_status"=>$record->diary_status,
		 
		  "receive_mode"=>$record->receive_mode,
		  "assignment_date"=>$record->assignment_date
		  
	   ); 
	}

	## Response
	$response = array(
	   "draw" => intval($draw),
	   "iTotalRecords" => $totalRecords,
	   "iTotalDisplayRecords" => $totalRecordwithFilter,
	   "aaData" => $data
	);

	return $response; 

}



function getDiaries1($postData=null)
{
	$response = array();

	## Read value
	$draw = $postData['draw'];
	$start = $postData['start'];
	$rowperpage = $postData['length']; // Rows display per page
	$columnIndex = $postData['order'][0]['column']; // Column index
	$columnName = $postData['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
	$searchValue = $postData['search']['value']; // Search value

	## Search 
	$searchQuery = "";
	if($searchValue != ''){
	   $searchQuery = " (diary_no like '%".$searchValue."%' or file_no like '%".$searchValue."%'  or diary_status like '%".$searchValue."%' or whom like'%".$searchValue."%' or subject like'%".$searchValue."%' or assignment_date like'%".$searchValue."%' or receive_mode like'%".$searchValue."%') ";
	}

	## Total number of records without filtering
	$this->db->select('count(*) as allcount');
	$this->db->where('diary_type',"Despatch");
	$this->db->where('isapprove',0);
	$records = $this->db->get('diaries')->result();
	$totalRecords = $records[0]->allcount;

	## Total number of record with filtering
	$this->db->select('count(*) as allcount');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('diary_type',"Despatch");
	   $this->db->where('isapprove',0);
	$records = $this->db->get('diaries')->result();
	$totalRecordwithFilter = $records[0]->allcount;

	## Fetch records
	$this->db->select('*');
	if($searchQuery != '')
	   $this->db->where($searchQuery);
	   $this->db->where('diary_type',"Despatch");
	   $this->db->where('isapprove',0);
	$this->db->order_by($columnName, $columnSortOrder);
	$this->db->limit($rowperpage, $start);
	$records = $this->db->get('diaries')->result();

	$data = array();

	foreach($records as $record ){

	   $data[] = array( 
		  "diary_no"=>$record->diary_no,
		   "file_no"=>$record->file_no,
		  "subject"=>$record->subject,
		  "whom"=>$record->whom,
		  "diary_status"=>$record->diary_status,
		
		  "ref_receiving_no"=>$record->ref_receiving_no,
		  "receive_mode"=>$record->receive_mode,
		  "assignment_date"=>$record->assignment_date
		  
	   ); 
	}

	## Response
	$response = array(
	   "draw" => intval($draw),
	   "iTotalRecords" => $totalRecords,
	   "iTotalDisplayRecords" => $totalRecordwithFilter,
	   "aaData" => $data
	);

	return $response; 

}

function fetcheverycomment($id)
{
	$this->db->where('diary_no',$id);
	$query=$this->db->get('comments');
	return $query->result();
}

function getdiarydocs($id)
{
	$this->db->where('diary_no',$id);
	$query=$this->db->get('documents');
	return $query->result();
}

function deletedocs($diary_no,$file_name)
{
	$array = array(
	'diary_no'=>$diary_no,
	'file_name'=>$file_name
	);
	$this->db->where($array);
	$this->db->delete('documents');
}

function pickstartenddates($diary_no)
{
	$this->db->where('diary_no',$diary_no);
	$query=$this->db->get('diarytimecalc');
	return $query->result();
}

function pickdiary($diary_no)
{
	$this->db->where('diary_no',$diary_no);
	$query=$this->db->get('diaries');
	return $query->row();
}

 function addchat($data)
 {
  //$id=$this->input->post('student_id');
  $this->db->insert('messages', $data);
  $response['message'] = 'message sent successfully';
  return $response;        
 }
 
  function addmanagerchat($data)
 {
  //$id=$this->input->post('student_id');
  $this->db->insert('messages1', $data);
  $response['message'] = 'message sent successfully';
  return $response;        
 }
 
 
 function adduserchat($data)
 {
	  $this->db->insert('user_messages', $data);
  $response['message'] = 'message sent successfully';
  return $response; 
 }
 
 function addITchat($data)
 {
	  $this->db->insert('manager_messages', $data);
  $response['message'] = 'message sent successfully';
  return $response; 
 }
 
  function adduser_mgrchat($data)
 {
	  $this->db->insert('manager_messages', $data);
  $response['message'] = 'message sent successfully';
  return $response; 
 }
 
     public function checkDiaryNo($diary_no) 
  {
    $this->db->where('diary_no',$diary_no);
    //$this->db->where('email',$email);
    $query=$this->db->get('diaries');
    if($query->num_rows()>0)
    {
    return 1; 
    }
    else
    {
    return 0; 
    }
  }
  
  function pickmsgbyphone($phone)
  {
	  $this->db->where('phone',$phone);
	  $query=$this->db->get('messages');
	  return $query->result();
  }
  
   function pickmsgbyemail($email)
  {
	  $this->db->where('it_email',$email);
	  $query=$this->db->get('messages1');
	  return $query->result();
  }
  
   function pickmgr_msg($phone,$email)
  {
	   $array = array($phone,$email);
	  $this->db->where_in('sender',$array);
	  $this->db->where_in('receiver',$array);
	
	  $query=$this->db->get('manager_messages');
	  return $query->result();
  }
  
    function pickIT_msg($email,$email1)
  {
	   $array = array($email,$email1);
	  $this->db->where_in('sender',$array);
	  $this->db->where_in('receiver',$array);
	
	  $query=$this->db->get('manager_messages');
	  return $query->result();
  }
  
   function pickmgr_msg1($email,$phone)
  {
	   $array = array($phone,$email);
	  $this->db->where_in('sender',$array);
	  $this->db->where_in('receiver',$array);
	
	  $query=$this->db->get('manager_messages');
	  return $query->result();
  }
  
   function pickusermsgbyphone($phone,$id)
  {
	  $array = array($phone,$id);
	  $this->db->where_in('sender',$array);
	  $this->db->where_in('receiver',$array);
	
	  $query=$this->db->get('user_messages');
	  return $query->result();
  }
  
  
  function fetchnotifications($phone)
  {
	  
	  $array = array(
	  "phone"=>$phone,
	  "notification"=>'0',
	  "isapprove"=>1
	  
	  );
	  $query=$this->db->where($array);
	  
	  
	  $query=$this->db->get('messages');
	  
	  return $query->result();
	  
  }
  
  
   function giveadminmessages($email)
  {
	  
	  $array = array(
	  "it_email"=>$email,
	  "notification"=>'0',
	  "isapprove"=>1
	  
	  );
	  $query=$this->db->where($array);
	  
	  
	  $query=$this->db->get('messages1');
	  
	  return $query->result();
	  
  }
  
  function show_adminmessages($email)
  {
	   $array = array(
	  "email"=>$email,
	  "notification"=>'0',
	  "isapprove"=>0
	  
	  );
	  $query=$this->db->where($array);
	  
	  
	  $query=$this->db->get('messages');
	  
	  return $query->result();
	  
  }
  
    function show_adminmessages1($email,$phone)
  {
	   $array = array(
	   "phone"=>$phone,
	  "email"=>$email,
	  "notification"=>'0',
	  "isapprove"=>0
	  
	  );
	  $query=$this->db->where($array);
	  
	  
	  $query=$this->db->get('messages');
	  
	  return $query->result();
	  
  }
  
     function show_adminmessages2($email,$email1)
  {
	   $array = array(
	   "it_email"=>$email1,
	  "admin_email"=>$email,
	  "notification"=>'0',
	  "isapprove"=>0
	  
	  );
	  $query=$this->db->where($array);
	  
	  
	  $query=$this->db->get('messages1');
	  
	  return $query->result();
	  
  }
  
  function show_usermessages($phone,$phone1)
  {
	   $array = array(
	   "sender"=>$phone1,
	  "receiver"=>$phone,
	  "notification"=>'0'
	 
	  );
	   $query=$this->db->where($array);
	   $query=$this->db->get('user_messages');
	  
	  return $query->result();
	  
  }
  
    function show_mgrmessages($phone,$email)
  {
	   $array = array(
	   "sender"=>$email,
	  "receiver"=>$phone,
	  "notification"=>'0'
	 
	  );
	   $query=$this->db->where($array);
	   $query=$this->db->get('manager_messages');
	  
	  return $query->result();
	  
  }
  
      function show_ITmessages($email,$email1)
  {
	   $array = array(
	   "sender"=>$email1,
	  "receiver"=>$email,
	  "notification"=>'0'
	 
	  );
	   $query=$this->db->where($array);
	   $query=$this->db->get('manager_messages');
	  
	  return $query->result();
	  
  }
  
    function show_mgrUsermessages($email,$phone)
  {
	   $array = array(
	   "sender"=>$phone,
	  "receiver"=>$email,
	  "notification"=>'0'
	 
	  );
	   $query=$this->db->where($array);
	   $query=$this->db->get('manager_messages');
	  
	  return $query->result();
	  
  }
  
  function changenotifications($phone)
  {
	  $this->db->set(array(
	  
	  'notification'=>1
	  
	  ));
	  
	  $array = array(
	  "phone"=>$phone,
	  "notification"=>0,
	  "isapprove"=>1
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('messages');
  }
  
  function changeusernotifications($phone)
  {
	  $this->db->set(array(
	  
	  'notification'=>1
	  
	  ));
	  
	  $array = array(
	  "phone"=>$phone,
	  "notification"=>'0',
	  "isapprove"=>0
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('messages');
  }
  
  
    function changeadmin_mgrnotifications($email)
  {
	  $this->db->set(array(
	  
	  'notification'=>1
	  
	  ));
	  
	  $array = array(
	  "it_email"=>$email,
	  "notification"=>'0',
	  "isapprove"=>0
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('messages1');
  }
  
  
      function fucktheworld($email,$email1)
  {
	  $this->db->set(array(
	  
	  'notification'=>1
	  
	  ));
	  
	  $array = array(
	  "it_email"=>$email,
	  "admin_email"=>$email1,
	  "notification"=>'0',
	  "isapprove"=>1
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('messages1');
  }
  
    function changeuser_mgrnotifications($phone)
  {
	  $this->db->set(array(
	  
	  'notification'=>1
	  
	  ));
	  
	  $array = array(
	  "phone"=>$phone,
	  "notification"=>'0',
	  "isapprove"=>0
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('messages');
  }
  
  function unsetusernotification($phone,$id){
	  $this->db->set(array(
	  'notification'=>1
	  ));
	  
	  $array = array(
	  "sender"=>$phone,
	  "receiver"=>$id,
	  "notification"=>'0'
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('user_messages');
	  
  }
  
    function unsetmanagernotification($phone,$email){
	  $this->db->set(array(
	  'notification'=>1
	  ));
	  
	  $array = array(
	  "sender"=>$email,
	  "receiver"=>$phone,
	  "notification"=>'0'
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('manager_messages');
	  
  }
  
      function unsetmanagerUsernotification($phone,$email){
	  $this->db->set(array(
	  'notification'=>1
	  ));
	  
	  $array = array(
	  "sender"=>$phone,
	  "receiver"=>$email,
	  "notification"=>'0'
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('manager_messages');
	  
  }
  
        function unsetITnotification($email,$email1){
	  $this->db->set(array(
	  'notification'=>1
	  ));
	  
	  $array = array(
	  "sender"=>$email,
	  "receiver"=>$email1,
	  "notification"=>'0'
	  
	  );
	  
	  $this->db->where($array);
	  $this->db->update('manager_messages');
	  
  }
  
  function pickfileno($diary_no)
  {
	  $this->db->where('diary_no',$diary_no);
	  $query=$this->db->get('diaries');
	  return $query->result();
	  
  }
  
  function fetch_diarytype()
  {
	  $this->db->order_by("diarytype_name", "ASC");
  $query = $this->db->get("diarytype");
 
  return $query->result();
  }
  
  function fetch_reccat($diarytype_id)
  {
	    $this->db->where('diarytype_id', $diarytype_id);
  $this->db->order_by('reccat_name', 'ASC');
  $query = $this->db->get('receivingcat');
  $output = '<option value="">Select Receiving Category</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->reccat_id.'">'.$row->reccat_name.'</option>';
  }
  return $output;
	  
  }
  
  function userdelete($id){
	  $this->db->where('uid',$id);
	  $this->db->delete('users');
	  
	  
  }
  
   function ITdelete($id){
	  $this->db->where('aid',$id);
	  $this->db->delete('admin_manager');
	  
	  
  }
  
  function userupdate($id){
	  $this->db->where('uid',$id);
	$query = $this->db->get('users');
	return $query->result();
  }
  
    function ITupdate($id){
	  $this->db->where('aid',$id);
	$query = $this->db->get('admin_manager');
	return $query->result();
  }
  
  function userupdatedo($data,$id){
	  $this->db->set($data);
    $this->db->where("uid",$id);
    $this->db->update("users",$data);
  }
  
   function ITupdatedo($data,$id){
	  $this->db->set($data);
    $this->db->where("aid",$id);
    $this->db->update("admin_manager",$data);
  }
  

}
?>