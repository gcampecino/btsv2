<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php if(!isset($bus)): ?><?php echo e(url('/bus/store')); ?><?php else: ?> <?php echo e(url('/bus/update/'.$bus->id)); ?> <?php endif; ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(isset($bus) ? $bus->name : ''); ?>" required autofocus>
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Desciption</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description"><?php echo e(isset($bus) ? $bus->description : ''); ?></textarea>

                                <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if(isset($bus)): ?>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus Schedule</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Bus Stop</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $bus->schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedules): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tbody>
                        <tr>
                            <td><?php echo e($schedules->busStop->name); ?></a></td>
                            <td><?php echo e($schedules->day); ?></td>
                            <td><?php echo e($schedules->time); ?></td>
                            <td><?php echo e($schedules->description); ?></td>
                        </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Create New Bus Schedule</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/bus-schedule/store')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="bus_id" value="<?php echo e($bus->id); ?>" />
                        <div class="form-group">
                            <label for="bus_stop_id" class="col-md-4 control-label">Bus Stop</label>
                            <div class="col-md-6">
                                <select class="form-control" id="bus_stop_id" name="bus_stop_id">
                                    <?php $__currentLoopData = $busStops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busStop): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($busStop->id); ?>"><?php echo e($busStop->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day" class="col-md-4 control-label">Day</label>
                            <div class="col-md-6">
                                <select class="form-control" id="day" name="day">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <select class="form-control" id="time" name="time">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo e($i < 10 ? '0'.$i.':00' : $i.':00'); ?>"><?php echo e($i < 10 ? '0'.$i.':00' : $i.':00'); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Desciption</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description"></textarea>

                                <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>