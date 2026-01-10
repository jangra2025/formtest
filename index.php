<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">

        <form action="script.php" method="post">
            <label>Country</label>
            <select name="country" id="countryId" class="form-control">
                <option value="">Select Country</option>
                <?php
                include "config.php";
                $result = $connection->query("SELECT * FROM country");
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['country_name'] . '</option>';
                }
                ?>
            </select>
            <label>phone no.</label>
            <select name="phone" id="phone" class="form-control">
                <option value="">Select Phone no.</option>
            </select>


            <label>State</label>
            <select name="states" id="stateId" class="form-control">
                <option value="">Select State</option>
            </select>

            <label>City</label>
            <select name="city" id="cityId" class="form-control">
                <option value="">Select City</option>
            </select>

            <label>pincode</label>
            <select name="pincode" id="pincodeId" class="form-control">
                <option value="">Select Pincode</option>
            </select>


            <input type="submit" name="submit" value="Submit" class="btn btn-success" style="margin-top:10px;">
        </form>
    </div>

    <script>
      $(document).ready(function() {

    $('#countryId').change(function() {
        var countryId = $(this).val();

        $('#phone').html('<option>Loading...</option>');
        $('#stateId').html('<option>Loading...</option>');
        $('#cityId').html('<option value="">Select City</option>');
        $('#pincodeId').html('<option value="">Select Pincode</option>');

        if (countryId != '') {

            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                data: { action: 'getphone_code', countryId: countryId },
                success: function(data) {
                    $('#phone').html(data);
                }
            });

            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                data: { action: 'getStates', countryId: countryId },
                success: function(data) {
                    $('#stateId').html(data);
                }
            });

        } else {
            $('#phone').html('<option value="">Select Phone no.</option>');
            $('#stateId').html('<option value="">Select State</option>');
            $('#cityId').html('<option value="">Select City</option>');
            $('#pincodeId').html('<option value="">Select Pincode</option>');
        }
    });

    $('#stateId').change(function() {
        var stateId = $(this).val();
        $('#cityId').html('<option>Loading...</option>');
        $('#pincodeId').html('<option value="">Select Pincode</option>');

        if (stateId != '') {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                data: { action: 'getCities', stateId: stateId },
                success: function(data) {
                    $('#cityId').html(data);
                }
            });
        } else {
            $('#cityId').html('<option value="">Select City</option>');
        }
    });

    $('#cityId').change(function() {
        var cityId = $(this).val();
        $('#pincodeId').html('<option>Loading...</option>');

        if (cityId != '') {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                data: { action: 'getPincode', cityId: cityId },
                success: function(data) {
                    $('#pincodeId').html(data);
                }
            });
        } else {
            $('#pincodeId').html('<option value="">Select Pincode</option>');
        }
    });

});

    </script>
</body>

</html>