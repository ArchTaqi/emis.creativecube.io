<?php
include('./config.php');
$sql = "SELECT * FROM employees";
$result = mysqli_query($conn, $sql);
    ?>
                <select id="employee_ids" name="employee_ids" class="form-control" class="select2">
                    <option value="null">Select Employee</option>
					
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['employee_name']?> | <?php echo $row['phone_number']?></option>
                        <?php
                    }
                    $conn->close();
                    ?>
                </select>
<br>
<br>