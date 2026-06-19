# Plan: FabLab React → WordPress Classic Theme (Option A)

## Status: Awaiting user approval

---

## TL;DR
Convert the FabLab React SPA (Vite + Tailwind + TypeScript) into a full native WordPress theme running locally via Docker. All React components → PHP template partials, all JS state → vanilla JS, all data → WordPress Custom Post Types (CPTs) managed via WP Admin.

---

## Key inventory
- 7 components: Header, BannerSlider, ActivityTabs, FacilitiesCarousel, DetailModal, RegistrationForm, Footer
- 5 page views: home, gioi-thieu, khoa-hoc, lich-khai-giang, tin-tuc
- 3 data types needing CPTs: Course (26), NewsPost (6), Facility (6), Partner (6)
- Interactive JS: 2 carousels, 1 tab switcher, 1 modal, 1 mobile menu+dropdown, 1 form
- CSS: Tailwind v4 — extract via `npm run build` once, then copy compiled CSS
- Icons: lucide-react SVGs — inline them as PHP SVG helper functions
- No @google/genai or motion used in visible UI components

---

## Phases

### Phase 1 — Docker & WordPress Bootstrap
1. Create fablab/docker-compose.yml (MySQL 8 + wordpress:php8.2-apache + phpmyadmin), ports 8090/8091
2. Create fablab/.env with DB creds
3. Run `docker compose up -d`, complete WP 5-min installer at localhost:8090
4. Create theme folder: wp-content/themes/fablab/

### Phase 2 — Theme Shell
5. style.css (just the theme header comment)
6. functions.php (enqueue assets, register CPTs, register nav menus)
7. header.php — full nav markup (replaces Header.tsx)
8. footer.php — full footer markup (replaces Footer.tsx)
9. index.php — homepage layout (replaces App.tsx home view)
10. page.php — generic fallback
11. page-gioi-thieu.php — AboutView
12. page-khoa-hoc.php — CoursesView (search+filter via $_GET params)
13. page-lich-khai-giang.php — ScheduleView (static table)
14. page-tin-tuc.php — NewsView (WP_Query filtered by category)

### Phase 3 — CSS Strategy
15. Run `npm run build` in fablab/ once to compile Tailwind → dist/assets/index.css (~30-80KB purged)
16. Copy compiled CSS to wp-content/themes/fablab/assets/main.css
17. Enqueue in functions.php
18. Copy Google Fonts import from index.css

### Phase 4 — Icon System
19. Create inc/icons.php — PHP functions like `fablab_icon('home')` returning inline SVG markup
20. Extract the ~20 Lucide icons used across all components: Home, ChevronDown, Menu, X, Award, BookOpen, GraduationCap, Users, Phone, Mail, MapPin, Eye, Zap, Cpu, Globe, ShieldCheck, HelpCircle, Laptop, ChevronRight

### Phase 5 — Custom Post Types & Data
21. Register CPTs in functions.php: `course`, `facility`, `partner`, `banner` (news uses built-in `post` with category taxonomy)
22. Install ACF Free plugin (or use register_post_meta) for custom fields:
    - course: category_slug, category_name, long_description, target_age, duration
    - facility: description, image_url
    - partner: logo_url
    - banner: subtitle, image_url
23. Create inc/seed-data.php — one-time WP-CLI or admin-triggered script that creates all 26 courses, 6 news posts, 6 facilities, 6 partners, 3 banners from the original data.ts values
24. Run seed: `docker exec [container] wp eval-file /var/www/html/wp-content/themes/fablab/inc/seed-data.php --allow-root`

### Phase 6 — PHP Template Partials
25. partials/banner-slider.php — WP_Query banner CPT, render 3 slides with data attributes for JS
26. partials/activity-tabs.php — WP_Query courses (6) + news posts (2 categories), render tab panels
27. partials/facilities-carousel.php — WP_Query facility CPT, render all 6 with data attributes
28. partials/registration-form.php — HTML form (CF7 shortcode or custom)
29. home sections (inline in index.php): about overview, featured 4 courses, 5-step roadmap, schedule table, partners

