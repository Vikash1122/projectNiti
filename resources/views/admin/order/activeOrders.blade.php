@extends('admin.layouts.header_layout')

@section('content')
    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url('../../public/fonts/Nexa Bold.otf');
        }

        @font-face {
            font-family: 'Arial';
            src: url('../../public/fonts/ARIALBD.TTF');
        }
       
        @media only screen and (max-width: 600px) {
            .serviceListBox{
                margin-bottom:20px;
                float: left;
                width: max-content;
            }
            .page-title{
                padding: 5px;
            }
            .page-title h3{
                font-size: 18px !important;
                line-height: 15px !important;
            }
           
        }
        .page-title h3 {
            width: auto !important;
            font-family: 'Nexa Bold';
            color: #454545;
            padding-left: 10px;
            line-height: 20px;
            letter-spacing: 1.0px;
            font-size: 22px;
        }
        .nav-tabs{
            background:transparent;
            display: inline-block;
        }
        .filterName{
            width: 100%;
            float: left;
            border-bottom: 1px solid #dfdfe0e8;
            margin-bottom: 15px;
        }
        .filterName ul{
            padding-left: 0;
        }
        .filterName ul li{
            list-style: none;
            float: left;
        }
        .filterName ul li a{
            line-height: 20px;
            
            padding-left: 20px;
            
            font-weight: 500;
            color: rgba(96, 96, 96, .6);
            font-size: 16px;
            padding: 8px 30px;
            float: left;
        }
        .outerNavTab .nav-tabs>li.active>a, .outerNavTab .nav-tabs>li.active>a:focus, .outerNavTab .nav-tabs>li.active>a:hover{
            background: #2f9247;
            color: #fff;
            font-weight: 500;
            font-size: 15px;
            letter-spacing: 1px;
        }
        .outerNavTab .nav-tabs>li>a{
            background: #fff;
            font-size: 15px;
            font-weight: 500;
            color: #2f9147;
            border-right: 1px solid #ccc;
            border-radius: 4px;
            border-top: 1px solid #ccc;
            padding: 15px 30px;

        }
        .odr_main_box{
            background:#DCDCDC;
            width:100%;
            float:left;
            border-radius:5px;
            padding: 15px 15px 0px;
            margin-bottom: 10px;
        }
        .actFilter{
            border-bottom:3px solid #2f9147;
        }
        .numPPM{
            color:#393939;
            font-size: 17px;
            font-weight: 500;
            font-family: 'Nexa Bold';
        }
        .odr_main_box .labelHead{
            color:#848484;
            font-size: 12px;
            font-family: 'Nexa Bold';
            letter-spacing: .6px;
            float: left;
            display: block;
            width: 100%;
        }
        .odr_main_box .txtHead{
            color:#393939;
            font-size: 15px;
            font-weight: 500;
            font-family: 'Nexa Bold';
            letter-spacing: .6px;
            float: left;
            display: block;
            width: 100%;
        }
        .greenText{
            color:#039347;
        }
        .columnLast{

        }
        .columnLast .imgDiv{
            width:80px;
            height:80px;
            border-radius:50%;
            padding:5px;
            margin-bottom: 10px;
            float: left;
        }
        .columnLast .imgDiv img{
            width:100%;
            overflow:hidden;
        }
        .odr_main_box .form-group {
            margin-bottom: 5px;
            float: left;
        }
        .odr_main_box .trackBtn{
            background: #AAAAAA;
            border: 1px solid #707070;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 16px;
            color: #393939;
            font-family: 'Nexa Bold';
            margin-bottom: 10px;
        }
        .odr_main_box .dtMore{
            background: #039347;
            border: 1px solid #039347;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            font-family: 'Nexa Bold';
            margin-bottom: 10px;
        }
        .columnLast .leftDiv{
           width:75%;
           float:left;     
        }
        .columnLast .rightDiv{
           width:25%;
           float:right;   
           text-align: right;  
        }
        .columnLast .rightDiv .form-group{
            float:right;
        }
        .columnLast .leftDiv .actBtn{
            width: auto;
            float: right;
        }
    </style>

    <div class="content">
        <div class="page-title"> 
            <h3>Active Orders  </h3>
        </div>

        <div class="outerNavTab">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#ppmp" aria-controls="ppmp" role="tab" data-toggle="tab">PPMP</a></li>
                <li role="presentation"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Jobs</a></li>
                <li role="presentation"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="ppmp">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filterName">
                                <ul>
                                    <li class="actFilter"><a href="javascript:;" id="all" class="ff"> All</a></li>
                                    <li><a href="javascript:;" id="requested" class="ff" >Requested</a></li>
                                    <li><a href="javascript:;" id="surveyed" class="ff" >Surveyed</a></li>
                                    <li><a href="javascript:;" id="proposed" class="ff" >Proposed</a></li>
                                    <li><a href="javascript:;" id="scheduled" class="ff">Scheduled</a></li>
                                    <li><a href="javascript:;" id="inProgress" class="ff">In Progress</a></li>
                                    <li><a href="javascript:;" id="completed" class="ff">Completed</a></li>
                                    <li><a href="javascript:;" id="onHold" class="ff">On Hold</a></li>
                                    <li><a href="javascript:;" id="canceled" class="ff">Canceled</a></li>
                                    <li><a href="javascript:;" id="rejected" class="ff">Rejected</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="odr_main_box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="numPPM">PPMP No. 45645</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Next PPMP Date</div>
                                                    <div class="txtHead">21st December, 2018</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Customer Name</div>
                                                    <div class="txtHead">Vineet Tomar</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Package</div>
                                                    <div class="txtHead">Premium</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="labelHead">Location</div>
                                                    <div class="txtHead">Jumierah Village Circle, Dubai, UAE</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">PPMP Duration</div>
                                                    <div class="txtHead">45 minutes</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Team Leader</div>
                                                    <div class="txtHead">Nishikant</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Estimated Start Time</div>
                                                    <div class="txtHead">8:00 am</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Team Members</div>
                                                    <div class="txtHead">4</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">PMPP Status</div>
                                                    <div class="txtHead greenText">Scheduled</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Number</div>
                                                    <div class="txtHead">052 100 6969</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="columnLast">                                           
                                            <div class="leftDiv">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="imgDiv">
                                                            <img src="http://3.16.87.53/public/img/defaultIcon.png" class="img-responsive" />
                                                        </div>
                                                        <div class="actBtn">
                                                            <button type="button" class="trackBtn">TRACK</button>
                                                            <button type="button" class="trackBtn">SCHEDULE</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="labelHead">PPMP Service</div>
                                                            <div class="txtHead">AC Servicing</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="rightDiv">
                                                <div class="form-group">
                                                    <button type="button" class="dtMore text-left">MORE <br />DETAILS <br/><br/><br/><span class="pull-right"><i class="fa fa-angle-right fa-2x"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="jobs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filterName">
                                <ul>
                                    <li class="actFilter"><a href="javascript:;" id="all"  class="ff"> All</a></li>
                                    <li><a href="javascript:;" id="requested">Requested</a></li>
                                    <li><a href="javascript:;" id="surveyed">Surveyed</a></li>
                                    <li><a href="javascript:;" id="proposed">Proposed</a></li>
                                    <li><a href="javascript:;" id="scheduled">Scheduled</a></li>
                                    <li><a href="javascript:;" id="inProgress">In Progress</a></li>
                                    <li><a href="javascript:;" id="completed">Completed</a></li>
                                    <li><a href="javascript:;" id="onHold" >On Hold</a></li>
                                    <li><a href="javascript:;" id="canceled">Canceled</a></li>
                                    <li><a href="javascript:;" id="rejected">Rejected</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="odr_main_box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="numPPM">Job No. 23524</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Job Date</div>
                                                    <div class="txtHead">21st December, 2018</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Customer Name</div>
                                                    <div class="txtHead">Vineet Tomar</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Package</div>
                                                    <div class="txtHead">Premium</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="labelHead">Location</div>
                                                    <div class="txtHead">Jumierah Village Circle, Dubai, UAE</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Job Duration</div>
                                                    <div class="txtHead">45 minutes</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Team Leader</div>
                                                    <div class="txtHead">Nishikant</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Estimated Start Time</div>
                                                    <div class="txtHead">8:00 am</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Team Members</div>
                                                    <div class="txtHead">4</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Job Status</div>
                                                    <div class="txtHead greenText">Accepted</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Number</div>
                                                    <div class="txtHead">052 100 6969</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="columnLast">                                           
                                            <div class="leftDiv">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="imgDiv">
                                                            <img src="http://3.16.87.53/public/img/defaultIcon.png" class="img-responsive" />
                                                        </div>
                                                        <div class="actBtn">
                                                            <button type="button" class="trackBtn">TRACK</button>
                                                            <button type="button" class="trackBtn">SCHEDULE</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="labelHead">Job Service</div>
                                                            <div class="txtHead">AC Repair, Electrical</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="rightDiv">
                                                <div class="form-group">
                                                    <button type="button" class="dtMore text-left">MORE <br />DETAILS <br/><br/><br/><span class="pull-right"><i class="fa fa-angle-right fa-2x"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="odr_main_box">
                                <div class="row">
                                   <div class="col-md-12">
                                        <h3 class="text-center">Data not found!</h3>
                                   </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="projects">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filterName">
                                <ul>
                                    <li class="actFilter"><a href="javascript:;" id="all"  class="ff"> All</a></li>
                                    <li><a href="javascript:;" id="requested">Requested</a></li>
                                    <li><a href="javascript:;" id="surveyed">Surveyed</a></li>
                                    <li><a href="javascript:;" id="proposed">Proposed</a></li>
                                    <li><a href="javascript:;" id="scheduled">Scheduled</a></li>
                                    <li><a href="javascript:;" id="inProgress">In Progress</a></li>
                                    <li><a href="javascript:;" id="completed">Completed</a></li>
                                    <li><a href="javascript:;" id="onHold" >On Hold</a></li>
                                    <li><a href="javascript:;" id="canceled">Canceled</a></li>
                                    <li><a href="javascript:;" id="rejected">Rejected</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="odr_main_box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="numPPM">Project No. 23524</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Project Start Date</div>
                                                    <div class="txtHead">21st December, 2018</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Customer Name</div>
                                                    <div class="txtHead">Vineet Tomar</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Package</div>
                                                    <div class="txtHead">Premium</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="labelHead">Location</div>
                                                    <div class="txtHead">Jumierah Village Circle, Dubai, UAE</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Project End Date</div>
                                                    <div class="txtHead">23rd December, 2018</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Team Leader</div>
                                                    <div class="txtHead">Nishikant</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Estimated Start Time</div>
                                                    <div class="txtHead">8:00 am</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Team Members</div>
                                                    <div class="txtHead">4</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Project Status</div>
                                                    <div class="txtHead greenText">Accepted</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <div class="labelHead">Number</div>
                                                    <div class="txtHead">052 100 6969</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="columnLast">                                           
                                            <div class="leftDiv">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="imgDiv">
                                                            <img src="http://3.16.87.53/public/img/defaultIcon.png" class="img-responsive" />
                                                        </div>
                                                        <div class="actBtn">
                                                            <button type="button" class="trackBtn">TRACK</button>
                                                            <button type="button" class="trackBtn">SCHEDULE</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="labelHead">Project Service</div>
                                                            <div class="txtHead">Carpentry, Masionary</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="rightDiv">
                                                <div class="form-group">
                                                    <button type="button" class="dtMore text-left">MORE <br />DETAILS <br/><br/><br/><span class="pull-right"><i class="fa fa-angle-right fa-2x"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  


    <script src="http://3.16.87.53/public/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function(){
            $('.ff').click(function(e){
                //console.log(e);
                $(e.target).parent().addClass('actFilter');
                $(e.target).parent().siblings().removeClass('actFilter');
            });
        })
    </script>

@endsection 