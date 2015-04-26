
<head>
<META http-equiv="refresh" content="1;URL=http://piecode.tk/teewo/iframe.php">
<style> 
div {
    width: 100%;
    height: 10px;
    background-color: red;
    -webkit-animation-name: example; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 3s; /* Chrome, Safari, Opera */
    animation-name: example;
    animation-duration: 3s;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes example {
    from {background-color: red;}
    to {background-color: black;}
}

/* Standard syntax */
@keyframes example {
    from {background-color: red;}
    to {background-color: black;}
}
</style>
<div style="background-color:white;"></div>
</head><?php
$file = file("tel.txt");
echo '<pre><code>';
for ($i = count($file) - 0; $i > 0; $i--) {
  if(isset($_GET["filter"])){
    $filter = $_GET["filter"];
    if(strpos($file[$i],$filter)) {
       echo $file[$i];
    }
  } else {
    echo $file[$i];
  }
 }//endfor
?>
