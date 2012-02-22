<?php
@include_once "./mkto_proxy_config.php";

if (!isset($POST_URL) || !isset($DEFAULT_REDIRECT)) {
	die('There\'s a problem with the installation. Make sure mkto_proxy_config.template.php has been edited and renamed to mkto_proxy_config.php.');
} else if ($DEFAULT_REDIRECT == 'http://YOUR-COMPANY.com/thank-you.html' || $POST_URL == 'http://app-XYZ.marketo.com/index.php/leadCapture/save') {
	die('There\'s a problem with the installation. The default values have not changed. This script requires information sepecific to your company and Marketo instance.');
}

if (isset($_POST['formid'])) {
	// Capture any post data sent in this request
	foreach( $_POST as $key => $value ) {
		if ($key == 'action') continue;
		if ($key == '_mkt_trk' && isset($_GET['kill_mkt_trk']) && $_GET['kill_mkt_trk']) continue;
		$post_data[] = "$key=".urlencode($value);
	}

	$post_url  = $POST_URL;
	$post_data = implode('&', $post_data);
	$ch        = curl_init($post_url);

	// Set up our new curl handler
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Marketo Proxy 1.1.0)");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$header  = curl_getinfo( $ch );

	// Send our post data to Marketo and close our connection
	$ret = curl_exec($ch);
	curl_close($ch);

	foreach (explode("\n",$ret) as $line) {
		if (stripos($line,'Location:') !== false) {
			$Redirect = $line;
		}
	}
	if (isset($Redirect)) {
		header(trim($Redirect));
		die;
	}
}
header('Location: '.$DEFAULT_REDIRECT);
