<?php
/**
 * Created by IntelliJ IDEA.
 * User: mac
 * Date: 25/07/2018
 * Time: 22:13
 */

class Util
{

    /**
     * Checks if the path to the given file path is a valid one and if the user has enough permissions to read it.
     *
     * @param string $filePath
     *
     * @return bool
     */
    public static function isFileValid(string $filePath): bool
    {
        return is_readable($filePath) && is_file($filePath);
    }

}