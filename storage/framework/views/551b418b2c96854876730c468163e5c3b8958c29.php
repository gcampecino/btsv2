<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <label>Name : <?php echo e($schedule['name']); ?></label>
                    </div>
                    <div>
                        <label>Description : <?php echo e($schedule['description']); ?></label>
                    </div>
                    <div>
                        <label>Distance : <?php echo e(round($schedule['distanceFromUser'], 3)); ?> km.</label>
                    </div>
                </div>
                <div class="col-md-12 text-center ">
                    Bus List
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $schedule['buses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($bus['name']); ?></td>
                            <td><?php echo e($bus['day']); ?></td>
                            <td><?php echo e($bus['time']); ?></td>
                            <td><?php echo e($bus['bus_desc']); ?></td>
                            <td><?php echo e($bus['sched_desc']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <!-- <div class="col-md-8 col-md-offset-2">
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
                    <tbody>
                        <tr>
                            <td>asdfasdf</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                    <tbody>
                        <tr>
                            <td>asdfasdf</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>