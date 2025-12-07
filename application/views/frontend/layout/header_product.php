<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url()?>frontend/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
      @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);

      

      .select-box {
        float: right;
        cursor: pointer;
        position : relative;
        max-width:  20em;
        /* margin: 5em auto; */
        width: 100%;
      }

      .select,
      .label {
        color: #414141;
        display: block;
        font: 400 17px/2em 'Source Sans Pro', sans-serif;
      }

      .select {
        width: 100%;
        position: absolute;
        top: 0;
        padding: 5px 0;
        height: 40px;
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        background: none transparent;
        border: 0 none;
      }
      .select-box1 {
        background: #ececec;
      }

      .label {
        position: relative;
        padding: 5px 10px;
        cursor: pointer;
      }
      .open .label::after {
        content: "▲";
      }
      .label::after {
        content: "▼";
        font-size: 12px;
        position: absolute;
        right: 0;
        top: 0;
        padding: 5px 15px;
        border-left: 5px solid #fff;
      }

      #pagination {
  margin: 0;
  padding: 0;
  text-align: center
}
#pagination li {
  display: inline
}
#pagination li a {
  display: inline-block;
  text-decoration: none;
  padding: 5px 10px;
  color: #000
}
      /* Active and Hoverable Pagination */
#pagination li a {
  border-radius: 5px;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s
    
}
#pagination li a.active {
  background-color: #6d6d6d;
  color: #fff
}
#pagination li a:hover:not(.active) {
  background-color: #ddd;
} 
    </style>

    <title>Toya</title>
  </head>
  <body>