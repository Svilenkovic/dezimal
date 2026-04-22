<?php
/**
 * Site Configuration
 * Centralized configuration for Dezimal Consulting website
 */

// Site Information
define('SITE_NAME', 'Dezimal Consulting');
define('SITE_URL', 'https://dezimal.svilenkovic.rs');
define('SITE_DESCRIPTION', 'Demo presentation website for telecommunications consulting, 4G/5G technologies, project management, and strategic planning.');

// Contact Information
define('CONTACT_EMAIL', 'info@dezimal.rs');
define('CONTACT_PHONE', '+381 66 677 6733');
define('CONTACT_ADDRESS', 'Serbia');

// Social Media (if/when added)
define('LINKEDIN_URL', 'https://linkedin.com/in/dezimalrs/');
define('TWITTER_HANDLE', '@dezimalrs');

// Business Information
define('COMPANY_FOUNDED', '2020');
define('BUSINESS_HOURS', 'Monday - Friday: 9:00 - 17:00');

// Technical Settings
define('CACHE_ENABLED', true);
define('CACHE_DURATION', 3600); // 1 hour
define('DEBUG_MODE', false);

// Security Settings
define('CSRF_TOKEN_NAME', '_token');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Email Settings
define('EMAIL_FROM_NAME', 'Dezimal Consulting');
define('EMAIL_FROM_ADDRESS', 'noreply@dezimal.rs');
define('EMAIL_ADMIN', 'info@dezimal.rs');

// SEO Settings
define('DEFAULT_META_TITLE', 'DEMO SAJT | Dezimal Consulting | Telecommunications Consultant | Mobile Network Optimization 4G/5G');
define('DEFAULT_META_DESCRIPTION', 'Demo presentation of a telecommunications consulting website for mobile network optimization and 4G/5G services.');
define('DEFAULT_META_KEYWORDS', 'telecommunications, mobile networks, 4G, 5G, consulting, optimization, network optimization, project management');

// Analytics
define('GOOGLE_ANALYTICS_ID', 'GA_MEASUREMENT_ID'); // Replace with actual ID

// File Upload Settings
define('MAX_FILE_SIZE', 5242880); // 5MB
define('ALLOWED_FILE_TYPES', ['pdf', 'doc', 'docx', 'txt']);

// Rate Limiting
define('CONTACT_FORM_RATE_LIMIT', 3); // messages per hour
define('RATE_LIMIT_WINDOW', 3600); // 1 hour

// Maintenance Mode
define('MAINTENANCE_MODE', false);
define('MAINTENANCE_MESSAGE', 'We are currently performing scheduled maintenance. Please try again later.');

// Features Toggle
define('ENABLE_CONTACT_FORM', true);
define('ENABLE_ANALYTICS', true);
define('ENABLE_CACHE', true);

/**
 * Get site configuration value
 */
function getSiteConfig($key, $default = null) {
    return defined($key) ? constant($key) : $default;
}

/**
 * Check if feature is enabled
 */
function isFeatureEnabled($feature) {
    $featureKey = 'ENABLE_' . strtoupper($feature);
    return getSiteConfig($featureKey, false);
}

/**
 * Get formatted business hours
 */
function getBusinessHours() {
    return getSiteConfig('BUSINESS_HOURS', 'Contact us for availability');
}

/**
 * Generate CSRF token
 */
function generateCSRFToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verifyCSRFToken($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Sanitize user input
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Initialize session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
