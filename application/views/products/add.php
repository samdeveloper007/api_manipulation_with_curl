<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url()?>index.php/products/store" method="post">
        <label for="">Name</label>
        <input type="text" name="name" id="">
        <br><br>
        <label for="">Price</label>
        <input type="text" name="price" id="">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>