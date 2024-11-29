<?php

use App\Models\Contact;
use App\Models\Indro;
use App\Models\Partner;
use App\Models\Branche;
use App\Models\Section;

if (! function_exists('total_message')) {
	function total_message()
	{
		return Contact::whereIs_read(0)->get()->count();
	}
}

if (! function_exists('unread_message')) {
	function unread_message()
	{
		return Contact::whereIs_read(0)->get();
	}

}

if (! function_exists('sections')) {
    function sections()
    {
        return Section::get();
    }

}

if (! function_exists('partners')) {
    function partners()
    {
        return Partner::get();
    }

}

if (! function_exists('indro')) {
    function indro()
    {
        return Indro::inRandomOrder()->first();
    }

}

if (! function_exists('branches')) {
    function branches()
    {
        return Branche::get();
    }

}
