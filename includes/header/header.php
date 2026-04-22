<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

// SEO: dynamic metadata per page
$baseUrl = 'https://dezimal.svilenkovic.rs';
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$currentPath = strtok($requestUri, '?') ?: '/';

$pageTitle = 'DEMO SAJT | Dezimal Consulting | Telecommunications Consulting | 4G/5G, RF, VoLTE';
$metaDescription = 'Demo prikaz sajta za telecommunications consulting: mobile network optimization, RF planning, 4G/5G i VoLTE implementacija.';
$canonicalUrl = rtrim($baseUrl, '/') . '/';
$ogType = 'website';

if ($currentPath === '/terms.php') {
    $pageTitle = 'DEMO | Terms & Conditions | Dezimal Consulting';
    $metaDescription = 'Demo pravna stranica sajta Dezimal Consulting.';
    $canonicalUrl = rtrim($baseUrl, '/') . '/terms.php';
    $ogType = 'article';
} elseif ($currentPath === '/privacy.php') {
    $pageTitle = 'DEMO | Privacy Policy | Dezimal Consulting';
    $metaDescription = 'Demo privacy stranica sajta Dezimal Consulting.';
    $canonicalUrl = rtrim($baseUrl, '/') . '/privacy.php';
    $ogType = 'article';
} elseif ($currentPath === '/legal.php') {
    $pageTitle = 'DEMO | Legal | Privacy Policy & Terms | Dezimal Consulting';
    $metaDescription = 'Demo legal stranica sajta Dezimal Consulting.';
    $canonicalUrl = rtrim($baseUrl, '/') . '/legal.php';
    $ogType = 'article';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S83SEJQ064"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-S83SEJQ064');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="telecommunications consultant, mobile network optimization, 4G 5G consulting, RF planning, VoLTE implementation, IoT solutions, RAN optimization, telecommunications projects, network strategy, mobile telecommunications, LTE optimization, telecommunications consulting services">
    <meta name="author" content="Dezimal Consulting">
    <meta name="theme-color" content="#1e40af">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="alternate" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>" hreflang="en">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    
    <meta name="language" content="English">
    <meta name="geo.region" content="RS">
    <meta name="geo.placename" content="Serbia">
    <meta name="geo.position" content="44.0165;21.0059">
    <meta name="ICBM" content="44.0165, 21.0059">
    
    <meta property="og:site_name" content="Dezimal Consulting">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="<?php echo $ogType; ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars(rtrim($baseUrl, '/') . '/og-image.jpg', ENT_QUOTES, 'UTF-8'); ?>">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dezimalrs">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars(rtrim($baseUrl, '/') . '/og-image.jpg', ENT_QUOTES, 'UTF-8'); ?>">
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Dezimal Consulting",
      "alternateName": "Dezimal",
    "url": "https://dezimal.svilenkovic.rs/",
    "logo": "https://dezimal.svilenkovic.rs/logo.png",
      "description": "Expert telecommunications consulting for mobile network optimization, 4G/5G technologies, RF planning, VoLTE implementation, and IoT solutions. Specialized in RAN optimization, project management, and strategic planning for telecom operators worldwide.",
      "foundingDate": "2020",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "RS",
        "addressLocality": "Serbia"
      },
      "contactPoint": [{
        "@type": "ContactPoint",
        "telephone": "+381666776733",
        "contactType": "customer service",
        "areaServed": "Worldwide",
        "availableLanguage": ["English"],
        "hoursAvailable": {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "09:00",
          "closes": "17:00"
        }
      }],
      "sameAs": [
        "https://www.linkedin.com/in/dezimalrs/"
      ],
      "serviceArea": {
        "@type": "Country",
        "name": "Worldwide"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Dezimal Consulting",
    "url": "https://dezimal.svilenkovic.rs/",
      "inLanguage": "en-US",
      "publisher": {
        "@type": "Organization",
        "name": "Dezimal Consulting"
      }
    }
    </script>
    
    <link rel="manifest" href="system/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#64748b',
                        accent: '#3b82f6',
                        dark: '#1f2937',
                        light: '#f8fafc'
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="system/css/animations.css">
    <link rel="stylesheet" href="system/css/smooth-animations.css">
    <link rel="stylesheet" href="includes/header/header.css">
    <link rel="stylesheet" href="includes/sections/hero/hero.css">
    <link rel="stylesheet" href="includes/sections/about/about.css">
    <link rel="stylesheet" href="includes/sections/services/services.css">
    <link rel="stylesheet" href="includes/sections/contact/contact.css">
    <link rel="stylesheet" href="includes/footer/footer.css">
    <script src="system/js/animations.js" defer></script>
    <script src="includes/header/header.js" defer></script>
</head>
<body class="bg-gray-50 text-gray-900" style="min-height: 100vh;">
    <header class="header bg-white shadow-sm fixed w-full z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center flex-shrink-0">
                    <a href="/" class="cursor-pointer">
                        <h1 class="text-xl md:text-2xl font-bold text-primary hover:text-blue-700 transition-colors duration-300">
                            <span class="hidden sm:inline">Dezimal Consulting</span>
                            <span class="sm:hidden">Dezimal</span>
                        </h1>
                    </a>
                </div>
                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/#services" class="text-gray-700 hover:text-primary font-medium px-3 py-2 rounded-md transition-colors duration-300">Services</a>
                    <a href="/#about" class="text-gray-700 hover:text-primary font-medium px-3 py-2 rounded-md transition-colors duration-300">About</a>
                    <a href="/#contact" class="bg-primary text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-300">Contact</a>
                </nav>

                <!-- Mobile menu toggle -->
                <button class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary mobile-menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu: overlay + right drawer -->
        <div id="mobile-menu" class="md:hidden fixed inset-0 z-50 hidden">
            <!-- Backdrop (does not cover header height) -->
            <button type="button" class="mobile-backdrop absolute left-0 right-0 bottom-0 top-16 bg-black" style="opacity: 0;"></button>
            <!-- Drawer panel -->
            <nav class="mobile-panel absolute right-0 top-16 h-[calc(100vh-4rem)] w-64 sm:w-80 bg-white border-l border-gray-200 shadow-xl overflow-y-auto">
                <div class="px-4 pt-4 pb-6 space-y-1">
                    <a href="/#services" class="block text-gray-700 hover:text-primary font-medium px-3 py-2 rounded-md transition-colors duration-300">Services</a>
                    <a href="/#about" class="block text-gray-700 hover:text-primary font-medium px-3 py-2 rounded-md transition-colors duration-300">About</a>
                    <a href="/#contact" class="block bg-primary text-white px-3 py-2 rounded-md font-medium hover:bg-blue-700 transition-colors duration-300">Contact</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="mt-16 bg-amber-100 border-b border-amber-300 text-amber-900 relative z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 text-sm">
            <strong>DEMO SAJT:</strong> Ovo je demonstraciona verzija sajta. Za izradu sličnog sajta kontaktirajte
            <a href="https://svilenkovic.com" target="_blank" rel="noopener" class="underline font-semibold hover:text-amber-700">svilenkovic.com</a>.
        </div>
    </div>