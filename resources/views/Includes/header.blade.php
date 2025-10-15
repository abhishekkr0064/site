<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CarRent</title>

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" /> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <script src="https://cdn.tailwindcss.com"></script>
  <!-- google font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome CDN -->
    {{-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" --}}
      <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

     <!-- Swiper CSS -->
      <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <!-- Heroicons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- tailwind config -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              outfit: ["Outfit", "ui-sans-serif", "system-ui", "sans-serif"],
            },
            colors: {
              primary: "#E50914",
              primaryHover: "#D30000",
              textPrimary: "#252525",
              textSecondary: "#999999",
              borderDefault: "#E0E0E0",
              bgWarm: "#E8DDDC",
              bgPrimary: "#FFFFFF",
            },
          },
        },
      };
    </script> 


     {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
     {{-- @vite(['resources/css/styles.css']) --}}
     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  </head>
<body class="w-full mx-auto">