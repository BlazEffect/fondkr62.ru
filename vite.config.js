import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/scss/pages/home.scss',
                'resources/scss/pages/korrupcii.scss',
                'resources/scss/pages/news.scss',
                'resources/scss/pages/personal-account-email-receipts.scss',
                'resources/scss/pages/personal-account-status.scss',
                'resources/scss/pages/reviews.scss',
                'resources/scss/pages/user-page.scss',
                'resources/js/pages/find-personal-account.js',
                'resources/js/pages/owners-premises-operator.js',
                'resources/js/pages/personal-account-status.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        base: '/',
        alias: {
            '@': path.resolve(__dirname, 'public'),
        },
    },
    css: {
        devSourcemap: true,
    },
});
