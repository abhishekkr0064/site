// ********************************************************Header Script Start*****************
      // DOM Elements - grouped by functionality
      let selectedCountry = null;
      const elements = {
        header: {
          main: document.getElementById("main-header"),
          logo: document.getElementById("header-logo"),
          menuBtn: document.getElementById("menu-btn"),
          mobileMenu: document.getElementById("mobile-menu"),
          currencySelection: document.getElementById("currency-selection"),
           registerContainers: document.querySelectorAll(".register-container"),
          registerButtons: document.querySelectorAll(".registerLog-button"),
            myBookings: document.getElementById("my-bookings"),
            myBookings_mobile: document.getElementById("my-bookings-mobile"),
            profileCurrency: document.getElementById("profile-currency"),
            // profileCountry: document.getElementById("profile-country"),
        },
        modal: {
          language: document.getElementById("language-modal"),
          languageModalClose: document.getElementById("languageModal-close"),
          trigger: document.getElementById("language-trigger"),
          mobileLangTrigger: document.getElementById("mobile-language-trigger"),
          heading: document.getElementById("heading-text"),
          langTabBtn: document.getElementById("lang-tab-btn"),
          currencyTabBtn: document.getElementById("currency-tab-btn"),
          langTabContent: document.getElementById("lang-tab-content"),
          currencyTabContent: document.getElementById("currency-tab-content"),
          countrySearch: document.getElementById("country-search"),
          countryList: document.getElementById("country-list"),
          currencyList: document.getElementById("currency-list"),
          applyBtn: document.getElementById("apply-btn"),
           profilePopup: document.getElementById("profile-popup"),
          rateUsBtn: document.getElementById("rate-us"),
          openRateUs: document.getElementById("rate-modal"),
          closeRateUs: document.getElementById("close-rateUs"),
        },
        auth: {
          popup: document.getElementById("auth-popup"),
          titleHeading: document.getElementById("auth-title"),
          title: document.getElementById("auth-title-text"),
          subtitle: document.getElementById("auth-subtitle"),
          form: document.getElementById("auth-form"),
        },
      };

      // Configuration data
      const config = {
        countries: [
          // { code: "in", name: "India", language: "English" },
          // { code: "ma", name: "Morocco", language: "French" },
          // { code: "sl", name: "Sierra Leone", language: "Krio" },
          // { code: "bf", name: "Burkina Faso", language: "Manding" },
          // { code: "ci", name: "Abidjan", language: "Dioula" },
          // { code: "ne", name: "Niger", language: "Hausa" },
          // { code: "gn", name: "Conakry", language: "Fulani" },
          // { code: "gm", name: "Gambia", language: "Mandinka" },
          // { code: "tg", name: "Togo", language: "Ewe" },
          // { code: "sn", name: "Senegal", language: "Wolof" },
          // { code: "ml", name: "Mali", language: "Bambara" },
          { code: "in", name: "India", language: "English", currency: "INR" },
          { code: "ma", name: "Morocco", language: "French", currency: "MAD" },

        ],
         supportedLanguages: ["English", "French"], // Using language names instead of country codes

  // Map languages to Laravel locale codes
  languageToLocale: {
    English: "en",
    French: "fr"
    // Add more languages as needed: Spanish: "es", Arabic: "ar", etc.
  },

        currencyData: [
          { code: "in", name: "India", currency: "INR", rate: 1 },
          { code: "ma", name: "Morocco", currency: "MAD", rate: 0.12 },
          { code: "sl", name: "Sierra Leone", currency: "SLE", rate: 275 },
          { code: "bf", name: "Burkina Faso", currency: "XOF", rate: 7.4 },
          { code: "ci", name: "Abidjan", currency: "XOF", rate: 7.4 },
          { code: "ne", name: "Niger", currency: "XOF", rate: 7.4 },
          { code: "gn", name: "Conakry", currency: "GNF", rate: 105 },
          { code: "gm", name: "Gambia", currency: "GMD", rate: 0.77 },
          { code: "tg", name: "Togo", currency: "XOF", rate: 7.4 },
          { code: "sn", name: "Senegal", currency: "XOF", rate: 7.4 },
          { code: "ml", name: "Mali", currency: "XOF", rate: 7.4 },
        ],
        
      };

      // State management
 const state = {
  currentCurrency: "in",
  currentCountry: "in", // This should track the selected country for Laravel
  selectedCountry: { code: "in", name: "India", language: "English" },
  selectedCurrency: { code: "in", name: "India", currency: "INR", rate: 1 }
};

      // Utility functions
      const utils = {
        // Header scroll effect
        handleHeaderScroll: () => {
          const { main: header, logo: headerLogo } = elements.header;
          const isScrolled = window.scrollY > 50;

          header.classList.toggle("pb-3", !isScrolled);
          header.classList.toggle("pb-2", isScrolled);

          const logoClasses = {
            small: ["h-10", "md:h-12", "lg:h-14"],
            large: ["h-12", "md:h-16", "lg:h-20"],
          };

          headerLogo.classList.remove(
            ...logoClasses.small,
            ...logoClasses.large
          );
          headerLogo.classList.add(
            ...(isScrolled ? logoClasses.small : logoClasses.large)
          );
        },

        // Tab management
        switchTab: (tabType) => {
          const {
            heading,
            langTabBtn,
            currencyTabBtn,
            langTabContent,
            currencyTabContent,
          } = elements.modal;
          const isLanguageTab = tabType === "language";

          // Update heading and tab buttons
          heading.textContent = isLanguageTab
            ? "Language"
            : "Currency";

          [langTabBtn, currencyTabBtn].forEach((btn, index) => {
            const isActive =
              (index === 0 && isLanguageTab) || (index === 1 && !isLanguageTab);
            btn.classList.toggle("bg-[#006AFF]", isActive);
            btn.classList.toggle("bg-borderDefault", !isActive);
          });

          // Update tab content visibility
          langTabContent.classList.toggle("hidden", !isLanguageTab);
          currencyTabContent.classList.toggle("hidden", isLanguageTab);
        },
      };

    // Currency management
