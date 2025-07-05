<?php

namespace Rzlco\PhpNotifikasi\Renderer\Assets;

class JavaScriptAssetManager
{
    public function render(): string
    {
        return '<script>
        window.phpNotifikasi = {
            init: function() {
                this.initializeNotifications();
                this.handleDarkMode();
            },

            initializeNotifications: function() {
                document.querySelectorAll("[data-duration]").forEach(function(notif) {
                    const duration = parseInt(notif.dataset.duration);
                    if (duration > 0) {
                        phpNotifikasi.startProgressAnimation(notif, duration);
                        phpNotifikasi.scheduleDismiss(notif, duration);
                    }
                });
            },

            handleDarkMode: function() {
                // Handle auto mode notifications
                document.querySelectorAll("[data-mode=\'auto\']").forEach(function(notif) {
                    phpNotifikasi.applyAutoMode(notif);
                });

                // Listen for system theme changes
                if (window.matchMedia) {
                    const mediaQuery = window.matchMedia("(prefers-color-scheme: dark)");
                    mediaQuery.addListener(function(e) {
                        phpNotifikasi.updateAutoModeNotifications(e.matches);
                    });
                }
            },

            applyAutoMode: function(notif) {
                const isDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
                phpNotifikasi.toggleDarkMode(notif, isDark);
            },

            updateAutoModeNotifications: function(isDark) {
                document.querySelectorAll("[data-mode=\'auto\']").forEach(function(notif) {
                    phpNotifikasi.toggleDarkMode(notif, isDark);
                });
            },

            toggleDarkMode: function(notif, isDark) {
                const container = notif.querySelector(".notif-clean, .notif-blur, .notif-liquid-glass, .notif-success, .notif-error, .notif-warning, .notif-info, .notif-custom");
                if (!container) return;

                // Remove existing mode classes
                container.classList.remove(
                    "notif-clean", "notif-clean-dark",
                    "notif-blur", "notif-blur-dark",
                    "notif-liquid-glass", "notif-liquid-glass-dark",
                    "notif-success", "notif-success-dark",
                    "notif-error", "notif-error-dark",
                    "notif-warning", "notif-warning-dark",
                    "notif-info", "notif-info-dark",
                    "notif-custom", "notif-custom-dark"
                );

                // Add appropriate mode class
                const baseClass = this.getBaseClass(container);
                if (baseClass) {
                    container.classList.add(isDark ? baseClass + "-dark" : baseClass);
                }

                // Update text classes
                this.updateTextClasses(notif, isDark);
            },

            getBaseClass: function(container) {
                const classes = container.className.split(" ");
                for (let cls of classes) {
                    if (cls.startsWith("notif-") && !cls.endsWith("-dark")) {
                        return cls;
                    }
                }
                return null;
            },

            updateTextClasses: function(notif, isDark) {
                // Update title
                const title = notif.querySelector(".notif-title, .notif-title-dark");
                if (title) {
                    title.classList.remove("notif-title", "notif-title-dark");
                    title.classList.add(isDark ? "notif-title-dark" : "notif-title");
                }

                // Update message
                const message = notif.querySelector(".notif-message, .notif-message-dark");
                if (message) {
                    message.classList.remove("notif-message", "notif-message-dark");
                    message.classList.add(isDark ? "notif-message-dark" : "notif-message");
                }

                // Update time
                const time = notif.querySelector(".notif-time, .notif-time-dark");
                if (time) {
                    time.classList.remove("notif-time", "notif-time-dark");
                    time.classList.add(isDark ? "notif-time-dark" : "notif-time");
                }

                // Update close button
                const closeBtn = notif.querySelector(".ios-close-btn, .ios-close-btn-dark");
                if (closeBtn) {
                    closeBtn.classList.remove("ios-close-btn", "ios-close-btn-dark");
                    closeBtn.classList.add(isDark ? "ios-close-btn-dark" : "ios-close-btn");
                }

                // Update badge
                const badge = notif.querySelector("[class*=\'badge-\']");
                if (badge) {
                    const badgeClasses = badge.className.split(" ");
                    for (let cls of badgeClasses) {
                        if (cls.startsWith("badge-")) {
                            badge.classList.remove(cls);
                            if (cls.endsWith("-dark")) {
                                badge.classList.add(cls.replace("-dark", ""));
                            } else {
                                badge.classList.add(isDark ? cls + "-dark" : cls);
                            }
                            break;
                        }
                    }
                }

                // Update progress bar
                const progress = notif.querySelector(".progress-bar, .progress-bar-colored, .progress-bar-dark, .progress-bar-colored-dark");
                if (progress) {
                    progress.classList.remove("progress-bar", "progress-bar-colored", "progress-bar-dark", "progress-bar-colored-dark");
                    const isColored = progress.classList.contains("progress-bar-colored") || progress.classList.contains("progress-bar-colored-dark");
                    progress.classList.add(isDark ? (isColored ? "progress-bar-colored-dark" : "progress-bar-dark") : (isColored ? "progress-bar-colored" : "progress-bar"));
                }
            },

            startProgressAnimation: function(notif, duration) {
                const progressBar = notif.querySelector(".progress-bar, .progress-bar-colored, .progress-bar-dark, .progress-bar-colored-dark");
                if (progressBar) {
                    progressBar.style.animation = `progress-countdown ${duration}ms linear forwards`;
                }
            },

            scheduleDismiss: function(notif, duration) {
                setTimeout(function() {
                    phpNotifikasi.dismiss(notif.id);
                }, duration);
            },

            dismiss: function(id) {
                const notif = document.getElementById(id);
                if (!notif) return;

                const container = notif.closest(".notif-container");
                const position = container ? container.dataset.position : "top-right";
                
                phpNotifikasi.addExitAnimation(notif, position);
                phpNotifikasi.removeElement(notif);
            },

            addExitAnimation: function(notif, position) {
                const parent = notif.parentElement;
                if (!parent) return;

                parent.classList.remove("slide-in-right", "slide-in-left", "slide-in-top", "slide-in-bottom");
                
                const exitClass = phpNotifikasi.getExitAnimationClass(position);
                parent.classList.add(exitClass);
            },

            getExitAnimationClass: function(position) {
                if (position.includes("right")) return "slide-out-right";
                if (position.includes("left")) return "slide-out-left";
                if (position.includes("top")) return "slide-out-top";
                return "slide-out-bottom";
            },

            removeElement: function(notif) {
                setTimeout(function() {
                    const parent = notif.parentElement;
                    if (parent && parent.parentNode) {
                        parent.parentNode.removeChild(parent);
                    }
                }, 250);
            },

            dismissAll: function() {
                document.querySelectorAll("[data-duration]").forEach(function(notif) {
                    phpNotifikasi.dismiss(notif.id);
                });
            }
        };

        // Auto initialize when DOM is ready
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", function() {
                phpNotifikasi.init();
            });
        } else {
            phpNotifikasi.init();
        }
        </script>' . "\n";
    }
} 