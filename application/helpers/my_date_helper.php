<?php 

if ( ! function_exists('formate_date')) {
	
    function format_date($sql_format)
    {
    	return date( 'F j, Y h:i:s a',  strtotime( $sql_format ));
    }

}

if ( ! function_exists('fmt_date_sql')) {
	
	function fmt_date_sql()
	{
		return date('Y:m:d H:i:s', time());
	}
}
 ?>