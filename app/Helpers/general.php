<?php 

function is_page($pageName)
{
    return request()->segment(2) == $pageName;
}