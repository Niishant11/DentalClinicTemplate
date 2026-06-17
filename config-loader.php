<?php
/**
 * config-loader.php
 */

if (!defined('CONFIG_LOADED')) {

    define('CONFIG_LOADED', true);

    /**
     * If website is deployed in root:
     */
    define('BASE_URL', '');

    /**
     * Load clinicConfig.json from same folder
     */
    $configPath = __DIR__ . DIRECTORY_SEPARATOR . 'clinicConfig.json';

    $clinicConfig = [];

    if (!file_exists($configPath)) {
        die('Configuration file not found: ' . $configPath);
    }

    $rawJson = file_get_contents($configPath);

    if ($rawJson === false) {
        die('Unable to read clinicConfig.json');
    }

    $decoded = json_decode($rawJson, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Invalid JSON: ' . json_last_error_msg());
    }

    $clinicConfig = is_array($decoded) ? $decoded : [];

    /**
     * Safe config lookup
     */
    function getConfig(string $dotPath, $fallback = '')
    {
        global $clinicConfig;

        $segments = explode('.', $dotPath);
        $value = $clinicConfig;

        foreach ($segments as $segment) {
            if (is_array($value) && array_key_exists($segment, $value)) {
                $value = $value[$segment];
            } else {
                return $fallback;
            }
        }

        return $value;
    }

    /**
     * Asset helper
     *
     * Example:
     * asset('Website/Styles/main.css')
     * Output:
     * /Assets/Website/Styles/main.css
     */
    function asset(string $relativePath): string
    {
        return BASE_URL . '/Assets/' . ltrim($relativePath, '/');
    }

    /**
     * Page URL helper
     */
    function pageUrl(string $pageFile): string
    {
        return BASE_URL . '/Assets/Website/Pages/' . ltrim($pageFile, '/');
    }

    /**
     * Home URL helper
     */
    function homeUrl(): string
    {
        return BASE_URL === '' ? '/' : BASE_URL . '/';
    }

    /**
     * WhatsApp URL helper
     */
    function whatsappUrl(string $message = ''): string
    {
        $number = getConfig('contact.whatsappNumber', '');

        if (empty($number)) {
            return '#';
        }

        $base = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $number);

        return $message
            ? $base . '?text=' . rawurlencode($message)
            : $base;
    }
}

?>