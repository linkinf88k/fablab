<?php
/**
 * The main template file
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$hero_eyebrow = get_theme_mod( 'fablab_hero_eyebrow', 'BK STEM ECOSYSTEM' );

$default_banners = array(
    1 => array(
        'title'    => 'Khám phá công nghệ, sáng tạo tương lai',
        'subtitle' => 'Khám phá công nghệ, sáng tạo tương lai cao đến ngôi nhà của trẻ.',
        'image'    => 'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=1200&q=80',
        'badge'    => 'BK-STEM',
        'cta_text' => 'Đăng ký ngay',
        'cta_url'  => home_url( '/#section-contact' ),
    ),
    2 => array(
        'title'    => 'Kiến tạo tư duy, chinh phục công nghệ',
        'subtitle' => 'Ươm mầm tư duy logic, tự tin lập trình kéo thả và xây dựng thuật toán cùng Scratch và Python.',
        'image'    => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
        'badge'    => 'SCRATCH & PYTHON',
        'cta_text' => 'Đăng ký ngay',
        'cta_url'  => home_url( '/#section-contact' ),
    ),
    3 => array(
        'title'    => 'Chế tác thông minh, làm chủ robotics',
        'subtitle' => 'Lập trình cảm biến thế hệ mới, hiện thực hóa các ý tưởng sáng tạo cơ khí tự động hóa thông minh.',
        'image'    => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=1200&q=80',
        'badge'    => 'ROBOTICS LAB',
        'cta_text' => 'Đăng ký ngay',
        'cta_url'  => home_url( '/#section-contact' ),
    ),
);

$banners = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $banners[] = array(
        'id'       => 'hero-slide-' . $i,
        'title'    => get_theme_mod( "fablab_hero_slide_{$i}_title", $default_banners[ $i ]['title'] ),
        'subtitle' => get_theme_mod( "fablab_hero_slide_{$i}_subtitle", $default_banners[ $i ]['subtitle'] ),
        'image'    => get_theme_mod( "fablab_hero_slide_{$i}_image", $default_banners[ $i ]['image'] ),
        'badge'    => get_theme_mod( "fablab_hero_slide_{$i}_badge", $default_banners[ $i ]['badge'] ),
        'cta_text' => get_theme_mod( "fablab_hero_slide_{$i}_cta_text", $default_banners[ $i ]['cta_text'] ),
        'cta_url'  => get_theme_mod( "fablab_hero_slide_{$i}_cta_url", $default_banners[ $i ]['cta_url'] ),
    );
}

// Partners carousel (6 logos, editable via Customizer → FabLab Đối Tác)
$partners = array();
for ( $i = 1; $i <= 6; $i++ ) {
	$partners[] = array(
		'id'    => 'partner-' . $i,
		'name'  => get_theme_mod( "fablab_partner_{$i}_name", '' ),
		'image' => get_theme_mod( "fablab_partner_{$i}_image", '' ),
		'url'   => get_theme_mod( "fablab_partner_{$i}_url", '' ),
	);
}
?>

<div id="home-view-wrapper" class="animate-fadeIn">

    <!-- 1. Hero banner -->
    <section class="fablab-hero-wrap" id="hero-slider-section">
        <div class="fablab-hero-track" id="hero-slides-container">
            <?php foreach ( $banners as $index => $slide ) : ?>
            <div class="hero-slide fablab-hero-slide <?php echo ( 0 === $index ) ? 'active' : 'hidden'; ?>">
                <div class="fablab-hero-content">
                    <div class="fablab-hero-left">
                        <span class="fablab-hero-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></span>
                        <h1 class="fablab-hero-title"><?php echo esc_html( $slide['title'] ); ?></h1>
                        <p class="fablab-hero-subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></p>

                        <div class="fablab-hero-actions">
                            <a href="<?php echo esc_url( $slide['cta_url'] ); ?>"
                                class="fablab-hero-cta text-decoration-none">
                                <?php echo esc_html( $slide['cta_text'] ); ?>
                            </a>
                        </div>
                    </div>

                    <div class="fablab-hero-right">
                        <div class="fablab-hero-image-card">
                            <img src="<?php echo esc_url( $slide['image'] ); ?>"
                                alt="<?php echo esc_attr( $slide['title'] ); ?>" referrerpolicy="no-referrer" />
                            <?php if ( ! empty( $slide['badge'] ) ) : ?>
                            <span class="fablab-hero-badge"><?php echo esc_html( $slide['badge'] ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Dot Indicators -->
        <div class="fablab-hero-dots" id="hero-dots">
            <?php foreach ( $banners as $index => $slide ) : ?>
            <button class="fablab-hero-dot <?php echo ( 0 === $index ) ? 'is-active' : ''; ?>"
                data-slide-index="<?php echo esc_attr( $index ); ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 2. VỀ FABLAB (3 TABS) -->
    <section class="py-12 bg-white" id="section-about-overview">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
                    VỀ FABLAB
                </h2>
                <div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-2"></div>
            </div>

            <div class="about-tabs-layout">

                <!-- Left Column: Tab Buttons -->
                <div class="about-tabs-nav">
                    <?php
                    $about_tabs_labels = array(
                        1 => 'TỔNG QUAN',
                        2 => 'HOẠT ĐỘNG CHÍNH',
                        3 => 'CHƯƠNG TRÌNH HỢP TÁC',
                    );
                    ?>
                    <?php foreach ( $about_tabs_labels as $index => $label ) : ?>
                    <button class="about-tab-btn <?php echo ( 1 === $index ) ? 'active' : ''; ?>"
                        data-tab="<?php echo esc_attr( $index ); ?>" type="button"
                        aria-pressed="<?php echo ( 1 === $index ) ? 'true' : 'false'; ?>">
                        <?php echo esc_html( $label ); ?>
                    </button>
                    <?php endforeach; ?>
                </div>

                <!-- Right Column: Tab Content -->
                <div class="about-tabs-content">
                    <?php
                    $about_tab_defaults = array(
                        1 => array(
                            'title'       => 'Tổng Quan',
                            'description' => 'FABLAB Bách Khoa là hệ sinh thái học tập STEM ứng dụng cho học sinh từ tiểu học đến trung học. Chúng tôi tập trung vào trải nghiệm thực hành, tư duy sáng tạo và năng lực giải quyết vấn đề trong môi trường công nghệ hiện đại.',
                            'image'       => 'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=1200&q=80',
                        ),
                        2 => array(
                            'title'       => 'Hoạt Động Chính',
                            'description' => 'Các hoạt động nổi bật tại FABLAB gồm lập trình Scratch, Python, Robotics, thiết kế 3D và dự án nhóm. Học viên được học theo dự án thật để phát triển kỹ năng công nghệ, thuyết trình và làm việc nhóm.',
                            'image'       => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                        ),
                        3 => array(
                            'title'       => 'Chương Trình Hợp Tác',
                            'description' => 'FABLAB hợp tác cùng các trường học, doanh nghiệp và tổ chức giáo dục để triển khai chương trình STEM chuẩn quốc tế. Mục tiêu là mở rộng cơ hội tiếp cận công nghệ cho học sinh và tạo nền tảng phát triển bền vững.',
                            'image'       => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
                        ),
                    );

                    for ( $i = 1; $i <= 3; $i++ ) {
                        $tab_title = get_theme_mod( "fablab_about_tab_{$i}_title", $about_tab_defaults[ $i ]['title'] );
                        $tab_description = get_theme_mod( "fablab_about_tab_{$i}_description", $about_tab_defaults[ $i ]['description'] );
                        $tab_image = get_theme_mod( "fablab_about_tab_{$i}_image", $about_tab_defaults[ $i ]['image'] );
                        ?>
                    <div class="about-tab-content <?php echo ( 1 === $i ) ? '' : 'hidden'; ?>"
                        data-tab="<?php echo esc_attr( $i ); ?>">
                        <div class="about-tab-pane space-y-6">
                            <?php if ( ! empty( $tab_image ) ) : ?>
                            <div
                                class="about-tab-image-wrap rounded-2xl overflow-hidden shadow-lg h-80 border border-gray-100">
                                <img src="<?php echo esc_url( $tab_image ); ?>"
                                    alt="<?php echo esc_attr( $tab_title ); ?>" class="w-full h-full object-cover"
                                    referrerpolicy="no-referrer" />
                            </div>
                            <?php endif; ?>

                            <div class="about-tab-text space-y-3">
                                <h3 class="text-2xl font-black text-gray-900"><?php echo esc_html( $tab_title ); ?></h3>
                                <p class="text-gray-600 text-sm md:text-base leading-relaxed whitespace-pre-wrap">
                                    <?php echo wp_kses_post( $tab_description ); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. CÁC HOẠT ĐỘNG NỖI BẬT (3 TABS) -->
    <section class="activities-section" id="section-activities-overview">
        <div class="max-w-7xl mx-auto px-4 md:px-6">

            <!-- Section Header -->
            <div class="text-center mb-10">
                <p class="activities-section-eyebrow">FABLAB · BK STEM ECOSYSTEM</p>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
                    CÁC HOẠT ĐỘNG NỔI BẬT
                </h2>
                <div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-3"></div>
            </div>

            <!-- Pill Tab Bar -->
            <div class="activities-tab-bar">
                <div class="activities-tab-pill-group">
                    <button class="activities-tab-pill active" data-tab="1" type="button" aria-pressed="true">
                        <span class="activities-tab-pill-icon">📚</span> KHÓA HỌC
                    </button>
                    <button class="activities-tab-pill" data-tab="2" type="button" aria-pressed="false">
                        <span class="activities-tab-pill-icon">📰</span> TIN TỨC
                    </button>
                    <button class="activities-tab-pill" data-tab="3" type="button" aria-pressed="false">
                        <span class="activities-tab-pill-icon">🤝</span> HỢP TÁC
                    </button>
                </div>
            </div>

            <!-- Tab Contents -->
            <div class="activities-tabs-content-wrapper">

                <!-- Tab 1: Khóa Học -->
                <div class="activities-tab-pane" data-tab="1">
                    <div class="course-cards-grid">

                        <!-- Card 1: Scratch -->
                        <div class="course-card-v2">
                            <div class="course-card-v2-banner" style="background: linear-gradient(135deg,#ff9a44 0%,#f47920 60%,#e3362a 100%);">
                                <div class="course-card-v2-banner-bg"></div>
                                <span class="course-card-v2-age-badge">8 – 11 tuổi</span>
                                <div class="course-card-v2-icon-wrap">
                                    <span class="course-card-v2-icon">🐱</span>
                                </div>
                                <span class="course-card-v2-name">Scratch</span>
                            </div>
                            <div class="course-card-v2-body">
                                <h3 class="course-card-v2-title">Lập trình Scratch</h3>
                                <p class="course-card-v2-desc">Nhập môn lập trình đồ họa trực quan kéo thả. Phát triển tư duy logic thuật toán tự nhiên cho các bé.</p>
                                <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=lap-trinh-ung-dung' ) ); ?>" class="course-card-v2-btn">
                                    Xem chi tiết <span>→</span>
                                </a>
                            </div>
                        </div>

                        <!-- Card 2: Minecraft -->
                        <div class="course-card-v2">
                            <div class="course-card-v2-banner" style="background: linear-gradient(135deg,#56ab2f 0%,#2e7d32 60%,#1b5e20 100%);">
                                <div class="course-card-v2-banner-bg"></div>
                                <span class="course-card-v2-age-badge">9 – 13 tuổi</span>
                                <div class="course-card-v2-icon-wrap">
                                    <span class="course-card-v2-icon">⛏️</span>
                                </div>
                                <span class="course-card-v2-name">Minecraft</span>
                            </div>
                            <div class="course-card-v2-body">
                                <h3 class="course-card-v2-title">Minecraft Coding</h3>
                                <p class="course-card-v2-desc">Học code điều khiển nhân vật, xây dựng kiến trúc 3D đầy lôi cuốn trong thế giới Minecraft.</p>
                                <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=lap-trinh-ung-dung' ) ); ?>" class="course-card-v2-btn">
                                    Xem chi tiết <span>→</span>
                                </a>
                            </div>
                        </div>

                        <!-- Card 3: Python -->
                        <div class="course-card-v2">
                            <div class="course-card-v2-banner" style="background: linear-gradient(135deg,#4facfe 0%,#1565c0 60%,#0d47a1 100%);">
                                <div class="course-card-v2-banner-bg"></div>
                                <span class="course-card-v2-age-badge">11 – 16 tuổi</span>
                                <div class="course-card-v2-icon-wrap">
                                    <span class="course-card-v2-icon">🐍</span>
                                </div>
                                <span class="course-card-v2-name">Python</span>
                            </div>
                            <div class="course-card-v2-body">
                                <h3 class="course-card-v2-title">Python cơ bản</h3>
                                <p class="course-card-v2-desc">Rèn luyện tư duy viết mã văn bản chuyên nghiệp. Phát triển thuật toán và nền tảng lập trình vững chắc.</p>
                                <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=lap-trinh-ung-dung' ) ); ?>" class="course-card-v2-btn">
                                    Xem chi tiết <span>→</span>
                                </a>
                            </div>
                        </div>

                        <!-- Card 4: Robotics -->
                        <div class="course-card-v2">
                            <div class="course-card-v2-banner" style="background: linear-gradient(135deg,#f857a6 0%,#c2185b 60%,#880e4f 100%);">
                                <div class="course-card-v2-banner-bg"></div>
                                <span class="course-card-v2-age-badge">12 – 18 tuổi</span>
                                <div class="course-card-v2-icon-wrap">
                                    <span class="course-card-v2-icon">🤖</span>
                                </div>
                                <span class="course-card-v2-name">Robotics</span>
                            </div>
                            <div class="course-card-v2-body">
                                <h3 class="course-card-v2-title">Robot sáng tạo</h3>
                                <p class="course-card-v2-desc">Tương tác thiết bị phần cứng, cảm biến thông minh. Chế tạo robot tự hành xử lý chướng ngại vật.</p>
                                <a href="<?php echo esc_url( home_url( '/khoa-hoc?category=stem-ai-robotics' ) ); ?>" class="course-card-v2-btn">
                                    Xem chi tiết <span>→</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Tab 2: Tin Tức -->
                <div class="activities-tab-pane hidden" data-tab="2">
                    <div class="news-cards-grid">

                        <a href="<?php echo esc_url( home_url( '/tin-tuc?category=chuong-trinh-hop-tac' ) ); ?>" class="news-card-v2">
                            <div class="news-card-v2-img-wrap">
                                <img src="https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=600&q=80" alt="Đào tạo công học lập trình" referrerpolicy="no-referrer" />
                                <span class="news-card-v2-tag">Công nghệ</span>
                            </div>
                            <div class="news-card-v2-body">
                                <h3 class="news-card-v2-title">Khám phá Công nghệ, Sáng tạo tương lai</h3>
                                <p class="news-card-v2-desc">Tìm hiểu văn hóa công nghệ và kích thích óc tìm tòi khoa học của học sinh tiểu học.</p>
                                <span class="news-card-v2-link">Đọc tiếp →</span>
                            </div>
                        </a>

                        <a href="<?php echo esc_url( home_url( '/tin-tuc?category=chuong-trinh-hop-tac' ) ); ?>" class="news-card-v2">
                            <div class="news-card-v2-img-wrap">
                                <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=600&q=80" alt="Robot AI tương lai" referrerpolicy="no-referrer" />
                                <span class="news-card-v2-tag">Robotics</span>
                            </div>
                            <div class="news-card-v2-body">
                                <h3 class="news-card-v2-title">Tin tức phát triển robot thông minh sáng tạo</h3>
                                <p class="news-card-v2-desc">Giới thiệu thế hệ mạch lập trình tương thích tốt nhất hiện nay cho lập trình viên trẻ.</p>
                                <span class="news-card-v2-link">Đọc tiếp →</span>
                            </div>
                        </a>

                        <a href="<?php echo esc_url( home_url( '/tin-tuc?category=chuong-trinh-hop-tac' ) ); ?>" class="news-card-v2">
                            <div class="news-card-v2-img-wrap">
                                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80" alt="Hoạt động học sinh vui vẻ" referrerpolicy="no-referrer" />
                                <span class="news-card-v2-tag">Sự kiện</span>
                            </div>
                            <div class="news-card-v2-body">
                                <h3 class="news-card-v2-title">Tin tức & sự kiện rèn kỹ năng, học tập xuất sắc</h3>
                                <p class="news-card-v2-desc">Liên minh Samsung tài trợ các phòng Lab thế hệ mới tại BK Holdings.</p>
                                <span class="news-card-v2-link">Đọc tiếp →</span>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- Tab 3: Hợp Tác -->
                <div class="activities-tab-pane hidden" data-tab="3">
                    <div class="collab-tab-layout">
                        <div class="collab-tab-text">
                            <span class="collab-tab-eyebrow">Quan hệ đối tác</span>
                            <h3 class="collab-tab-heading">CHƯƠNG TRÌNH HỢP TÁC CHIẾN LƯỢC</h3>
                            <div class="collab-tab-body">
                                <p>FABLAB Bách Khoa hợp tác đa phương cùng các tổ chức công nghệ hàng đầu toàn cầu và các trường học phổ thông chất lượng cao trên cả nước.</p>
                                <p>Chúng tôi vinh dự hợp tác chiến lược cùng <strong>Lego Education Đan Mạch</strong>, <strong>Samsung Vina</strong> và các viện nghiên cứu thuộc trường Đại học tại Singapore để chuyển tải giáo án tiên tiến.</p>
                                <p>Hằng năm, thông qua chương trình <strong>BK-STEM Cup</strong> hợp tác tài trợ, hàng trăm gói học bổng toàn phần đã được trao đến các bé có hoàn cảnh khó khăn ham học hỏi.</p>
                            </div>
                            <a href="<?php echo esc_url( home_url( '/#section-contact' ) ); ?>" class="collab-tab-cta">
                                ĐĂNG KÝ HỌC THỬ MIỄN PHÍ
                            </a>
                        </div>
                        <div class="collab-tab-image-wrap">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80" alt="Hợp tác đào tạo" referrerpolicy="no-referrer" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. TỔNG QUAN CHƯƠNG TRÌNH & LỘ TRÌNH HỌC -->
    <section class="py-14 bg-white" id="section-roadmap">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
                    TỔNG QUAN CHƯƠNG TRÌNH & LỘ TRÌNH HỌC
                </h2>
                <div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-2"></div>
            </div>

            <div class="max-w-6xl mx-auto" id="roadmap-interactive-diagram">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative" id="roadmap-adapter-container">

                    <!-- Step 1 -->
                    <div
                        class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative flex flex-col items-center text-center transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                        <div
                            class="absolute top-4 left-4 bg-emerald-50 text-[#f47920] font-black text-xs px-2.5 py-0.5 rounded-full">
                            BẮT ĐẦU</div>
                        <div
                            class="w-14 h-14 rounded-full bg-emerald-50 border-2 border-[#f47920]/30 flex items-center justify-center text-3xl mb-4 mt-2">
                            👶
                        </div>
                        <h3 class="font-extrabold text-sm text-gray-900 mb-1">Chưa Biết Lập Trình</h3>
                        <p class="text-gray-500 text-[11px] leading-relaxed">
                            Học viên rụt rè, làm quen với máy tính và thao tác cơ bản nhất.
                        </p>
                        <div
                            class="hidden md:block absolute top-1/2 -right-4 -translate-y-1/2 z-10 w-8 text-[#f47920] font-black text-lg">
                            ➔</div>
                    </div>

                    <!-- Step 2 -->
                    <div
                        class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative flex flex-col items-center text-center transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                        <span
                            class="absolute top-4 left-4 bg-orange-50 text-orange-700 font-extrabold text-[10px] px-2.5 py-0.5 rounded-full">8
                            - 11 TUỔI</span>
                        <div
                            class="w-14 h-14 rounded-full bg-orange-50 border-2 border-orange-500/30 flex items-center justify-center text-3xl mb-4 mt-2">
                            🐱
                        </div>
                        <h3 class="font-extrabold text-sm text-gray-900 mb-1">Lập Trình Scratch</h3>
                        <p class="text-gray-500 text-[11px] leading-relaxed">
                            Học đồ họa kéo thả, tư duy rẽ nhánh logic tự nhiên, tạo trò chơi hoạt hình.
                        </p>
                        <div
                            class="hidden md:block absolute top-1/2 -right-4 -translate-y-1/2 z-10 w-8 text-[#f47920] font-black text-lg">
                            ➔</div>
                    </div>

                    <!-- Step 3 -->
                    <div
                        class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative flex flex-col items-center text-center transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                        <span
                            class="absolute top-4 left-4 bg-[#f0fbf4] text-emerald-700 font-extrabold text-[10px] px-2.5 py-0.5 rounded-full">9
                            - 13 TUỔI</span>
                        <div
                            class="w-14 h-14 rounded-full bg-[#f0fbf4] border-2 border-emerald-500/30 flex items-center justify-center text-3xl mb-4 mt-2">
                            ⛏️
                        </div>
                        <h3 class="font-extrabold text-sm text-gray-900 mb-1">Minecraft Coding</h3>
                        <p class="text-gray-500 text-[11px] leading-relaxed">
                            Xây dựng thế giới 3D bằng các dòng lệnh, nhập môn mã hóa Python/JS.
                        </p>
                        <div
                            class="hidden md:block absolute top-1/2 -right-4 -translate-y-1/2 z-10 w-8 text-[#f47920] font-black text-lg">
                            ➔</div>
                    </div>

                    <!-- Step 4 -->
                    <div
                        class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative flex flex-col items-center text-center transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                        <span
                            class="absolute top-4 left-4 bg-blue-50 text-blue-700 font-extrabold text-[10px] px-2.5 py-0.5 rounded-full">12
                            - 18 TUỔI</span>
                        <div
                            class="w-14 h-14 rounded-full bg-blue-50 border-2 border-blue-500/30 flex items-center justify-center text-3xl mb-4 mt-2">
                            🤖
                        </div>
                        <h3 class="font-extrabold text-sm text-gray-900 mb-1">Advanced Chế Tác</h3>
                        <p class="text-gray-500 text-[11px] leading-relaxed">
                            Tương tác mạch cứng, lắp ghép lập trình Robot tự hành & luyện thi Tin học trẻ.
                        </p>
                        <div
                            class="hidden md:block absolute top-1/2 -right-4 -translate-y-1/2 z-10 w-8 text-[#f47920] font-black text-lg">
                            ➔</div>
                    </div>

                    <!-- Step 5 -->
                    <div
                        class="bg-gradient-to-br from-[#f47920] to-[#015128] p-5 rounded-2xl border border-emerald-800 shadow-md relative flex flex-col items-center text-center text-white transition-all duration-300 hover:shadow-lg">
                        <span
                            class="absolute top-4 left-4 bg-[#ffffff] text-[#f47920] font-black text-[9px] px-2 py-0.5 rounded-full uppercase tracking-wider">ĐÍCH
                            ĐẾN</span>
                        <div
                            class="w-14 h-14 rounded-full bg-white/20 border-2 border-[#ffffff] flex items-center justify-center text-3xl mb-4 mt-2">
                            🎓
                        </div>
                        <h3 class="font-extrabold text-sm text-[#ffffff] mb-1">Kỹ Sư Tương Lai</h3>
                        <p class="text-emerald-100/90 text-[11px] leading-relaxed">
                            Sở hữu tư duy thiết kế tối ưu, tự tin sáng chế & làm chủ công nghệ kĩ thuật số.
                        </p>
                    </div>

                </div>
            </div>

            <p class="text-[11px] text-gray-400 mt-8 max-w-xl mx-auto text-center">
                * Lộ trình học tập cá nhân hóa được đo lường trực quan theo tiến trình thu nhận kiến thức của từng học
                viên
                suốt quá trình trải nghiệm sáng chế tại Lab.
            </p>
        </div>
    </section>

    <!-- 5. ĐỐI TÁC ĐỒNG HÀNH -->
    <section class="py-14 bg-white" id="section-partners">
        <div class="max-w-7xl mx-auto px-4 md:px-6">

            <div class="text-center mb-10">
                <p class="activities-section-eyebrow">FABLAB · BK STEM ECOSYSTEM</p>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
                    ĐỐI TÁC ĐỒNG HÀNH
                </h2>
                <div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-3"></div>
            </div>

            <div class="partners-carousel">
                <div class="partners-carousel-track">
                    <?php
                    for ( $loop = 0; $loop < 2; $loop++ ) :
                        foreach ( $partners as $partner ) :
                            $has_link = ! empty( $partner['url'] );
                            ?>
                            <div class="partner-card" <?php echo ( 1 === $loop ) ? 'aria-hidden="true"' : ''; ?>>
                                <?php if ( $has_link ) : ?>
                                <a href="<?php echo esc_url( $partner['url'] ); ?>" target="_blank" rel="noreferrer" class="partner-card-link" tabindex="<?php echo ( 1 === $loop ) ? '-1' : '0'; ?>">
                                <?php endif; ?>

                                <?php if ( ! empty( $partner['image'] ) ) : ?>
                                    <img src="<?php echo esc_url( $partner['image'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>" loading="lazy" referrerpolicy="no-referrer" />
                                <?php else : ?>
                                    <span class="partner-card-placeholder"><?php echo esc_html( $partner['name'] ? $partner['name'] : __( 'Đối tác', 'fablab' ) ); ?></span>
                                <?php endif; ?>

                                <?php if ( $has_link ) : ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach;
                    endfor;
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- 6. ĐĂNG KÝ NHẬN TƯ VẤN -->
    <section class="py-14 bg-white" id="section-contact">
        <div class="max-w-4xl mx-auto px-4">

            <div
                class="bg-[#ffffff] rounded-3xl p-8 sm:p-10 shadow-xl text-center space-y-6 border border-amber-400 relative overflow-hidden">

                <div
                    class="absolute -right-12 -bottom-12 w-32 h-32 rounded-full bg-[#f47920]/10 blur-md pointer-events-none"></div>
                <div class="absolute -left-12 -top-12 w-32 h-32 rounded-full bg-[#f47920]/10 blur-md pointer-events-none"></div>

                <div class="space-y-2 max-w-xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
                        ĐĂNG KÝ NHẬN TƯ VẤN
                    </h2>
                    <p class="text-xs md:text-sm text-gray-800 font-medium">
                        Hãy để lại thông tin liên hệ chính xác để chuyên viên tuyển sinh của FABLAB liên hệ sắp xếp buổi
                        học
                        thử miễn phí phù hợp cực chất cho bé.
                    </p>
                </div>

                <form id="contact-form-home" class="fablab-lead-form max-w-2xl mx-auto space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" id="contact-name" name="lead_name" required placeholder="Họ và tên..."
                            class="w-full px-5 py-3.5 rounded-full border border-amber-400 focus:border-[#f47920] focus:ring-2 focus:ring-[#f47920]/20 bg-white text-gray-900 placeholder-gray-400 text-sm focus:outline-none text-center font-bold shadow-inner" />
                        <input type="text" id="contact-info" name="lead_contact" required placeholder="Số điện thoại hoặc Email..."
                            class="w-full px-5 py-3.5 rounded-full border border-amber-400 focus:border-[#f47920] focus:ring-2 focus:ring-[#f47920]/20 bg-white text-gray-900 placeholder-gray-400 text-sm focus:outline-none text-center font-bold shadow-inner" />
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="px-10 py-3.5 bg-[#f47920] text-white hover:bg-[#df6a17] hover:text-[#ffffff] transition duration-200 font-extrabold text-sm rounded-full shadow-lg inline-flex items-center space-x-2 cursor-pointer uppercase tracking-wider border-2 border-transparent">
                            <span>Đăng ký nhận cuộc gọi</span>
                        </button>
                    </div>
                </form>
                <div class="fablab-lead-success hidden max-w-2xl mx-auto text-center">
                    <p class="text-[#f47920] font-extrabold text-lg">✓ Cảm ơn bạn đã đăng ký!</p>
                    <p class="text-gray-600 text-sm mt-1">Chuyên viên tuyển sinh của FABLAB sẽ liên hệ lại với bạn trong thời gian sớm nhất.</p>
                </div>

            </div>

        </div>
    </section>

</div>

<?php
get_footer();