// const currencyManager = {
//   loadPreference: () => {
//     const savedCurrency = localStorage.getItem("userCurrency");
//     if (
//       savedCurrency &&
//       config.currencyData.find((curr) => curr.code === savedCurrency)
//     ) {
//       state.currentCurrency = savedCurrency;
//     }
//     currencyManager.updateDisplay();
//   },
const currencyManager = {
  loadPreference: () => {
    // Load currency preference
    const savedCurrency = localStorage.getItem("userCurrency");
    if (savedCurrency && config.currencyData.find((curr) => curr.code === savedCurrency)) {
      state.currentCurrency = savedCurrency;
      state.selectedCurrency = config.currencyData.find(curr => curr.code === savedCurrency);
    }
    

  // savePreference: () => {
  //   localStorage.setItem("userCurrency", state.currentCurrency);
  //   window.dispatchEvent(
  //     new CustomEvent("currencyChanged", {
  //       detail: { currency: state.currentCurrency },
  //     })
  //   );
  // },
    // Load country preference for Laravel
    const savedCountry = localStorage.getItem("userCountry");
    if (savedCountry && config.countries.find((country) => country.code === savedCountry)) {
      state.currentCountry = savedCountry;
      state.selectedCountry = config.countries.find(country => country.code === savedCountry);
    }
    
    currencyManager.updateDisplay();
  },
    savePreference: () => {
    localStorage.setItem("userCurrency", state.currentCurrency);
    window.dispatchEvent(
      new CustomEvent("currencyChanged", {
        detail: { currency: state.currentCurrency },
      })
    );
  },

  // formatCurrency: (amount, currencyCode) => {
  //   const currency = config.currencyData.find(
  //     (val) => val.currency === currencyCode
  //   );
  //   if (!currency)
  //     return `${Math.round(amount).toLocaleString()} ${currencyCode}`;

  //   // ✅ FIXED: Consistent format for ALL currencies - CODE + AMOUNT
  //   return `${currencyCode} ${Math.round(amount).toLocaleString('en-IN')}`;
  // },
    formatCurrency: (amount, currencyCode) => {
    const currency = config.currencyData.find(
      (val) => val.currency === currencyCode
    );
    if (!currency)
      return `${Math.round(amount).toLocaleString()} ${currencyCode}`;

    return `${currencyCode} ${Math.round(amount).toLocaleString('en-IN')}`;
  },


  // updateDisplay: () => {
  //   // Update header currency display

  //     elements.header.profileCurrency.textContent =
  //     state.currentCurrency.toUpperCase();
  //     elements.header.profileCountry.textContent =
  //     state.currentCountry.toUpperCase();

  //   if (elements.header.currencySelection) {
  //     elements.header.currencySelection.textContent =
  //       state.currentCurrency.toUpperCase();
  //   }
    updateDisplay: () => {
    // Update header currency display
    elements.header.profileCurrency.textContent = 
      state.selectedCurrency.currency.toUpperCase();
    // elements.header.profileCountry.textContent = 
    //   state.currentCountry.toUpperCase();

    if (elements.header.currencySelection) {
      elements.header.currencySelection.textContent = 
        state.selectedCurrency.currency.toUpperCase();
    }

    // Update all price elements
//     document.querySelectorAll("[data-base-price]").forEach((element) => {
//       const basePriceINR = parseFloat(
//         element.getAttribute("data-base-price")
//       );
//       const currencyInfo = config.currencyData.find(
//         (val) => val.code === state.currentCurrency
//       );

//       // ✅ FIXED: Same pattern for all currencies
//       if (currencyInfo) {
//         const convertedPrice = basePriceINR * currencyInfo.rate;
//         const formattedPrice = currencyManager.formatCurrency(
//           convertedPrice,
//           currencyInfo.currency
//         );
//         element.textContent = `${formattedPrice} / day`;
//       } else {
//         element.textContent = `INR ${basePriceINR.toLocaleString('en-IN')} / day`;
//       }
//     });
//   },
// };
 // Update all price elements
    document.querySelectorAll("[data-base-price]").forEach((element) => {
      const basePriceINR = parseFloat(
        element.getAttribute("data-base-price")
      );
      const currencyInfo = state.selectedCurrency;

      if (currencyInfo) {
        const convertedPrice = basePriceINR * currencyInfo.rate;
        const formattedPrice = currencyManager.formatCurrency(
          convertedPrice,
          currencyInfo.currency
        );
        element.textContent = `${formattedPrice} / day`;
      } else {
        element.textContent = `INR ${basePriceINR.toLocaleString('en-IN')} / day`;
      }
    });
  },
};
      
      // List rendering functions
