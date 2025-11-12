<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <header>
    <nav style="display:flex; gap:.75rem; justify-content:flex-end; margin: 1rem 0;">
        <?php if(auth()->guard()->check()): ?>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Log out</button>
            </form>
        <?php else: ?>
            <?php if(Route::has('login')): ?>
                <a href="<?php echo e(route('login')); ?>">Log in</a>
            <?php endif; ?>
            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>">Register</a>
            <?php endif; ?>
        <?php endif; ?>
    </nav>
    </header>
    <main>
    <?php if(auth()->guard()->check()): ?>
        <section style="margin: 1rem 0; padding: 1rem; border: 1px solid #e5e7eb; border-radius: .5rem;">
            <?php if(session('status')): ?>
                <div style="margin-bottom:.5rem; color: #065f46;"><?php echo e(session('status')); ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('teams.store')); ?>" style="display:flex; gap:.5rem; align-items:center;">
                <?php echo csrf_field(); ?>
                <input
                    type="text"
                    name="name"
                    value="<?php echo e(old('name')); ?>"
                    placeholder="Teamnaam"
                    style="padding:.5rem; border:1px solid #d1d5db; border-radius:.375rem; flex: 1 1 auto;"
                    required
                />
                <button type="submit" style="padding:.5rem .75rem; border:0; background:#111827; color:#fff; border-radius:.375rem;">Team toevoegen</button>
            </form>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div style="color:#b91c1c; margin-top:.25rem;"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </section>
    <?php endif; ?>

    <section aria-label="Teams" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: .75rem;">
        <?php $__empty_1 = true; $__currentLoopData = ($teams ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div style="border:1px solid #e5e7eb; border-radius:.5rem; padding:.75rem;">
                <div style="font-weight:600;"><?php echo e($team->name); ?></div>
                <div style="font-size:.8rem; color:#6b7280;">Aangemaakt op <?php echo e($team->created_at->format('d-m-Y')); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="color:#6b7280;">Nog geen teams aangemaakt.</div>
        <?php endif; ?>
    </section>
    </main>

    <footer>

    </footer>

</body>
</html>
<?php /**PATH C:\laragon\www\c33main\resources\views/voetbal/index.blade.php ENDPATH**/ ?>