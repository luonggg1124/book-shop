import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/base.css',
                'resources/css/main.css',
                'resources/css/cart.css',
                'resources/css/test.css',
                'resources/css/fontawesome-free-6.4.2-web/css/all.min.css',
                'resources/js/app.js',
                
                
            ],
            refresh: true,
        }),
    ],
});
