// Header Script
const header = document.getElementById("main-header");
      const menuBtn = document.getElementById("menu-btn");
      const mobileMenu = document.getElementById("mobile-menu");
      const languageTrigger = document.getElementById("language-trigger");
      const languageModal = document.getElementById("language-modal");
      const closeModalBtn = document.getElementById("close-modal-btn");

      // Header shadow on scroll
      window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
          header.classList.add("pb-10");
        } else {
          header.classList.remove("pb-0");
        }
      });

      // Mobile menu toggle
      menuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });

      // Language modal functionality
      languageTrigger.addEventListener("click", () => {
        languageModal.classList.remove("hidden");
      });

      closeModalBtn.addEventListener("click", () => {
        languageModal.classList.add("hidden");
      });

      languageModal.addEventListener("click", (e) => {
        if (e.target === languageModal) {
          languageModal.classList.add("hidden");
        }
      });

      // Existing JS variables...
      //   const languageTrigger = document.getElementById("language-trigger");
      //   const languageModal = document.getElementById("language-modal");
      //   const closeModalBtn = document.getElementById("close-modal-btn");

      // New JS variables
      const langTabBtn = document.getElementById("lang-tab-btn");
      const currencyTabBtn = document.getElementById("currency-tab-btn");
      const langTabContent = document.getElementById("lang-tab-content");
      const currencyTabContent = document.getElementById(
        "currency-tab-content"
      );
      const countrySearchInput = document.getElementById("country-search");
      const countryListDiv = document.getElementById("country-list");
      const applyBtn = document.getElementById("apply-btn");

      // Sample data for countries with flags (use your own data for a complete list)
      const countries = [
        { code: "us", name: "United States", language: "English" },
        { code: "gb", name: "United Kingdom", language: "English" },
        { code: "in", name: "India", language: "Hindi / English" },
        { code: "fr", name: "France", language: "French" },
        { code: "de", name: "Germany", language: "German" },
        { code: "jp", name: "Japan", language: "Japanese" },
      ];

      // Function to render the country list
      const renderCountryList = (filter = "") => {
        countryListDiv.innerHTML = "";
        const filteredCountries = countries.filter((country) =>
          country.name.toLowerCase().includes(filter.toLowerCase())
        );

        filteredCountries.forEach((country) => {
          const countryItem = document.createElement("div");
          countryItem.className =
            "flex items-center py-2 px-4 space-x-3 cursor-pointer hover:bg-gray-100 rounded-md";
          countryItem.innerHTML = `
      <img src="https://flagcdn.com/w20/${country.code}.png" alt="${country.name} flag" class="w-5 h-auto rounded-full shadow-md">
      <span class="text-sm font-medium">${country.name} (${country.language})</span>
    `;
          countryListDiv.appendChild(countryItem);
        });
      };

      // Event listeners for tabs
      langTabBtn.addEventListener("click", () => {
        langTabBtn.classList.add("border-primary", "text-primary");
        langTabBtn.classList.remove(
          "border-transparent",
          "text-textSecondary",
          "hover:text-textPrimary"
        );
        currencyTabBtn.classList.remove("border-primary", "text-primary");
        currencyTabBtn.classList.add(
          "border-transparent",
          "text-textSecondary",
          "hover:text-textPrimary"
        );

        langTabContent.classList.remove("hidden");
        currencyTabContent.classList.add("hidden");
      });

      currencyTabBtn.addEventListener("click", () => {
        currencyTabBtn.classList.add("border-primary", "text-primary");
        currencyTabBtn.classList.remove(
          "border-transparent",
          "text-textSecondary",
          "hover:text-textPrimary"
        );
        langTabBtn.classList.remove("border-primary", "text-primary");
        langTabBtn.classList.add(
          "border-transparent",
          "text-textSecondary",
          "hover:text-textPrimary"
        );

        currencyTabContent.classList.remove("hidden");
        langTabContent.classList.add("hidden");
      });

      // Event listener for search bar
      countrySearchInput.addEventListener("keyup", (e) => {
        renderCountryList(e.target.value);
      });

      // Event listener for apply button (you'll need to add logic here to save the selection)
      applyBtn.addEventListener("click", () => {
        // Add your logic to save the selected language, country, and currency here.
        // For example: localStorage.setItem('userLanguage', selectedLang);
        languageModal.classList.add("hidden");
      });

      // Call the render function on page load
      document.addEventListener("DOMContentLoaded", () => {
        renderCountryList();
      });

      // Existing modal show/hide logic
      languageTrigger.addEventListener("click", () => {
        languageModal.classList.remove("hidden");
      });

      closeModalBtn.addEventListener("click", () => {
        languageModal.classList.add("hidden");
      });

      languageModal.addEventListener("click", (e) => {
        if (e.target === languageModal) {
          languageModal.classList.add("hidden");
        }
      });

    //   *****************Header Script End***************

    // Footer Script Start***************
  document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("callbackModal");

    window.openModal = function () {
      modal.classList.remove("hidden");
      modal.classList.add("flex");
      document.body.classList.add("overflow-hidden");
    };

    window.closeModal = function () {
      modal.classList.add("hidden");
      modal.classList.remove("flex");
      document.body.classList.remove("overflow-hidden");
    };

    modal.addEventListener("click", function (e) {
      if (e.target === modal) closeModal();
    });
  });
    //   Footer Script End***************

    // Hero Carousel Script Start***************
      const heroSwiper = new Swiper(".hero-swiper", {
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".hero-swiper .swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".hero-swiper .swiper-button-next",
          prevEl: ".hero-swiper .swiper-button-prev",
        },
        effect: "fade", // 👈 smooth fade effect (optional)
        speed: 800,
      });

      const categoriesSwiper = new Swiper(".categories-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".categories-swiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: { slidesPerView: 2 }, // Tablet
          1024: { slidesPerView: 3 }, // Desktop
          1280: { slidesPerView: 4 }, // Large desktop
        },
      });

      const findCarSwiper = new Swiper(".findCar-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".findCar-swiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
          1280: { slidesPerView: 4 },
        },
      });

      const blogSwiper = new Swiper(".blogs-swiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".blogs-swiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
          1280: { slidesPerView: 4 },
        },
      });

      const reviewSwiper = new Swiper(".reviews-swiper", {
        slidesPerView: 1,
        spaceBetween: 16,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".reviews-swiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
          1280: { slidesPerView: 4 },
        },
      });

      const alliedSwiper = new Swiper(".alliedPartner-swiper", {
        loop: true,
        allowTouchMove: false, // disable manual swipe
        slidesPerView: 2,
        spaceBetween: 30,
        autoplay: {
          delay: 1, // no waiting
          disableOnInteraction: false,
        },
        speed: 5000, // smooth & slow (higher = slower)
        freeMode: true,
        freeModeMomentum: false,
        pagination: {
          el: ".alliedPartner-swiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 5,
          },
        },
      });
    // Hero Carousel Script End***************