<?php 
    include"config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="font-weight-bold">Results</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php 
                $sql ="SELECT form FROM forms";
                $result = mysqli_query($con, $sql);
                
                $records = mysqli_fetch_all($result);

                if (count($records) > 0) {
            ?>
                <?php 
                    foreach($records as $item) {
                ?>
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php  
                                    $form = json_decode($item[0]);

                                    foreach ($form as $key => $value) {
                                ?>
                                <div class="col-2">
                                    <strong><?php echo ucwords(str_replace("_", " ", $key)); ?> :</strong> 
                                </div>
                                <div class="col-10">
                                    <p><?php echo $value; ?></p>
                                </div>
                                <?php         
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            <?php 
                } else {
            ?>
                <div class="col-md-12 mb-3 text-center">
                    <h2>No Results Found</h2>
                </div>
            <?php       
                }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>