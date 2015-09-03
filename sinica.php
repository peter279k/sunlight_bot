<?php
	require 'libs/LIB_http.php';
	require 'libs/LIB_parse.php';
	
	//user input by command
	echo iconv("utf-8", "big5", "請輸入斷字");
	$handle = fopen("php://stdin", "r");
	$input_str = fgets($handle);
	$input_str = trim($input_str);
	$action = "http://sunlight.iis.sinica.edu.tw/cgi-bin/text.cgi";
	$data_arr = array();
	
	$data_arr["query"] = $input_str;
	$result = http($action, $ref = "", $method = "POST", $data_arr, EXCL_HEAD);
	$result_str = $result["FILE"];
	$result_arr = parse_array($result_str, "<META ", ">");
	$res_url = (get_attribute($result_arr[1], "CONTENT"));
	$res_url = explode("=", $res_url);
	$res_url = trim($res_url[1], "'");
	echo "\n" . "response_url: http://sunlight.iis.sinica.edu.tw/" . $res_url . "\n";
	
	//parse response url
	$web_page = http_get("http://sunlight.iis.sinica.edu.tw/" . $res_url, $ref = "");
	$web_page = trim($web_page["FILE"], "<br>");
	
	$response_link = parse_array($web_page, "<a ", "</a>");
	$response_link2 = parse_array($web_page, "<a ", ">");
	$search_arr = array("'", '"');
	
	$counter = count($response_link);
	for($count=0;$count<$counter;$count++)
	{
		$temp_str = return_between($response_link[$count], "<a>", "</a>", EXCL);
		$temp_str = explode(">", $temp_str);
		//$temp_link = get_attribute($temp_str[0], "HREF");
		echo "\n" . iconv("utf-8", "big5", $temp_str[1]) . ": " . "http://sunlight.iis.sinica.edu.tw/" . get_attribute(str_replace($search_arr, '"', $response_link2[$count]), "HREF") . "\n";
	}
?>