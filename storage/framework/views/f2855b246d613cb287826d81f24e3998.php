

<?php $__env->startSection('titulo', 'Nueva crítica'); ?>

<?php $__env->startSection('contenido'); ?>
    <h2>Detalles de la película</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Dirección</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Año</th>
                <th>Argumento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($pelicula->titulo); ?></td>
                <td><?php echo e($pelicula->direccion); ?></td>
                <td><?php echo e($pelicula->genero); ?></td>
                <td><?php echo e($pelicula->duracion); ?></td>
                <td><?php echo e($pelicula->anio); ?></td>
                <td><?php echo e($pelicula->argumento); ?></td>
            </tr>
        </tbody>
    </table>

    
    <h2>Nueva crítica</h2>
    <form action="<?php echo e(route('crearnuevacriticaMFG', $pelicula->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label>Valoración (1-5):</label>
        <select name="valoracion">
            <option value="texto">Seleccione una valoración</option>
            <option value="0">Número no válido</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <label>Comentario:</label><br>
        <textarea name="comentario" rows="5" cols="50"></textarea><br><br>
        <input type="submit" value="Enviar crítica">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.basePrivada', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rubia\dwes05\resources\views/privada/formnuevacriticaMFG.blade.php ENDPATH**/ ?>