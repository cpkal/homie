<?php

if(!function_exists('convert_to_rupiah')) {
    function convert_to_rupiah($value) {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}