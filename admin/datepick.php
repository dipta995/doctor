<!DOCTYPE html>

<html>

<head>

    <title>Bootstrap Datepicker Disable Past Dates Example - nicesnippets.com/</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

   

 
 

    <input type="text" name="appointment_date" class="form-control datepicker" autocomplete="off">
 

  

</body>

   

<script type="text/javascript">


$('.datepicker').datepicker({ 

    startDate: new Date()

});

</script>

</html>