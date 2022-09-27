<?php   
    require 'connect.php';
    $sql = "SELECT * FROM product_type";
    $result = mysqli_query($conn,$sql);
?>
<style> 
    a{
        text-decoration: none;
        color: black;
        text-align: end;
    }
</style>
<table class="table table-striped" >
<thead class="table-dark">
    <tr> 
    <th scope="col">หมวดหมู่</th>
    </tr>
</thead>
<tbody>
    <?php while($row = mysqli_fetch_array($result)){ ?>
        <tr>
        <th scope="row" >
<a href="index.php?search=<?php echo $row['TypeName']?>"> <?php echo$row['TypeName'] ?> </a><br>
        </th> 
        </tr>       
<?php }?>
</tbody>
</table>
