<?php

function selectedPrefecture()
{
    return request()->get('prefecture');
}

function buttonUrl($name)
{
    return "?prefecture=" . selectedPrefecture() . "&type=" . $name;
}

function buttonActive($name)
{
    return ($name == request()->get('type')) ? 'active' : '' ;
}
