<?php

namespace App;

class NLPS
{
    static function returnBlankIfNull($obj){
		if(isset($obj)){
			return $obj;
		}else{
			return "";
		}
	}

    static function returnMiddleInitialWithDot($middle_name){
		if(self::returnBlankIfNull($middle_name) != ""){
			return $middle_name[0] . ". ";
		}else{
			return "";
		}
	}

	public static function returnFullName($first_name, $middle_name, $last_name){
		$middle_initial = self::returnMiddleInitialWithDot($middle_name);
		return "$first_name $middle_initial$last_name";
	}
}
