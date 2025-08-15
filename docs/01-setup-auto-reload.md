# Filament V4: Setup Auto-Reload Documentation

This document describes the changes made to enable auto-reload (hot module replacement) for Filament V4 panels using Vite in this Laravel application.

## Summary of Changes

### 1. Register Vite Asset in Filament Panel
- **File:** `app/Providers/AppServiceProvider.php`
- **Change:** Registered a Filament render hook to inject the Vite JS asset into Filament panels:
  ```php
  FilamentView::registerRenderHook('panels::body.end', fn(): string => Blade::render("@vite('resources/js/app.js')"));
  ```
  This ensures that Vite's hot-reload JS is loaded in Filament panels, enabling live updates during development.

### 2. Update Filament Panel Color
- **File:** `app/Providers/Filament/AdminPanelProvider.php`
- **Change:** Changed the primary color from `Amber` to `Blue`:
  ```php
  ->colors([
      'primary' => Color::Blue,
  ])
  ```
  This is a visual change and not directly related to auto-reload, but included in this branch.

### 3. Vite Config: Enable Auto-Reload for Filament
- **File:** `vite.config.js`
- **Change:**
  - Switched to using the `refreshPaths` from the `laravel-vite-plugin`.
  - Added Filament and Providers directories to the Vite refresh paths:
    ```js
    refresh: [
      ...refreshPaths,
      "app/Livewire/**",
      "app/Filament/**",
      "app/Providers/**",
    ],
    ```
  This ensures that changes in Filament, Livewire, and Providers directories trigger Vite's auto-reload.

## How It Works
- When you run `composer run dev` or `npm run dev`, Vite watches for changes in the specified directories.
- Any updates to Filament resources, Livewire components, or Providers will trigger a browser reload, reflecting changes instantly in the Filament panel UI.

## Troubleshooting
- If you do not see changes reflected in the browser, ensure Vite is running (`npm run dev`) and your browser is not caching assets.
- For production, ensure you run `npm run build` to generate static assets.

---
**Last updated:** August 16, 2025
