<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
    }

    function index() {

        $main_content = 'manageattendance';
        $wrapper = 'attendance_wrapper';
        $data['main_content'] = $main_content;
        $this->load->view($wrapper, $data);
    }
    function employeeattendance(){
        $main_content = 'attendance';
        $wrapper = 'employee_wrapper';
        $data['main_content'] = $main_content;
        $this->load->view($wrapper, $data);
    }
    public function getPunch($req){
		$date = $req->date;
		$arr = explode(" ",$date);
		$date = $arr[0];
		
		$employee = $this->baseService->getElement('Employee',$this->getCurrentEmployeeId(),null,true);
		
		//Find any open punch
		$attendance = new Attendance();
		$attendance->Load("employee = ? and DATE_FORMAT( in_time,  '%Y-%m-%d' ) = ? and (out_time is NULL or out_time = '0000-00-00 00:00:00')",array($employee->id,$date));
		
		if($attendance->employee == $employee->id){
			//found an open punch
			return new IceResponse(IceResponse::SUCCESS,$attendance);
		}else{
			return new IceResponse(IceResponse::SUCCESS,null);
		}
		
		
	}
	
	
	public function savePunch($req){
		$req->date = $req->time;
		
		/*
		if(strtotime($req->date) > strtotime($req->cdate)){
			return new IceResponse(IceResponse::ERROR,"You are not allowed to punch a future time");
		}
		*/
		
		//check if there is an open punch
		$openPunch = $this->getPunch($req)->getData();
		
		if(empty($openPunch)){
			$openPunch = new Attendance();
		}

		$dateTime = $req->date;
		$arr = explode(" ",$dateTime);
		$date = $arr[0];
		
		$currentDateTime = $req->cdate;
		$arr = explode(" ",$currentDateTime);
		$currentDate = $arr[0];
		
		if($currentDate != $date){
			return new IceResponse(IceResponse::ERROR,"You are not allowed to punch time for a previous date");
		}
	
		$employee = $this->baseService->getElement('Employee',$this->getCurrentEmployeeId(),null,true);
		
		//check if dates are differnet
		$arr = explode(" ",$openPunch->in_time);
		$inDate = $arr[0];
		if(!empty($openPunch->in_time) && $inDate != $date){
			return new IceResponse(IceResponse::ERROR,"Attendance entry should be within a single day");
		}
		
		//compare dates
		if(!empty($openPunch->in_time) && strtotime($dateTime) <= strtotime($openPunch->in_time)){
			return new IceResponse(IceResponse::ERROR,"Punch-in time should be lesser than Punch-out time");
		}
	
		//Find all punches for the day
		$attendance = new Attendance();
		$attendanceList = $attendance->Find("employee = ? and DATE_FORMAT( in_time,  '%Y-%m-%d' ) = ?",array($employee->id,$date));
		
		foreach($attendanceList as $attendance){
			if(!empty($openPunch->in_time)){
				if($openPunch->id == $attendance->id){
					continue;
				}
				if(strtotime($attendance->out_time) >= strtotime($dateTime) && strtotime($attendance->in_time) <= strtotime($dateTime)){
					//-1---0---1---0 || ---0--1---1---0
					return new IceResponse(IceResponse::ERROR,"Time entry is overlapping with an existing one 1");
				}else if(strtotime($attendance->out_time) >= strtotime($openPunch->in_time) && strtotime($attendance->in_time) <= strtotime($openPunch->in_time)){
					//---0---1---0---1 || ---0--1---1---0
					return new IceResponse(IceResponse::ERROR,"Time entry is overlapping with an existing one 2");
				}else if(strtotime($attendance->out_time) <= strtotime($dateTime) && strtotime($attendance->in_time) >= strtotime($openPunch->in_time)){
					//--1--0---0--1--
					return new IceResponse(IceResponse::ERROR,"Time entry is overlapping with an existing one 3 ".$attendance->id);
				}	
			}else{
				if(strtotime($attendance->out_time) >= strtotime($dateTime) && strtotime($attendance->in_time) <= strtotime($dateTime)){
					//---0---1---0 
					return new IceResponse(IceResponse::ERROR,"Time entry is overlapping with an existing one 4");
				}	
			}
		}
		if(!empty($openPunch->in_time)){
			$openPunch->out_time = $dateTime;
			$openPunch->note = $req->note;
			$this->baseService->audit(IceConstants::AUDIT_ACTION, "Punch Out \ time:".$openPunch->out_time);
		}else{
			$openPunch->in_time = $dateTime;
			$openPunch->out_time = '0000-00-00 00:00:00';
			$openPunch->note = $req->note;
			$openPunch->employee = $employee->id;
			$this->baseService->audit(IceConstants::AUDIT_ACTION, "Punch In \ time:".$openPunch->in_time);
		}
		$ok = $openPunch->Save();
		
		if(!$ok){
			error_log($openPunch->ErrorMsg());
			return new IceResponse(IceResponse::ERROR,"Error occured while saving attendance");
		}
		return new IceResponse(IceResponse::SUCCESS,$openPunch);
	
	}

    

}
