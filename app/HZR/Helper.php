<?php

namespace App\HZR;

use Carbon\Carbon;

class Helper
{
    public static function printArray($arr){
    	echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    public static function monthYearToDate($str)
    {
    	//$str == "January 2018"
    	$pattern = "/^[A-Z][a-z]+ [0-9]{4}$/";
    	if(preg_match($pattern, $str)){
	    	return date('Y-m-d', strtotime($str));
    	}else{
    		return $str;
    	}
    }

    public static function dateInterval($from){
    	$start = Carbon::parse($from);

    	$totalmonths = Carbon::now()->diffInMonths($start);

    	$y = floor($totalmonths / 12);
    	$m = $totalmonths % 12;

    	$y_str = "";
    	$and_str = "";
    	$m_str = "";
    	if($y > 0){
    		$s = $y != 1 ? "s" : "";
    		$y_str .= "$y year$s";
    	}

    	if($m > 0){
    		$s = $m != 1 ? "s" : "";
			$m_str .= "$m month$s";
		}else{
            if($y <= 0){
                $m_str .= "less than a month";
            }
        }

		if($y > 0 && $m > 0){
			$and_str = " and ";
		}

    	return $y_str . $and_str . $m_str; //""
    }

    public static function dateToSubPath($date){
        return $date->format("Y/m/d");
    }

    /**
     * Returns a blank string if null
     *
     * @param any $obj
     * @return void
     */
    public static function returnDefaultIfNull($obj, $def = ""){
        if(isset($obj) && $obj !== ""){
            return $obj;
        }else{
            return $def;
        }
    }

    /**
     * Returns a blank string if null
     *
     * @param any $obj
     * @return void
     */
    public static function returnNoImageIfNull($obj){
        return Helper::returnDefaultIfNull($obj, "/res/photos/shares/noimage.jpg");
    }

    /**
     * Returns a blank string if null
     *
     * @param any $obj
     * @return void
     */
    public static function returnEmptyAvatarIfNull($obj){
        return Helper::returnDefaultIfNull($obj, "/res/photos/shares/empty-avatar.png");
    }

    /**
     * Returns a blank string if null
     *
     * @param any $obj
     * @return void
     */
    public static function returnBlankIfNull($obj){
        return Helper::returnDefaultIfNull($obj);
    }

    /**
     * Returns a blank string if null
     *
     * @param any $obj
     * @return void
     */
    public static function returnAllIfNull($obj){
        return Helper::returnDefaultIfNull($obj, "All");
    }
}
