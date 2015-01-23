<?php

class Annotation extends Eloquent {

	public static function validate($description, $amount)
	{
		return is_numeric($amount) && is_string($description);
	}

	public static function sanitize_description($description)
	{
		return filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	public static function sanitize_amount($amount)
	{
		return filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}
}
