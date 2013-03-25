<?php 
class ArrayUtils {
	
	public static function mergeArray($a,$b)
	{
		$count=count($a);
		foreach($b as $k=>$v)
		{		
			$a[$count+1+$k]=$v;		
		}

		return $a;
	}
	
}

?>