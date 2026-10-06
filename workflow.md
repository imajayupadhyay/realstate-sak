# Sakha Consultancy — Project Workflow

> **🤖 Prompt for the AI assistant (read this first):**
> This file is the single source of truth for this project. Before starting any task, read this whole file to
> understand what has already been done and the conventions we follow. **After every change you make (new page,
> component, route, package, design decision, fix), update this file** — add it to the relevant section and append
> an entry to the Change Log at the bottom with the date. Keep it short, factual and up to date so work can be
> continued in any future session.

---

## 1. About the project

- **Client / brand:** Sakha Consultancy — *Real Estate | Investment | Finance* — tagline "Building Value. Creating Wealth."
- **Type:** Property selling (real estate) website.
- **Current stage:** Static website (no database-driven content yet). Pages built: **Home**, **About Us**, **Contact Us**, and the **Project detail template** (first project: ACE Arte).
- **Design direction:** White theme, simple and minimal, with an image carousel in the hero. Font: **Poppins**.

## 2. Tech stack

| Layer      | Tech                                             |
|------------|--------------------------------------------------|
| Backend    | Laravel 12 (PHP 8.2)                             |
| Bridge     | Inertia.js v3 (`inertiajs/inertia-laravel`, `@inertiajs/vue3`) |
| Frontend   | Vue 3 (`<script setup>` SFCs)                    |
| Styling    | Tailwind CSS v4 (via `@tailwindcss/vite`, configured in CSS — no `tailwind.config.js`) |
| Build tool | Vite 7                                           |
| Database   | SQLite (default Laravel migrations only, unused so far) |

## 3. Running the project

**Repository:** https://github.com/imajayupadhyay/realstate-sak (branch `main`)

```bash
composer install && npm install   # first time only
composer run dev                  # Laravel server + Vite + queue + logs together
# or separately:
php artisan serve                 # http://127.0.0.1:8000
npm run dev                       # Vite with hot reload
npm run build                     # production build into public/build
```

## 4. Directory structure (conventions)

```
app/Http/
    Controllers/
        HomeController.php        # one controller per page, renders the Inertia page
        AboutController.php
        ContactController.php     # index() shows page, store() handles the enquiry form
        ProjectController.php     # show($slug) — renders the project template, 404 if unknown
    Repositories/
        ProjectRepository.php     # all(), find($slug), summaries() — reads resources/data/projects
    Requests/
        StoreEnquiryRequest.php   # validation rules for the contact/enquiry form
    Middleware/
        HandleInertiaRequests.php # shares `projects` (summaries) + `flash.success` with every page
routes/web.php                    # named routes: home, about, contact, contact.store, projects.show
resources/data/projects/          # ONE PHP FILE PER PROJECT (e.g. ace-arte.php) — the project content
resources/views/app.blade.php     # single Blade root (Poppins font, @vite, @inertia)
resources/css/app.css             # Tailwind import + brand theme tokens + custom utilities
resources/js/
    app.js                        # Inertia/Vue bootstrap
    config/site.js                # company info, contact details, hours, map URL, stats, navigation menu
    Layouts/
        AppLayout.vue             # Navbar + <main> slot + Footer (wrap every page in this)
    Components/                   # SHARED components used by more than one page
        Navbar.vue                # sticky header, active-page underline, mobile menu
        NavLink.vue               # <a> for "/#section" anchors, Inertia <Link> for pages
        SiteFooter.vue
        PageHeader.vue            # banner at top of inner pages (title, subtitle, breadcrumb, image)
        SectionHeading.vue        # eyebrow + title + optional text
        EnquiryCta.vue            # navy "Looking for the right property?" call/email box
        EnquiryForm.vue           # enquiry form (Contact page + every project page; `project` prop pre-tags it)
        FormField.vue             # label + input slot + error
    Pages/
        Home/
            Index.vue
            Components/           # HeroCarousel, FeaturedProjects, AboutSection
        AboutUs/
            Index.vue
            Components/           # OurStory, MissionVision, OurServices, WhyChooseUs
        ContactUs/
            Index.vue
            Components/           # ContactInfo, LocationMap
        Projects/
            Show.vue              # PROJECT DETAIL TEMPLATE — renders any project from its data file
            Components/           # ProjectHero, ProjectSubnav, ProjectOverview, ProjectConfigurations,
                                  # ProjectAmenities, ProjectGallery, ProjectLocation, ProjectEnquiry
public/
    sakha.png                     # original logo (do not modify)
    images/logo.png               # logo cropped (extra whitespace removed) — used in navbar/footer/favicon
    images/hero/*.jpg             # carousel images
    images/projects/*.jpg         # project images
    images/projects/<slug>/*.webp # per-project images (ace-arte/: renders)
    images/pages/*.jpg            # inner-page images (skyline = About banner, office = Contact banner, team = About story)
    images/about.jpg
```

