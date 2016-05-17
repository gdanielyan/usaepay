<?php include 'partials/header.php' ?>
<?php session_start(); ?>
    <div class="container-fluid dark-teal">
        <div class="container">
            <div class="row">
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
                        <dt>Ship to</dt>
                        <dd><?php echo $_SESSION['address'];?></dd>
                        <dt>Total</dt>
                        <dd><?php echo $_SESSION['total'];?></dd>
                        <dt>Confirmation #</dt>
                        <dd><?php echo $_SESSION['conf_num'];?></dd>
                        <dt>Authcode</dt>
                        <dd><?php echo $_SESSION['auth_code'];?></dd>
                        <dt>Transaction ID</dt>
                        <dd><?php echo $_SESSION['trans_id'];?></dd>
                        <dt>Result</dt>
                        <dd><?php echo $_SESSION['trans_result'];?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
<?php include 'partials/footer.php' ?>