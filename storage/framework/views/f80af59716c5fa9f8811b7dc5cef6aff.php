

<?php $__env->startSection('titulo', 'Borrar crítica'); ?>

<?php $__env->startSection('contenido'); ?>
    <h2>¿Estás seguro de que quieres borrar la crítica?</h2>

    
    <?php if(isset($error)): ?>
        <p><?php echo e($error); ?></p>
    <?php endif; ?>

    <h3>Detalles de la crítica:</h3>
    <table>
        <tbody>
            <tr><td>Título</td><td><?php echo e($critica->pelicula()->first()->titulo); ?></td></tr>
            <tr><td>Dirección</td><td><?php echo e($critica->pelicula()->first()->direccion); ?></td></tr>
            <tr><td>Año</td><td><?php echo e($critica->pelicula()->first()->anio); ?></td></tr>
            <tr><td>Tu valoración</td><td><?php echo e($critica->valoracion); ?> de 5</td></tr>
            <tr><td>Tu comentario</td><td><?php echo e($critica->comentario); ?></td></tr>
        </tbody>
    </table>

    
    <form action="<?php echo e(route('borracriticaMFG', $critica->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <p>
            Marca la casilla de confirmación y haz click en "Sí" para confirmar el borrado
            <input type="checkbox" name="confirmacion">
            <button type="submit" name="si">Sí</button>
        </p>
        <p>
            o haz clic en "No" para no borrar la crítica
            <button type="submit" name="no">No</button>
        </p>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.basePrivada', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rubia\dwes05\resources\views/privada/formborracriticaMFG.blade.php ENDPATH**/ ?>