const mix = require("laravel-mix");

mix.ts("resources/ts/index.ts", "dist/lunar-multiselect.js").setPublicPath("dist");

if (mix.inProduction()) {
    mix.version();
}

mix.disableSuccessNotifications();
