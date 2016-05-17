<?php include 'partials/header.php' ?>

<?php $item = $_GET['item']; $item_url = 'images/'.$item.'.jpg'; ?>

    <div class="container purchase-content">
        <div class="item-details">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <form action="run.php" method="post" class="form-horizontal">
                        <div class="form-group">
                        <h3>Billing Information</h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="first_name" value="" class="form-control" placeholder="First Name">
                                    <input type="text" name="last_name" value="" class="form-control" placeholder="Last Name">    
                                    <input type="text" name="card_number" class="form-control" placeholder="Card Number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                    <select name="month" class="selectpicker show-tick form-control" title="Month" required>
                                        <?php 
                                            $i = 1;
                                            foreach($months as $month){
                                                echo "<option value=0".$i.">".$month."</option>"; $i++;
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select name="year" class="selectpicker show-tick form-control" title="Year" required>
                                        <?php 
                                            for($i=2016; $i<2022; $i++){
                                                echo "<option value=".$i.">".$i."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="cvv" class="form-control" placeholder="CVV/CVV2" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="billing_addr" class="form-control" placeholder="Billing Adress" id="bill_addr" required>
                                    <input type="text" name="bill_city" value="" class="form-control" placeholder="City" id="bill_city" required>
                                    <input type="text" name="bill_state" class="form-control" placeholder="State" id="bill_state" required>
                                    <input type="text" name="bill_zip" class="form-control" placeholder="Zip" id="bill_zip" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <h3>Shipping Information</h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" id="same_addr"> Same as billing
                                      </label>
                                    </div>
                                    <input type="text" name="shipping_addr" value="" class="form-control" placeholder="Shipping Address" id="ship_addr">
                                    <input type="text" name="ship_city" value="" class="form-control" placeholder="City" id="ship_city">
                                    <input type="text" name="ship_state" class="form-control" placeholder="State" id="ship_state">
                                    <input type="text" name="ship_zip" class="form-control" placeholder="Zip" id="ship_zip">
                                    <input type="submit" value="Complete purchase" class="btn btn-success form-control" name="">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="p_mount" value="" id="p_mount">
                    </form>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="order-info">             
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h3 class="panel-title">Order Details</h3>
                            </div>
                            <div class="panel-body">    
                                <dl class="dl-horizontal">
                                    <dt>Size</dt>
                                    <dd>
                                        <select id="size" name="size" class="selectpicker" data-width="fit">
                                            <option value="12x24">12" x 24"</option>
                                            <option value="18x36">18" x 36"</option>
                                            <option value="24x48">24" x 48"</option>
                                        </select>
                                    </dd>
                                    <dt>Price</dt>
                                    <dd id="price">$12.99</dd>
                                    <dt>Shipping</dt>
                                    <dd id="shipping">$5.99</dd>
                                    <dt>Tax</dt>
                                    <dd id="tax">$1.61</dd>
                                    <dt>Total</dt>
                                    <dd id="total">$20.59</dd>
                                </dl>
                            </div>
                        </div>
                        <img src="<?php echo$item_url;?>" class="img-responsive img-thumbnail center-block">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                </div>
            </div>
        </div>
    </div>

<?php include 'partials/footer.php' ?>