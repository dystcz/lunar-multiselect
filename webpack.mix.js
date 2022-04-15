const mix = require("laravel-mix");

mix.ts("resources/ts/index.ts", "dist/app.js").setPublicPath("dist");

if (mix.inProduction()) {
  mix.version();
}

mix.disableSuccessNotifications();
