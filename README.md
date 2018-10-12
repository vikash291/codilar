This webservice is for Hospital Management system where this Contains 3 things:
	1. Patient Details.
	2. Patient Medication details.
	3. Visitor Details.

url of this service is as:
 url= "http://localhost:1234/webservice/hospital.php?action={actiontype}&pid={patient_id}"

 where action should be:
   1. patient -> this action will return the personal details of that perticular patient.
   2. medicine -> this action will return the medication given to that perticular patient.
   3. visitors -> this action will return the visitor details wo comes to visit that perticular patient.
 and the pid must be patient id:
 
 Output:
 	These action will return data in JSON format. which hold the status of the output ( i,e either 200 or 400) and "payload" which holds the actual data. If there is not patient then it will return message that "patient id doesn't exist".

 Output Format:
 	
	1. Success:
	 	{
		    "status": "200",
		    "payload": {
		        "patient_id": "1",
		        "patient_name": "Vikash chand singh",
		        "age": "23",
		        "gender": "M"
		    }
		}	

	2. Failed:
		{
		    "status": "400",
		    "message": "Patient Id 4 doesn't exist"
		}	
