// resources/js/app.js

import './bootstrap';           // ← keep this (for any bootstrap setup)

import Alpine from 'alpinejs';  // ← this is the key line missing

window.Alpine = Alpine;         // Makes Alpine available globally (good practice)
Alpine.start();                 // Actually initializes Alpine
