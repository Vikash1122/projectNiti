

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive" />
            </a>
            <h3>Activity Log  </h3>
            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main-ng actLog">
                    <div class="table-responsive tableDiv_ng">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Department</th>
                                    <th>Activity</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $activitylogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td>
                                        <?php if($item->causer['firstname']): ?>
                                            <a href="<?php echo e(url('/admin/users/' . $item->causer['id'])); ?>"><?php echo e(ucwords($item->causer['firstname'])); ?> <?php if(isset($item->causer['lastname']) && !empty($item->causer['lastname']) ){ echo ucwords($item->causer['lastname']);}else{ echo "";}?></a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(ucwords($item->causer['role_name'])); ?></td>
                                    <td><?php echo e($item->description); ?></td>
                                    <td><?php echo e(date("H:i d/m/Y", strtotime($item->created_at))); ?></td>
                                    <td>
                                        <div class="infIcon"><i class="fa fa-info"></i></div>
                                    </td>
                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> <?php echo $activitylogs->appends(['search' => Request::get('search')])->render(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>