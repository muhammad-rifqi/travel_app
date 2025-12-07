<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@100;500&display=swap');
    </style>
    <title>Toya</title>
    
  </head>
  <body>
    <div class="container">
        <div class="row">
            <img src="<?= base_url();?>assets/frontend/img/logo.png" alt="Toya" width="200" style="margin: auto; padding-top: 20px; cursor:pointer" onclick="window.location.href='<?= base_url();?>'">
        </div>
        <div class="row" style="border-bottom: 1px solid black; width: 100%; margin: 0 auto;">
            &nbsp;
        </div>
        <br>
        <div class="row">
            <ul style="list-style: none; font-family: 'Open Sans', sans-serif; font-weight: 600;">
                <li style="float: left; margin-right: 50px; margin-left: 325px;"><a style="color:black" href="<?= base_url('user/productsale');?>">SALE</a></li>
                <li style="float: left; margin-right: 50px;"><a style="color:black" href="<?= base_url('user/category_product/1');?>">MEN'S</a></li>
                <li style="float: left; margin-right: 50px;"><a style="color:black" href="<?= base_url('user/category_product/2');?>">WOMEN'S</a></li>
                <li style="float: left; margin-right: 50px;"><a style="color:black" href="<?= base_url('user/contact');?>">CONTACT US</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>