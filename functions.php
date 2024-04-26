<?php
function FilterRequest($request)
{
    return htmlspecialchars($request);
}

function redirect($path)
{
    header("Location:$path");
    exit;
}