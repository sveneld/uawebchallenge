<?php

/**
 * VarDumper
 */
class VarDumper
{

    public static function dump($var, $die = false)
    {
        $bugTrace = debug_backtrace(0);
        echo "<pre>";
        var_dump($var);
        $bugTrace = !empty($bugTrace[1]) && empty($bugTrace[1]['class']) ? $bugTrace[1] : $bugTrace[0];
        echo "\n".$bugTrace['file'].':'.$bugTrace['line'];
        echo "</pre>\n\n";
        if ($die) {
            exit(0);
        }
    }
}