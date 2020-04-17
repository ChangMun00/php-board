<!DOCTYPE html>
 <?php
$xml=simplexml_load_file("data.xml")
?>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="설명">
  <meta name="author" content="<?php echo $xml->name. ""?>">
  <meta name="theme-color" content="#D8D8D8">
  <title><?php echo $xml->title. ""?></title>
  <link href="https://cdn.winsub.kr/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' type='text/css' href="https://cdn.winsub.kr/default.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><b><?php echo $xml->name. ""?></b></a>
    </div>
  </nav>

<div class="container">