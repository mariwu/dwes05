

<?php $__env->startSection('titulo', 'Zona Privada'); ?>

<?php $__env->startSection('contenido'); ?>
        <H2>Bienvenido <?php echo e(Auth::user()->name); ?> a la página principal de la zona PRIVADA.</H2>
            <A href="<?php echo e(route('zonapublica')); ?>">Ve a la zona pública</A><BR>
            <A href="<?php echo e(route('logout')); ?>">Cierra sesión.</A></BR>
        
        <h2>Mis criticas</h2>
        <h3>En total has realizado <?php echo e($totalCriticas); ?> criticas</h3>
        
        <?php if($totalCriticas == 0): ?>
            <p>No tienes criticas todavía. ¡Animate y critica alguna pelicula!</p>
        <?php else: ?>
            <table border=1>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Valoración</th>
                        <th>Comentario</th>
                        <th>Título película</th>
                        <th>Año</th>
                        <th>Dirección</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $criticas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $critica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($critica->id); ?></td>
                        <td><?php echo e($critica->valoracion); ?></td>
                        <td><?php echo e($critica->comentario); ?></td>
                        
                        <td><?php echo e($critica->pelicula()->first()->titulo); ?></td>
                        <td><?php echo e($critica->pelicula()->first()->anio); ?></td>
                        <td><?php echo e($critica->pelicula()->first()->direccion); ?></td>
                        <td>
                            <form action="<?php echo e(route('formborracriticaMFG')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="critica_id" value="<?php echo e($critica->id); ?>">
                                <button type="submit">Borrar</button>
                            </form>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.basePrivada', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rubia\dwes05\resources\views/privada/principal.blade.php ENDPATH**/ ?>