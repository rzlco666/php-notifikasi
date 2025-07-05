# PHP Notifikasi - Laravel Setup Script (PowerShell)
Write-Host "🔔 PHP Notifikasi - Laravel Setup Script" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan

# Check if we're in a Laravel project
if (-not (Test-Path "artisan")) {
    Write-Host "❌ Error: This doesn't appear to be a Laravel project (no artisan file found)" -ForegroundColor Red
    Write-Host "Please run this script from your Laravel project root directory" -ForegroundColor Yellow
    exit 1
}

Write-Host "✅ Laravel project detected" -ForegroundColor Green

# Install package if not already installed
try {
    $packageInfo = composer show rzlco/php-notifikasi 2>$null
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✅ Package already installed" -ForegroundColor Green
    } else {
        Write-Host "📦 Installing PHP Notifikasi package..." -ForegroundColor Yellow
        composer require rzlco/php-notifikasi
    }
} catch {
    Write-Host "📦 Installing PHP Notifikasi package..." -ForegroundColor Yellow
    composer require rzlco/php-notifikasi
}

# Publish assets
Write-Host "📁 Publishing assets..." -ForegroundColor Yellow
php artisan vendor:publish --tag=php-notifikasi-assets

# Clear caches
Write-Host "🧹 Clearing caches..." -ForegroundColor Yellow
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Check if assets were published
if (Test-Path "public/vendor/php-notifikasi/assets") {
    Write-Host "✅ Assets published successfully" -ForegroundColor Green
    Write-Host "📂 Asset location: public/vendor/php-notifikasi/assets/" -ForegroundColor Cyan
    
    # List published files
    Write-Host "📋 Published files:" -ForegroundColor Cyan
    Get-ChildItem "public/vendor/php-notifikasi/assets" -Recurse | ForEach-Object {
        Write-Host "   $($_.Name)" -ForegroundColor White
    }
} else {
    Write-Host "❌ Error: Assets not found. Please check the publish command output above" -ForegroundColor Red
    exit 1
}

Write-Host ""
Write-Host "🎉 Setup complete!" -ForegroundColor Green
Write-Host ""
Write-Host "📝 Next steps:" -ForegroundColor Cyan
Write-Host "1. Add assets to your Blade template:" -ForegroundColor White
Write-Host "   <link href=`"{{ asset('vendor/php-notifikasi/assets/tailwind.min.css') }}`" rel=`"stylesheet`">" -ForegroundColor Gray
Write-Host "   <link href=`"{{ asset('vendor/php-notifikasi/assets/fonts/stylesheet.css') }}`" rel=`"stylesheet`">" -ForegroundColor Gray
Write-Host ""
Write-Host "2. Add notification render to your layout:" -ForegroundColor White
Write-Host "   {!! Notif::render() !!}" -ForegroundColor Gray
Write-Host ""
Write-Host "3. Use in controllers:" -ForegroundColor White
Write-Host "   use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;" -ForegroundColor Gray
Write-Host "   Notif::success('Success', 'Operation completed');" -ForegroundColor Gray
Write-Host ""
Write-Host "4. Test with demo: example/laravel_demo.php" -ForegroundColor White
Write-Host ""
Write-Host "📚 For detailed documentation, see LARAVEL_INTEGRATION.md" -ForegroundColor Cyan 