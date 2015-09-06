<?php
	function opecc_convert($file_path)
	{
		//check opencc module load correctly.
		$br = (php_sapi_name() == "cli")? "":"<br>";

		if(!extension_loaded('opencc')) 
		{
			dl('opencc.' . PHP_SHLIB_SUFFIX);
			echo "dl\n";
		}
	
		$module = 'opencc';
		$functions = get_extension_funcs($module);
	
		//read file
		$text = file_get_contents($file_path);
	
		$od = opencc_open("zhs2zht.ini");
		$text = opencc_convert($od, $text);
		opencc_close($od);
		
		return $text;
	}
?>
