<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Spatie\Activitylog\Traits\LogsActivity;
    
    class JobService extends Model {
        
        use LogsActivity;

        /**
         * Change activity log event description
         *
         * @param string $eventName
         *
         * @return string
         */
        public function getDescriptionForEvent($eventName)
        {
            return __CLASS__ . " model has been {$eventName}";
        }
        protected $table = 'job_services';
        public $timestamps = false;
        
        
        
    
    }