//       const listRenderer = {
//         renderCurrencyList: () => {
//           const { currencyList } = elements.modal;
//           currencyList.innerHTML = config.currencyData
//             .map(
//               (curr) => `
//         <div class="flex items-center justify-center py-2 px-4 space-x-3 cursor-pointer hover:bg-borderDefault rounded-lg w-40 ${
//           state.currentCurrency === curr.code ? "selected" : ""
//         }" data-currency="${curr.code}">
//           <div class="flex flex-col">
//             <span class="text-lg font-medium">${curr.name}</span>
//             <span class="text-xs text-textSecondary text-center uppercase">${
//               curr.currency
//             } - ${curr.code}</span>
//           </div>
//         </div>
//       `
//             )
//             .join("");

//           // Add event listeners
//           currencyList.querySelectorAll("[data-currency]").forEach((item) => {
//             item.addEventListener("click", () => {
//               currencyList
//                 .querySelectorAll("[data-currency]")
//                 .forEach((i) => i.classList.remove("selected"));
//               item.classList.add("selected");
//               state.currentCurrency = item.dataset.currency;
//             });
//           });
//         },

//         renderCountryList: (filter = "") => {
//         const { countryList } = elements.modal; // +++ REMOVE currencyList from destructuring +++
//         countryList.innerHTML = "";

//         const filteredCountries = config.countries.filter((country) =>
//           country.name.toLowerCase().includes(filter.toLowerCase())
//         );

//         countryList.innerHTML = filteredCountries
//           .map(
//             (country) => `
//           <div class="flex items-center mt-8 py-2 px-4 space-x-3 cursor-pointer hover:bg-borderDefault rounded-lg h-fit ${
//             // +++ ADD SELECTION CHECK +++
//             state.currentCountry === country.code ? "bg-blue-100 border border-blue-500" : ""
//           }" data-country="${country.code}"> <!-- +++ ADD data-country attribute +++ -->
//             <img src="https://flagcdn.com/w20/${country.code}.png" alt="${country.name} flag" class="w-8 h-auto">
//             <div class="flex flex-col">
//               <span class="text-md font-medium">${country.language}</span>
//             </div>
//           </div>
//         `
//           )
//           .join("");

//         // REPLACE the existing country click handler with this:
//         countryList.querySelectorAll("[data-country]").forEach((item) => {
//         item.addEventListener("click", () => {

//           countryList.querySelectorAll("[data-country]").forEach((i) => {
//             i.classList.remove("bg-blue-100", "border", "border-blue-500", "selected");
//           });


//           item.classList.add("bg-blue-100", "border", "border-blue-500", "selected");

//           // Update state for current country & selectedCountry object
//           const countryCode = item.dataset.country;
//           state.currentCountry = countryCode;
//           state.selectedCountry = config.countries.find((c) => c.code === countryCode);

//           // Auto-update currency ONLY for English or French countries
//           const allowedLangs = ["English", "French"];
//           if (state.selectedCountry && allowedLangs.includes(state.selectedCountry.language)) {
//             // currencyData uses same country 'code' — keep current approach
//             state.currentCurrency = countryCode;

//             // Refresh currency list UI highlight and prices in page
//             listRenderer.renderCurrencyList();
//             currencyManager.updateDisplay();

//             console.log(` Auto-updated currency to '${countryCode}' because language is '${state.selectedCountry.language}'.`);
//           } else {
//             // Do not change currency for other languages
//             console.log(`Selected country '${state.selectedCountry?.name}' (${state.selectedCountry?.language}) — currency left unchanged.`);
//           }
//         });
//     });
//   },
// };

