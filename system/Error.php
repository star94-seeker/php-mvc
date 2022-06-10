<?php

namespace System;

use ErrorException;
use System\Config;

class Error
{

    public static function errorHandler(Int $level, String $message, String $file, Int $line): void
    {
        if (error_reporting() !== 0) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler(\Exception $e): void
    {
        $ecode = $e->getCode();
        ($ecode != 404) ? $ecode = 500 : $ecode;
        http_response_code($ecode);

        if (Config::SHOW_ERRORS) {
            echo "<h3>Fatal error</h3>";
            echo "<p>Uncaught exception: '" . get_class($e) . "'</p>";
            echo "<p> Message: '" . $e->getMessage() . "'</p>";
            echo "Stack trace: <pre>" . $e->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $e->getFile() . "' on line " . $e->getLine() . "</p>";
        } else {
            $log = BASE_PATH . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);

            $message = "Uncaught exception: '" . get_class($e) . "'";
            $message .= "\nMessage: '" . $e->getMessage() . "'";
            $message .= "\nStack trace: " . $e->getTraceAsString();
            $message .= "\nThrown in '" . $e->getFile() . "' on line " . $e->getLine();

            error_log($message);
            View::renderTemplate("$ecode.html");
        }
    }
}
