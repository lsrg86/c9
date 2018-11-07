<?php

class Util {
    function varDump($value) {
        echo '<pre>' . var_export($value, true) . '</pre>';
    }
}