<form action="products.php" method="GET" class="row gy-2 gx-3 align-items-center">

    <div class="col-auto">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="Search..." id="searchQuery" name="searchQuery" value=<?php echo isset($_SESSION['search']['query'])?$_SESSION['search']['query']:'' ?>>
    </div>
    <div class="col-auto">
        <input class="btn btn-primary mb-2" type="submit" value="Search" name="search">
    </div>
    
    <div class="col-auto">
        <select class="form-control mb-2 mr-sm-2" name="category">
            <option selected value="">Category: All</option>
            <option value="Electronics" <?php echo (isset($_SESSION['search']['category'])&&$_SESSION['search']['category']=='Electronics')?'selected':'' ?>>Electronics</option>
            <option value="Clothing" <?php echo (isset($_SESSION['search']['category'])&&$_SESSION['search']['category']=='Clothing')?'selected':'' ?>>Clothing</option>
        </select>
    </div>
    
    <div class="col-auto">
        <select class="form-control mb-2 mr-sm-2" name="sort">
            <option selected value="">Sort: Any</option>
            <option value="productPrice DESC" <?php echo (isset($_SESSION['search']['sort'])&&$_SESSION['search']['sort']=='productPrice DESC')?'selected':'' ?> >Prce: Higher to Lower</option>
            <option value="productPrice ASC" <?php echo (isset($_SESSION['search']['sort'])&&$_SESSION['search']['sort']=='productPrice ASC')?'selected':'' ?> >Price: Lower to Higher</option>
            <option value="productName ASC" <?php echo (isset($_SESSION['search']['sort'])&&$_SESSION['search']['sort']=='productName ASC')?'selected':'' ?> >Name: A-Z</option>
            <option value="productName DESC" <?php echo (isset($_SESSION['search']['sort'])&&$_SESSION['search']['sort']=='productName DESC')?'selected':'' ?> >Name: Z-A</option>
        </select>
    </div>
    
</form>