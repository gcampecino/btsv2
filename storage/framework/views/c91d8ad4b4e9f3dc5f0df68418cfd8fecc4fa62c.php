<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus Stops</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Distance</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $busStops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busStop): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tbody>
                        <tr>
                            <td><?php echo e($busStop->name); ?></td>
                            <td><?php echo e($busStop->description); ?></td>
                            <td><?php echo e(round($busStop->distanceFromUser, 2)); ?> km.</td>
                        </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>