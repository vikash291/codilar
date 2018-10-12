<?php
$action=$_REQUEST['action'];
$patient_id=$_REQUEST['pid'];

$finalresult=[];
if(empty($patient_id)){
	$finalresult['status']="400";
	$finalresult["message"]="patient id can not be empty";
	echo json_encode($finalresult);
	exit;
}
else if(empty($action)){
	$finalresult['status']="400";
	$finalresult["message"]="action can not be empty";
	echo json_encode($finalresult);
	exit;
}

require_once "HospitalData.php";

$data = new HospitalData($action , $patient_id);


if($action == "patient"){
	$patientDetail=$data->getPatientDetail();
	if(count($patientDetail)>0){
		$finalresult['status']="200";
		$finalresult['payload']=$patientDetail;
	}
	else{
		$finalresult['status']="400";
		$finalresult['message']="Patient Id $patient_id doesn't exist";
	}
}
else if($action == "medicine"){
	$patineMedication=$data->getPatientMedication();
	// print_R($patineMedication);
	if(count($patineMedication)>0){
		$finalresult['status']="200";
		$finalresult['payload']=$patineMedication;
	}
	else{
		$finalresult['status']="400";
		$finalresult['message']="Patient Id $patient_id doesn't exist";
	}
	
}
else if($action == "visitors"){
	$visitors=$data->getVisitorsDetail();
	// print_R($visitors);
	if(count($visitors)>0){
		$finalresult['status']="200";
		$finalresult['payload']=$visitors;
	}
	else{
		$finalresult['status']="400";
		$finalresult['message']="Patient Id $patient_id doesn't exist";
	}
}

$data->closeConn();
echo json_encode($finalresult)

?>