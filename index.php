<?php

require __DIR__ . '/lib/db-settings.php';
require __DIR__ . '/lib/db.php';

$db = new PDOWrapper($dsn, USER, PASSWORD);
$products = $db->listAll('products');
?>
<!doctype html>
<html lang="en">
<head>
    <title>PHP CRUD + Bootstrap!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-uppercase">Product List</h3>
            <?php if (empty($products)) { ?>
                <div class="alert alert-danger" role="alert">
                    No records found. Try to add a new product.
                </div>
            <?php } else { ?>
                <table class="table table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product->name ?></td>
                            <td><?= $product->description ?></td>
                            <td><?= $product->price ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                if (isset($name) && isset($description) && isset($price)) {
                    $db->insert($name, $description, $price);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    trigger_error('All fields are required, please check!');
                }
            } ?>

            <div class="w-100 col"></div>
            <hr/>
            <h3 class="text-uppercase">Add Product</h3>
            <form action="" method="post">
                <div id="name" class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Add a product name"
                           class="form-control" required>
                </div>
                <div id="description" class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="10"
                              placeholder="Add product description" class="form-control" required></textarea>
                </div>
                <div id="price" class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" placeholder="0.00" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>