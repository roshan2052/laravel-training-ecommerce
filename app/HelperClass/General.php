<?php

function getLoggedInUser()
{
    return auth()->user();
}

function imagePath($folder_name, $image_name)
{
    return asset('images/'.$folder_name.'/'.$image_name);
}

