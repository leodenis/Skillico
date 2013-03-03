<?php
/**
 * Datas class extending native Prefab
 *
 * @package 1.0
 */
class PaypalSuccess extends Prefab{

  function success(){
  		$email_account = "vendeu_1362172271_biz@gmail.com";
		$req = 'cmd=_notify-validate';
		 
		foreach ($_POST as $key => $value) {
		    $value = urlencode(stripslashes($value));
		    $req .= "&$key=$value";
		}
		$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Host: www.sandbox.paypal.com:443\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

		$item_name = $_POST['item_name'];
		$item_number = $_POST['item_number'];
		$payment_status = $_POST['payment_status'];
		$payment_amount = $_POST['mc_gross'];
		$payment_currency = $_POST['mc_currency'];
		$txn_id = $_POST['txn_id'];
		$receiver_email = $_POST['receiver_email'];
		$payer_email = $_POST['payer_email'];
		parse_str($_POST['custom'],$custom);
		$offer_id=$custom['offer_id'];
		 
		if (!$fp) {
		 
		} else {
		fputs ($fp, $header . $req);
		while (!feof($fp)) {
		    $res = fgets ($fp, 1024);
		    if (strcmp ($res, "VERIFIED") == 0) {
		        // vérifier que payment_status a la valeur Completed
		        if ($payment_status == "Completed") {
		        	return $offer_id;
		        }
		        else {
		                // Statut de paiement: Echec
		        }
		        exit();
		   }
		    else if (strcmp ($res, "INVALID") == 0) {
		        // Transaction invalide
		    }
		}
		fclose ($fp);
		}   
  }
  
}
?>