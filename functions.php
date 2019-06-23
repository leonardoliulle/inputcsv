<?php 



// function para conectar ao banco
function getdba(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "blog";
try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

$con = getdba();




 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    


     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");

        

          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {

            $getData = explode(";", $getData[0]);
            echo $getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')<br>";

             $sql = "INSERT into employeeinfo (firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
                   $result = mysqli_query($con, $sql);
        
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";   
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
      
           fclose($file); 
     }
  }  





function get_all_records(){
    $con = getdba();
    $Sql = "SELECT * FROM employeeinfo";
    $result = mysqli_query($con, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Registration Date</th>
                        </tr></thead><tbody>";
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row['emp_id']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td>
                   <td>" . $row['email']."</td>
                   <td>" . $row['reg_date']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}





/* estrutura já pronta para qt de colunas
@ Puxe sua array para quantidade de colunas que deseja no input do banco.


.$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[22]."','".$getData[23]."','".$getData[24]."','".$getData[25]."','".$getData[26]."','".$getData[27]."','".$getData[28]."','".$getData[29]."','".$getData[30]."','".$getData[31]."','".$getData[32]."','".$getData[33]."','".$getData[34]."','".$getData[35]."','".$getData[36]."','".$getData[37]."','".$getData[38]."','".$getData[39]."','".$getData[40]."','".$getData[41]."','".$getData[42]."','".$getData[43]."','".$getData[44]."','".$getData[45]."','".$getData[46]."','".$getData[47]."','".$getData[48]."','".$getData[49]."','".$getData[50]."','".$getData[51]."','".$getData[52]."','".$getData[53]."','".$getData[54]."','".$getData[55]."','".$getData[56]."','".$getData[57]."','".$getData[58]."','".$getData[59]."','".$getData[60]."','".$getData[61]."','".$getData[62]."','".$getData[63]."','".$getData[64]."','".$getData[65]."','".$getData[66]."','".$getData[67]."','".$getData[68]."','".$getData[69]."','".$getData[70]."','".$getData[71]."','".$getData[72]."','".$getData[73]."','".$getData[74]."','".$getData[75]."','".$getData[76]."','".$getData[77]."','".$getData[78]."','".$getData[79]."','".$getData[80]."','".$getData[81]."','".$getData[82]."','".$getData[83]."','".$getData[84]."','".$getData[85]."','".$getData[86]."','".$getData[87]."','".$getData[88]."','".$getData[89]."','".$getData[90]."','".$getData[91]."','".$getData[92]."','".$getData[93]."','".$getData[94]."','".$getData[95]."','".$getData[96]."','".$getData[97]."','".$getData[98]."','".$getData[99]."','".$getData[100]."','".$getData[101]."','".$getData[102]."','".$getData[103]."','".$getData[104]."','".$getData[105]."','".$getData[106]."','".$getData[107]."','".$getData[108]."','".$getData[109]."','".$getData[110]."','".$getData[111]."','".$getData[112]."','".$getData[113]."','".$getData[114]."','".$getData[115]."','".$getData[116]."','".$getData[117]."','".$getData[118]."','".$getData[119]."','".$getData[120]."','".$getData[121]."','".$getData[122]."','".$getData[123]."','".$getData[124]."','".$getData[125]."','".$getData[126]."','".$getData[127]."','".$getData[128]."','".$getData[129]."','".$getData[130]."','".$getData[131]."','".$getData[132]."','".$getData[133]."','".$getData[134]."','".$getData[135]."','".$getData[136]."','".$getData[137]."','".$getData[138]."','".$getData[139]."','".$getData[140]."','".$getData[141]."','".$getData[142]."','".$getData[143]."','".$getData[144]."','".$getData[145]."','".$getData[146]."','".$getData[147]."','".$getData[148]."','".$getData[149]."','".$getData[150]."','".$getData[151]."','".$getData[152]."','".$getData[153]."','".$getData[154]."','".$getData[155]."','".$getData[156]."','".$getData[157]."','".$getData[158]."','".$getData[159]."','".$getData[160]."','".$getData[161]."','".$getData[162]."','".$getData[163]."','".$getData[164]."','".$getData[165]."','".$getData[166]."','".$getData[167]."','".$getData[168]."','".$getData[169]."','".$getData[170]."','".$getData[171]."','".$getData[172]."','".$getData[173]."','".$getData[174]."','".$getData[175]."','".$getData[176]."','".$getData[177]."','".$getData[178]."','".$getData[179]."','".$getData[180]."','".$getData[181]."','".$getData[182]."','".$getData[183]."','".$getData[184]."','".$getData[185]."','".$getData[186]."','".$getData[187]."','".$getData[188]."','".$getData[189]."','".$getData[190]."','".$getData[191]."','".$getData[192]."','".$getData[193]."','".$getData[194]."','".$getData[195]."','".$getData[196]."','".$getData[197]."','".$getData[198]."','".$getData[199]."','".$getData[200]."','".$getData[201]."','".$getData[202]."','".$getData[203]."','".$getData[204]."','".$getData[205]."','".$getData[206]."','".$getData[207]."','".$getData[208]."','".$getData[209]."','".$getData[210]."','".$getData[211]."','".$getData[212]."','".$getData[213]."','".$getData[214]."','".$getData[215]."','".$getData[216]."','".$getData[217]."','".$getData[218]."','".$getData[219]."','".$getData[220]."','".$getData[221]."','".$getData[222]."','".$getData[223]."','"

*/
?>