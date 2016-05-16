<?php include 'partials/header.php' ?>
<?php session_start(); ?>
    <div class="container-fluid dark-teal">
        <div class="container">
            <div class="confirmation">
                <p class="title">Purchase Confirmation</p>
                <p>
                    <strong> Thank you for your order </strong>
                    <br> Please Allow for 7-10 Business Days for Shipping
                    <br>Contact us for any Questions at 1800-555-5555
                </p>
                <dl class="list-unstyled dl-horizontal">
                    <dt>Customer Name</dt>
                    <dd><?php echo $_SESSION['name'];?></dd>
                    <dt>Address</dt>
                    <dd><?php echo $_SESSION['address'];?></dd>
                    <dt>Total</dt>
                    <dd><?php echo $_SESSION['total'];?></dd>
                    <dt>Confirmation #</dt>
                    <dd><?php echo $_SESSION['conf_num'];?></dd>
                </dl>
            </div>
        </div>
    </div>
<?php include 'partials/footer.php' ?>