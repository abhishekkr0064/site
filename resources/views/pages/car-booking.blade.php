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
        src="{{asset('images/car-rental.jpg')}}"
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
              IND | INR | 100 {{__('messages.per_day')}}
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
                   <span id="totalAmount" data-base-price="100">100</span>
                </h4>
              </div>
              <p class="text-textSecondary pl-2">
                 <span id="ratePerDay" data-base-price="100">100</span>
                {{-- <span class="text-textPrimary">/day</span> --}}
              </p>
            </div>
            <button
              class="w-full sm:w-fit bg-[#006AFF] text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition"
            >
              {{__('messages.submit')}}
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Configurations for forms
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

      // Rate configuration (change here if needed)
      const perDayRate = 100;
      document.getElementById("ratePerDay").textContent = perDayRate;

      const bgImage = document.getElementById("bgImage");
      const formWrapper = document.getElementById("formWrapper");
      const toggleBtns = document.querySelectorAll(".toggle-btn");
      const daysCountEl = document.getElementById("daysCount");
      const totalAmountEl = document.getElementById("totalAmount");

      const msPerDay = 24 * 60 * 60 * 1000;

      function parseDateInput(val) {
        // parse YYYY-MM-DD into a local Date at midnight
        const [y, m, d] = val.split("-").map(Number);
        return new Date(y, m - 1, d);
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

        // Build form HTML
        const form = document.createElement("form");
        form.className = "w-full grid grid-cols-1 sm:grid-cols-2 gap-4";

        config.fields.forEach((field) => {
          const fieldWrapper = document.createElement("div");
          fieldWrapper.className = "w-full";

          // Label for date with icon
          if (field.type === "date") {
            const label = document.createElement("label");
            label.className =
              "block text-textPrimary font-semibold text-sm mb-1 flex items-center gap-2";
            label.innerHTML = `<img src="{{asset('images/calender.svg')}}" alt="calander" width="32" height="32" /> ${field.placeholder}`;
            fieldWrapper.appendChild(label);
          }

          const input = document.createElement("input");
          input.type = field.type;
          // For date inputs, keep placeholder accessible via aria-label
          // Mobile number validation
          if (field.type === "tel") {
            input.maxLength = 10;
            input.placeholder = "Phone Number";

            // Add input event listener for validation
            input.addEventListener("input", function (e) {
              // Remove non-numeric characters
              this.value = this.value.replace(/[^0-9]/g, "");

              // Limit to 10 digits
              if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
              }
            });

            // Add paste event listener to handle paste operations
            input.addEventListener("paste", function (e) {
              e.preventDefault();
              const pastedText = (
                e.clipboardData || window.clipboardData
              ).getData("text");
              const numbersOnly = pastedText
                .replace(/[^0-9]/g, "")
                .slice(0, 10);
              this.value = numbersOnly;
            });
          } else if (field.type === "date") {
            input.setAttribute("aria-label", field.placeholder);
          } else {
            input.placeholder = field.placeholder;
          }
          input.required = true;
          input.className =
            "w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none";

          // Distinguish from/to date inputs so listeners can find them
          if (field.type === "date") {
            const lowered = field.placeholder.toLowerCase();
            if (lowered.includes("from")) {
              input.dataset.dateType = "from";
            } else if (lowered.includes("to")) {
              input.dataset.dateType = "to";
            } else {
              // fallback - assign sequentially if no keyword
              // (not needed here because placeholders contain From/To)
            }
          }

          fieldWrapper.appendChild(input);
          form.appendChild(fieldWrapper);
        });

        // Replace old form
        formWrapper.innerHTML = "";
        formWrapper.appendChild(form);

        // Setup listeners for date inputs and update initial summary
        setupDateListeners(form);
        updateSummaryForForm(form);
      }

      function setupDateListeners(form) {
        const fromInput = form.querySelector('input[data-date-type="from"]');
        const toInput = form.querySelector('input[data-date-type="to"]');

        if (fromInput) {
          fromInput.addEventListener("change", () => {
            // set min for toInput for better UX
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
            // inclusive day count
            days = Math.floor((toDate - fromDate) / msPerDay) + 1;
            if (days < 1) days = 1;
          } else {
            // invalid range
            days = 0;
          }
        } else {
          // either or none selected -> keep default 1
          days = 1;
        }

        const total = days > 0 ? days * perDayRate : 0;

        // Update UI
        daysCountEl.textContent = days;
        totalAmountEl.textContent = `INR ${total.toFixed(2)}`;
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

      // client side validation
      document.addEventListener("click", function (e) {
        if (e.target.matches("button.w-full")) {
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
                error = "Please enter a valid 10-digit contact number";
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
              input.insertAdjacentElement("afterend", errorMsg);
            }
          });

          if (isValid) {
            alert("Form submitted successfully ✅");
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
      
    </script>
@include('includes.footer')
