<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Posty | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased dark:bg-gray-800 dark:text-white">

<?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH /var/www/html/YOUCODE/A1/Brief-15_Evento/resources/views/layouts/app-normal.blade.php ENDPATH**/ ?>