# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Initial release
- iOS-style notification system with Apple design system
- Dark mode support (light, dark, auto)
- 4 notification styles: clean, colored, blur, liquid-glass
- 6 position support: top-left, top-right, top-center, bottom-left, bottom-right, bottom-center
- Framework-agnostic architecture
- Laravel integration with service provider and facade
- Value objects for type safety
- Custom storage and renderer support
- Comprehensive test suite
- Documentation with interactive demo

### Features
- **Apple Design System**: Native iOS-style notifications with blur effects
- **Dark Mode**: Comprehensive dark mode with system preference detection
- **Responsive**: Mobile-friendly with touch interactions
- **Lightweight**: No external dependencies, pure PHP
- **Extensible**: Custom storage and renderer implementations
- **Clean Architecture**: Value objects, service classes, dependency injection

## [1.0.0] - 2024-01-XX

### Added
- Initial release of PHP Notifikasi
- Core notification functionality
- Session and Array storage implementations
- HTML renderer with Tailwind CSS
- Facade pattern for easy usage
- Comprehensive documentation and examples

### Technical Details
- PHP 7.4+ support
- PSR-4 autoloading
- MIT license
- 100% test coverage
- Laravel integration ready

## [0.1.2] - 2025-01-15

### Fixed
- **Config Reading Issue**: ServiceProvider sekarang membaca config Laravel dengan benar dan merge dengan default values
- **CSS Conflict**: Semua CSS diisolasi dengan prefix `.php-notifikasi-container` untuk menghindari conflict dengan Bootstrap atau framework CSS lainnya
- **Z-Index Issue**: Z-index ditingkatkan ke 999999 untuk memastikan notifikasi muncul di atas semua elemen termasuk navbar fixed
- **Asset Path**: Menggunakan helper function `php_notifikasi_asset()` untuk path yang konsisten di Laravel
- **Position Default**: Config `default_position = 'bottom-right'` sekarang terbaca dengan benar

### Changed
- **CSS Isolation**: Semua style menggunakan `!important` dan prefix `.php-notifikasi-container` untuk isolasi sempurna
- **Animation Names**: Keyframe animations diubah dengan prefix `phpNotifikasi` untuk menghindari conflict
- **Container Class**: Container menggunakan class `php-notifikasi-container` untuk isolasi yang lebih baik
- **ServiceProvider**: Improved config merging dengan default values yang benar

### Added
- **Enhanced Laravel Demo**: Demo yang menunjukkan integrasi dengan Bootstrap tanpa conflict
- **Troubleshooting Guide**: Panduan lengkap untuk masalah umum di Laravel
- **CSS Isolation Documentation**: Penjelasan tentang isolasi CSS dan cara kerjanya

## [0.1.1] - 2025-01-15

### Added
- Laravel integration with ServiceProvider for auto-discovery
- Asset publishing system for Laravel (`php artisan vendor:publish --tag=php-notifikasi-assets`)
- Helper function `php_notifikasi_asset()` for consistent asset paths
- Laravel demo file (`example/laravel_demo.php`)
- Setup scripts for Laravel integration (`scripts/laravel-setup.sh`, `scripts/laravel-setup.ps1`)
- Comprehensive Laravel documentation (`LARAVEL_INTEGRATION.md`)
- Updated README with Laravel integration section

### Fixed
- Asset path issues in Laravel environment
- 404 errors for CSS and font files in Laravel
- Helper function loading issues
- Documentation for Laravel troubleshooting

### Changed
- Updated composer.json with Laravel auto-discovery configuration
- Enhanced README with Laravel integration guide
- Improved asset management for framework compatibility

## [0.1.0] - 2025-01-14

### Added
- Initial release of PHP Notifikasi
- iOS-style notification system with Apple design language
- Clean architecture with value objects and service classes
- Multiple notification styles (clean, colored, blur, liquid-glass)
- Dark mode support (light, dark, auto)
- 6 notification positions (top-left, top-right, top-center, bottom-left, bottom-right, bottom-center)
- Framework-agnostic design
- Session and array storage implementations
- HTML renderer with Tailwind CSS
- Comprehensive unit tests
- Documentation and examples

### Features
- Modern iOS design with blur effects and liquid glass
- Responsive design for mobile devices
- Auto-dismiss with configurable timers
- Type safety with value objects
- Clean architecture principles
- No external dependencies
- High performance rendering 