<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;
    
    class JobService extends Model {
        //
        protected $table = 'job_services';
        public $timestamps = false;
        
        
        public static function InsertJobService($data) {
            $insert = new JobService();
            $insert->job_id = (isset($data['job_id'])) ? $data['job_id'] : '';
            $insert->service_id = (isset($data['service_id'])) ? $data['service_id'] : NULL;
            $insert->specify_problem = (isset($data['specify_problem'])) ? $data['specify_problem']: NULL;
            $insert->additional_notes = (isset($data['additional_notes'])) ? $data['additional_notes']: NULL;
            $insert->service_image = (isset($data['service_image'])) ? $data['service_image']: NULL;
            $save = $insert->save();
           // print_r($input);die();
            if ($save) {
                $insert_id = $insert->id;
                return $insert_id;
            }else{
                return false;
            }
        }
    
    }
