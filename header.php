<!DOCTYPE html> 
<html> 
	<head> 
	<title>小百合移动版</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/jquery.mobile-1.0.1.min.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
</head> 
<body> 
<?php
    function query($url, $fields = null) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($fields != null) {
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        }
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
?>
