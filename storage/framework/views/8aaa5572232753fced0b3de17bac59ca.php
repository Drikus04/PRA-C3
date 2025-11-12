<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem auto; max-width: 480px; }
        form { display: grid; gap: 1rem; }
        label { display: grid; gap: 0.5rem; }
        input[type="email"], input[type="password"] { padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 0.5rem 1rem; border: none; background: #222; color: #fff; border-radius: 4px; cursor: pointer; }
        .errors { background: #ffe0e0; border: 1px solid #f99; padding: 1rem; border-radius: 4px; }
        .links { display: flex; justify-content: space-between; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>Inloggen</h1>

    <?php if($errors->any()): ?>
        <div class="errors">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <label>
            E-mailadres
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
        </label>
        <label>
            Wachtwoord
            <input type="password" name="password" required>
        </label>
        <label style="display: flex; align-items: center; gap: 0.5rem;">
            <input type="checkbox" name="remember" value="1" <?php echo e(old('remember') ? 'checked' : ''); ?>>
            Onthoud mij
        </label>
        <button type="submit">Log in</button>
    </form>

    <div class="links">
        <a href="<?php echo e(route('register')); ?>">Nog geen account?</a>
        <a href="<?php echo e(route('home')); ?>">Terug naar start</a>
    </div>
</body>
</html>

<?php /**PATH C:\school\laragon\laragon\www\c33main\resources\views/auth/login.blade.php ENDPATH**/ ?>