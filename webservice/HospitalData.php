<?php
require_once "DB.php";
class HospitalData{
	
	public $con = null;
	public $patientId = null;
	public $action = null;
	public static $table = array("patient"=>"patients",
								"medicine"=>"medication",
								"visitors"=>"visits" );
	
	public function __construct($action,$patient_id){
		$this->con=  mysqli_connect("localhost","root","","hospital");
		$this->patientId=$patient_id;
		$this->action=$action;
	}
	public function getPatientDetail(){
		$sql="SELECT * FROM ".self::$table[$this->action]." WHERE patient_id = ".$this->patientId;
		$res=$this->con->query($sql);
		if($res->num_rows > 0 && $res->num_rows ==1){
			$row = $res->fetch_assoc();
            return $row;
		}
	}
	
	public function getPatientMedication(){
		$sql="SELECT p.patient_id,p.patient_name,m.medication_id,m.medication_name FROM ".self::$table[$this->action]." as m RIGHT JOIN patients AS p ON m.patient_id=p.patient_id WHERE p.patient_id = ".$this->patientId;
        // echo $sql;
        $res=$this->con->query($sql);
        $result=[];
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $result[] = $row;
            }
        }
        return $result;
	}
	
	public function getVisitorsDetail(){
		$sql="SELECT p.patient_id,p.patient_name,v.visitor_name,v.visit_date FROM ".self::$table[$this->action]." as v RIGHT JOIN patients AS p ON v.patient_id=p.patient_id WHERE p.patient_id = ".$this->patientId;
        $res=$this->con->query($sql);
        $result=[];
        if($res->num_rows > 0){

            while($row = $res->fetch_assoc()){
                $result[] = $row;
            }
        }
        return $result;
	}
	
    public function closeConn(){
        $this->con->close();
    }
}
?>