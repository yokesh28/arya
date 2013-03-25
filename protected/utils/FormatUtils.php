<?php 
class FormatUtils {

	public static function ucnewline($str,$sep='\n'){
		$arr = explode($sep,$str);
		$ret = '';
		foreach($arr as $p) {
			$ret .= ucfirst($p)."\n";
		}
		return $ret;
	}

	public static function getCurrency($price){
		return $price;
		//return money_format('%.2n', $price);
	}

	public static function timeAgo($date){

		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		$lengths = array("60","60","24","7","4.35","12","10");

		$now = time();
		$unix_date = strtotime($date);

		// check validity of date
		if(empty($unix_date)) {
			throw new CException("Bad Date.");
		}

		// is it future date or past date
		if($now > $unix_date) {
			$difference = $now - $unix_date;
			$tense = "ago";

		} else {
			$difference = $unix_date - $now;
			$tense = "from now";
		}

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if($difference != 1) {
			$periods[$j].= "s";
		}

		return "$difference $periods[$j] {$tense}";
	}

	public static function wrapText($text,$max=250,$trim=true){
		if(strlen($text)>$max){
			if($trim)
				return substr(trim($text),0,strpos($text, ' ', $max)). " ...";
			else
				return substr($text,0,strpos($text, ' ', $max)). " ...";
		} else
			return $text;
	}

	public static function getPlainText($html,$wrap=250){
		if($wrap) {
			return strip_tags(self::wrapText($html,$wrap));
		} else {
			return strip_tags($html);
		}
	}

	public static function getFirstImage($html){
		$firstImg = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $html, $matches);
		if(isset($matches[1][0]))
		$firstImg = $matches[1][0];

		if(empty($firstImg)){ //Defines a default image
			return false;
		}
		return $firstImg;
	}
	
	public static function getDateForDisplay($date){
		
		if(!empty($date))		
			return date('F d, Y',strtotime($date));
		else
			return false;
	}
	
	public static function getTimeForDisplay($date){
	
		if(!empty($date))
			return date('F d, Y \a\t H:m:s',strtotime($date));
		else
			return false;
	}
}

?>
