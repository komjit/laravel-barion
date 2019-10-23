<?php

function jget($json, $propertyName)
{
    return isset($json[$propertyName]) ? $json[$propertyName] : null;
}
