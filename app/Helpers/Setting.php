<?php

if (! function_exists('setting')) {
    function setting($value) {
        try {
            $key = \App\Models\Setting::where('key', $value)->firstOrFail();
            return $key->value;
        } catch (\Exception $e) {
            return config('app.name');
        }
    }
}
