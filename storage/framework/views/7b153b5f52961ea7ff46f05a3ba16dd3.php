

<?php $__env->startSection('titulo', 'Inicio de Sesión'); ?>

<?php $__env->startSection('contenido'); ?>
    <?php if(auth()->guard()->check()): ?>
        <h1>Ya has iniciado sesión</h1>
        <a href="<?php echo e(route('zonaprivada')); ?>">Ir a zona privada</a>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <div class="login">
            <h1>Iniciar Sesión</h1>
            <?php if($errors->any()): ?>
                <div style="color: red;">
                    <h2>ERRORES:</h2>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
        </div>    
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.basePublica', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rubia\dwes05\resources\views/auth/login.blade.php ENDPATH**/ ?>