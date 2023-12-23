<?php

if (! function_exists('setting')) {
    function setting($value) {
        $key = \App\Models\Setting::where('key', $value)->firstOrFail();

        return $key->value;
    }
}