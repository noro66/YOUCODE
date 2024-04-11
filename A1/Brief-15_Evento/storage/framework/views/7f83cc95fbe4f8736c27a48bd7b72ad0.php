<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('content'); ?>
    <div class="flex  items-center justify-evenly">
        <h1 class="text-2xl font-bold mb-4">Create Category :   </h1>
        <a href="<?php echo e(route('events.index')); ?>" class=" block  px-8 rounded bg-blue-600 text-white py-2 s" >Back</a>
    </div>
    <div class="w-lg flex flex-col items-center justify-center">
        <form action="<?php echo e(route('events.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name:</label>
                <input type="text" id="name" name="name" placeholder="Category Name" value="<?php echo e(old('name')); ?>" class="mt-1 px-6 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/admin/events/create.blade.php ENDPATH**/ ?>
