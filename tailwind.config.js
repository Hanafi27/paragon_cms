/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // DANGER - Merah untuk aksi hapus
        'danger': {
          DEFAULT: '#E53E3E', // Merah utama
          dark: '#C53030',    // Hover/active
        },
        // ============================================
        // COLOR SYSTEM - PT PARAGON MEDIKA PHARMA
        // ============================================
        // Prinsip: Netral dominan, Accent terbatas
        // Logo sebagai aksen, bukan warna utama
        
        // PRIMARY - Text utama (Charcoal)
        'primary': {
          DEFAULT: '#1F2937',      // Charcoal - text utama
          dark: '#111827',          // Untuk hover/active states
          light: '#374151',         // Untuk variasi
        },
        
        // ACCENT PRIMARY - Magenta Soft dari logo
        'accent': {
          DEFAULT: '#A81D5D',      // Magenta Soft - button utama, link aktif
          light: '#C7256F',        // Untuk hover
          dark: '#8C184E',          // Untuk active states
          soft: '#FCE7F3',          // Untuk background subtle (dropdown active)
        },
        
        // ACCENT SECONDARY - Yellow Soft dari logo
        'accent-yellow': {
          DEFAULT: '#F5C542',      // Yellow Soft - icon highlight, badge
          light: '#F7D066',         // Untuk hover
          dark: '#E0B038',          // Untuk active states
        },
        
        // NEUTRAL - Background & Text
        'neutral': {
          DEFAULT: '#4B5563',      // Text sekunder
          light: '#F9FAFB',        // Background utama (Off White)
          lighter: '#FFFFFF',      // Background card (Putih)
          border: '#E5E7EB',       // Border & Divider
        },
        
        // LEGACY - Untuk backward compatibility
        'navy': '#1F2937',
        'navy-dark': '#111827',
        'navy-light': '#374151',
        'warm-gray': '#4B5563',
        'warm-gray-light': '#F9FAFB',
        'off-white': '#F9FAFB',
        'charcoal': '#1F2937',
      },
      fontFamily: {
        'heading': ['IBM Plex Sans', 'sans-serif'],
        'body': ['IBM Plex Sans', 'sans-serif'],
      },
      letterSpacing: {
        'heading': '-0.02em',
      },
      lineHeight: {
        'body': '1.7',
      },
    },
  },
  plugins: [],
}
