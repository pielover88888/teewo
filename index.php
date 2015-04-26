<?php
$over = 'This will overwrite the existing log';
?>
<html style="word-wrd;">
<head>
<link rel="stylesheet" href="/teewo/normalize.css">
<link rel="stylesheet" href="/teewo/skeleton.css">
<style>
input[type="text"]{
}
</style>
</head>
<div style="width:19%;float:left;margin:10px;">
<img src="/video/uploads/Riot-Clan-Logo.png" style="height:50px;margin-left:2vw;" title="Logo by Deku / Mint-pi" height="50"><br>
<?php
include "stat.php";
$ip = $_SERVER["REMOTE_ADDR"];
//echo $ip;
include 'desc.txt';
?>
</div>
<style>form{display:inline;}
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

</style>
<div style="width:70%;float:right; margin:10px;mrgin-right:10%;">
<form action="" method="GET">
<input type="text" name="filter" placeholder="Filter, e.g. '[chat]'" value="<?= $_GET["filter"] ?>" style="height:2em;">
</form>
<form action="uploadd.php" method="POST" enctype="multipart/form-data" style="background-color:;display:inline-block;">
<div class="fileUpload button button-primary" style="margin-bottom:-1.39em;">
    <span>Select file</span>
    <input type="file" class="upload" name="uploaded">
</div>
<!--input type="file" class="button-primary" style="height:38px;padding:5px;background-color:;width:137px;opacity:1.49;" name="uploaded" id="fileToUpload"-->

<!--input type="file" name="fileToUpload"-->
<input type="submit" class="button-primary" style="margin-left:-10px;" value="upload map">
</form>
<form action="" method="GET">
<input type="hidden" value="true">
<input type="submit" value="refresh log">
</form>
<form action="" method="GET">
<input type="hidden" name="new" value="true">
<input type="submit" value="restart dm" title="<?= $over ?>">
</form>
<form action="" method="GET">
<input type="hidden" name="new" value="ctf">
<input type="submit" value="restart ctf" title="<?= $over ?>">
</form>
<form action="" method="GET">
<input type="hidden" name="new" value="fng">
<input type="submit" value="restart fng" title="<?= $over ?>">
</form>
<form action="" method="GET">
<input type="hidden" name="live" value="true">
<input type="submit" value="Enable live update">
</form>
<form action="" method="GET">
<input type="hidden" name="kill" value="true">
<input type="submit" class="button-primary" style="background-color:#aa0000;border:0px;" title="IP will be publicized" value="KILL THE SERVER, trollface">
</form>
<br><br>
<?php
shell_exec("echo $ip visited >> log.txt");

if($_GET["new"] == "true"){//
  echo shell_exec("killall srv &");
  echo shell_exec("killall srvfng &");
  echo shell_exec("./srv > tel.txt &");
shell_exec("echo $ip launched new >> log.txt");
  echo "<br>Refresh log for further diagnostics";
  sleep(1);
}
if($_GET["new"] == "ctf"){//
  echo shell_exec("killall srv &");
  echo shell_exec("killall srvfng &");
  echo shell_exec("./srv -f ctf.cfg > tel.txt &");
shell_exec("echo $ip launched new >> log.txt");
  echo "<br>Refresh log for further diagnostics";
  sleep(1);
}
if($_GET["new"] == "fng"){//
  echo shell_exec("killall srv &");
  echo shell_exec("killall srvfng &");
  echo shell_exec("./srvfng > tel.txt &");
shell_exec("echo $ip launched fng >> log.txt");
  echo "<br>Refresh log for further diagnostics";
  sleep(1);
}
if($_GET["kill"] == "true"){
shell_exec("echo $ip killed >> log.txt");
  echo shell_exec("killall srv &");
  echo shell_exec("killall srvfng &");
  echo shell_exec("echo \"<i>PROCESS TERMINATED BY</i> <b>$ip</b>\" >> tel.txt");
  echo "killed server<br>Refresh log for further diagnostics";
  sleep(1);
}
/*for ($i = count($file)-10; $i < count($file); $i++) {
  echo $file[$i] . "\n<br>";
}*/

//echo 'hello';
$file = file("tel.txt");
echo '<pre><code>';
$live = $_GET["live"];
if($live != "true"){
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
} else {
echo "<iframe src='iframe.php' style='width:100%;height:100%;'></iframe>";
} //endif
echo '</code></pre>';
if($_GET["dump"] == "true"){
echo '<pre><code>';
echo htmlspecialchars(file_get_contents("index.php"));
}
//echo file_get_contents("tel.txt");
?>
</div>
<div style="float:left;">
	<script src="http://coindonationwidget.com/widget/coin.js"></script>			
	<script>
	CoinWidgetCom.go({

		/* make sure you update the wallet_address or you will not get your donations */
		wallet_address: "31vkN41Fvm7qepdrXi4KUA5H3gryL5pX7U"

		, currency: "bitcoin"
		, counter: "hide"
		, language: "en"
		, lbl_button: "Bitcoin"
	});
	</script>
	<script>
	CoinWidgetCom.go({

		/* make sure you update the wallet_address or you will not get your donations */
		wallet_address: "3N8VDu9yHgbisPNHs8ym7GkcSFNQqLvwRo"

		, currency: "litecoin"
		, counter: "hide"
		, language: "en"
		, lbl_button: "Litecoin"
	});
	</script>
	<script>
	CoinWidgetCom.go({

		/* make sure you update the wallet_address or you will not get your donations */
		wallet_address: "9sYQoeU1KRNaw4vcfrTEdyxY3HMKHn7LjU"

		, currency: "dogecoin"
		, counter: "hide"
		, language: "en"
		, lbl_button: "Dogecoin"
	});
	</script></div>
<!--31vkN41Fvm7qepdrXi4KUA5H3gryL5pX7U -btc<br>
3N8VDu9yHgbisPNHs8ym7GkcSFNQqLvwRo -ltc<br>
9sYQoeU1KRNaw4vcfrTEdyxY3HMKHn7LjU -doge-->
