<?php
	include('./config.php');
$sql = "SELECT * FROM clients";
$result = mysqli_query($conn, $sql);
    ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-12">
                <select name="client_id" class="form-control">
                    <option value="null">Select Client</option>
					
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['client_name']?> | <?php echo $row['phone_number']?></option>
                        <?php
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
        </div>
    </div>
    <!--/span-->
    <!--/span-->
</div>
<br>