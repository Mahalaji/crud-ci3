<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Slug helper function to generate a URL-friendly slug from a title.
 *
 * @param string $string
 * @return string
 */
function generate_slug($string) {
    // Convert string to lowercase
    $slug = strtolower($string);
    
    // Replace spaces with hyphens
    $slug = preg_replace('/\s+/', '-', $slug);
    
    // Remove all characters except lowercase letters, numbers, and hyphens
    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
    
    // Trim trailing hyphens
    $slug = rtrim($slug, '-');
    
    return $slug;
}
