<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;
    use App\Model\Service;
    use App\Model\SurveyorReport;
    
    class Job extends Model {
        //
        protected $table = 'jobs';
        public $timestamps = false;
        
        public function jobSer()
        {
        return $this->hasMany(JobService::class)->select('job_id','service_id','specify_problem','additional_notes','service_image');
        }

        public function fileurlservice($name = null){
            $path = 'http://localhost/MyProject/public/uploads/services/';
            return $path;
        }

        public static function InsertJob($input) {
            $service_id = implode(',',$input['service_id']);
            $date = date('Y-m-d H:i:s', strtotime($input['job_date']));
            $insert = new Job();
            $insert->user_id = (isset($input['user_id'])) ? $input['user_id'] : '';
            $insert->amc_id = (isset($input['amc_id'])) ? $input['amc_id'] : NULL;
            $insert->job_slot = (isset($input['job_slot'])) ? $input['job_slot'] : NULL;
            $insert->service_id = (isset($service_id)) ? $service_id: NULL;
            $insert->job_date = (isset($date)) ? $date: NULL;
            $insert->service_type = (isset($input['service_type'])) ? $input['service_type'] : NULL;
            $insert->status = 3;
            $save = $insert->save();
            if ($save) {
                $insert_id = $insert->id;
                return $insert_id;
            }else{
                return false;
            }
        }

        public static function InsertGuestJob($input,$amc) {
            $service_id = implode(',',$input['service_id']);
            $date = date('Y-m-d H:i:s', strtotime($input['job_date']));
            $insert = new Job();
            $insert->user_id = (isset($input['user_id'])) ? $input['user_id'] : '';
            $insert->amc_id = (isset($amc)) ? $amc : NULL;
            $insert->job_slot = (isset($input['job_slot'])) ? $input['job_slot'] : NULL;
            $insert->service_id = (isset($service_id)) ? $service_id: NULL;
            $insert->job_date = (isset($date)) ? $date: NULL;
            $insert->service_type = (isset($input['service_type'])) ? $input['service_type'] : NULL;
            $insert->status = 3;
            $save = $insert->save();
            if ($save) {
                $insert_id = $insert->id;
                return $insert_id;
            }else{
                return false;
            }
        }

        public static function viewallJobs($input,$device_type){
            $date = date('Y-m-d H:i:s', strtotime($input['job_date']));
            $myarray = array();
            $data = static::select('jobs.*','amcs.title','amcs.address','slots.slot_timename as slot_name')
            ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
           // ->leftjoin('properties','properties.id','=','amcs.location')
            ->leftjoin('slots','slots.id','=','jobs.job_slot')
            ->where('jobs.user_id','=',$input['user_id'])
            ->where('jobs.job_date','=',$date)
            ->orderBy('jobs.job_slot','asc')
            ->groupBy('jobs.id')
            ->get();

//print_r($data);die();
            foreach($data as $d){
        
                $service_id = explode(',',$d->service_id);
                
                $servicedata = Service::Select('service_name','service_code','instant_service_price','surveyer_price','service_icon')
                                ->whereIn('id',$service_id)
                                ->get();
               
                if($device_type == 1){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'mdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                        
                    }
                }elseif($device_type == 2){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'hdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }elseif($device_type == 3){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'xhdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }elseif($device_type == 4){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'xxhdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }elseif($device_type == 5){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'xxxhdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }else{
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                } //print_r($servicedata);
                $d['services'] = $servicedata;
                array_push($myarray,$data);
            }
            if(isset($data) && !empty($data)){
                return $data;
            }else{
                return false;
            }
        }
    
        public static function viewlatestJob($input,$device_type){
            $date = date('Y-m-d');
            $myarray = array();
            //$myarray1 = array();
            $data = static::select('jobs.*','amcs.title','amcs.address','slots.slot_timename as slot_name','surveys.surveyor_emp_id','employees.emp_mobile as mobile')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                // ->leftjoin('properties','properties.id','=','amcs.location')
                    ->leftjoin('slots','slots.id','=','jobs.job_slot')
                    ->leftjoin('surveys','surveys.job_id','=','jobs.id')
                    ->leftjoin('employees','employees.id','=','surveys.surveyor_emp_id')
                    ->where('jobs.user_id','=',$input['user_id'])
                    ->where('jobs.status','=',2)
                    ->orderBy('jobs.job_slot','desc')
                    ->first();
              
            $reportservice = SurveyorReport::select('surveyor_reports.service_id','surveyor_reports.data','services.service_name','job_groups.group_id','groups.team_leader','employees.emp_mobile')
                    ->leftjoin('services','services.id','=','surveyor_reports.service_id')
                    ->leftjoin('job_groups','job_groups.job_id','=','surveyor_reports.job_id')
                    ->leftjoin('groups','groups.id','=','job_groups.group_id')
                    ->leftjoin('employees','employees.id','=','groups.team_leader')
                    //->where('user_id','=',$input['user_id'])
                    ->where('surveyor_reports.job_id','=',$data->id)
                    ->groupBy('surveyor_reports.service_id')
                    ->get();
            //$data['mobile'] = $reportservice[0]['emp_mobile'];
            if(isset($reportservice) && !empty($reportservice)){
                $return_arr = array() ;
                    foreach($reportservice as $t=>$data1){
                        //service_id milega 
                        $return_arr[$t]['service_id'] = $data1['service_id'];
                        $return_arr[$t]['service_name'] = $data1['service_name'];
                        $return_arr[$t]['comments'] = json_decode($data1['data']);
            
                        $return_arr[$t]['total_servicePrice'] = array_sum(array_column($return_arr[$t]['comments'],'estimate_price'));
                        $return_arr[$t]['total_estimateTime'] = array_sum(array_column($return_arr[$t]['comments'],'estimate_time'));
                    }
            
                    foreach($return_arr as $t=>$k){
            
                        $data['est_price'] += $k['total_servicePrice'];
                        $data['est_time'] += $k['total_estimateTime'];
                    }  
                        
            }
            
                $service_id = explode(',',$data->service_id);
                
                $servicedata = Service::Select('service_name','service_code','instant_service_price','surveyer_price','service_icon')
                                ->whereIn('id',$service_id)
                                ->get();
            
                if($device_type == 1){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'mdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                        
                    }
                }elseif($device_type == 2){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'hdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }elseif($device_type == 3){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'xhdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }elseif($device_type == 4){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'xxhdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }elseif($device_type == 5){
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.'xxxhdpi_'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }else{
                    foreach($servicedata as $ser){
                        if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                            $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                        
                            $ser['eurl'] = $eurl;
                        }else{
                            $ser['eurl'] = '';
                        }
                    }
                }

                $data['services'] = $servicedata;
                array_push($myarray,$data);

                
            if(isset($myarray) && !empty($myarray)){
                return $data;
            }else{
                return false;
            }
        }

        public static function viewJob($input, $device_type){
            $date = date('Y-m-d');
            $myarray = array();
            $data = static::select('jobs.*','amcs.title','amcs.address','amcs.lat','amcs.lng','slots.slot_timename as slot_name')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('slots','slots.id','=','jobs.job_slot')
                    ->where('jobs.user_id','=',$input['user_id'])
                    ->where('jobs.id','=',$input['job_id'])
                    ->first();
              
            if(isset($data) && !empty($data)){
                return $data;
            }else{
                return false;
            }
        }

        public static function viewPayConfirmJob($input, $device_type){
            $date = date('Y-m-d');
            $myarray = array();
            
            $data = static::select('jobs.*','amcs.title','amcs.address','amcs.lat','amcs.lng','packages.callouts','slots.slot_timename as slot_name')
                    ->leftjoin('amcs','amcs.id','=','jobs.amc_id')
                    ->leftjoin('packages','packages.id','=','amcs.package_id')
                    ->leftjoin('slots','slots.id','=','jobs.job_slot')
                    ->where('jobs.user_id','=',$input['user_id'])
                    ->where('jobs.id','=',$input['job_id'])
                    ->first();
                $carddata = Card::where('user_id','=',$input['user_id'])->where('isPrimary','=',1)->first();
                $data['cardData'] = $carddata;
                $service_id = explode(',',$data->service_id);
                $servicedata = Service::Select('service_name','service_code','instant_service_price','surveyer_price','service_icon')
                                ->whereIn('id',$service_id)
                                ->get();
               
                $data['services'] = $servicedata;

                $totalcallout = Job::where('amc_id','=',$data->amc_id)->where('user_id','=',$input['user_id'])->get();
                if(isset($data->callouts) && !empty($data->callouts)){
                    $data['remaining_callouts'] = $data->callouts - count($totalcallout);
                }else{
                    $data['remaining_callouts'] = (int)'';
                }
                
                //print_r($data);die(); 
            if(isset($data) && !empty($data)){
                return $data;
            }else{
                return false;
            }
        }
        

        public static function viewallJobsDate($input){
            $month = date('m');
            $data = static::select('jobs.id','jobs.job_date')
                ->where('user_id','=',$input['user_id'])
                ->whereRaw('MONTH(job_date) = ?',[$month])
                ->orderBy('id','asc')
                ->groupBy('job_date')
                ->get();
            if($data){
                return $data;
            }else{
                return false;
            }
            
        }
    }
