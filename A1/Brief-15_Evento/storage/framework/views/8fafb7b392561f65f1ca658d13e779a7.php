<?php $__env->startSection('title', 'Show Category'); ?>
<?php $__env->startSection('user', auth()->guard('organizer')->user()->name); ?>

<?php $__env->startSection('content'); ?>
    <div class="container   p-14 dark:bg-gray-800 dark:text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold mb-4"><?php echo e(auth()->guard('organizer')->user()->name); ?> Event Detail</h1>
            <a href="<?php echo e(route('organizer.events')); ?>" class="block px-8 rounded dark:bg-gray-900 hover:bg-gray-500 mb-4 text-white py-2">Back</a>
        </div>
        <hr class="border-b border-gray-300 mb-8">

        <div class="grid grid-cols-1 ">
            <div class="flex flex-col items-center text-left space-y-4 md:space-y-6">
                <img src="<?php echo e(asset('storage/' . $event['poster_image'])); ?>" alt="Event Poster" class="mt-4 max-w-40 md:max-w-60">
                
                <h1 class="text-3xl font-bold mb-4 text-gray-800"><?php echo e($event['title']); ?></h1>
                <p class="text-gray-100">Date: <span class="font-semibold"><?php echo e($event['date']); ?></span></p>
                <p class="text-gray-100">Description: <span class="font-semibold"><?php echo e($event['description']); ?></span></p>
                <p class="text-gray-100">Address: <span class="font-semibold"><?php echo e($event['Address']); ?></span></p>
                <p class="text-gray-100">Available Seats: <span class="font-semibold"><?php echo e($event['available_seats']); ?>/<?php echo e($event['seats']); ?></span></p>
                <p class="text-gray-100">Seat Price: <span class="font-semibold"><?php echo e($event['seat_price'] ?? 'Free'); ?></span></p>
                <p class="text-gray-100">Status: <span class="font-semibold"><?php echo e($event['status']); ?></span></p>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/organizer/events/show.blade.php ENDPATH**/ ?>