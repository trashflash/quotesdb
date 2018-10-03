<?php
include_once ('db_config.php');

@$cufirstname = stripslashes($_POST['cufirstname']);
@$cufirstname = mysqli_real_escape_string($con,$cufirstname);

@$cumiddlename = stripslashes($_POST['cumiddlename']);
@$cumiddlename = mysqli_real_escape_string($con,$cumiddlename);

@$culastname = stripslashes($_POST['culastname']);
@$culastname = mysqli_real_escape_string($con,$culastname);

@$cutelephone = stripslashes($_POST['cutelephone']);
@$cutelephone = mysqli_real_escape_string($con,$cutelephone);

@$cuemail = stripslashes($_POST['cuemail']);
@$cuemail = mysqli_real_escape_string($con,$cuemail);

@$cudateofbirth = stripslashes($_POST['cudateofbirth']);
@$cudateofbirth = mysqli_real_escape_string($con,$cudateofbirth);

@$cusecfirstname = stripslashes($_POST['cusecfirstname']);
@$cusecfirstname = mysqli_real_escape_string($con,$cusecfirstname);

@$cuseclastname = stripslashes($_POST['cuseclastname']);
@$cuseclastname = mysqli_real_escape_string($con,$cuseclastname);

@$cuaddress1 = stripslashes($_POST['cuaddress1']);
@$cuaddress1 = mysqli_real_escape_string($con,$cuaddress1);

@$cuaddress2 = stripslashes($_POST['cuaddress2']);
@$cuaddress2 = mysqli_real_escape_string($con,$cuaddress2);

@$cucity = stripslashes($_POST['cucity']);
@$cucity = mysqli_real_escape_string($con,$cucity);

@$custate = stripslashes($_POST['custate']);
@$custate = mysqli_real_escape_string($con,$custate);

@$cuzip = stripslashes($_POST['cuzip']);
@$cuzip = mysqli_real_escape_string($con,$cuzip);



$sql = "INSERT INTO customers(First_Name,Middle_Name,Last_Name,Date_Of_Birth,Address_Ln1,Address_Ln2,City,
State,ZIP,Telephone,Email,Sec_First_Name,Sec_Last_Name)
        VALUES ('$cufirstname','$cumiddlename','$culastname','$cudateofbirth','$cuaddress1','$cuaddress2',
        '$cucity','$custate','$cuzip','$cutelephone','$cuemail','$cusecfirstname','$cuseclastname')";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));


header("Location: /index.php");
exit();
?>