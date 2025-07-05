#!/bin/bash

# PHP Notifikasi - Laravel Setup Script
echo "🔔 PHP Notifikasi - Laravel Setup Script"
echo "========================================"

# Check if we're in a Laravel project
if [ ! -f "artisan" ]; then
    echo "❌ Error: This doesn't appear to be a Laravel project (no artisan file found)"
    echo "Please run this script from your Laravel project root directory"
    exit 1
fi

echo "✅ Laravel project detected"

# Install package if not already installed
if ! composer show rzlco/php-notifikasi > /dev/null 2>&1; then
    echo "📦 Installing PHP Notifikasi package..."
    composer require rzlco/php-notifikasi
else
    echo "✅ Package already installed"
fi

# Publish assets
echo "📁 Publishing assets..."
php artisan vendor:publish --tag=php-notifikasi-assets

# Clear caches
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Check if assets were published
if [ -d "public/vendor/php-notifikasi/assets" ]; then
    echo "✅ Assets published successfully"
    echo "📂 Asset location: public/vendor/php-notifikasi/assets/"
    
    # List published files
    echo "📋 Published files:"
    ls -la public/vendor/php-notifikasi/assets/
else
    echo "❌ Error: Assets not found. Please check the publish command output above"
    exit 1
fi

echo ""
echo "🎉 Setup complete!"
echo ""
echo "📝 Next steps:"
echo "1. Add assets to your Blade template:"
echo "   <link href=\"{{ asset('vendor/php-notifikasi/assets/tailwind.min.css') }}\" rel=\"stylesheet\">"
echo "   <link href=\"{{ asset('vendor/php-notifikasi/assets/fonts/stylesheet.css') }}\" rel=\"stylesheet\">"
echo ""
echo "2. Add notification render to your layout:"
echo "   {!! Notif::render() !!}"
echo ""
echo "3. Use in controllers:"
echo "   use Rzlco\\PhpNotifikasi\\NotifikasiFacade as Notif;"
echo "   Notif::success('Success', 'Operation completed');"
echo ""
echo "4. Test with demo: example/laravel_demo.php"
echo ""
echo "📚 For detailed documentation, see LARAVEL_INTEGRATION.md" 