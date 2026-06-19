<?php

if (!defined('ABSPATH')) {
    exit;
}

class Fablab_Menu_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<ul class="absolute top-full left-0 w-72 bg-white text-gray-800 rounded-md shadow-2xl py-2 border border-gray-100 hidden dropdown-menu-list">';
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>';
    }

    public function start_el(
        &$output,
        $item,
        $depth = 0,
        $args = null,
        $id = 0
    ) {

        $classes = empty($item->classes)
            ? []
            : (array) $item->classes;

        $has_children = in_array(
            'menu-item-has-children',
            $classes
        );

        if (!$has_children && isset($args->has_children)) {
            $has_children = (bool) $args->has_children;
        }

        if ($depth === 0) {

            $output .= sprintf(
                '<li class="relative dropdown-menu-container %s">',
                $has_children ? 'has-submenu' : ''
            );

            $output .= sprintf(
                '<a href="%s" class="menu-item-link %s px-3 py-2 rounded-md font-medium text-sm text-white hover:bg-white/10 transition-all duration-200 inline-flex items-center">',
                esc_url($item->url)
                ,$has_children ? 'has-children' : ''
            );

            $output .= esc_html($item->title);

            if ($has_children) {
                $output .= '
                <svg class="submenu-chevron inline-block w-4 h-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 9l-7 7-7-7"/>
                </svg>';
            }

            $output .= '</a>';
        } else {

            $output .= '<li>';

            $output .= sprintf(
                '<a href="%s" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">',
                esc_url($item->url)
            );

            $output .= esc_html($item->title);

            $output .= '</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }
}