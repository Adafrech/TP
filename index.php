<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>C.R.U.D</title>
    <link rel="icon" href="UTN_logo.jpg"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Simple CRUD</h1>


        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Agregar Item</button>
        <div class="modal" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;"></button>
                    </div>
                    <div class="modal-body">
                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Cantidad:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen:</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $mysqli->query("SELECT * FROM items");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['price']}</td>
                            <td><img src='{$row['image']}' alt='{$row['name']}' width='50'></td>
                            <td>
                                <button class='btn btn-info' data-toggle='modal' data-target='#editModal{$row['id']}'>Editar</button>
                                <button class='btn btn-danger' data-toggle='modal' data-target='#deleteModal{$row['id']}'>Eliminar</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php

$result = $mysqli->query("SELECT * FROM items");
while ($row = $result->fetch_assoc()) {
    
    echo "<div class='modal' id='editModal{$row['id']}'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h4 class='modal-title'>Editar Item</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
                    <div class='modal-body'>
                        <form action='edit.php' method='post' enctype='multipart/form-data'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <div class='form-group'>
                                <label for='name'>Nombre:</label>
                                <input type='text' class='form-control' id='name' name='name' value='{$row['name']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='quantity'>Cantidad:</label>
                                <input type='number' class='form-control' id='quantity' name='quantity' value='{$row['quantity']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='price'>Precio:</label>
                                <input type='number' step='0.01' class='form-control' id='price' name='price' value='{$row['price']}' required>
                            </div>
                            <div class='form-group'>
                                <label for='image'>Imagen:</label>
                                <input type='file' class='form-control' id='image' name='image' required>
                            </div>
                            <button type='submit' class='btn btn-success'>Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>";

    // Delete Modal
    echo "<div class='modal' id='deleteModal{$row['id']}'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h4 class='modal-title'>Eliminar Item</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
                    <div class='modal-body'>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <p>¿Estás seguro de que deseas eliminar este item?</p>
                            <button type='submit' class='btn btn-danger'>Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
}
?>
    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>