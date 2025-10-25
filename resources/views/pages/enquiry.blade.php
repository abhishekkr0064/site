@include('includes.header')
@include('home.navbar')
   <!-- Breadcrumb -->
     <nav class="px-4 p-4 lg:p-6 text-sm mt-28">
      <ol class="flex items-center space-x-2 text-sm text-textSecondary">
        <li>
          <a href="/" class="hover:text-blue-600">
            {{ __('messages.home') }}
          </a>
        </li>
        <li>/</li>
        <li> {{ __('messages.enquiry') }} </li>
      </ol>
    </nav>  
  <section
      class="w-full flex justify-center items-center bg-textSecondary/10 p-4"
    >
      <main
         class="flex flex-col md:flex-row items-center justify-center w-full max-w-7xl mx-auto border border-borderDefault rounded-2xl overflow-hidden bg-white"
      >
        <!-- Left: Car Image Box -->
        <div
          class="flex justify-center items-center bg-borderDefault w-full md:w-1/2 h-64 sm:h-80 md:h-auto md:min-h-[400px] lg:min-h-[500px] transition-all duration-300"
        >
          <img
            src="{{asset('images/fortuner.svg')}}"
            alt="Fortuner Car"
            class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl h-auto object-contain transition-transform duration-500 hover:scale-105"
          />
        </div>

        <!-- Right: Enquiry Form -->
        <form
          id="enquiryFormPage"
          class="w-full md:w-1/2 space-y-6 p-5 bg-white"
          novalidate
        >
          <h2 class="text-center text-3xl font-semibold text-primary mb-6">
            {{ __('messages.enquiry_now') }}
          </h2>

          <div class="text-start mb-4">
            <h2 class="text-xl font-medium text-textPrimary">Fortuner</h2>
            <span class="text-textSecondary text-sm">
              100.00 INR - India (INR)
            </span>
          </div>

          <!-- Grid Layout for Inputs -->
          <div class="grid sm:grid-cols-2 gap-5">
            <!-- From -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.from') }}
              </label>
              <input
                type="text"
                name="from"
                placeholder="{{ __('messages.enter_starting_location') }}"
                class="w-full rounded-lg p-2.5 border border-borderDefault focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>

            <!-- To -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.to') }}
              </label>
              <input
                type="text"
                name="to"
                placeholder="{{ __('messages.enter_destination') }}"
                class="w-full rounded-lg p-2.5 border border-borderDefault focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>

             <!-- Contact Number with Country Code -->
              <div>
              <label class="relative block text-sm font-medium mb-1"
                >Contact Number</label
              >

              <div
                class="flex items-center border border-borderDefault rounded-lg overflow-hidden focus-within:ring-1 focus-within:ring-primary"
              >
                <div
                  id="countrySelectEnquiry"
                  class="relative py-3 w-24 px-1 bg-gray-100 border-r border-borderDefault text-sm flex items-center justify-between cursor-pointer"
                >
                  <span
                    id="selectedCountryEnquiry"
                    class="flex items-center gap-1 text-sm"
                    ></span
                  >
                  <i class="fa-solid fa-caret-down"></i>
                </div>

                <input
                  id="contactNumberEnquiry"
                  type="tel"
                  name="contact"
                  placeholder="{{ __('messages.enter_contact_number') }}"
                  maxlength="10"
                  oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                  class="w-full p-2 focus:outline-none"
                  required
                />
              </div>

              <div
                id="countryListEnquiry"
                class="hidden absolute bg-white w-24 mt-1 border border-borderDefault rounded-md shadow-md z-50"
              ></div>
            </div>

            <!-- Contact Email -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.contact_email') }}
              </label
              >
              <input
                type="email"
                name="email"
                placeholder="{{ __('messages.enter_email_address') }}"
                class="w-full rounded-lg p-2.5 border border-borderDefault focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>
          </div>

          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full bg-primary hover:bg-primaryHover text-white font-medium py-2.5 px-4 rounded-lg transition duration-200"
          >
           {{ __('messages.submit_enquiry') }}
          </button>
        </form>
      </main>
    </section>
     <!--succes submit popup -->
    <div
      class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
      id="success-popup"
    >
      <div
        class="shadow-lg rounded-lg bg-white w-72 text-center overflow-hidden"
      >
        <div class="p-6">
          <h1 class="text-lg font-semibold mb-2">
            {{ __('messages.success') }}
          </h1>
          <p class="text-gray-700 text-sm">
            {{ __('messages.enquiry_msg') }}
          </p>
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
      (() => {
        // Renamed all variables to avoid conflicts
        const form = document.getElementById("enquiryForm");
        const enquiryCountrySelect = document.getElementById("countrySelectEnquiry");
        const enquiryCountryList = document.getElementById("countryListEnquiry");
        const enquirySelectedCountry = document.getElementById("selectedCountryEnquiry");
        const enquiryContactNumber = document.getElementById("contactNumberEnquiry");
        const enquiryForm = document.getElementById("enquiryFormPage");
        const successPopup = document.getElementById("success-popup");
        const successClose = document.getElementById("success-btn");

        // Country data
        const enquiryCountryData = [
          { code: "+91", flag: "https://flagcdn.com/w20/in.png" },
          { code: "+1", flag: "https://flagcdn.com/w20/us.png" },
          { code: "+44", flag: "https://flagcdn.com/w20/gb.png" },
          { code: "+61", flag: "https://flagcdn.com/w20/au.png" },
          { code: "+971", flag: "https://flagcdn.com/w20/ae.png" },
        ];

        // Initialize selected country (default India)
        let enquirySelected = enquiryCountryData[0];
        updateEnquirySelectedCountry(enquirySelected);

        // Render country dropdown list
        function renderEnquiryCountryList() {
          enquiryCountryList.innerHTML = "";
          enquiryCountryData.forEach((country) => {
            const item = document.createElement("div");
            item.className =
              "p-2 flex items-center justify-between hover:bg-gray-100 cursor-pointer";

            const flag = document.createElement("img");
            flag.src = country.flag;
            flag.alt = country.code;
            flag.className = "w-5 h-auto";

            const code = document.createElement("span");
            code.textContent = country.code;

            item.appendChild(flag);
            item.appendChild(code);

            item.addEventListener("click", () => {
              enquirySelected = country;
              updateEnquirySelectedCountry(country);
              toggleEnquiryDropdown(false);
            });

            enquiryCountryList.appendChild(item);
          });
        }

        // Update displayed selected country
        function updateEnquirySelectedCountry(country) {
          enquirySelectedCountry.innerHTML = `
      <img src="${country.flag}" alt="${country.code}" class="w-5 h-auto">
      <span>${country.code}</span>
    `;
        }

        // Toggle dropdown visibility
        function toggleEnquiryDropdown(show = null) {
          const isHidden = enquiryCountryList.classList.contains("hidden");
          if (show === true || (show === null && isHidden)) {
            renderEnquiryCountryList();
            enquiryCountryList.classList.remove("hidden");
          } else {
            enquiryCountryList.classList.add("hidden");
          }
        }

        // Event handlers
        enquiryCountrySelect.addEventListener("click", (e) => {
          e.stopPropagation();
          toggleEnquiryDropdown();
        });

        document.addEventListener("click", () => toggleEnquiryDropdown(false));

        //  Phone number input validation (10 digits only)
        enquiryContactNumber.addEventListener("input", function () {
          this.value = this.value.replace(/[^0-9]/g, "");
          if (this.value.length > 10) this.value = this.value.slice(0, 10);
        });

        enquiryContactNumber.addEventListener("blur", function () {
          const errorMsg = this.parentNode.querySelector(".error-text-enquiry");
          if (this.value.length < 10) {
            if (!errorMsg)
              showEnquiryError(this, "Please enter a valid 10-digit number");
          } else if (errorMsg) {
            errorMsg.remove();
            this.classList.remove("border-red-500");
          }
        });

        // Utility: Show inline error
        function showEnquiryError(input, message) {
          input.classList.add("border-red-500");
          const errorEl = document.createElement("p");
          errorEl.className = "error-text-enquiry text-red-600 text-sm mt-1";
          errorEl.textContent = message;
          const container = input.closest("div") || input.parentNode;
          if (input.type === "tel")
            container.insertAdjacentElement("afterend", errorEl);
          else input.insertAdjacentElement("afterend", errorEl);
        }

        // Clear error when user types again
        enquiryForm.querySelectorAll("input").forEach((input) => {
          input.addEventListener("input", () => {
            input.classList.remove("border-red-500");
            const errorEl = input.parentNode.querySelector(".error-text-enquiry");
            if (errorEl) errorEl.remove();
          });
        });

        // Handle form submission (with API)
        enquiryForm.addEventListener("submit", async (e) => {
          e.preventDefault();

          // Remove old errors
          enquiryForm.querySelectorAll(".error-text-enquiry").forEach((el) => el.remove());
          let isValid = true;

          const enquiryFormData = {};
          enquiryForm.querySelectorAll("input").forEach((input) => {
            const value = input.value.trim();
            const placeholder = input.placeholder.toLowerCase();
            let error = "";

            if (!value) {
              error = `Please  ${placeholder}`;
            } else if (input.type === "email") {
              const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!emailPattern.test(value)) error = "Invalid email address";
            } else if (input.type === "tel" && value.length !== 10) {
              error = "Contact number must be 10 digits";
            }

            if (error) {
              showEnquiryError(input, error);
              isValid = false;
            }

            enquiryFormData[input.name] = value;
          });

          if (!isValid) return;
          successPopup.classList.remove("hidden");
          successClose.addEventListener("click", () => {
            successPopup.classList.add("hidden");
            enquiryForm.reset();
          });

          
          enquiryFormData.phone = `${enquirySelected.code}${enquiryFormData.contactNumber}`;

          // try {
          //   // Example API endpoint — replace with your backend URL
          //   const res = localStorage.setItem(
          //     "enquiryFormData",
          //     JSON.stringify(enquiryFormData)
          //   );
            // await fetch("https://example.com/api/enquiry", {
            //   method: "POST",
            //   headers: { "Content-Type": "application/json" },
            //   body: JSON.stringify(enquiryFormData),
            // });

            // if (!res.ok) throw new Error("Network response failed");

            // const data = await res.json();
          //   const data = localStorage.getItem("enquiryFormData");

          //   console.log("Server Response:", data);
          //   enquiryForm.reset();
          // } catch (error) {
          //   console.error("Error submitting form:", error);
          // }
        });
      })();
    </script>
@include('includes.footer')