**Rules to follow for every new page:**
1. Create `resources/js/Pages/<PageName>/Index.vue` (folder in PascalCase, e.g. `AboutUs`, `ContactUs`) + `resources/js/Pages/<PageName>/Components/` for its private components.
   (Vue pages use `Index.vue`, the Vue equivalent of `index.js`.)
2. Wrap the page in `<AppLayout>`, set `<Head title="…" />`, and start inner pages with `<PageHeader>`.
3. Create `app/Http/Controllers/<PageName>Controller.php` that returns `Inertia::render('<PageName>/Index')`.
4. Add a **named** route in `routes/web.php` (URLs are kebab-case, e.g. `/about-us`).
5. Add the menu entry in `resources/js/config/site.js` → `navigation`.
6. A component used by more than one page goes in `resources/js/Components/`, not inside a page folder.
   If a page component starts being reused elsewhere, move it to `Components/` and update imports.
7. Exception: `Pages/Projects/Show.vue` is a *template* (one file renders every project), so it is named `Show.vue`.
8. `app.js` excludes `Pages/**/Components/**` from page resolution, so only `Index.vue` files are routable pages.
9. Import alias: `@/` = `resources/js/` (configured in `vite.config.js` and `jsconfig.json`).

## 5. Design system

Colours are taken from the logo and defined as Tailwind tokens in `resources/css/app.css`:

| Token                  | Hex       | Use                                     |
|------------------------|-----------|-----------------------------------------|
| `brand-navy`           | `#13206b` | Primary — headings, buttons, CTA panel  |
| `brand-navy-dark`      | `#0c1550` | Hero overlay                            |
| `brand-blue`           | `#1a6af0` | Hover states, eyebrow text, links       |
| `brand-green`          | `#3cb42c` | Accent ("Completed" badge, Finance dot) |
| `brand-orange`         | `#f58220` | Accent ("Upcoming" badge)               |
| `brand-purple`         | `#7b12e0` | Accent                                  |

Use like `bg-brand-navy`, `text-brand-blue`, etc.

