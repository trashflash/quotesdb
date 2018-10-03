<?php
include_once ('db_config.php'); ?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
</head>
<body>
<?php include 'sidebar.php';?>
<div style="margin-left:250px">

    <div class="w3-container w3-teal">
        <h3>Add a customer</h3>
    </div>
    <div id="AddCustomer">
        <form class="w3-container" method="post" action="AddCustomer.php" >
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label class="w3-text-teal"><b>First Name:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" required="required" name="cufirstname">

                    <label class="w3-text-teal"><b>Middle Name:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="cumiddlename">

                    <label class="w3-text-teal"><b>Last Name:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" required="required" name="culastname">

                    <label class="w3-text-teal"><b>Telephone:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="cutelephone">

                    <label class="w3-text-teal"><b>E-Mail:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="email" name="cuemail">

                    <label class="w3-text-teal"><b>Date of Birth:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="date" required="required" name="cudateofbirth">

                </div>
                <div class="w3-half">
                    <label class="w3-text-teal"><b>Spouse First Name:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="cuspousefirstname">

                    <label class="w3-text-teal"><b>Spouse Last Name:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="cuspouselastname">

                    <label class="w3-text-teal"><b>Mailing Address Line 1:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" required="required" name="cuaddress1">

                    <label class="w3-text-teal"><b>Mailing Address Line 2:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="cuaddress2">

                    <label class="w3-text-teal"><b>City:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" required="required" name="cucity">

                    <label class="w3-text-teal"><b>State:</b></label>
                    <select class="w3-input w3-border w3-light-grey" name="custate">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI" selected="selected">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>

                    <label class="w3-text-teal"><b>ZIP:</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" required="required" name="cuzip">
                </div>
            </div>



            <button class="w3-btn w3-blue-grey">Add customer!</button><br/><p></p>
        </form>
    </div>

</div>