// List rendering functions - UPDATED
const listRenderer = {
  renderCurrencyList: () => {
    const { currencyList } = elements.modal;
    currencyList.innerHTML = config.currencyData
      .map(
        (curr) => `
        <div class="flex items-center justify-center py-2 px-4 space-x-3 cursor-pointer hover:bg-borderDefault rounded-lg w-40 ${
          state.selectedCurrency.code === curr.code ? "bg-blue-100 border border-blue-500" : ""
        }" data-currency="${curr.code}">
          <div class="flex flex-col">
            <span class="text-lg font-medium">${curr.name}</span>
            <span class="text-xs text-textSecondary text-center uppercase">${
              curr.currency
            } - ${curr.code}</span>
          </div>
        </div>
      `
      )
      .join("");

    // Add event listeners
    currencyList.querySelectorAll("[data-currency]").forEach((item) => {
      item.addEventListener("click", () => {
        currencyList
          .querySelectorAll("[data-currency]")
          .forEach((i) => i.classList.remove("bg-blue-100", "border", "border-blue-500"));
        item.classList.add("bg-blue-100", "border", "border-blue-500");
        
        // ONLY update currency state, NOT country
        const currencyCode = item.dataset.currency;
        state.currentCurrency = currencyCode;
        state.selectedCurrency = config.currencyData.find((c) => c.code === currencyCode);
        
        console.log(`Currency selected: ${state.selectedCurrency.currency} (${currencyCode})`);
      });
    });
  },

  renderCountryList: (filter = "") => {
    const { countryList } = elements.modal;
    countryList.innerHTML = "";

    const filteredCountries = config.countries.filter((country) =>
      country.name.toLowerCase().includes(filter.toLowerCase())
    );

    countryList.innerHTML = filteredCountries
      .map(
        (country) => `
          <div class="flex items-center mt-8 py-2 px-4 space-x-3 cursor-pointer hover:bg-borderDefault rounded-lg h-fit ${
            state.currentCountry === country.code ? "bg-blue-100 border border-blue-500" : ""
          }" data-country="${country.code}">
            <img src="https://flagcdn.com/w20/${country.code}.png" alt="${country.name} flag" class="w-8 h-auto">
            <div class="flex flex-col">
              <span class="text-md font-medium">${country.language}</span>

            </div>
          </div>
        `
      )
      .join("");

    countryList.querySelectorAll("[data-country]").forEach((item) => {
      item.addEventListener("click", () => {
        countryList.querySelectorAll("[data-country]").forEach((i) => {
          i.classList.remove("bg-blue-100", "border", "border-blue-500", "selected");
        });

        item.classList.add("bg-blue-100", "border", "border-blue-500", "selected");

        // ONLY update country state for language/locale
        const countryCode = item.dataset.country;
        state.currentCountry = countryCode;
        state.selectedCountry = config.countries.find((c) => c.code === countryCode);

        console.log(`Country selected: ${state.selectedCountry.name} (${state.selectedCountry.language}) - Currency unchanged`);
      });
    });
  },
};
// UPDATED Apply Button Logic
// UPDATED Apply Button Logic - Save country preference and call Laravel route
elements.modal.applyBtn.addEventListener("click", () => {
  // Detect which tab is active
  const isLanguageTabActive = !elements.modal.langTabContent.classList.contains("hidden");
  const isCurrencyTabActive = !elements.modal.currencyTabContent.classList.contains("hidden");

  // CASE 1: Language/Country Tab - Update Laravel Locale
  if (isLanguageTabActive) {
    const selectedLang = state.selectedCountry?.language || "";
    const allowedLangs = ["English", "French"];
    const languageToLocale = { English: "en", French: "fr" };

    if (allowedLangs.includes(selectedLang)) {
      const localeCode = languageToLocale[selectedLang];
      
      // Save country preference to localStorage
      localStorage.setItem("userCountry", state.currentCountry);
      
      console.log(`Changing locale to: ${localeCode} for country: ${state.currentCountry}`);

      // Call Laravel route to set locale
      fetch("/set-locale/" + localeCode)
        .then((response) => {
          if (response.ok) {
            console.log("Locale updated — reloading page...");
            location.reload();
          } else {
            console.error("Locale API failed");
            location.reload();
          }
        })
        .catch((error) => {
          console.error("Error updating locale:", error);
          location.reload();
        });
    } else {
      console.log("Language not supported for localization");
      elements.modal.language.classList.add("hidden");
    }

  // CASE 2: Currency Tab - Update Currency ONLY
  } else if (isCurrencyTabActive) {
    console.log(`Currency updated to: ${state.selectedCurrency.currency}`);
    currencyManager.savePreference();
    currencyManager.updateDisplay();
    elements.modal.language.classList.add("hidden");
  }
});

