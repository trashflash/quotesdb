<?php
include_once ('db_config.php'); ?>

    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/w3.css">
    </head>
    <body>
<?php include 'sidebar.php';?>
<?php
$search=0;
$numsearch=0;
@$searchFirstName=stripslashes(@$_REQUEST['firstName']);
@$searchFirstName=mysqli_real_escape_string($con,@$searchFirstName);
@$searchLastName=stripslashes(@$_REQUEST['lastName']);
@$searchLastName=mysqli_real_escape_string($con,@$searchLastName);
@$searchAddress=stripslashes(@$_REQUEST['address']);
@$searchAddress=mysqli_real_escape_string($con,@$searchAddress);
@$searchSecFirstName=stripslashes(@$_REQUEST['secFirstName']);
@$searchSecFirstName=mysqli_real_escape_string($con,@$searchSecFirstName);

if((@$searchFirstName or @$searchLastName or @$searchAddress or @$searchSecFirstName)>0)
{ @$search=1;
    if(@$searchFirstName>0){$numsearch++;}
    if(@$searchLastName>0){$numsearch++;}
    if(@$searchAddress>0){$numsearch++;}
    if(@$searchSecFirstName>0){$numsearch++;}
}else{
    @$search=0;
}

?>
<div style="margin-left:250px; font-size:12px;">

    <div class="w3-container w3-teal"><h4>Search</h4></div>
    <div id="searchdrivers" >
        <form name="driversearch" action="" method="post">
            <div class="w3-threequarter">
                <div class="w3-quarter"><input class="w3-input w3-light-gray" type="text" name="firstName" placeholder="First Name" /></div>
                <div class="w3-quarter"><input class="w3-input w3-light-gray" type="text" name="lastName" placeholder="Last Name" /></div>
                <div class="w3-quarter"><input class="w3-input w3-light-gray" type="text" name="address" placeholder="Address Ln1" /></div>
                <div class="w3-quarter"><input class="w3-input w3-light-gray" type="text" name="secFirstName" placeholder="Sec. Ins. First Name" /></div>
            </div>
            <div class="w3-quarter">
            <input type="submit" class="w3-button w3-indigo w3-block"name="submit" value="Search customers!" />
            </div>
        </form>
    </div>

    <div class="w3-container w3-teal"> <h4>Customers</h4></div>
    <div id="driverss">
        <table class="w3-table-all">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>ZIP</th>
                <th>Telephone</th>
                <th>Secondary Insured</th>
                <th>Last quote</th>
                <th>OPTIONS</th>
            </tr>
            <?php
            if(!($search)) {
                $sql = "SELECT * FROM customers ORDER BY Last_Name ASC, First_Name ASC;";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                if (mysqli_num_rows($result) > 0) {
                    while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


                        echo '<tr><td>' . $record['First_Name'] . '</td>
                        <td>' . $record['Last_Name'] . '</td>
                        <td>' . $record['Address_Ln1'] . ' ' . $record['Address_Ln2'] . '</td>
                        <td>' . $record['City'] . ', ' . $record['State'] . '</td>
                        <td>' . $record['ZIP'] . '</td>
                        <td>' . $record['Telephone'] . '</td>
                        <td>' . $record['Sec_First_Name'] . ' ' . $record['Sec_Last_Name'] . '</td>
                        <td>mm.dd.yyyy.</td>
                        <td><a href="add_period.php?customer=' . $record['ID_Customer'] . '">+Quote</a> / <a href="add_image.php?customer=' . $record['ID_Customer'] . '">+Image</a> / <a href="edit_customer.php?customer=' . $record['ID_Customer'] . '">EDIT</a></td></tr>';
                    }
                }
            }


            ?>

            <?php
            if($search) {
            if ( isset($_REQUEST['firstName']) || isset($_REQUEST['lastName']) || isset($_REQUEST['address']) || isset($_REQUEST['address']) ) {
                $clause = "where ";
                $conds = [];
                if (!empty($_POST['firstName'])) $conds[] = "First_Name = '{$searchFirstName}'";
                if (!empty($_POST['lastName'])) $conds[] = "Last_Name = '{$searchLastName}'";
                if (!empty($_POST['address'])) $conds[] = "Address = '{$searchAddress}'";
                if (!empty($_POST['secFirstName'])) $conds[] = "Sec_First_Name = '{$searchSecFirstName}'";
                if (count($conds) > 0) {
                    $clause .= (count($conds) == 1) ? $conds[0] : implode(' AND ', $conds);
                }
            }


                $sql = "SELECT * FROM customers ". $clause ."
                    ORDER BY Last_Name ASC, First_Name ASC;";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                if (mysqli_num_rows($result) > 0) {
                    while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


                        echo '<tr><td>' . $record['First_Name'] . '</td>
                        <td>' . $record['Last_Name'] . '</td>
                        <td>' . $record['Address_Ln1'] . ' ' . $record['Address_Ln2'] . '</td>
                        <td>' . $record['City'] . ', ' . $record['State'] . '</td>
                        <td>' . $record['ZIP'] . '</td>
                        <td>' . $record['Telephone'] . '</td>
                        <td>' . $record['Sec_First_Name'] . ' ' . $record['Sec_Last_Name'] . '</td>
                        <td>mm.dd.yyyy.</td>
                        <td><a href="add_period.php?customer=' . $record['ID_Customer'] . '">+Quote</a> / <a href="add_image.php?customer=' . $record['ID_Customer'] . '">+Image</a> / <a href="edit_customer.php?customer=' . $record['ID_Customer'] . '">EDIT</a></td></tr>';
                    }
                }
            }


            ?>
        </table>
    </div>

</div>
    </body>

    </html>