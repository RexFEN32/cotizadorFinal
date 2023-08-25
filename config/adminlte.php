<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    //'title' => '',
    'title_prefix' => '',
    'title_postfix' => ' | TYRSAWES',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>TYRSA</b>WES',
    'logo_img' => 'vendor/img/logo.svg',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'TYRSAWES',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/img/logo.svg',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'admin.index',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => ' CARRITO',
            'type' => 'navbar-notification',
            'id'           => 'my-notification',
            'icon' => 'fas fa-shopping-cart',
            'route'  => 'shopping_cart.index',
            'can'  => 'VER ROL',
            'icon_color' => 'primary',
            'topnav_right' => true,
            'label'        => 0,                      // The initial label for the badge (optional).
            'label_color'  => 'primary',
            'update_cfg'   => [
                'url' => 'shopping_cart/get',
                'period' => 3,
            ],
        ],
        [
            'type' => 'navbar-search',
            'text' => 'search',
            'topnav_right' => false,
        ],
       
        [
            'type' => 'fullscreen-widget',
            'text' =>'kakmdfk',
            'topnav_right' => true,
        ],

        [
            'header' => 'CONFIGURACIÓN',
            'can' => 'CATALOGOS',
        ],
        [
            'text' => 'CATÁLOGOS',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => ' ROLES',
                    'icon' => 'fas fa-fw fa-user-lock',
                    'route'  => 'roles.index',
                    'can'  => 'VER ROL',
                ],
                [
                    'text' => 'ZONAS',
                    'icon' => 'fas fa-fw fa-map-marker-alt',
                    'route'  => 'zones.index',
                    'can'  => 'VER ZONAS',
                ],
                [
                    'text' => ' USUARIOS',
                    'icon' => 'fas fa-fw fa-users',
                    'route'  => 'users.index',
                    'can'  => 'VER USUARIOS',
                ],
                [
                    'text' => 'CLASIFICACION DE CLIENTES',
                    'icon' => 'fas fa-fw fa-id-card',
                    'route'  => 'customer_classifications.index',
                    'can'  => 'VER CLASIFICACIONES',
                ],
                [
                    'text' => 'TIPOS DE CLIENTES',
                    'icon' => 'fas fa-fw fa-restroom',
                    'route'  => 'customer_types.index',
                    'can'  => 'VER TIPO DE CLIENTES',
                ],
                [
                    'text' => 'SECTORES',
                    'icon' => 'fas fa-fw fa-industry',
                    'route'  => 'sectors.index',
                    'can'  => 'VER SECTORES',
                ],
                [
                    'text' => 'CLIENTES',
                    'icon' => 'fas fa-fw fa-users-cog',
                    'route'  => 'customers.index',
                    'can'  => 'VER CLIENTES',
                ],
                [
                    'text' => 'ACEROS',
                    'icon' => 'fas fa-fw fa-helmet-safety',
                    'route'  => 'steels.index',
                    'can'  => 'VER ACEROS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_lists.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS INSTALACIÓN',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_list_installs.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS DESINSTALACIÓN',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_list_uninstalls.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS TORNILLERÍA',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_list_screws.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS AUXILIARES',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_list_auxiliars.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS PROTECTORES',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_list_protectors.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                [
                    'text' => 'LISTA DE PRECIOS BARRAS',
                    'icon' => 'fas fa-fw fa-circle-dollar-to-slot',
                    'route'  => 'price_list_bars.index',
                    'can'  => 'VER LISTA DE PRECIOS',
                ],
                // [
                //     'text' => 'PRODUCTOS',
                //     'icon' => 'fas fa-fw fa-barcode',
                //     'route'  => 'prime_materials.index',
                //     'can'  => 'VER PRODUCTOS',
                // ],
                [
                    'text' => 'TRANSPORTES',
                    'icon' => 'fas fa-fw fa-truck-plane',
                    'route'  => 'transports.index',
                    'can'  => 'VER TRANSPORTES',
                ],
                [
                    'text' => 'DESTINOS',
                    'icon' => 'fas fa-fw fa-map-location-dot',
                    'route'  => 'destinations.index',
                    'can'  => 'VER DESTINOS',
                ],
                [
                    'text' => 'VIÁTICOS',
                    'icon' => 'fas fa-fw fa-route',
                    'route'  => 'travel_assignments.index',
                    'can'  => 'VER VIÁTICOS',
                ],
                /*
                [
                    'text' => 'ACTUALIZAR TABLAS',
                    'icon' => 'fas fa-fw fa-table',
                    'route'  => 'prime_materials.showtables',
                    'can'  => 'VER PRODUCTOS',
                ],
                [
                    'text' => 'FACTORES',
                    'icon' => 'fa-solid fa-percent fa-fw',
                    'route'  => 'factors.index',
                    'can'  => 'VER PRODUCTOS',
                ],
                */
            ],
            'can' => 'CATALOGOS',
        ],
        [
            'header' => '===================',
        ],
        [
            'text' => '  COTIZADOR',
            'icon' => 'fas fa-calculator',
            'route'  => 'dashboard',
            'can' => 'COTIZADOR',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