// Initialize application - ENSURE country is loaded properly
const initHeader = () => {
  setupEventListeners();
  currencyManager.loadPreference();
  
  // Initialize with saved preferences or defaults
  const savedCurrency = localStorage.getItem("userCurrency") || "in";
  const savedCountry = localStorage.getItem("userCountry") || "in";
  
  state.selectedCountry = config.countries.find(country => country.code === savedCountry) || config.countries[0];
  state.currentCountry = state.selectedCountry.code;
  state.selectedCurrency = config.currencyData.find(currency => currency.code === savedCurrency) || config.currencyData[0];
  
  listRenderer.renderCountryList();
  listRenderer.renderCurrencyList();

  // Set default tab
  utils.switchTab("language");

  window.addEventListener("currencyChanged", () =>
    currencyManager.updateDisplay()
  );
  UserSession.load();
};

      // Auth system
      const Auth = {
        mode: "login",

        open(mode = "login") {
          this.mode = "login";
          this.render();
          elements.auth.popup.classList.remove("hidden");
          document.body.classList.add("overflow-hidden");
        },

        close() {
          elements.auth.popup.classList.add("hidden");
          document.body.classList.remove("overflow-hidden");
        },

        switchMode(mode) {
          this.mode = mode;
          this.render();
        },

        render() {
          const { titleHeading, title, subtitle, form } = elements.auth;

          const templates = {
            login: {
              titleHeading: "flex justify-start",
              title: `${window.translations.welcome}`,
              subtitle: {
                text: `${window.translations.model_msg1}`,
                className: "text-start text-textSecondary text-sm my-3",
              },
              form: `
            <div class="w-full">
              <label class="block text-sm font-medium text-[#252525]">${window.translations.email}</label>
              <input type="email" class="mt-1 w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary" placeholder="${window.translations.enter_email}" required />
            </div>
            <div class="w-full">
              <label class="block text-sm font-medium text-[#252525]">${window.translations.etr_reg_pass}</label>
              <input type="password" class="mt-1 w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary" placeholder="${window.translations.enter_pass}" required />
            </div>
            <button type="submit" class="w-32 bg-[#006AFF] py-2 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">${window.translations.login}</button>
            <p class="text-center text-sm text-[#999999]">
              ${window.translations.dont_have_account}
              <span onclick="Auth.switchMode('signup')" class="text-[#E50914] hover:text-[#D30000] cursor-pointer"> ${window.translations.create_account}</span>
            </p>
            <hr class="my-2 border border-borderDefault" />
            <div class="w-full flex items-center justify-center border border-borderDefault rounded-lg p-2 gap-2 cursor-pointer hover:bg-borderDefault">
              <img src="images/google-icon.svg" alt="Google Sign-In" />
              <span>${window.translations.continue_with_google}</span>
            </div>
            <div class="w-full flex items-center justify-center border border-borderDefault rounded-lg p-2 gap-2 cursor-pointer hover:bg-borderDefault">
              <img src="images/apple-icon.svg" alt="Apple Sign-In" />
              <span>${window.translations.continue_with_apple}</span>
            </div>
          `,
            },
            signup: {
              titleHeading: "flex justify-center",
              title: "",
              subtitle: {
                text: `${window.translations.create_new_account}`,
                className:
                  "text-center text-textPrimary text-md font-semibold my-3",
              },
              form: `
            <div class="w-full">
              <input type="name" class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary" placeholder="${window.translations.full_name}" required />
            </div>
            <div class="w-full">
              <input type="email" class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary" placeholder="${window.translations.enter_email}" required />
            </div>
            <div class="w-full">
              <input type="tel" class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary" placeholder="${window.translations.mobile_number}" required />
            </div>
            <div class="w-full relative">
              <input type="password" id="password" class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary pr-10" placeholder="${window.translations.password}" required />
             <i class="fa-solid fa-eye absolute right-3 top-3 text-gray-400 cursor-pointer" onclick="togglePasswordVisibility('password', this)"></i>
              </div>
            <div class="w-full relative">
              <input type="password" id="confirm-pass" class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary pr-10" placeholder="${window.translations.confirm_password}" required />
               <i class="fa-solid fa-eye absolute right-3 top-3 text-gray-400 cursor-pointer" onclick="togglePasswordVisibility('confirm-pass', this)"></i>
              <p id="password-error" class="text-red-500 text-xs mt-1 hidden">Passwords do not match</p>
            </div>
            <div class="w-full flex items-center justify-start gap-2">
              <input type="checkbox" id="terms" required />
              <label for="terms" class="text-sm">${window.translations.agree_terms} <a href="${window.translations.terms}" class="text-[#E50914]">${window.translations.terms_conditions} </a></label>
            </div>
            <button type="submit" class="w-full bg-[#006AFF] py-2 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">${window.translations.sign_up}</button>
            <p class="text-center text-sm text-textSecondary">
              ${window.translations.already_have_account}
              <span onclick="Auth.switchMode('login')" class="text-primary hover:text-primaryHover cursor-pointer">${window.translations.login}</span>
            </p>
          `,
            },
          };

          const template = templates[this.mode];
          titleHeading.className = template.titleHeading;
          title.innerText = template.title;
          subtitle.innerText = template.subtitle.text;
          subtitle.className = template.subtitle.className;
          form.innerHTML = template.form;
        },
      };
        // Simple mock user session
      const UserSession = {
        isLoggedIn: false,
        user: null,

        userRegister(form) {
          const name = form.querySelector('input[type="name"]');
          const email = form.querySelector('input[type="email"]').value.trim();
          const mobile = form.querySelector('input[type="tel"]');
          const password = form
            .querySelector('input[type="password"]')
            .value.trim();
          const confirmPassword = form
            .querySelector('input[id="confirm-password"]')
            .value.trim();
          const checkbox = form.querySelector('input[type="checkbox"]');

          if (!email || !password || !checkbox.checked) {
            alert("Email, password, and accepting terms are mandatory.");
            return;
          }

          this.isLoggedIn = true;
          this.user = { email };
          localStorage.setItem("user", JSON.stringify(this.user));
          Auth.close();
          this.updateUI();
        },

        login(form) {
          const email = form.querySelector('input[type="email"]').value.trim();
          const password = form
            .querySelector('input[type="password"]')
            .value.trim();

          if (!email || !password) {
            alert("Please enter both email and password.");
            return;
          }

          this.isLoggedIn = true;
          this.user = { email };
          localStorage.setItem("user", JSON.stringify(this.user));
          Auth.close();
          this.updateUI();
        },

        logout() {
          this.isLoggedIn = false;
          this.user = null;
          localStorage.removeItem("user");
          window.location.reload();
        },

        load() {
          const storedUser = localStorage.getItem("user");
          if (storedUser) {
            this.isLoggedIn = true;
            this.user = JSON.parse(storedUser);
          }
          this.updateUI();
        },

        updateUI() {
          const profilePopup = elements.modal.profilePopup;

          // Remove old profile buttons if any
          document
            .querySelectorAll("#profile-section")
            .forEach((el) => el.remove());

          if (this.isLoggedIn && this.user) {
            // Hide all "Register/Login" buttons
            elements.header.registerButtons.forEach((btn) =>
              btn.classList.add("hidden")
            );
            elements.header.myBookings.classList.remove("hidden");
            elements.header.myBookings_mobile.classList.remove("hidden");

            // Create Profile Button
            elements.header.registerContainers.forEach((container) => {
              const profileBtn = document.createElement("div");
              profileBtn.id = "profile-section";
              profileBtn.className =
                "cursor-pointer p-2 hover:shadow-md rounded-md hover:text-primary transition space-x-1";
              profileBtn.innerHTML = `
          <i class="fa-solid fa-user fa-sm"></i>
          <span class="capitalize">${this.user.email.split("@")[0]}</span>
        `;
              container.appendChild(profileBtn);

              // Toggle Profile Popup on click
              profileBtn.addEventListener("click", () => {
                profilePopup.classList.toggle("hidden");
              });
            });
          } else {
            // User logged out → Show register/login buttons
            elements.header.registerButtons.forEach((btn) =>
              btn.classList.remove("hidden")
            );
            if (profilePopup) profilePopup.classList.add("hidden");
          }

          // Attach logout button listener
          const logoutBtn = document.getElementById("logout-btn");
          if (logoutBtn)
            logoutBtn.addEventListener("click", () => this.logout());
        },
      };

      // Event listeners setup
      const setupEventListeners = () => {
        const { header, modal } = elements;

        // Header events
        window.addEventListener("scroll", utils.handleHeaderScroll);
        header.menuBtn.addEventListener("click", () =>
          header.mobileMenu.classList.toggle("hidden")
        );

        // Modal events
        modal.trigger.addEventListener("click", () =>
          modal.language.classList.remove("hidden")
        );

        modal.mobileLangTrigger.addEventListener("click", () => {
          modal.language.classList.remove("hidden");
        });
         modal.language.addEventListener("click", (e) => {
          if (e.target === modal.languageModalClose)
            modal.language.classList.add("hidden");
        });
        modal.language.addEventListener("click", (e) => {
          if (e.target === modal.language)
            modal.language.classList.add("hidden");
        });

        // Tab events
        modal.langTabBtn.addEventListener("click", () =>
          utils.switchTab("language")
        );
        modal.currencyTabBtn.addEventListener("click", () =>
          utils.switchTab("currency")
        );

        // Search and apply events
        modal.countrySearch.addEventListener("keyup", (e) =>
          listRenderer.renderCountryList(e.target.value)
        );
        modal.applyBtn.addEventListener("click", () => {
          currencyManager.savePreference();
          currencyManager.updateDisplay();
          modal.language.classList.add("hidden");
        });

         modal.rateUsBtn.addEventListener("click", () => {
          modal.openRateUs.classList.remove("hidden");
          modal.openRateUs.classList.add("flex");
          document.body.classList.add("overflow-hidden");
        });

        modal.closeRateUs.addEventListener("click", () => {
          modal.openRateUs.classList.add("hidden");
          modal.openRateUs.classList.remove("flex");
          document.body.classList.remove("overflow-hidden");
        });
        // Laravel Localization
        

        // elements.modal.applyBtn.addEventListener("click", () => {
        //   // Always save currency preference
        //   currencyManager.savePreference();

        //   // Detect if user switched tabs before applying
        //   const isLanguageTabActive = !elements.modal.langTabContent.classList.contains("hidden");
        //   const isCurrencyTabActive = !elements.modal.currencyTabContent.classList.contains("hidden");

        //   const selectedLang = state.selectedCountry?.language || "";
        //   const allowedLangs = ["English", "French"];
        //   const languageToLocale = { English: "en", French: "fr" };

        //   //  CASE 1: User clicked APPLY from COUNTRY tab → change locale
        //   if (isLanguageTabActive && allowedLangs.includes(selectedLang)) {
        //     const localeCode = languageToLocale[selectedLang];
        //     console.log(` Changing locale to: ${localeCode} from LANGUAGE tab`);

        //     fetch("/set-locale/" + localeCode)
        //       .then((response) => {
        //         if (response.ok) {
        //           console.log("Locale updated — reloading page...");
        //           location.reload();
        //         } else {
        //           console.error(" Locale API failed");
        //           location.reload();
        //         }
        //       })
        //       .catch((error) => {
        //         console.error(" Error updating locale:", error);
        //         location.reload();
        //       });

        //   // ✅ CASE 2: User clicked APPLY from CURRENCY tab → NO LOCALE CHANGE
        //   } else if (isCurrencyTabActive) {
        //     console.log(`Currency updated ONLY — locale unchanged`);
        //     location.reload();
        //     currencyManager.updateDisplay();
        //     elements.modal.language.classList.add("hidden");
        //   }
        // });




};

      // Initialize application
      const init = () => {
        setupEventListeners();
        currencyManager.loadPreference();
        // +++ INITIALIZE SELECTED COUNTRY BASED ON SAVED CURRENCY +++
        const savedCurrency = localStorage.getItem("userCurrency") || "in";
        state.selectedCountry = config.countries.find(country => country.code === savedCurrency) || config.countries[0];
        state.currentCountry = state.selectedCountry.code;
        listRenderer.renderCountryList();
        listRenderer.renderCurrencyList();

        // Set default tab
        utils.switchTab("language");

        // Currency change listener
        window.addEventListener("currencyChanged", () =>
          currencyManager.updateDisplay()
        );
        UserSession.load();
      };

      // Global exports
      window.CurrencyManager = {
        loadPreference: currencyManager.loadPreference,
        savePreference: currencyManager.savePreference,
        updateDisplay: currencyManager.updateDisplay,
        getCurrentCurrency: () => state.currentCurrency,
        currencyData: config.currencyData,
      };

      window.Auth = Auth;

      // Initialize when DOM is ready
      document.addEventListener("DOMContentLoaded", init);
         // 👁 Toggle password visibility
      function togglePasswordVisibility(id, icon) {
        const input = document.getElementById(id);
        if (input.type === "password") {
          input.type = "text";
          icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
          input.type = "password";
          icon.classList.replace("fa-eye-slash", "fa-eye");
        }
      }

      //  Real-time password match check
      // Real-time password match check
      document.addEventListener("input", (e) => {
        const password = document.getElementById("password");
        const confirm = document.getElementById("confirm-pass");
        const errorMsg = document.getElementById("password-error");

        if (password && confirm && errorMsg) {
          if (confirm.value && password.value !== confirm.value) {
            errorMsg.classList.remove("hidden");
          } else {
            errorMsg.classList.add("hidden");
          }
        }
      });
  //   ************************************************************Header Script End***************

  // *****************************************************************Footer Script Start***************
  const callbackBtn = document.getElementById("callbackBtn");
  const modal = document.getElementById("callbackModal");

       window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
          // Show button after scrolling 200px
          callbackBtn.classList.remove("hidden");
        } else {
          // Hide button when near top
          callbackBtn.classList.add("hidden");
        }
      });

      function openModal() {
        modal.classList.remove("hidden");
        modal.classList.add("flex", "backdrop-blur-sm");
        document.body.classList.add("overflow-hidden"); // Disable scroll
      }

      function closeModal() {
        modal.classList.add("hidden");
        modal.classList.remove("flex", "backdrop-blur-sm");
        document.body.classList.remove("overflow-hidden"); // Enable scroll
      }


    //  ****************************************************** Footer Script End***************

    // ******************************Hero Carousel Script Start***************
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
    // ******************************************Hero Carousel Script End***************

    // ******************************************Home Page Script Start***************
      // Common Swiper configuration patterns
      // Data
        // Data
      const [categories, carList, blogList, reviewList] = [
        [
          { name: "Luxury", image: "images/fortuner.svg" },
          { name: "SUV", image: "images/swift.svg" },
          { name: "Sports", image: "images/brezza.svg" },
          { name: "SUV", image: "images/fortuner.svg" },
          { name: "Electric", image: "images/brezza.svg" },
        ],
        [
          {
            name: "Tesla Model S",
            type: "Electric Sedan",
            price: 80000,
            image: "images/fortuner.svg",
          },
          {
            name: "BMW M4",
            type: "Luxury Sports",
            price: 82000,
            image: "images/swift.svg",
          },
          {
            name: "Audi Q7",
            type: "Premium SUV",
            price: 82000,
            image: "images/brezza.svg",
          },
          {
            name: "Mercedes S-Class",
            type: "Luxury Sedan",
            price: 95000,
            image: "images/fortuner.svg",
          },
          {
            name: "Toyota Corolla",
            type: "Compact-SUV",
            price: 25000,
            image: "images/swift.svg",
          },
          {
            name: "Ford Mustang",
            type: "Sports Car",
            price: 55000,
            image: "images/brezza.svg",
          },
          {
            name: "Porsche 911",
            type: "Luxury Sports",
            price: 120000,
            image: "images/fortuner.svg",
          },
          {
            name: "Honda Civic",
            type: "Sedan-SUV",
            price: 22000,
            image: "images/swift.svg",
          },
        ],
        [
          {
            image: "images/blog-1.svg",
            heading: `${window.translations.impact_of_tech}`,
            text: "Primarily, the car rental industry is driven by the increasing growth of the tourism. With advanced tech solutions, companies are optimizing fleet management.",
          },
          {
            image: "images/blog-2.svg",
            heading: `${window.translations.impact_of_tech}`,
            text: "Primarily, the car rental industry is driven by the increasing growth of the tourism. With advanced tech solutions, companies are optimizing fleet management.",
          },
          {
            image: "images/blog-3.svg",
            heading: `${window.translations.impact_of_tech}`,
            text: "Primarily, the car rental industry is driven by the increasing growth of the tourism. With advanced tech solutions, companies are optimizing fleet management.",
          },
          {
            image: "images/blog-1.svg",
            heading: `${window.translations.impact_of_tech}`,
            text: "Primarily, the car rental industry is driven by the increasing growth of the tourism. With advanced tech solutions, companies are optimizing fleet management.",
          },
          {
            image: "images/blog-2.svg",
            heading: `${window.translations.impact_of_tech}`,
            text: "Primarily, the car rental industry is driven by the increasing growth of the tourism. With advanced tech solutions, companies are optimizing fleet management.",
          },
        ],
        [
          {
            name: "James",
            date: "Fri May 03/2024",
            text: "Depending on your vehicle preferences and needs, car buying and leasing are two of the most popular ways of getting behind the wheel of a brand new car?",
          },
          {
            name: "James",
            date: "Fri May 03/2024",
            text: "Depending on your vehicle preferences and needs, car buying and leasing are two of the most popular ways of getting behind the wheel of a brand new car?",
          },
          {
            name: "James",
            date: "Fri May 03/2024",
            text: "Depending on your vehicle preferences and needs, car buying and leasing are two of the most popular ways of getting behind the wheel of a brand new car?",
          },
          {
            name: "James",
            date: "Fri May 03/2024",
            text: "Depending on your vehicle preferences and needs, car buying and leasing are two of the most popular ways of getting behind the wheel of a brand new car?",
          },
          {
            name: "James",
            date: "Fri May 03/2024",
            text: "Depending on your vehicle preferences and needs, car buying and leasing are two of the most popular ways of getting behind the wheel of a brand new car?",
          },
        ],
      ];

      // Template functions
      const templates = {
        categoriesCard: (cate) => `
              <a
                href="${window.translations.carlist}"
                class="w-full max-w-xs sm:max-w-sm p-6 rounded-2xl text-center shadow-sm hover:shadow-xl transition bg-[#E8DDDC]/40"
              >
                <img
                  src=${cate.image}
                  alt="SUV"
                  class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg mb-4"
                />
                <p class="font-medium text-base sm:text-lg md:text-xl">${cate.name}</p>
              </a>
        `,

        carCard: (car) => `
    <div class="absolute z-50 w-full flex justify-between items-center p-2">
      <a href="https://wa.me/916395799943">
        <div class="bg-[#16a34a] w-8 h-8 rounded-full flex items-center justify-center">
          <i class="fab fa-whatsapp text-white text-lg"></i>
        </div>
      </a>
      <span class="bg-primary w-fit px-3 py-0.5 text-white rounded-full">${car.type}</span>
    </div>
    <div class="w-full aspect-[4/3] mb-4 hover:bg-borderDefault">
      <img src="${car.image}" alt="${car.name}" class="w-full h-auto transform transition-transform duration-500 hover:scale-110" />
    </div>
    <div class="px-2 py-4 flex items-center justify-between gap-4">
      <span class="bg-[#006AFF]/70 text-center text-bgPrimary px-3 py-1 rounded-lg text-base w-full">${car.name}</span>
      <p class="bg-bgWarm/70 text-left text-textPrimary px-3 py-1 rounded-lg text-base w-full font-medium" data-base-price="${car.price}">₹${car.price}</p>
    </div>
    <div class="px-2 pb-3 flex items-center justify-between gap-4">
      <a href="${window.translations.car_booking}" class="bg-primary hover:bg-primaryHover text-bgPrimary px-3 py-1 rounded-xl text-base w-full text-center">${window.translations.book_now}</a>
      <a href="${window.translations.enquiry}" class="bg-primary hover:bg-primaryHover text-bgPrimary px-3 py-1 rounded-xl text-base w-full text-center">${window.translations.enquiry_now}</a>
    </div>
  `,

        blogCard: (blog) => `
    <div class="overflow-hidden rounded-2xl border border-neutral-100 duration-300 shadow-md hover:shadow-xl group relative mb-8 !p-0">
      <div class="block h-80 relative">
        <div class="relative w-full aspect-[4/3] sm:aspect-video overflow-hidden scale-110">
          <img src="${blog.image}" alt="Blog Post Thumbnail" class="w-full h-full object-cover" />
        </div>
        <div class="absolute bottom-0 left-0 w-full bg-white rounded-t-2xl z-10 p-4 transition-all duration-500 ease-in-out h-32 overflow-hidden group-hover:h-60 shadow-lg">
          <h3 class="text-lg font-semibold mb-1">${blog.heading}</h3>
          <p class="text-sm text-textSecondary">${blog.text}</p>
        </div>
      </div>
    </div>
  `,

        reviewCard: (review) => `
              <div
                class="w-full h-full bg-white rounded-2xl border border-borderDefault overflow-hidden p-4"
              >
                <div class="space-x-4 flex items-center">
                  <div
                    class="w-12 h-12 rounded-full bg-bgWarm flex justify-center items-center"
                  >
                    <span class="font-bold text-2xl text-primary">${review.name[0]}</span>
                  </div>
                  <p class="flex flex-col">
                    <span class="font-medium text-xl">James</span>
                    <span class="font-normal text-md text-textSecondary">
                      ${review.date}
                    </span>
                  </p>
                </div>
                <div class="my-4">
                  <i class="far fa-star text-yellow-400"></i>
                  <i class="far fa-star text-yellow-400"></i>
                  <i class="far fa-star text-yellow-400"></i>
                  <i class="far fa-star text-yellow-400"></i>
                  <i class="far fa-star text-yellow-400"></i>
                </div>
                <p class="text-textSecondary font-normal text-md">
                  ${review.text}
                </p>
              </div>
        `,
      };

      // Render functions
      const renderList = (containerId, data, template, itemClass) => {
        const container = document.getElementById(containerId);
        if (!container) return;

        container.innerHTML = data
          .map((item) => `<div class="${itemClass}">${template(item)}</div>`)
          .join("");
      };

      // Initialize dynamic Swipers
      const initDynamicSwipers = () => {
        const dynamicSwippers = {
          categorySwipper: new Swiper(".categories-swiper", {
            ...swiperConfigs.base,
            ...swiperConfigs.responsive,
            pagination: {
              el: ".categories-swiper .swiper-pagination",
              clickable: true,
            },
          }),

          findCar: new Swiper(".findCar-swiper", {
            ...swiperConfigs.base,
            ...swiperConfigs.responsive,
            pagination: {
              el: ".findCar-swiper .swiper-pagination",
              clickable: true,
            },
          }),

          blogs: new Swiper(".blogs-swiper", {
            ...swiperConfigs.base,
            ...swiperConfigs.responsive,
            autoplay: { delay: 3000, disableOnInteraction: false },
            spaceBetween: 24,
            pagination: {
              el: ".blogs-swiper .swiper-pagination",
              clickable: true,
            },
          }),

          reviewSwippers: new Swiper(".reviews-swiper", {
            ...swiperConfigs.base,
            ...swiperConfigs.responsive,
            autoplay: { delay: 3000, disableOnInteraction: false },
            spaceBetween: 16,
            pagination: {
              el: ".reviews-swiper .swiper-pagination",
              clickable: true,
            },
          }),
        };

        return dynamicSwipers;
      };

      // Initialize everything
  const initHome = () => {
        renderList(
          "category-wrapper-list",
          categories,
          templates.categoriesCard,
          "swiper-slide flex justify-center"
        );

        renderList(
          "car-wrapper-list",
          carList,
          templates.carCard,
          "swiper-slide w-full sm:w-72 border border-borderDefault rounded-3xl overflow-hidden hover:shadow-lg transition"
        );
        renderList(
          "blog-wrapper-list",
          blogList,
          templates.blogCard,
          "swiper-slide w-full"
        );
        renderList(
          "review-wrapper-list",
          reviewList,
          templates.reviewCard,
          "swiper-slide px-2"
        );

        initDynamicSwipers();
      };

      // Run initialization
      initHome();