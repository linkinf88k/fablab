<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-header">
            <?php
            $top_notice_label = get_theme_mod( 'fablab_top_notice_label', 'TUYEN SINH 2025:' );
            $top_notice_text  = get_theme_mod( 'fablab_top_notice_text', 'Khai giảng liên tục các khóa học công nghệ dành cho học sinh từ 6-18 tuổi' );
            $top_phone        = get_theme_mod( 'fablab_top_phone', '094.686.2803' );
            $top_location     = get_theme_mod( 'fablab_top_location', 'Hà Nội' );
            $top_email        = get_theme_mod( 'fablab_top_email', 'info@fablab.edu.vn' );
            $top_cta_text     = get_theme_mod( 'fablab_top_cta_text', 'Đăng ký trải nghiệm' );
            $top_cta_url      = get_theme_mod( 'fablab_top_cta_url', home_url( '/#section-contact' ) );
            ?>

            <div class="fablab-header-topbar">
                <div class="max-w-7xl mx-auto px-4 fablab-header-topbar-inner">
                    <div class="fablab-top-notice">
                        <span class="fablab-top-notice-icon" aria-hidden="true">📣</span>
                        <span class="fablab-top-notice-label"><?php echo esc_html( $top_notice_label ); ?></span>
                        <span class="fablab-top-notice-text"><?php echo esc_html( $top_notice_text ); ?></span>
                    </div>

                    <div class="fablab-top-meta">
                        <span class="fablab-top-meta-item">
                            <?php echo fablab_icon( 'phone', 'h-3.5 w-3.5' ); ?>
                            <?php echo esc_html( $top_phone ); ?>
                        </span>
                        <span class="fablab-top-meta-item">
                            <?php echo fablab_icon( 'map-pin', 'h-3.5 w-3.5' ); ?>
                            <?php echo esc_html( $top_location ); ?>
                        </span>
                        <span class="fablab-top-meta-item">
                            <?php echo fablab_icon( 'mail', 'h-3.5 w-3.5' ); ?>
                            <?php echo esc_html( $top_email ); ?>
                        </span>
                        <a href="<?php echo esc_url( $top_cta_url ); ?>" class="fablab-top-cta text-decoration-none">
                            <?php echo esc_html( $top_cta_text ); ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4" id="header-container">
                <div class="fablab-header-main">

                    <!-- Logo Section -->
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        class="flex items-center space-x-3 md:space-x-6 cursor-pointer text-decoration-none fablab-logo-area"
                        id="logo-section">
                        <!-- Logo FABLAB -->
                        <?php $logo_fablab = get_theme_mod( 'logo_fablab' ); ?>
                        <?php if ( $logo_fablab ) : ?>
                        <img src="<?php echo esc_url( $logo_fablab ); ?>" alt="FABLAB Logo"
                            class="h-12 w-auto object-contain" />
                        <?php else : ?>
                        <div
                            class="flex items-center space-x-2 px-3 py-1.5 rounded-md border border-gray-200 transition-all bg-white">
                            <?php echo fablab_icon( 'award', 'h-6 w-6 text-[#f47920]' ); ?>
                            <div class="flex flex-col">
                                <span class="text-[#f47920] font-black text-sm tracking-wider leading-none">FABLAB</span>
                                <span class="text-[#f47920] font-bold text-[10px] tracking-tight">BÁCH KHOA</span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Separator -->
                        <div class="h-8 w-[1px] bg-gray-300 hidden sm:block"></div>

                        <!-- Logo BK Holdings -->
                        <?php $logo_bk = get_theme_mod( 'logo_bk' ); ?>
                        <?php if ( $logo_bk ) : ?>
                        <img src="<?php echo esc_url( $logo_bk ); ?>" alt="BK Holdings Logo"
                            class="h-12 w-auto object-contain hidden sm:block" />
                        <?php else : ?>
                        <div class="flex items-center space-x-1.5 hidden sm:flex">
                            <div
                                class="w-7 h-7 bg-[#ffffff] rounded-sm flex items-center justify-center font-bold text-[#f47920] text-xs">
                                BK</div>
                            <div class="flex flex-col">
                                <span class="text-gray-700 text-[11px] font-bold uppercase leading-none tracking-wide">BK
                                    HOLDINGS</span>
                                <span class="text-gray-500 text-[9px] leading-none">HUST ecosystem</span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </a>

                    <!-- Desktop Navigation -->
                    <nav class="hidden lg:flex" id="desktop-nav">
                        <?php
						wp_nav_menu([
							'theme_location' => 'primary',
							'container'      => false,
                            'menu_class'     => 'fablab-main-menu',
							'walker'         => new Fablab_Menu_Walker(),
						]);
						?>
                    </nav>

                    <a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" class="fablab-search-btn text-decoration-none" aria-label="Tìm kiếm">
                        <?php echo fablab_icon( 'search', 'h-5 w-5' ); ?>
                    </a>

                    <!-- Mobile Menu Button -->
                    <div class="lg:hidden">
                        <button class="text-gray-700 p-2 focus:outline-none hover:text-[#f47920]" id="mobile-menu-toggle">
                            <?php echo fablab_icon( 'menu', 'h-6 w-6 menu-icon' ); ?>
                            <?php echo fablab_icon( 'x', 'h-6 w-6 x-icon hidden' ); ?>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Navigation Panel -->
            <div class="lg:hidden bg-white border-t border-gray-200 hidden" id="mobile-nav-panel">
                <div class="px-4 py-3 space-y-1">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        class="flex items-center space-x-2 w-full text-left px-3 py-2.5 rounded-md text-gray-700 font-medium hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                        <?php echo fablab_icon( 'home', 'h-5 w-5' ); ?>
                        <span>Trang chủ</span>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>"
                        class="block w-full text-left px-3 py-2.5 rounded-md text-gray-700 font-medium hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                        Giới thiệu
                    </a>

                    <!-- Khoa hoc Submenu -->
                    <div class="py-1">
                        <span class="block px-3 py-1.5 text-xs text-gray-500 font-bold tracking-wider uppercase">Khóa
                            học</span>
                        <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=lap-trinh-ung-dung' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-gray-700 hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                            Lập trình Ứng dụng
                        </a>
                        <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=lap-trinh-thi-dau' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-gray-700 hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                            Lập trình Thi đấu
                        </a>
                        <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=lap-trinh-game' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-gray-700 hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                            Lập trình Game
                        </a>
                        <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=stem-ai-robotics' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-gray-700 hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                            STEM AI Robotics
                        </a>
                        <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=luyen-thi-thpt' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-[#f47920] hover:bg-[#f47920]/10 font-medium text-decoration-none">
                            Luyện thi THPT môn Tin học
                        </a>
                    </div>

                    <a href="<?php echo esc_url( home_url( '/lich-khai-giang' ) ); ?>"
                        class="block w-full text-left px-3 py-2.5 rounded-md text-gray-700 font-medium hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                        Lịch khai giảng
                    </a>

                    <!-- Tin tuc Submenu -->
                    <div class="py-1">
                        <span class="block px-3 py-1.5 text-xs text-gray-500 font-bold tracking-wider uppercase">Tin tức
                            & Sự kiện</span>
                        <a href="<?php echo esc_url( home_url( '/tin-tuc?category=chuong-trinh-hop-tac' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-gray-700 hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                            Chương trình hợp tác
                        </a>
                        <a href="<?php echo esc_url( home_url( '/tin-tuc?category=hoat-dong-noi-bo' ) ); ?>"
                            class="block w-full text-left pl-6 pr-3 py-2 text-sm text-gray-700 hover:bg-[#f47920]/10 hover:text-[#f47920] text-decoration-none">
                            Hoạt động nội bộ
                        </a>
                    </div>

                    <a href="<?php echo esc_url( home_url( '/#section-contact' ) ); ?>"
                        class="block w-full text-center px-3 py-3 mt-4 rounded-md bg-[#ffffff] text-[#f47920] font-bold text-sm hover:bg-white transition-colors text-decoration-none">
                        Đăng ký trải nghiệm
                    </a>
                </div>
            </div>
        </header>

        <main class="flex-grow pt-[56px] md:pt-[64px]" id="main-content-layout">