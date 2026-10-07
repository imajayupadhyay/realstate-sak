// Site-wide settings. Update contact details here and they change everywhere.
// TODO: replace placeholder contact details, stats and map with the real ones.
export const site = {
    name: 'Sakha Consultancy',
    tagline: 'Building Value. Creating Wealth.',
    services: ['Real Estate', 'Investment', 'Finance'],
    logo: '/images/logo.png',
    contact: {
        phone: '+91 98765 43210',
        whatsapp: '+91 98765 43210',
        email: 'info@sakhaconsultancy.com',
        address: 'Your office address, City, State',
        hours: 'Mon – Sat, 10:00 AM – 7:00 PM',
        // Google Maps embed: replace `q=` with the office address or use the
        // "Share → Embed a map" URL from Google Maps.
        mapEmbedUrl: 'https://maps.google.com/maps?q=India&z=5&output=embed',
    },
    stats: [
        { value: '10+', label: 'Years of experience' },
        { value: '500+', label: 'Happy families' },
        { value: '25+', label: 'Projects delivered' },
    ],
    // Developer partners shown in the Home logo carousel. Logos live in
    // public/images/partners/. `dark: true` puts a white/light logo on a navy
    // card so it keeps its original colours and stays visible.
    partners: [
        { name: 'Bhutani Infra', logo: '/images/partners/bhutani.png' },
        { name: 'Godrej Properties', logo: '/images/partners/godrej.svg' },
        { name: 'Sobha Realty', logo: '/images/partners/sobha.svg' },
        { name: 'Eldeco', logo: '/images/partners/eldeco.png' },
        { name: 'Purvanchal Projects', logo: '/images/partners/purvanchal.png', dark: true },
        { name: 'ACE Group', logo: '/images/partners/ace.webp' },
        { name: 'Gaurs Group', logo: '/images/partners/gaurs.png' },
    ],
};

// Main menu. Links starting with "/#" scroll to a section on the home page;
// others are Inertia page links. `dropdown: 'projects'` renders the Projects
// mega menu from the shared `projects` prop (one entry per project page);
// its `href` is the fallback used in the footer.
export const navigation = [
    { label: 'Home', href: '/' },
    { label: 'Projects', href: '/#projects', dropdown: 'projects' },
    { label: 'About Us', href: '/about-us' },
    { label: 'Contact Us', href: '/contact-us' },
];
