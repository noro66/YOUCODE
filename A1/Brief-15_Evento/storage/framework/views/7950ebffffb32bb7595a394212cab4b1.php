<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container m-auto p-4 bg-gray-100">










    <div class="flex flex-col justify-center w-4/12 m-auto">
        <a  href="<?php echo e(route('events.create')); ?>">
        <div class="mb-4 hover:bg-slate-900  border text-white rounded text-center block w-4/12 cursor-pointer  bg-blue-950 py-2 px-1.5 ">
            Create Category
        </div>
        </a>

        <?php if($categories->count()): ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class=" p-4 border  w-100 rounded-lg overflow-hidden shadow-lg">
                <div class="flex flex-col p-2  rounded">

                    <h3 class="text-xl font-semibold mb-2"><span class="font-medium">Category Name :</span>  <span class="underline"><?php echo e($category->name); ?></span></h3>
                <div class="p-6 flex items-center justify-between">
                    <form action="<?php echo e(route('events.destroy', $category->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded">Delete Category</button>
                    </form>
                    <div>
                    <a href="<?php echo e(route('events.edit', $category->id)); ?>" class="bg-gray-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Category</a>
                    </div>

                </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <h3 class="bg-gray-100 text-3xl rounded-full text-center p-2">There is no Category</h3>
        <?php endif; ?>

    </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/admin/events/events.blade.php ENDPATH**/ ?>
