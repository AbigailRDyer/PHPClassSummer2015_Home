<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <title></title>
    </head>
    <body>
    <center>

        <h3>Viewing Your Cart</h3><br />
        <?php if (isset($checkoutProducts) && count($checkoutProducts) > 0) : ?>
            <table class="table table-condensed" style="width:320px">

                <?php foreach ($checkoutProducts as $row): ?>
                    <tr>
                        <td width="100">
                            <?php if (empty($row['image'])) : ?>
                                No Image
                            <?php else: ?>
                                <img src="../images/<?php echo $row['image']; ?>" width="60" height="60" style="border:1px solid black"/>
                            <?php endif; ?>
                        </td>
                        <td width="150"><?php echo $row['product']; ?></td>
                        <td>$<?php echo $row['price']; ?></td>
                        <?php $total += $row['price']; ?>
                    </tr>    
                    <?php
                endforeach;
                ?>

                <tr>
                    <td>Total</td>
                    <td></td>
                    <td>$<?php echo $total; ?></td>
                </tr>  
            </table>
        <?php else: ?>       
            <h2>No Products Found</h2>

        <?php endif; ?>
    </center>
