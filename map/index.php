<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Country State City</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body{
                background: #ccc;
            }
            form{
                background: #fff;
                padding: 30px;
                margin-top: 30px;
            }
            form h3{
                margin-top: 0;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <!--Course -->

                <form action="" name="frm" method="post">
                    <h3>Country State City Dropdown</h3>
                    <section class="courses-section">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="country">Country</label>
                                <select type="text" name="country" id="country" class="form-control">
                                    <option>Select Country</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="state">State</label>
                                <select type="text" id="state" name="state" class="form-control"></select>
                            </div>



                            <div class="col-md-4">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-control"></select>
                            </div>

                        </div>

                        </div>
                    </section>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#country').change(function() {
                    loadState($(this).find(':selected').val())
                })
                $('#state').change(function() {
                    loadCity($(this).find(':selected').val())
                })


            });

            function loadCountry() {
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=country"
                }).done(function(result) {


                    $(result).each(function() {
                        $("#country").append($(result));
                    })
                });
            }
            function loadState(countryId) {
                $("#state").children().remove()
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=state&countryId=" + countryId
                }).done(function(result) {

                    $("#state").append($(result));

                });
            }
            function loadCity(stateId) {
                $("#city").children().remove()
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=city&stateId=" + stateId
                }).done(function(result) {

                    $("#city").append($(result));

                });
            }

            // init the countries
            loadCountry();
        </script>
    </body>
</html>