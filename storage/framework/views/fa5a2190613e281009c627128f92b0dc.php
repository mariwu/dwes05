

<?php $__env->startSection('titulo', 'Zona Publica'); ?>

<?php $__env->startSection('contenido'); ?>

    <H2>Bienvenido a la página principal PÚBLICA.</H2>
    <?php if(auth()->guard()->check()): ?>
    Estás autenticado, puedes ir a ...
    <A href="<?php echo e(route('zonaprivada')); ?>">tu zona privada</A><BR>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
    No estás autenticado, por favor ...
    <A href="<?php echo e(route('formlogin')); ?>">inicia sesión.</A><BR>
    <?php endif; ?>

    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Dirección</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Año</th>
                <th>Argumento</th>
                <?php if(auth()->guard()->check()): ?>
                    <th>Total críticas</th>
                    <th>Puntuación media</th>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $peliculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelicula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($pelicula->id); ?></td>
                <td><?php echo e($pelicula->titulo); ?></td>
                <td><?php echo e($pelicula->direccion); ?></td>
                <td><?php echo e($pelicula->genero); ?></td>
                <td><?php echo e($pelicula->duracion); ?></td>
                <td><?php echo e($pelicula->anio); ?></td>
                <td><?php echo e($pelicula->argumento); ?></td>
                <?php if(auth()->guard()->check()): ?>
                <td><?php echo e($pelicula->criticas->count()); ?></td>
                <td><?php echo e($pelicula->criticas->avg('valoracion')); ?></td>
                    <td>
                        <form action="<?php echo e(route('formcriticaMFG')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="pelicula_id" value="<?php echo e($pelicula->id); ?>">
                            <button type="submit">Valorar Película</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.basePublica', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rubia\Desktop\DAW Segundo\SegundoMaria\Servidor\TAREAS\dwes05\resources\views/principal.blade.php ENDPATH**/ ?>