<?php 
    class Reception_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		function medicine_insert($data){
			$this->db->insert('medicine',$data);
		}
			function medical_history_insert($data){
			$this->db->insert('medical_history',$data);
		}
		  function dischage_p($table,$where) {
			  $this->db->select('p_id,D_O_Admit');
              $this->db->from('inpatient');
              $this->db->where($where);
              $query=$this->db->get();
            if($query->num_rows() != 0)
            {
				    $this->load->helper('date');
                   $date = date('Y-m-d');
                  $data['info']= $query->result_array();
				  $D_O_Admit=$info['D_O_Admit'];
				  $p_id=$info['p_id'];
				  $this->db->where($where);
                 $res = $this->db->delete($table); 
            if($res)
			{     $data=array(
		    'p_id'=>$p_id,
			'D_O_Admit'=>$D_O_Admit,
			'D_O_Discharge'=>$date
		           );
				$this->db->insert('outpatient',$data);
				return TRUE;
			}
           else
         return FALSE;
            }
            else
            {
                return FALSE; 
            }  
			  // do query to get the d_o_admit..of patient...
         
}
	}
?>