<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key
     *
     * Usage: setting('company_phone')
     */
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('settings')) {
    /**
     * Get all settings as array
     *
     * Usage: settings()
     */
    function settings()
    {
        return Setting::getAllSettings();
    }
}
