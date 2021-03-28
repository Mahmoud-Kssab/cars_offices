<?php

///////////// active menu function //////////////
if(! function_exists('active_menu'))
{
    function active_menu($link)
    {
        if(preg_match('/' .$link. '/', Request::segment(2)))
        {
            return ['active', 'display:block'];
        }else
        {
            return ['', '' ];
        }

    }
}
