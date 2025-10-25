@include('includes.header')
@include('home.navbar')

<div>

    <!-- Breadcrumb -->
     <nav class="mb-6 px-4 p-4 lg:p-6 text-sm mt-28">
      <ol class="flex items-center space-x-2 text-sm text-textSecondary">
        <li><a href="/" class="hover:text-blue-600">
          {{__('messages.home')}}
        </a></li>
        <li>/</li>
        <li>
          {{ __('messages.my_bookings') }}
        </li>
      </ol>
    </nav>

    <!-- Full Page Background Wrapper -->
    <div id="form-container" class="relative min-h-screen w-full overflow-hidden">
      <!-- Background Image -->
      <img
        id="bgImage"
        src="{{asset('images/rental-car.svg')}}"
        alt="Background"
        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
      />

      <!-- Form Section -->
      <div
        class="relative z-10 flex items-center justify-center min-h-screen p-4"
      >
        <div
          class="w-full max-w-3xl xl:max-w-5xl bg-white/95 backdrop-blur-sm shadow-lg rounded-xl p-6"
        >
          <!-- Toggle Buttons -->
          <div class="flex justify-start items-center gap-4 mb-6">
            <button
              data-type="rental"
              class="toggle-btn px-6 py-2 rounded-lg text-sm font-medium flex items-center justify-center"
            >
              <img
                src="{{asset('images/rental-car.svg')}}"
                alt="Rental Icon"
                class="inline-block mr-2"
              />
              {{__('messages.rental')}}
            </button>
            <button
              data-type="airport"
              class="toggle-btn px-6 py-2 rounded-lg text-sm font-medium flex items-center justify-center"
            >
              <img
                src="{{asset('images/airport-icon.svg')}}"
                alt="Airport Icon"
                class="inline-block mr-2"
              />
              {{__('messages.airport')}}
            </button>
          </div>

          <!-- Heading -->
          <div class="text-start mb-6">
            <h2 class="text-lg font-semibold text-textPrimary">
              <span id="countryCodeDisplay">IND</span> | 
              <span id="currencyCodeDisplay">INR</span> | 
              <span id="ratePerDayDisplay">100</span> {{__('messages.per_day')}}
            </h2>
          </div>

          <div class="w-full flex flex-col justify-center items-center gap-5">
            <!-- Forms Wrapper -->
            <div id="formWrapper" class="w-full"></div>
            <div class="w-full">
              <div class="flex gap-5">
                <h3 class="flex items-center font-semibold">
                  <img src="{{asset('images/calender.svg')}}" width="32" alt="calender" />
                 {{__('messages.day')}}:<span id="daysCount" class="ml-2">1</span>
                </h3>
                <h4 class="flex items-center">
                  <img src="{{asset('images/saving-icon.svg')}}" alt="saving" width="32" />
                  <span class="text-[#0292FF] pr-1">{{__('messages.total')}}:</span>
                   <span id="totalAmount" ></span>
                </h4>
              </div>
              <p class="text-textSecondary pl-2">
                 <span id="ratePerDay" data-base-price="100">100</span>
              </p>
            </div>
            <button
            id="booking-submit-btn"  
              class="w-full sm:w-fit bg-[#006AFF] text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition"
            >
              {{__('messages.submit')}}
            </button>
          </div>
        </div>
      </div>
    </div>

     <!--succes submit popup -->
    <div
      class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
      id="success-popup"
    >
      <div
        class="shadow-lg rounded-lg bg-white w-80 text-center overflow-hidden"
      >
        <div class="p-6">
          <h1 class="text-lg font-semibold mb-2">Booking Submitted</h1>
          <p class="text-gray-700 text-sm">Your booking has been submitted</p>
        </div>

        <hr class="border-t border-gray-300" />

        <div class="p-4">
          <button
            class="text-white bg-[#006AFF] px-6 py-2 rounded hover:bg-blue-700 transition w-fit"
            id="success-btn"
          >
            OK
          </button>
        </div>
      </div>
    </div>

    <script>
      // Currency configuration - FIXED RATES (1 INR = X Foreign Currency)
      const currencyData = [
        { code: "in", name: "India", currency: "INR", rate: 1 },
        { code: "ma", name: "Morocco", currency: "MAD", rate: 0.12 }, // 1 INR = 0.12 MAD
        { code: "sl", name: "Sierra Leone", currency: "SLE", rate: 275 }, // 1 INR = 275 SLE
        { code: "bf", name: "Burkina Faso", currency: "XOF", rate: 7.4 }, // 1 INR = 7.4 XOF
        { code: "ci", name: "Abidjan", currency: "XOF", rate: 7.4 },
        { code: "ne", name: "Niger", currency: "XOF", rate: 7.4 },
        { code: "gn", name: "Conakry", currency: "GNF", rate: 105 }, // 1 INR = 105 GNF
        { code: "gm", name: "Gambia", currency: "GMD", rate: 0.77 }, // 1 INR = 0.77 GMD
        { code: "tg", name: "Togo", currency: "XOF", rate: 7.4 },
        { code: "sn", name: "Senegal", currency: "XOF", rate: 7.4 },
        { code: "ml", name: "Mali", currency: "XOF", rate: 7.4 },
      ];

      // Map country codes to phone codes and flags
      const countryPhoneMap = {
        "in": { phoneCode: "+91", flag: "https://flagcdn.com/w20/in.png" },
        "ma": { phoneCode: "+212", flag: "https://flagcdn.com/w20/ma.png" },
        "sl": { phoneCode: "+232", flag: "https://flagcdn.com/w20/sl.png" },
        "bf": { phoneCode: "+226", flag: "https://flagcdn.com/w20/bf.png" },
        "ci": { phoneCode: "+225", flag: "https://flagcdn.com/w20/ci.png" },
        "ne": { phoneCode: "+227", flag: "https://flagcdn.com/w20/ne.png" },
        "gn": { phoneCode: "+224", flag: "https://flagcdn.com/w20/gn.png" },
        "gm": { phoneCode: "+220", flag: "https://flagcdn.com/w20/gm.png" },
        "tg": { phoneCode: "+228", flag: "https://flagcdn.com/w20/tg.png" },
        "sn": { phoneCode: "+221", flag: "https://flagcdn.com/w20/sn.png" },
        "ml": { phoneCode: "+223", flag: "https://flagcdn.com/w20/ml.png" },
      };

      // Currency symbols mapping
      const currencySymbols = {
        "INR": "₹",
        "MAD": "MAD",
        "SLE": "SLE",
        "XOF": "CFA",
        "GNF": "FG",
        "GMD": "GMD"
      };

      // Configurations for forms
      (() => {
      const formConfigs = {
        rental: {
            bg: "{{asset('images/rantal-background.svg')}}",
            submitText: "{{__('messages.submit_rent')}}",
            fields: [
                { type: "text", placeholder: "{{__('messages.name')}}" },
                { type: "tel", placeholder: "{{__('messages.contact_number')}}" },
                { type: "text", placeholder: "{{__('messages.from_loc')}}" },
                { type: "text", placeholder: "{{__('messages.to_loc')}}" },
                { type: "date", placeholder: "{{__('messages.from_date')}}" },
                { type: "date", placeholder: "{{__('messages.to_date')}}" },
            ],
        },
        airport: {
            bg: "{{asset('images/airport-background.svg')}}",
            submitText: "{{__('messages.submit_air')}}",
            fields: [
                { type: "text", placeholder: "{{__('messages.name')}}" },
                { type: "tel", placeholder: "{{__('messages.contact_number')}}" },
                { type: "text", placeholder: "{{__('messages.from_loc')}}" },
                { type: "text", placeholder: "{{__('messages.to_loc')}}" },
                { type: "date", placeholder: "{{__('messages.from_date')}}" },
                { type: "date", placeholder: "{{__('messages.to_date')}}" },
            ],
        },
    };

       // Base rate configuration (in INR)
      const baseRatePerDay = 100;

      const bgImage = document.getElementById("bgImage");
      const formWrapper = document.getElementById("formWrapper");
      const toggleBtns = document.querySelectorAll(".toggle-btn");
      const daysCountEl = document.getElementById("daysCount");
      const totalAmountEl = document.getElementById("totalAmount");
      const successPopup = document.getElementById("success-popup");
      const successClose = document.getElementById("success-btn");
      const countryCodeDisplay = document.getElementById("countryCodeDisplay");
      const currencyCodeDisplay = document.getElementById("currencyCodeDisplay");
      const ratePerDayDisplay = document.getElementById("ratePerDayDisplay");

      const msPerDay = 24 * 60 * 60 * 1000;
      
      // Track current currency (default to India)
      let currentCurrency = currencyData.find(c => c.code === "in");

      function parseDateInput(val) {
        const [y, m, d] = val.split("-").map(Number);
        return new Date(y, m - 1, d);
      }

      // Update currency display - FIXED VERSION
      function updateCurrencyDisplay() {
        console.log("Updating currency to:", currentCurrency);
        
        countryCodeDisplay.textContent = currentCurrency.name.toUpperCase();
        currencyCodeDisplay.textContent = currentCurrency.currency;
        
        // Calculate and display the converted rate
        const convertedRate = baseRatePerDay * currentCurrency.rate;
        console.log("Base rate:", baseRatePerDay, "Conversion rate:", currentCurrency.rate, "Converted:", convertedRate);
        
        ratePerDayDisplay.textContent = convertedRate.toFixed(2);
        
        // Update the rate per day display
        document.getElementById("ratePerDay").textContent = convertedRate.toFixed(2);
        
        // Update the total amount
        updateTotalAmount();
      }

      // Update total amount based on days and currency - FIXED VERSION
      function updateTotalAmount() {
        const days = parseInt(daysCountEl.textContent, 10);
        const total = days > 0 ? days * baseRatePerDay * currentCurrency.rate : 0;
        const symbol = currencySymbols[currentCurrency.currency] || currentCurrency.currency;
        
        console.log("Total calculation:", days, "days *", baseRatePerDay, "base *", currentCurrency.rate, "rate =", total);
        
        totalAmountEl.textContent = `${symbol} ${total.toFixed(2)}`;
      }

      // Get country data for dropdown
      function getCountryData() {
        return currencyData.map(country => {
          const phoneInfo = countryPhoneMap[country.code];
          return {
            code: country.code,
            name: country.name,
            phoneCode: phoneInfo ? phoneInfo.phoneCode : "+000",
            flag: phoneInfo ? phoneInfo.flag : "https://flagcdn.com/w20/_unknown.png",
            currency: country.currency,
            rate: country.rate
          };
        });
      }

      // Render form dynamically
      function renderForm(type) {
        const config = formConfigs[type];

        // Update background
        bgImage.style.opacity = 0;
        setTimeout(() => {
          bgImage.src = config.bg;
          bgImage.style.opacity = 1;
        }, 300);

        const form = document.createElement("form");
        form.className = "w-full grid grid-cols-1 sm:grid-cols-2 gap-4";

        const countryData = getCountryData();

        config.fields.forEach((field) => {
          const fieldWrapper = document.createElement("div");
          fieldWrapper.className = "w-full relative";

          // Date label with icon
          if (field.type === "date") {
            const label = document.createElement("label");
            label.className =
              "block text-textPrimary font-semibold text-sm mb-1 flex items-center gap-2";
            label.innerHTML = `<img src="{{ asset('images/calender.svg') }}" alt="calendar" width="32" height="32"/> ${field.placeholder}`;
            fieldWrapper.appendChild(label);
          }

          // Mobile field with custom dropdown
          if (field.type === "tel") {
            const container = document.createElement("div");
            container.className = "flex items-center relative";

            // Custom dropdown
            const dropdownWrapper = document.createElement("div");
            dropdownWrapper.className =
              "relative border border-borderDefault rounded-l-lg bg-borderDefault flex items-center px-2 cursor-pointer select-none";

            const selected = document.createElement("div");
            selected.className = "flex items-center gap-1 py-2 w-20";
            selected.innerHTML = `<img src="${countryData[0].flag}" class="w-5 h-auto"/> <span>${countryData[0].phoneCode}</span>`;

            const caret = document.createElement("i");
            caret.className = "fa-solid fa-caret-down ml-1";

            const list = document.createElement("div");
            list.className =
              "absolute top-full left-0 w-full bg-white border border-borderDefault rounded-md shadow-md hidden z-50 max-h-48 overflow-y-auto";

            countryData.forEach((c) => {
              const item = document.createElement("div");
              item.className =
                "flex items-center justify-between px-2 py-1 hover:bg-gray-200 cursor-pointer";
              item.innerHTML = `<img src="${c.flag}" class="w-5 h-auto"/> <span>${c.phoneCode}</span>`;
              item.dataset.countryCode = c.code;
              item.addEventListener("click", () => {
                selected.innerHTML = `<img src="${c.flag}" class="w-5 h-auto"/> <span>${c.phoneCode}</span>`;
                list.classList.add("hidden");
                
                // Update currency when country code changes
                const selectedCountry = currencyData.find(country => country.code === c.code);
                if (selectedCountry) {
                  currentCurrency = selectedCountry;
                  console.log("Currency changed to:", currentCurrency);
                  updateCurrencyDisplay();
                }
              });
              list.appendChild(item);
            });

            dropdownWrapper.appendChild(selected);
            dropdownWrapper.appendChild(caret);
            dropdownWrapper.appendChild(list);

            dropdownWrapper.addEventListener("click", (e) => {
              e.stopPropagation();
              list.classList.toggle("hidden");
            });

            document.addEventListener("click", () => {
              list.classList.add("hidden");
            });

            // Mobile input
            const input = document.createElement("input");
            input.type = "tel";
            input.placeholder = "Phone Number";
            input.maxLength = 10;
            input.required = true;
            input.className =
              "w-full border border-borderDefault rounded-r-lg p-2 focus:outline-none";

            input.addEventListener("input", () => {
              input.value = input.value.replace(/[^0-9]/g, "").slice(0, 10);
            });

            container.appendChild(dropdownWrapper);
            container.appendChild(input);
            fieldWrapper.appendChild(container);
          } else {
            const input = document.createElement("input");
            input.type = field.type;
            input.required = true;
            input.className =
              "w-full border border-borderDefault rounded-lg p-2 focus:outline-none";
            if (field.type === "date")
              input.setAttribute("aria-label", field.placeholder);
            else input.placeholder = field.placeholder;

            // Date type tracking
            if (field.type === "date") {
              const lowered = field.placeholder.toLowerCase();
              if (lowered.includes("from")) input.dataset.dateType = "from";
              else if (lowered.includes("to")) input.dataset.dateType = "to";
            }

            fieldWrapper.appendChild(input);
          }

          form.appendChild(fieldWrapper);
        });

        formWrapper.innerHTML = "";
        formWrapper.appendChild(form);

        setupDateListeners(form);
        updateSummaryForForm(form);
        updateCurrencyDisplay();

        // Form submission
        form.addEventListener("submit", async (e) => {
          e.preventDefault();

          let isValid = true;
          form.querySelectorAll("input").forEach((input) => {
            if (!validateInput(input)) isValid = false;
          });
          if (!isValid) return;

          // Collect data with country code
          const selectedCode = form.querySelector(
            ".relative div:first-child span"
          ).textContent;
          const phone = form.querySelector('input[type="tel"]').value;
          const data = { phone: selectedCode + phone };

          form.querySelectorAll("input").forEach((input) => {
            if (input.type !== "tel") {
              const key = input.placeholder.replace(/\s+/g, "").toLowerCase();
              data[key] = input.value.trim();
            }
          });

          data.days = parseInt(daysCountEl.textContent, 10);
          data.total = totalAmountEl.textContent;
          
          // Show success popup
          successPopup.classList.remove("hidden");
        });
      }

      function setupDateListeners(form) {
        const fromInput = form.querySelector('input[data-date-type="from"]');
        const toInput = form.querySelector('input[data-date-type="to"]');

        if (fromInput) {
          fromInput.addEventListener("change", () => {
            if (toInput && fromInput.value) {
              toInput.min = fromInput.value;
            } else if (toInput) {
              toInput.removeAttribute("min");
            }
            updateSummaryForForm(form);
          });
        }

        if (toInput) {
          toInput.addEventListener("change", () => {
            updateSummaryForForm(form);
          });
        }
      }

      function updateSummaryForForm(form) {
        const fromInput = form.querySelector('input[data-date-type="from"]');
        const toInput = form.querySelector('input[data-date-type="to"]');

        const fromVal = fromInput ? fromInput.value : "";
        const toVal = toInput ? toInput.value : "";

        let days = 1; // default
        if (fromVal && toVal) {
          const fromDate = parseDateInput(fromVal);
          const toDate = parseDateInput(toVal);
          if (toDate >= fromDate) {
            days = Math.floor((toDate - fromDate) / msPerDay) + 1;
            if (days < 1) days = 1;
          } else {
            days = 0;
          }
        } else {
          days = 1;
        }

        // Update UI
        daysCountEl.textContent = days;
        updateTotalAmount();
      }

      // Setup toggle buttons
      toggleBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
          const type = btn.dataset.type;

          // Button active state
          toggleBtns.forEach((b) => {
            b.classList.remove("bg-[#006AFF]", "text-white");
            b.classList.add("bg-borderDefault", "text-textPrimary");
          });
          btn.classList.add("bg-[#006AFF]", "text-white");
          btn.classList.remove("bg-borderDefault");

          // Render selected form
          renderForm(type);
        });
      });

      // Show rental by default
      renderForm("rental");
      toggleBtns[0].classList.add("bg-[#006AFF]", "text-white");
      toggleBtns[1].classList.add("bg-borderDefault", "text-textPrimary");

      // Success popup close handler
      successClose.addEventListener("click", () => {
        successPopup.classList.add("hidden");
      });

      // client side validation
      document.addEventListener("click", function (e) {
      if (e.target.matches("#booking-submit-btn")) {
        e.preventDefault();

          const form = document.querySelector("#formWrapper form");
          if (!form) return;

          let isValid = true;

          // Remove previous errors
          form.querySelectorAll(".error-text").forEach((el) => el.remove());
          form.querySelectorAll("input").forEach((input) => {
            input.classList.remove("border-red-500");
          });

          // Validate each input
          form.querySelectorAll("input").forEach((input) => {
            const value = input.value.trim();
            let error = "";

            if (!value) {
              error = `Please enter ${input.placeholder || "this field"}`;
            } else if (input.type === "tel") {
              if (!/^[0-9]{10}$/.test(value)) {
                error = "Contact number must be 10 digit";
              }
            } else if (input.type === "date") {
              if (!input.value) {
                error = `Please select ${
                  input.getAttribute("aria-label") || "a date"
                }`;
              }
            }

            if (error) {
              isValid = false;
              input.classList.add("border-red-500");

              const errorMsg = document.createElement("p");
              errorMsg.className = "error-text text-red-600 text-sm mt-1";
              errorMsg.textContent = error;
              const container = input.closest("div") || input.parentNode;
              if (input.type === "tel")
                container.insertAdjacentElement("afterend", errorMsg);
              else input.insertAdjacentElement("afterend", errorMsg);
            }
          });

          if (isValid) {
            successPopup.classList.remove("hidden");
            form.reset();
          }
        }
      });

      // Clear errors on input
      document.addEventListener("input", function (e) {
        if (e.target.tagName === "INPUT") {
          const input = e.target;
          input.classList.remove("border-red-500");
          const errorEl = input.parentNode.querySelector(".error-text");
          if (errorEl) errorEl.remove();
        }
      });
   
       })();
    </script>
    @include('includes.footer')