- **Base:** white background, `text-slate-600` body text, navy headings, `bg-slate-50` for alternating sections.
- **Font:** Poppins (Google Fonts, weights 300–700) loaded in `app.blade.php`.
- **Custom utilities:** `container-page` (max-w-7xl centred container with side padding) and
  `brand-stripe` (thin multi-colour gradient echoing the logo's bars — used for eyebrow lines and the footer top border).
- **Shapes:** rounded-full buttons, rounded-2xl images/cards, minimal shadows.

## 6. Pages built

### Home (`/`, route name `home`)
Sections, top to bottom:
1. **Navbar** (shared, sticky white) — logo, Home / Projects / About Us / Contact Us, "Enquire Now" button, mobile hamburger menu.
2. **HeroCarousel** — 3 full-height slides (Real Estate / Investment / Finance), fade + slow zoom, autoplay every 6s,
   pauses on hover, dots + prev/next arrows. Slides are defined at the top of the component.
3. **FeaturedProjects** (`#projects`) — 3 project cards from `data/projects.js` with status badge, type and location.
4. **AboutSection** (`#about`) — image, "Sakha means friend" intro, 3 service pillars, stats row.
5. **EnquiryCta** — navy panel with Call / Email buttons.
6. **Footer** (shared, `#contact`) — logo, quick links, contact details, copyright.

Home "More About Us" button → `/about-us`; hero "Talk to Us" and navbar "Enquire Now" → `/contact-us`.

### Projects — detail template (`/projects/{slug}`, route name `projects.show`)
There is **no projects listing page**. `/projects` redirects to the Home `#projects` section. Each project has its own
detail page, reached from the **Projects mega menu** in the navbar (and Home cards).

**How to add a new project (no code changes needed):**
1. Copy `resources/data/projects/ace-arte.php` → `resources/data/projects/<new-slug>.php` and edit all fields
   (`slug` must match the filename).
2. Put images in `public/images/projects/<new-slug>/`.
3. Done — it appears automatically in the navbar dropdown, the Home "Featured properties" section, the enquiry form
   project select, and at `/projects/<new-slug>`.

**Project data fields:** `slug, name, developer, tagline, status, type, location, address, map_query, rera, price_from,
possession, image (card/menu), hero_image, overview[] (paragraphs), highlights[{label,value}],
configurations[{type,area,price}], price_note, amenities[{group, items[]}], gallery[{src,caption}],
location_advantages[{place,time}], disclaimer`. Sections hide automatically when their data is empty.

**Template sections (top → bottom):** ProjectHero (image, breadcrumb, status, name, tagline + key-facts card:
price / configuration / possession / RERA / Enquire) → ProjectSubnav (sticky tabs with scroll-spy) → Overview +
highlights grid → Floor Plans & Price cards → Amenities (4 groups) → Gallery (9 shown, "View all", lightbox with
arrows/Esc) → Location (travel times + Google Map from `map_query`) → Enquire (navy summary card + shared
EnquiryForm pre-tagged with the project) → disclaimer.

**Navbar mega menu:** desktop — hover/click "Projects" opens a panel with a card per project (image, name, status,
location, type) + "Talk to our team" link; 1 project = narrow single column, 2+ = wider 2-column grid.
Mobile — "Projects" expands an accordion list. "Projects" is highlighted on any `/projects/*` page.

**Home FeaturedProjects** now reads the shared `projects` prop: 1 project → large featured card; 2+ → 3-column grid.

**ACE Arte (dummy content):** facts researched from public listings (ACE Group, Sector 150 Noida, RERA
UPRERAPRJ528653/07/2026, 14.83 acres, 11 towers G+22, 784 units, 3/4/4.5 BHK, from ~₹3.27 Cr, possession Feb 2031,
architect Hafeez Contractor). Images are developer renders downloaded from a channel-partner listing
(luxurypropertiesinnoida.com) — **replace with official/authorised media before going live.**

### About Us (`/about-us`, route name `about`)
1. **PageHeader** — skyline banner, breadcrumb.
2. **OurStory** — "Who We Are" text (meaning of *Sakha* = friend), stats from `site.stats`, team image.
3. **MissionVision** — two cards.
4. **OurServices** — Real Estate / Investment / Finance cards with bullet lists.
5. **WhyChooseUs** — 4 numbered reasons.
6. **EnquiryCta** (shared).

> Content on this page is placeholder copy written by the AI — client will provide the real content.

### Contact Us (`/contact-us`, route names `contact` + `contact.store`)
1. **PageHeader** — office banner.
2. **ContactInfo** — Call / Email / Office address / Working hours cards (from `site.contact`).
3. **EnquiryForm** (shared) — Inertia `useForm`: name*, phone*, email, interest* (buy/invest/finance/other), project
   (from shared `projects` prop; hidden + pre-filled on project pages), message. POSTs to `/contact-us` (throttled 5/min). Laravel validates with
   `StoreEnquiryRequest`; errors show under each field with a red border; on success the controller redirects back
   with `success` flash → green message, form resets. **Enquiries are NOT stored or emailed yet** (see TODO).
4. **LocationMap** — Google Maps iframe from `site.contact.mapEmbedUrl`.

Menu: Home `/`, Projects (mega menu → `/projects/{slug}`; footer link → `/#projects`), About Us `/about-us`,
Contact Us `/contact-us`. Active page gets a blue label + brand-stripe underline.

## 7. Placeholders / TODO

- [ ] Real contact details (phone, email, address, working hours) → `resources/js/config/site.js`
- [ ] Real Google Maps embed URL for the office → `site.contact.mapEmbedUrl`
- [ ] Real About Us content (client will provide) → `Pages/AboutUs/Components/*`
- [ ] Make enquiry form dynamic: `enquiries` migration + model, save in `ContactController@store`, email notification to office, admin listing
- [ ] Real projects → add files in `resources/data/projects/` (ACE Arte is dummy content — verify or remove)
- [ ] Replace ACE Arte images with official/authorised media
- [ ] Optional later: move projects to the database (only `ProjectRepository` needs to change); brochure download &
      floor-plan images per configuration
- [ ] Real stats (years, families, projects) → `site.stats` in `resources/js/config/site.js`
- [ ] Replace stock photos (from Unsplash) in `public/images/` with real project photos
- [x] Projects dropdown + individual project pages

## 8. Change Log

| Date       | Change |
|------------|--------|
| 2026-10-06 | Created blank Laravel 12 + Inertia v3 + Vue 3 + Tailwind v4 project. |
| 2026-10-06 | Built Home page: brand theme from logo, Poppins font, shared AppLayout/Navbar/Footer, Home sections (hero carousel, featured projects, about, CTA). Added HomeController, `@` alias, site config & project data files, cropped logo and stock images. Created this workflow.md. |
| 2026-10-06 | Added **About Us** page (`/about-us`) and **Contact Us** page (`/contact-us`) with working, validated enquiry form (not yet saved) and Google Map. Moved `SectionHeading` & `EnquiryCta` to shared `Components/`; added shared `PageHeader` and `NavLink`; navbar now links to real pages with active state; stats moved to `site.stats`; added `StoreEnquiryRequest`, `AboutController`, `ContactController`, flash sharing in `HandleInertiaRequests`. |
| 2026-10-06 | Added **project detail template** (`Pages/Projects/Show.vue` + 8 section components) at `/projects/{slug}`, first project **ACE Arte** (researched dummy content + renders). Project data moved to backend: `resources/data/projects/*.php` + `ProjectRepository` + `ProjectController`, shared as `projects` prop. Navbar **Projects mega menu** (desktop panel + mobile accordion). Home FeaturedProjects now data-driven and links to project pages. `EnquiryForm`/`FormField` moved to shared Components (project pre-tagging). Removed `resources/js/data/projects.js`. `/projects` redirects to `/#projects`. |
| 2026-10-06 | Initialised git, replaced default README with project README, pushed to GitHub `imajayupadhyay/realstate-sak` (`main`). |
