<?php
namespace App\Helpers;

class PrefectureHelper
{
    static function selectedPrefecture()
    {
        return request()->get('prefecture');
    }
}
