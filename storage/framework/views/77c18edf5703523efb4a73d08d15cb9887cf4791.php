
<?php $__env->startSection('css'); ?>
<style>
 /*background Colors*/
 .red{
    background: rgb(244, 67, 54);
}
.indigo{
    background: rgb(63, 81, 181);
}
.green{
    background: rgb(76, 175, 80);
}
.darkBlue{
    background: rgb(63, 81, 181);
}
.teal{
    background: rgb(0, 150, 136);
}
.black{
    background: rgb(0, 0, 0);
}
.maroon{
    background: rgb(128, 0, 0);
}
.yellow{
    background: rgb(255, 255, 0);
}
.olive{
    background: rgb(128, 128, 0);
}
.lime{
    background: rgb(0, 255, 0);
}
.aqua{
    background: rgb(0, 255, 255);
}
.salmon{
    background: rgb(250, 128, 114);
}
</style>
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>

        <div class="content">
            <div class="page-title"> 
                <a  class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                    <!-- <i class="icon-custom-left"></i> -->
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Contact Enquiry  <span class="semi-bold">&nbsp;</span></h3>
                <div class="serchBarDiv">
                    <div class="searchContainer">
                        <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                        <i class="fa fa-search searchIcon"></i>
                    </div>
                </div>
            </div>

            <div class="content-box-main contactEnq">
                <div class="col-md-12">
                    <div class="qryList" id="style-1">
                        <div class="force-overflow">
                            <div id="enqBoxOuter"> 
                                
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
var safeColors = ['red','indigo','green','darkBlue','teal','black','maroon','yellow','olive','lime','aqua','salmon'];
var rand = function() {
    return Math.floor(Math.random()*6);
};
var randomColor = function() {
    var r = safeColors[rand()];
    return r;
};
var valsearch='';
    $(document).ready(function(){
        //randomColor();
        $(".multiselect").val(["Jim", "Lucy"]).select2();
        $('#source-tags').tagsinput({
            typeahead: {
                source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
            }
        });

        GetAllData(valsearch);
         $('#search').keyup(function(){
             valsearch=$(this).val();
             GetAllData(valsearch);
            // randomColor();
             });


    });

function GetAllData(val){
    $.ajax({
        type : 'get',
        url : '<?php echo e(URL::to("/admin/quries/search")); ?>',
        data:{
            'search':val
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            $('#enqBoxOuter').html('');
            if(json.length > 0){
                $.each(json,function(index, value){
                
                    $("#enqBoxOuter").append( '<div class="enqMainBox">'+
                            '<div class="nameDiv">'+value.firstname.substr(0, 1)+'</div>'+
                            '<div class="enqContent">'+
                                '<h4>'+value.firstname+' '+value.lastname+' <span class="enqDate">2 hours ago</span>'+
                                '</h4>'+
                                '<p>'+value.message+'</p>'+
                                
                                '<p class="enqCtBlock">'+
                                    '<span><i class="fa fa-envelope"></i> '+value.email+'</span>'+
                                    '<span><i class="fa fa-phone"></i> '+value.mobile+'</span>'+
                                '</p>'+
                            '</div>'+
                        '</div>')
                    ;
                    
                });
                $('.nameDiv').each(function() {
                    $(this).addClass(randomColor());
                })
            }else{
                htmlslot='<div class="col-md-12">'+
                                '<h4 class="text-center">No Record Found!</h4>'+
                            '</div>';
                    
                    $("#enqBoxOuter").append(htmlslot);
            }
            
        }
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>