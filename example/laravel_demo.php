<?php
/**
 * Laravel Integration Demo
 * 
 * Cara menggunakan PHP Notifikasi di Laravel
 */

// 1. Install package via Composer
// composer require rzlco666/php-notifikasi

// 2. Publish config dan assets
// php artisan vendor:publish --tag=config
// php artisan vendor:publish --tag=php-notifikasi-assets

// 3. Tambahkan di layout blade (resources/views/layouts/app.blade.php)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + PHP Notifikasi Demo</title>
    
    <!-- Bootstrap CSS (untuk demo conflict) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- PHP Notifikasi Assets -->
    <link href="{{ asset('vendor/php-notifikasi/assets/tailwind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/php-notifikasi/assets/fonts/stylesheet.css') }}" rel="stylesheet">
</head>
<body>
    <!-- PHP Notifikasi Container -->
    {!! \Rzlco\PhpNotifikasi\NotifikasiFacade::render() !!}
    
    <!-- Bootstrap Navbar (untuk demo z-index) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel App</a>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h1>Laravel + PHP Notifikasi Demo</h1>
        <p>Notifikasi akan muncul di pojok kanan bawah sesuai config default.</p>
        
        <div class="row">
            <div class="col-md-6">
                <h3>Controller Example</h3>
                <pre><code>
// AuthController.php
use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

public function auth_login(Request $request)
{
    try {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email_username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->only('email_username'));
        }

        // Login logic...
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Notifikasi success - akan muncul di bottom-right sesuai config
            Notif::success('Welcome back, ' . Auth::user()->name . '!', 'You have successfully logged in.');
            return redirect()->route('admin.dashboard');
        } else {
            Notif::error('Invalid credentials. Please check your email/username and password.');
            return redirect()->back()->withInput($request->only('email_username'));
        }

    } catch (\Exception $e) {
        Notif::error('An error occurred during login. Please try again.');
        return redirect()->back()->withInput($request->only('email_username'));
    }
}
                </code></pre>
            </div>
            
            <div class="col-md-6">
                <h3>Config File</h3>
                <pre><code>
// config/notifikasi.php
return [
    'default_position' => 'bottom-right',
    'default_duration' => 5000,
    'default_style' => 'clean',
    'default_size' => 'md',
    'default_mode' => 'light',
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios',
];
                </code></pre>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <h3>Test Notifications</h3>
                <button class="btn btn-success" onclick="testSuccess()">Success</button>
                <button class="btn btn-danger" onclick="testError()">Error</button>
                <button class="btn btn-warning" onclick="testWarning()">Warning</button>
                <button class="btn btn-info" onclick="testInfo()">Info</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function testSuccess() {
        fetch('/test-notification/success', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        });
    }
    
    function testError() {
        fetch('/test-notification/error', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        });
    }
    
    function testWarning() {
        fetch('/test-notification/warning', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        });
    }
    
    function testInfo() {
        fetch('/test-notification/info', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        });
    }
    </script>
</body>
</html>

<?php
// 4. Route untuk testing (routes/web.php)
/*
Route::post('/test-notification/{type}', function ($type) {
    switch ($type) {
        case 'success':
            \Rzlco\PhpNotifikasi\NotifikasiFacade::success('Success!', 'This is a success notification');
            break;
        case 'error':
            \Rzlco\PhpNotifikasi\NotifikasiFacade::error('Error!', 'This is an error notification');
            break;
        case 'warning':
            \Rzlco\PhpNotifikasi\NotifikasiFacade::warning('Warning!', 'This is a warning notification');
            break;
        case 'info':
            \Rzlco\PhpNotifikasi\NotifikasiFacade::info('Info!', 'This is an info notification');
            break;
    }
    return response()->json(['status' => 'success']);
});
*/

// 5. Features yang sudah diperbaiki:
// - Config default_position = 'bottom-right' akan terbaca dengan benar
// - CSS diisolasi dengan prefix .php-notifikasi-container untuk menghindari conflict dengan Bootstrap
// - Z-index tinggi (999999) untuk memastikan notifikasi muncul di atas semua elemen
// - Asset path menggunakan helper function php_notifikasi_asset() untuk Laravel
// - ServiceProvider membaca config dengan benar dan merge dengan default values
?> 