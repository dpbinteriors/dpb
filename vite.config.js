import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';
import { resolve } from 'path';

// import react from '@vitejs/plugin-react';
// import vue from '@vitejs/plugin-vue';

const host = 'dpb.com.test';

export default defineConfig({
    build: {
        outDir: 'public/pre-build'
    },
    resolve: {
        alias: {
            'alpinejs': resolve(__dirname, 'node_modules/alpinejs/dist/cdn.js')
        }
    },
    plugins: [
        ViteImageOptimizer({
            /* pass your config */
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/filament/admin/themes/piyetra.css'],
            refresh: true,
            detectTsl: host,
            
            publicPath: "/public/",
        }),

    ],
  

});
