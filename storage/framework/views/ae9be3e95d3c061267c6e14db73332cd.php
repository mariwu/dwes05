

<?php $__env->startSection('titulo', 'Crítica'); ?>

<?php $__env->startSection('contenido'); ?>
    
    <?php if(isset($error)): ?>
        <h2>Error</h2>
        <p><?php echo e($error); ?></p>
    <?php endif; ?>

    
    <?php if(isset($resultado)): ?>
        <h2>¡Crítica creada correctamente!</h2>
        <p><?php echo e($resultado); ?></p>
    <?php endif; ?>

    
    <a href="<?php echo e(route('zonapublica')); ?>">Volver al listado de películas</a><br>
    <a href="<?php echo e(route('zonaprivada')); ?>">Ir a mi zona privada</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.basePrivada', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rubia\Desktop\DAW Segundo\SegundoMaria\Servidor\TAREAS\dwes05\resources\views/privada/criticacreadaMFG.blade.php ENDPATH**/ ?>