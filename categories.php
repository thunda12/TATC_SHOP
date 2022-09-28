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
    table{
        border-radius: 20px;
        margin-top: 20px;
    }
</style>
<table class="table table-hover" >
<thead class="table-dark">
    <tr> 
    <th scope="col">หมวดหมู่</th>
    </tr>
</thead>
<tbody>
    <?php while($row = mysqli_fetch_array($result)){ ?>
        
        <tr>
        <th scope="row" >
        <a href="index.php?search=<?php echo $row['TypeName']?>"> <?php echo$row['TypeName'] ?></a> 
        </th>  
        </tr>      
       
<?php }?>
</tbody>
</table>