### Phase 7 — Registration Form
30. Install Contact Form 7 plugin, create form matching RegistrationForm.tsx fields (parent name, phone, email, address, student name, dob, gender)
31. Embed CF7 shortcode in partials/registration-form.php
32. Style CF7 form to match the green-header two-section layout

### Phase 8 — Vanilla JS (replaces all React state)
33. assets/js/nav.js — mobile menu toggle, desktop dropdown hover, scroll-based header bg, active link highlight
34. assets/js/banner-slider.js — auto-rotate every 6s, prev/next arrows, reset on manual interaction
35. assets/js/facilities-carousel.js — auto-rotate every 4.5s, prev/next, dot indicators, 3-up display
36. assets/js/tabs.js — ActivityTabs 3-tab switcher (show/hide panels)
37. assets/js/modal.js — open DetailModal on course/news card click, close on X/backdrop, "Đăng ký" scrolls to form
38. assets/js/courses-filter.js — category filter buttons + search input, filter visible course cards, OR reload page with ?category=&s= params

### Phase 9 — Activate & Verify
39. Activate theme in WP Admin > Appearance > Themes
40. Create WP pages with correct slugs: /gioi-thieu, /khoa-hoc, /lich-khai-giang, /tin-tuc
41. Set homepage to "index.php" template via Settings > Reading (static front page)
42. Configure WP nav menu with all 5 nav items + submenu items

---

## Relevant Files

- `fablab/src/components/Header.tsx` — nav markup reference
- `fablab/src/components/BannerSlider.tsx` — slide structure + animation class names
- `fablab/src/components/ActivityTabs.tsx` — tab switching logic + card HTML
- `fablab/src/components/FacilitiesCarousel.tsx` — carousel loop logic
- `fablab/src/components/DetailModal.tsx` — modal HTML structure
- `fablab/src/components/RegistrationForm.tsx` — form fields + success state
- `fablab/src/components/Footer.tsx` — footer columns + social links
- `fablab/src/components/SubViews.tsx` — AboutView, CoursesView, ScheduleView, NewsView layouts
- `fablab/src/data.ts` — all seed data values
- `fablab/src/index.css` — Tailwind imports + CSS vars + Google Fonts
- `fablab/package.json` — build scripts
- `percent-science/docker-compose.yml` — reference Docker config to reuse

---

## Verification
1. `docker compose up -d` starts without errors, WP accessible at http://localhost:8090
2. Theme activates without PHP errors (check WP Admin > Appearance)
3. Homepage renders all sections: banner slider, about, courses grid, facilities carousel, registration form
4. All 4 nav links (Giới thiệu, Khóa học, Lịch khai giảng, Tin tức) load correct page templates
5. Mobile menu opens/closes correctly at <1024px
6. Banner slider auto-rotates every 6s, arrows work
7. Facilities carousel auto-rotates every 4.5s, dots work
8. Activity tabs switch between 3 panels
9. Course/news card click opens modal with correct content
10. Registration form submits successfully (CF7 mail or admin notification)
11. Courses page category filter buttons show correct subset of 26 courses
12. No broken image links (Unsplash URLs in CPT data)

---

## Decisions & Scope
- **CSS**: Extract Tailwind compiled CSS from one React build — no CSS rewrite needed
- **Icons**: Inline SVGs via PHP helper — no Font Awesome dependency
- **Routing**: Real WP pages with slugs, not hash routing
- **Detail modal**: Stays as a client-side modal (JS), no separate single post template
- **Course filter on /khoa-hoc/**: JS-based (hide/show cards) for simplicity; no AJAX/page reload needed
- **Registration form**: Contact Form 7 (most maintainable); custom PHP form is alternative
- **@google/genai & motion**: Not used in any visible UI component — skip entirely
- **Out of scope**: WooCommerce, membership, user accounts, multilingual
