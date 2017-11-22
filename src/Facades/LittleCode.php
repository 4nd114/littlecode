<?php

namespace Andre\LittleCode\Facades;

use Illuminate\Support\Facades\Facade;


class LittleCode extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'andre-littlecode';
	}
}