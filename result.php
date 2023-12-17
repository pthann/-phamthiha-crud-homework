<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
    $fullname = '';
    $email = '';
    $before = '';
    
    if (isset($_POST['firstName'])) {
        $fullname .= $_POST['firstName'];
    }
    if (isset($_POST['lastName'])) {
        $fullname .= ' '.$_POST['lastName'];
    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        if ($gender == 'Female') {
            $before = 'Ms.';
        }else{
            $before = 'Mr.';
        }
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['club'])) {
        $club = $_POST['club'];
    }
    if (isset($_POST['S'])) {
        $time= $_POST['S'];
        
    }
    
?>

<div class="row">
    <div class="col-3"></div>
    <div class="card col-6">
        <div class="card-body">
            <div class="row">
                <i class="fa-solid fa-circle-check col-1"></i>
                <h1>Thank you <?php echo $before . ' ' . $fullname?>!</h1>
            </div>
            <div class="row">
                <p>We have received your application for the <b><?echo $club?></b>.</p>
                You will be available on <?echo implode(" and ", $time);?>. <br>
                <br>
                <p>We will contact you via your email: <b><?echo $email;?></b></p>
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>