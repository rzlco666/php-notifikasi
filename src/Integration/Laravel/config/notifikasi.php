<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Position
    |--------------------------------------------------------------------------
    |
    | Available positions: top-left, top-right, top-center, 
    | bottom-left, bottom-right, bottom-center
    |
    */
    'default_position' => 'top-right',

    /*
    |--------------------------------------------------------------------------
    | Default Duration
    |--------------------------------------------------------------------------
    |
    | Duration in milliseconds. Set to 0 for permanent notifications
    |
    */
    'default_duration' => 5000,

    /*
    |--------------------------------------------------------------------------
    | Default Style
    |--------------------------------------------------------------------------
    |
    | Available styles: clean, colored, blur, liquid-glass
    | - clean: White background with colored icons
    | - colored: Gradient background with white text
    | - blur: iOS-style transparent blur effect
    | - liquid-glass: iOS 17+ liquid glass effect
    |
    */
    'default_style' => 'clean',

    /*
    |--------------------------------------------------------------------------
    | Default Size
    |--------------------------------------------------------------------------
    |
    | Available sizes: sm, md, lg
    | - sm: 280-320px wide
    | - md: 320-380px wide (default)
    | - lg: 380-450px wide
    |
    */
    'default_size' => 'md',

    /*
    |--------------------------------------------------------------------------
    | Default Mode
    |--------------------------------------------------------------------------
    |
    | Available modes: light, dark, auto
    | - light: Always use light mode
    | - dark: Always use dark mode
    | - auto: Automatically detect system preference
    |
    */
    'default_mode' => 'light',

    /*
    |--------------------------------------------------------------------------
    | Include Assets
    |--------------------------------------------------------------------------
    |
    | Whether to automatically include CSS and JavaScript
    |
    */
    'include_css' => true,
    'include_js' => true,

    /*
    |--------------------------------------------------------------------------
    | Theme (Future Implementation)
    |--------------------------------------------------------------------------
    |
    | Available themes: ios, material, bootstrap
    | NOTE: Currently only 'ios' theme is implemented.
    | Other themes will be available in future versions.
    |
    */
    'theme' => 'ios',
]; 