<?php include 'partials/header.php' ?>
<?php session_start(); ?>
    <div class="container-fluid dark-teal">
        <div class="container">
            <div class="confirmation">
                <p class="title">Whoops Something Went Wrong</p>
                <p>
                    <br>Please make changes and try again
                    <br>Contact us for any Questions at 1800-555-5555
                </p>
                <dl class="list-unstyled dl-horizontal">
                    <dt>Message</dt>
                    <dd><?php echo $_SESSION['message'];?></dd>
                    <dt>Card</dt>
                    <dd><?php echo $_SESSION['card_msg'];?></dd>
                    <dt>Reason</dt>
                    <dd><?php echo $_SESSION['reason'];?></dd>
                </dl>
            </div>
        </div>
    </div>
<?php include 'partials/footer.php' ?>