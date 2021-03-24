<?php

function underscore2camel(string $underscoreStr): string
{
    $explodedStr = explode('_', $underscoreStr);
    $camelStr = $explodedStr[0];
    for ($i = 1; $i < count($explodedStr); $i++) {
        $camelStr .= ucfirst($explodedStr[$i]);
    }

    return $camelStr;
}
