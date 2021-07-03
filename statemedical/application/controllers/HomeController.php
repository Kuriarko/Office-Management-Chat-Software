<?php


class HomeController extends CI_Controller {


   /**
    * Manage __construct
    *
    * @return Response
   */
   public function __construct() { 
      parent::__construct();
      $this->load->database();
   }


   /**
    * Manage index
    *
    * @return Response
   */
   public function index() {
      $diarytype = $this->db->get("diarytype")->result();
      $this->load->view('myform', array('diarytype' => $diarytype )); 
   } 


   /**
    * Manage uploadImage
    *
    * @return Response
   */
   public function myformAjax($id) { 
       $result = $this->db->where("diarytype_id",$id)->get("receivingcat")->result();
       echo json_encode($result);
   }


} 


?>