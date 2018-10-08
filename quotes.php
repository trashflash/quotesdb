<?php
include_once ('db_config.php'); ?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
</head>
<body>
<?php include 'sidebar.php';?>
<div style="margin-left:250px; font-size:12px;">


<?php

$searchcustomer=@$_REQUEST['customer'];
$searchperiod=@$_REQUEST['period'];


$sql = "SELECT ID_Quote, CompanyName, Quote_Price, Quote_Comment FROM quotes JOIN companies on quotes.ID_Company = companies.ID_Company where ID_Period=$searchperiod";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


echo '<p></p><form name="' . $record['ID_Quote'] . '">
    <input class="w3-input w3-border" style="margin-right:5px; width: 16%; display: inline" type="text" name="Name" disabled="disabled" value="' . $record['CompanyName'] . '">';


        echo '
    <input class="w3-input w3-border" style="width: 16%; display: inline" type="text" name="Price" onchange="changeit(' . $record['ID_Quote'] . ', \'Quote_Price\', this)" value="' . $record['Quote_Price'] . '">
    <input class="w3-input w3-border" style="width: 16%; display: inline" type="text" name="Comment" onchange="changeit(' . $record['ID_Quote'] . ', \'Quote_Comment\', this)" value="' . $record['Quote_Comment'] . '">
  
</form>';

}


}
?>
</div>
</body>

</html>
