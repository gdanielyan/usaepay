<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "usaepay.php";

function runPurchase(){
    $cardholder  = trim($_POST['first_name']) . ' ' . trim($_POST['last_name']);
    $card        = trim($_POST['card_number']);
    $exp         = $_POST['month'] . substr($_POST['year'], -2);
    $amount      = $_POST['p_mount'];
    $invoice     = '1234';
    $bill_street = trim($_POST['billing_addr']);
    $bill_city   = trim($_POST['bill_city']);
    $bill_state  = trim($_POST['bill_state']);
    $bill_zip    = trim($_POST['bill_zip']);
    
    $ship_street = trim($_POST['shipping_addr']);
    $ship_city   = trim($_POST['ship_city']);
    $ship_state  = trim($_POST['ship_state']);
    $ship_zip    = trim($_POST['ship_zip']);
    
    $description = 'Poster order';
    $cvv         = trim($_POST['cvv']);

    $transaction              = new umTransaction;
    $transaction->key         = '_XD3AV8NKRr23E5150cbm4Q9sN459fsb';
    $transaction->pin         = 'ZmULKADODA0';
    $transaction->usesandbox  = true;
    $transaction->ip          = $_SERVER['REMOTE_ADDR'];
    $transaction->testmode    = 0;
    $transaction->command     = "sale";
    
    $transaction->card        = $card;
    $transaction->exp         = $exp;
    $transaction->amount      = $amount;
    $transaction->invoice     = $invoice;
    $transaction->cardholder  = $cardholder;
    $trnascation->street      = $bill_street;
    $transaction->city        = $bill_city;
    $transaction->state       = $bill_state;
    
    $transaction->billstreet  = $bill_street;
    $transaction->billcity    = $bill_city;
    $transaction->billzip     = $bill_zip;
    $transaction->description = $description;
    $transaction->cvv2        = $cvv;
    
    $transaction->shipstreet  = $ship_street;
    $transaction->shipcity    = $ship_city;
    $transaction->shipstate   = $ship_state;
    $transaction->shipzip     = $ship_zip;

    session_start();
    if($transaction->Process())
    {
        $_SESSION['name']         = $cardholder;
        $_SESSION['address']      = $ship_street . ' ' . $ship_city . ' ' . $ship_state . ' ' . $ship_zip;
        $_SESSION['total']        = '$'.$amount;
        $_SESSION['auth_code']    = $transaction->authcode;
        $_SESSION['trans_id']     = $transaction->refnum;
        $_SESSION['trans_result'] = $transaction->result;
        $_SESSION['conf_num']     = hash('ripemd160', $cardholder.$street.$zip.time());
        header('Location: /confirmation.php');
    } else {
        $_SESSION['message']  = 'Something Went wrong with the transaction';
        $_SESSION['card_msg'] = $transaction->result;
        $_SESSION['reason']   = $transaction->error;
        header('Location: /went_wrong.php');   
    }
}