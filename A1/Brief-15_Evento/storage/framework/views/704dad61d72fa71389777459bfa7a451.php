<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Posty | dash</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net"/>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-200">
<section class="flex flex-col sm:flex-row h-screen">
    <div class="sm:w-1/5 bg-gray-900 py-8 px-4">
        <ul class="space-y-[10px]" >

            <li class="flex sm:bg-black items-center gap-x-4  rounded mb-[40px]" >
                <img src="<?php echo e(asset('storage/Publicimages/logo.svg')); ?>" alt="Dashboard img" class="w-[200px]" >
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="<?php echo e(asset('storage/Publicimages/dashboardImage.svg')); ?>" alt="Dashboard img" class="w-[40px]" >
                <a href="<?php echo e(route('organizer.dashboard')); ?>" class="hidden lg:flex font-[500] text-lg text-white" >Dashboard</a>
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="<?php echo e(asset('storage/Publicimages/events.svg')); ?>" alt="Reservation img" class="w-[40px]" >
                <a href="<?php echo e(route('organizer.events')); ?>" class="hidden lg:flex font-[500] text-lg text-white" >Events</a>
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="<?php echo e(asset('storage/Publicimages/profile.svg')); ?>" alt="Profile Img" class="w-[40px]" >
                <a href="<?php echo e(route('organizer.profile')); ?>" class="hidden lg:flex font-[500] text-lg text-white" >Profile</a>
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="<?php echo e(asset('storage/Publicimages/settings.svg')); ?>" alt="Settings Img" class="w-[40px]" >
                <a href="<?php echo e(route('organizer.settings')); ?>" class="hidden lg:flex font-[500] text-lg text-white" >Settings</a>
            </li>
        </ul>
    </div>
    <div class="w-full sm:w-4/5 bg-gray-600 p-4" >
        <div class="bg-gray-600">

            <!-- Button to open the modal -->
            <button id="openModalButton" onclick="toggleModal()" class=" bg-gray-900 px-4 py-1 rounded m-4 text-gray-300 hover:text-slate-50-100">Create Event</button>
            <?php if($errors->any()): ?>
                <div class="bg-red-100  w-6/12 m-auto border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- Modal backdrop -->
            <div id="modalBackdrop" class="fixed  inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <!-- Modal container -->
                <div class="bg-white p-8 s  rounded shadow-md ">
                    <div class="flex justify-between items-baseline">
                        <!-- Modal content -->
                        <h2 class="text-lg  mb-1">Add Event</h2>
                        <!-- Close button -->
                        <button id="closeModalButton" onclick="toggleModal()" class=" bg-gray-900 px-4 py-1 rounded m-4 text-gray-100 hover:text-gray-800">
                            Close
                        </button>
                    </div>

                    <!-- Form -->
                    <form action="<?php echo e(route('event.store')); ?>" method="post" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>
                        <div class="mb-1">
                           <input value="<?php echo e(old('title')); ?>" type="text" id="title" name="title"  placeholder="Event Title" class="mt-1 p-2 block w-full text-black border rounded-md <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>

                        <div class="mb-1">
                             <textarea id="description" name="description" placeholder="Event Description" class="mt-1 p-2 block w-full border rounded-md <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="mb-1">
                          <input value="<?php echo e(old('date')); ?>" type="date" id="date" name="date" placeholder="Event Date" class="mt-1 p-2 block w-full border rounded-md <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>
                        <div class="mb-1">
                            <input value="<?php echo e(old('time')); ?>" type="time" id="time" name="time" placeholder="Event Time" class="mt-1 p-2 block w-full border rounded-md <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>
                        <div class="mb-1">
                              <input value="<?php echo e(old('category')); ?>" class="p-2  rounded w-full border-2 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" list="categoryList" name="category" id="category_id" placeholder="Search for a category ">
                            <datalist id="categoryList">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->name); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                        </div>
                        <div class="mb-1">
                           <input value="<?php echo e(old('Address')); ?>" type="text" id="Address" placeholder="Event Address" name="Address" class="mt-1 p-2 block w-full border rounded-md <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>
                        <div class="mb-1">
                            <input value="<?php echo e(old('poster_image')); ?>" type="file" id="poster_image" placeholder="Event poster image" name="poster_image" class="mt-1 p-2 block w-full border rounded-md <?php $__errorArgs = ['poster_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>
                        <div class="mb-1">
                            <input value="<?php echo e(old('seats')); ?>" type="number" id="seats" placeholder="Event poster seats" name="seats" class="mt-1 p-2 block w-full border rounded-md <?php $__errorArgs = ['seats'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>

                        <div class="mb-1">
                                <select name="confirmation_type"  class="p-2 <?php $__errorArgs = ['confirmation_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option selected   >Select Confirmation Type</option>
                                    <option <?php if(old('confirmation_type') === 'automatic'): ?> selected <?php endif; ?> class="automatic">automatic</option>
                                    <option <?php if(old('confirmation_type') === 'manually'): ?> selected <?php endif; ?> class="manually">manually</option>
                                </select>
                        </div>
                        <button type="submit"  class="w-full bg-gray-900 px-4 ml-2 py-2 rounded m-4 text-gray-300 hover:text-slate-50">Submit</button>
                    </form>
                </div>
            </div>
            <div class="grid my-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="w-full p-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="<?php echo e(asset('storage/eventImages/0aJFw9mEYapYielF7QWcllkE3iYs61sEhfBp9dcU.png')); ?>" alt="Speaker image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Title : <?php echo e($event->title); ?></h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400"> <span class="text-xl text-gray-100">Description :</span> <?php echo e(\Illuminate\Support\Str::limit($event->description, 20)); ?> </span>
                            <div class="flex mt-4 md:mt-6">
                                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                                
                                <a href="<?php echo e(route('event.show', $event->id)); ?>" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Details</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="fixed right-24    bottom-10">
                <?php echo e($events->links()); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let modalBackdrop = document.getElementById('modalBackdrop');
    function toggleModal() {
        modalBackdrop.classList.toggle('hidden');
        return 0;
    }
</script>
</body>
</html>
<?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/organizer/events.blade.php ENDPATH**/ ?>