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
    $street      = trim($_POST['billing_addr']);
    $city        = trim($_POST['city']);
    $state       = trim($_POST['state']);
    $zip         = trim($_POST['zip']);
    $description = 'Poster order';
    $cvv         = trim($_POST['cvv']);

    $transaction             = new umTransaction;
    $transaction->key        = '_XD3AV8NKRr23E5150cbm4Q9sN459fsb';
    $transaction->pin        = 'ZmULKADODA0';
    $transaction->usesandbox = true;
    $transaction->ip         = $_SERVER['REMOTE_ADDR'];
    $transaction->testmode   = 0;
    $transaction->command    = "authonly";
     
    $transaction->card        = $card;
    $transaction->exp         = $exp;
    $transaction->amount      = $amount;
    $transaction->invoice     = $invoice;
    $transaction->cardholder  = $cardholder;
    $transaction->street      = $street;
    $transaction->zip         = $zip;
    $transaction->description = $description;
    $transaction->cvv2        = $cvv;

    session_start();
    if($transaction->Process())
    {
        $_SESSION['name']     = $cardholder;
        $_SESSION['address']  = $street . ' ' . $city . ' ' . $state . ' ' . $zip;
        $_SESSION['total']    = '$'.$amount;
        $_SESSION['conf_num'] = hash('ripemd160', $cardholder.$street.$zip.time());
        header('Location: /confirmation.php');
    } else {
        $_SESSION['message']  = 'Something Went wrong with the transaction';
        $_SESSION['card_msg'] = $transaction->result;
        $_SESSION['reason']   = $transaction->error;
        header('Location: /went_wrong.php');   
    }
}