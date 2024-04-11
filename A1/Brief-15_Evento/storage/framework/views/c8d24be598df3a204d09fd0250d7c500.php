<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("Welcome Admin , ")); ?>

                    <?php echo e(auth()->guard('admin')->user()->name); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>