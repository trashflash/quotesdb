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
$idcustomersearch="ERROR: NO SELECTED CUSTOMER!!!";
$selectedcustomer="ERROR: SELECTED CUSTOMER DOES NOT EXIST!!!";
$customer=stripslashes(@$_REQUEST['customer']);
$customer=mysqli_real_escape_string($con,@$customer);
if(!isset($_REQUEST['customer'])){
    $customer=0;
}

$sql = "SELECT * FROM customers WHERE ID_Customer=$customer";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

if (mysqli_num_rows($result) > 0) {
    while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $selectedcustomer=$record['First_Name'] . ' ' . $record['Last_Name'] . ' ' . $record['Address_Ln1'];
    if($record['Sec_First_Name']>0){
        $secfname=1;
    }

    }
}


if(isset($_POST['date'], $_POST['typeofquote'], $_POST['customer'])) {
    echo 'TEST!!!';
    @$addperioddate = @$_REQUEST['date'];
    @$addtypeofquote = @$_REQUEST['typeofquote'];
    @$addcustomer = @$_REQUEST['customer'];

    $sql = "INSERT INTO quoteperiods(ID_Customer, Date_Period, Type_Period) VALUES ($addcustomer, '$addperioddate', $addtypeofquote)";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $sql = "SELECT ID_Period from quoteperiods WHERE ID_Customer=$addcustomer ORDER BY ID_Period DESC LIMIT 1";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $periodselectedcurrent=$record['ID_Period'];

        }
        if ($addtypeofquote == 1) {
            $sql = "INSERT INTO quotes(ID_Period, ID_Company, Quote_Price) 
SELECT $periodselectedcurrent, companies.ID_Company, 0.00 FROM
companies WHERE Active=1; ";
            $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            if($secfname){
                $sql = "INSERT INTO quotes(ID_Period, ID_Company, Quote_Price) SELECT $periodselectedcurrent, ID_Company, 0.00 FROM
companies WHERE Active=5; ";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            }
        }
        if ($addtypeofquote == 2) {
            $sql = "INSERT INTO quotes(ID_Period, ID_Company, Quote_Price) SELECT $periodselectedcurrent, ID_Company, 0.00 FROM
companies WHERE Active=1 OR Active=2; ";
            $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            if($secfname){
                $sql = "INSERT INTO quotes(ID_Period, ID_Company, Quote_Price) SELECT $periodselectedcurrent, ID_Company, 0.00 FROM
companies WHERE Active=5; ";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            }
        }
        if ($addtypeofquote == 3) {
            $sql = "INSERT INTO quotes(ID_Period, ID_Company, Quote_Price) SELECT $periodselectedcurrent, ID_Company, 0.00 FROM
companies WHERE Active=2; ";
            }
        }
    }

get_defined_vars();

?>
<div style="margin-left:250px; font-size:12px;">

    <div class="w3-container w3-teal"><h4>Add quote date:</h4></div>
    <div id="addquotingperiod" >
        <form name="periodadd" method="post" action="">

                <div class="w3-quarter"><input class="w3-input w3-light-gray" type="text" name="firstName" disabled="disabled" placeholder="<?php echo @$selectedcustomer; ?>" /></div>
                <div class="w3-quarter"><input class="w3-input w3-light-gray" type="date" name="date" placeholder="Date of quote" /></div>
                <div class="w3-quarter"><select class="w3-select w3-light-gray" name="typeofquote">
                        <option value="" disabled selected>Select an option for quoting.</option>
                        <option value="1">AUTO</option>
                        <option value="2">AUTO+HOME</option>
                        <option value="3">HOME</option>
                        <option value="4" disabled="disabled">Reserved for future use</option>
                        <option value="5" disabled="disabled">Reserved for future use</option>
                    </select>
                <input type="hidden" name="customer" value="<?php echo $_GET["customer"];?>"></div>

            <div class="w3-quarter">
                <input type="submit" class="w3-button w3-indigo w3-block" name="submit" value="Add quoting period!" />
            </div>
        </form>
    </div>

    <div class="w3-container w3-teal"> <h4>Quoting dates for <?php echo $selectedcustomer;?> :</h4></div>
    <div id="driverss">
        <table class="w3-table-all">
            <tr>
                <th>Date Due</th>
                <th>Type</th>
                <th>Date Added</th>
                <th>Options</th>
            </tr>
<?php
            $sql = "SELECT * FROM quoteperiods where ID_Customer=$customer ORDER BY Date_Period DESC";
            $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

            if (mysqli_num_rows($result) > 0) {
            while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $writeperiod=$record['ID_Period'];
                if ($record['Type_Period'] == 1) $typeofquote = 'Auto quote';
                elseif ($record['Type_Period'] == 2) $typeofquote = 'Auto + Home quote';
                elseif ($record['Type_Period'] == 3) $typeofquote = 'Home quote';
                else $typeofquote='Other type of quote';
                echo '<tr>
                <td>' . $record['Date_Period'] . '</td>
                <td>' . $typeofquote . '</td>
                <td>' . $record['Date_Added'] . '</td>
                <td><a href="editquotes.php?customer='.$customer.'&period='.$record['ID_Period'].'">EDIT</a></td></tr>
                <tr><td colspan="4">';

            $sqll = "SELECT companies.CompanyName as CompanyName1, quotes.Quote_Price as Quote_Price1, quotes.Quote_Comment as Quote_Comment1 from quotes join companies on quotes.ID_Company=companies.ID_Company where ID_Period=$writeperiod ORDER BY ID_Quote ASC;";
            $resultl = mysqli_query($connection, $sqll) or die(mysqli_error($connection));
            if (mysqli_num_rows($resultl) > 0) {
            while ($recordl = mysqli_fetch_array($resultl, MYSQLI_ASSOC)) {

            echo '-' . $recordl['CompanyName1'] . '-' .  $recordl['Quote_Price1'] . '- <i>' .  $recordl['Quote_Comment1'] . '</i>-' .  '</p>';
            }}else{
                echo 'No quotes available. Click to add quotes!';
            } echo '</td></tr>';}}
            ?>
        </table>
    </div>

</div>
</body>

</html>