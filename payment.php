<?php
    $payments = [
        ["Name" => "Moundir", "Payment_Schedule" => "First", "Bill_Number" => 12223, "Amount_Paid" => "DHS 100,000", "Balance amount" => "DHS 500,000", "Date" => "05-Jan, 2022"],
        ["Name" => "Said", "Payment_Schedule" => "Second", "Bill_Number" => 22223, "Amount_Paid" => "DHS 300,000", "Balance amount" => "DHS 100,000", "Date" => "15-Jan, 2022"],
        ["Name" => "Ahmed", "Payment_Schedule" => "Third", "Bill_Number" => 44223, "Amount_Paid" => "DHS 400,000", "Balance amount" => "DHS 200,000", "Date" => "25-Jan, 2022"],
        ["Name" => "Hamza", "Payment_Schedule" => "Last", "Bill_Number" => 45512223, "Amount_Paid" => "DHS 200,000", "Balance amount" => "DHS 150,000", "Date" => "07-Fev, 2022"]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="payment.css">
    <title>Payment</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <main>
        <div id="head">
            <div>
                <h2>Payment Details</h2>
            </div>
            <div>
                <img src="image/fleches.svg" alt="deux-fleche">
            </div>
        </div> <hr>
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Payment Schedule</th>
                        <th scope="col">Bill Number</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Balance amount</th>
                        <th colspan="2" scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php foreach($payments as $payment){ ?>
                        <tr>
                            <?php foreach ($payment as $key => $value){ ?>
                                <td> <?php echo $value; ?> </td>
                            <?php } ?>
                            <td><img src="image/oeuil.svg" alt="icone-oeuil"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>