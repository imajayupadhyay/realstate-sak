<?php

/*
 * ACE Arte — dummy/sample project content.
 * Facts compiled from publicly available listings (Sept–Oct 2026); figures are indicative
 * and must be verified with the developer before going live.
 * Images: developer marketing renders — replace with official media kit before launch.
 *
 * Every project file in this folder returns an array with this same shape.
 */

$img = '/images/projects/ace-arte';

return [
    'slug' => 'ace-arte',
    'name' => 'ACE Arte',
    'developer' => 'ACE Group',
    'tagline' => 'Ultra-luxury 3 & 4 BHK residences in the greenest corner of Noida Expressway',
    'status' => 'New Launch',
    'type' => '3, 4 & 4.5 BHK Luxury Apartments',
    'location' => 'Sector 150, Noida',
    'address' => 'Plot SC-02/G, Sector 150, Noida–Greater Noida Expressway, Uttar Pradesh',
    'map_query' => 'ACE Arte Sector 150 Noida',
    'rera' => 'UPRERAPRJ528653/07/2026',
    'price_from' => '₹3.27 Cr*',
    'possession' => 'Feb 2031',

    'image' => "{$img}/towers-pool-dusk.webp",
    'hero_image' => "{$img}/clubhouse-pool-deck.webp",

    'overview' => [
        'ACE Arte is a landmark residential address by ACE Group in Sector 150 — Noida’s lowest-density, greenest sector and the heart of Noida Sports City. Spread across nearly 15 acres, the project has just 784 residences across 11 towers, so close to 80% of the land is open greens, gardens and water features.',
        'Designed by renowned architect Hafeez Contractor, the homes come in spacious 3 BHK, 4 BHK and 4.5 BHK + servant layouts with large balconies overlooking a 9-acre central green. A 50,000 sq ft clubhouse, resort-style pools and a full sports complex make everyday life feel like a holiday.',
    ],

    'highlights' => [
        ['label' => 'Land Area', 'value' => '14.83 Acres'],
        ['label' => 'Towers', 'value' => '11 (G+22)'],
        ['label' => 'Residences', 'value' => '784'],
        ['label' => 'Open Area', 'value' => '~80%'],
        ['label' => 'Clubhouse', 'value' => '50,000 sq ft'],
        ['label' => 'Architect', 'value' => 'Hafeez Contractor'],
    ],

    'configurations' => [
        ['type' => '3 BHK', 'area' => '1,927 sq ft', 'price' => '₹3.27 Cr*'],
        ['type' => '4 BHK', 'area' => '2,614 sq ft', 'price' => '₹4.44 Cr*'],
        ['type' => '4.5 BHK + Servant', 'area' => '4,370 sq ft', 'price' => '₹7.43 Cr*'],
    ],
    'price_note' => '*Indicative base price (~₹16,995/sq ft super area). Excludes PLC, parking, club membership, IFMS, GST and stamp duty.',

    'amenities' => [
        ['group' => 'Clubhouse', 'items' => ['50,000 sq ft clubhouse', 'Indoor swimming pool', 'Fully equipped gym', 'Yoga & meditation studio', 'Banquet hall', 'Double-height lounge']],
        ['group' => 'Sports', 'items' => ['Basketball court', 'Cricket pitch', 'Squash court', 'Padel & pickleball', 'Badminton', 'Jogging track']],
        ['group' => 'Leisure', 'items' => ['Resort-style outdoor pool', 'Amphitheatre', 'Fire-pit lounge', 'Kids’ play zone', 'Cards & indoor games room', 'Pet zone']],
        ['group' => 'Landscape', 'items' => ['9-acre central green', 'Hibiscus & flower gardens', 'Sculpture court', 'Garden pavilion', 'Water features', 'Banquet lawn']],
    ],

    'gallery' => [
        ['src' => "{$img}/towers-pool-dusk.webp", 'caption' => 'Towers and pool at dusk'],
        ['src' => "{$img}/main-entrance-gate.webp", 'caption' => 'Main entrance gate'],
        ['src' => "{$img}/entrance-lobby.webp", 'caption' => 'Marble entrance lobby'],
        ['src' => "{$img}/apartment-living-room.webp", 'caption' => 'Apartment living room'],
        ['src' => "{$img}/balcony-view.webp", 'caption' => 'Balcony overlooking the greens'],
        ['src' => "{$img}/clubhouse-lounge.webp", 'caption' => 'Double-height clubhouse lounge'],
        ['src' => "{$img}/clubhouse-banquet-hall.webp", 'caption' => 'Clubhouse banquet hall'],
        ['src' => "{$img}/swimming-pool.webp", 'caption' => 'Swimming pool'],
        ['src' => "{$img}/flower-garden.webp", 'caption' => 'Landscaped flower garden'],
        ['src' => "{$img}/fire-pit-lounge.webp", 'caption' => 'Outdoor fire-pit lounge'],
        ['src' => "{$img}/kids-play-area.webp", 'caption' => 'Kids’ play area'],
        ['src' => "{$img}/tower-entrance-drop-off.webp", 'caption' => 'Tower drop-off'],
    ],

    'location_advantages' => [
        ['place' => 'Noida–Greater Noida Expressway', 'time' => '2 min'],
        ['place' => 'ACE Medley Avenue (retail)', 'time' => '3 min'],
        ['place' => 'Sector 148 Metro (Aqua Line)', 'time' => '8 min'],
        ['place' => 'Shiv Nadar School', 'time' => '15 min'],
        ['place' => 'GL Bajaj Institute', 'time' => '15 min'],
        ['place' => 'Noida International Airport, Jewar', 'time' => '35 min'],
    ],

    'disclaimer' => 'Project details, prices and images are indicative, based on publicly available information, and subject to change. Please verify all details with the developer and on the UP RERA website before making any decision.',
];
