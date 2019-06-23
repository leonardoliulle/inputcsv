<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importcsv_model extends CI_Model {

	public function __construct()
	{
       	parent::__construct(); 
        $this->load->database();
	}
	
	public function importcsv()
	{

		 if(isset($_POST["Import"])){
    
   		 $filename=$_FILES["file"]["tmp_name"];    


				     if($_FILES["file"]["size"] > 0)
				     {


				        $file = fopen($filename, "r");

				        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
				         {

				            $getData = explode(";", $getData[0]);
			        
				            $dados = array(
				            	'firstname' => $getData[0],
				            	'lastname' => $getData[1],
				            	'email' => $getData[2],
				            	'reg_date' => $getData[3],

				            );


				         	$query = $this->db->update('employeeinfo', $dados, array('firstname' => $getData[0]));
							if ($this->db->affected_rows() == 0) {
				         	$query = $this->db->insert('employeeinfo', $dados);
							}
							echo $x++;
							var_dump($query);
						}
					}
			
				  echo "<script type=\"text/javascript\">
		            alert(\"Seu Arquivo CSV foi importado com sucesso\");
		          </script>"; 

			}


	}

	public function teste()
	{
		echo "teste";
	}

}

