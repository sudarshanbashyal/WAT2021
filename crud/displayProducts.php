<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/displayStyle.css">
    <title>Products</title>
</head>
<body>
    
    <?php
        include 'navbar.php';
    ?>
    
    <div class="container">

        <?php
            include 'connection.php';
            
            $selectQuery = "SELECT * FROM products";
            $selectQueryResponse = mysqli_query($connection, $selectQuery);
        ?>

        <!-- displaying all the selected products -->
        <div class="products">

            <table >
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Showcase</th>
                        <th>Amend Product</th>
                        <th>Delete Product</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- display product rows in the table -->
                    <?php
                        foreach($selectQueryResponse as $product){
                            echo "<tr>";
                            echo "<td>$product[ProductName]</td>";
                            echo "<td>$ $product[ProductPrice]</td>";
                            echo "<td><div class='product-image'><img src='images/$product[ProductImageName].jpg' alt='Product Image'></div></td>";
                            
                            echo "
                                <td>
                                <form method='POST' action='amendProduct.php?id=$product[ProductId]'>
                                    <button class='delete-btn' type='submit' name='update$product[ProductId]'><svg class='edit-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M18 14.45v6.55h-16v-12h6.743l1.978-2h-10.721v16h20v-10.573l-2 2.023zm1.473-10.615l1.707 1.707-9.281 9.378-2.23.472.512-2.169 9.292-9.388zm-.008-2.835l-11.104 11.216-1.361 5.784 5.898-1.248 11.103-11.218-4.536-4.534z'/></svg></button>
                                </form>
                                </td>
                            ";

                            echo "
                                <td>
                                <form method='POST' action='deleteProduct.php?id=$product[ProductId]'>
                                    <button class='delete-btn' type='submit' name='del$product[ProductId]'><svg class='trash-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M21 6l-3 18h-12l-3-18h2.028l2.666 16h8.611l2.666-16h2.029zm-4.711-4c-.9 0-1.631-1.099-1.631-2h-5.316c0 .901-.73 2-1.631 2h-5.711v2h20v-2h-5.711z'/></svg></button>
                                </form>
                                </td>
                            ";

                            echo "</tr>";
                        }
                    ?>
                </tbody>
                
                
            </table>
            
        </div>
    </div>

</body>
</html>