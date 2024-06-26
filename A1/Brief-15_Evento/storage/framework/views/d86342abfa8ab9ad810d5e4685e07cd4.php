<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evento | Forget Password</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-200 ">
<div class="h-screen my-auto flex flex-col items-center justify-center px-6  mx-auto  lg:py-0">
    <div class="w-full bg-white rounded-lg shadow white:border md:mt-0 sm:max-w-md xl:p-0 white:bg-gray-800 white:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl white:text-white">
                Reset Password
            </h1>
            <?php if(session('error')): ?>
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="bg-gray-100-500 p-4 rounded-lg mb-6 text-green-700 text-center">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <form class="space-y-4 md:space-y-6" method="post" action="<?php echo e(route('admin.forget_password_submit')); ?>">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Your email</label>
                    <input  type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " placeholder="name@company.com" >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <li class="text-red-600 mt-1  p-2 text-sm">
                        <?php echo e($message); ?>

                    </li>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="w-full text-white bg-gray-900 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-primary-600 white:hover:bg-primary-700 white:focus:ring-primary-800">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/admin/forget-password.blade.php ENDPATH**/ ?>