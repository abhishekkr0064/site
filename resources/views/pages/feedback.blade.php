@include('includes/header')
@include('home/navbar')
<nav class="mb-6 px-4 mt-32">
      <ol class="flex items-center space-x-2 text-sm text-textSecondary">
        <li><a href="/" class="hover:text-blue-600">
          {{ __('messages.home') }}</a></li>
        <li>/</li>
        <li>
          {{ __('messages.feedback') }}
        </li>
      </ol>
    </nav>

    <main class="flex justify-between md:gap-5 lg:gap-10 xl:gap-20 m-5">
      <div class="">
        <h1 class="text-2xl font-bold">
          {{ __('messages.what_about') }}
          <span class="text-primary">CARENT</span>
        </h1>
        <p class="my-4">
          {{ __('messages.contact_us_desc') }}
        </p>

        <form id="feedbackForm" class="space-y-5 max-w-2xl mx-auto">
          <h2 class="text-xl font-semibold">
            {{ __('messages.enter_details') }}
          </h2>

          <div class="sm:grid grid-cols-2 gap-4 space-y-3 sm:space-y-0">
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.first_name') }}
              </label>
              <input
               id="firstName"
                type="text"
                name=" {{ __('messages.first_name') }}"
                placeholder="{{ __('messages.first_name') }}"
                class="inputValue w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                
              />
               <p class="text-red-500 text-xs mt-1 hidden error-msg"></p>
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.last_name') }}
              </label>
              <input
               id="lastName"
               name=" {{ __('messages.last_name') }}"
                 placeholder="{{ __('messages.last_name') }}"
                class="inputValue w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                
              />
               <p class="text-red-500 text-xs mt-1 hidden error-msg"></p>
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.email_add') }}
              </label>
              <input
                 id="email"
                 name=" {{ __('messages.email_add') }}"
                type="email"
                placeholder="{{ __('messages.email_add') }}"
                class="inputValue w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                
              />
               <p class="text-red-500 text-xs mt-1 hidden error-msg"></p>
            </div>

            <div id="contactNumberField">
              <label class="block text-sm font-medium mb-1">{{ __('messages.contact_number') }}</label>
              
              <div class="flex items-stretch w-full border border-borderDefault rounded-lg focus-within:ring-1 focus-within:ring-primary focus-within:outline-none" id="phoneInputContainer">
               <div class="relative flex-shrink-0">
                <!-- Country selector button -->
                <button 
                  type="button"
                  id="countryDropdownButton"
                  class="h-10 flex items-center justify-between px-3 bg-gray-100 hover:bg-gray-200 rounded-l-lg w-[100px]"
                >
                  <div class="flex items-center justify-between w-full">
                    <img id="selectedFlag" src="https://flagcdn.com/w20/in.png" alt="IN" class="w-5 h-3">
                    <span id="selectedCode" class="text-sm font-medium ml-2">+91</span>
                    <svg class="w-4 h-4 text-gray-500 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </div>
                </button>

                <!-- Dropdown menu -->
                <div 
                  id="countryDropdown"
                  class="hidden absolute top-full left-0 mt-1 bg-white border border-borderDefault rounded-lg shadow-lg z-50 max-h-60 overflow-y-auto w-[120px]"
                >
                  <div class="p-2 space-y-1">
                    <div class="country-option flex items-center justify-between p-2 hover:bg-gray-100 rounded cursor-pointer" data-code="+91" data-flag="https://flagcdn.com/w20/in.png">
                      <img src="https://flagcdn.com/w20/in.png" alt="India" class="w-5 h-3">
                      <span class="text-sm font-medium">+91</span>
                    </div>
                    <div class="country-option flex items-center justify-between p-2 hover:bg-gray-100 rounded cursor-pointer" data-code="+1" data-flag="https://flagcdn.com/w20/us.png">
                      <img src="https://flagcdn.com/w20/us.png" alt="USA" class="w-5 h-3">
                      <span class="text-sm font-medium">+1</span>
                    </div>
                    <div class="country-option flex items-center justify-between p-2 hover:bg-gray-100 rounded cursor-pointer" data-code="+44" data-flag="https://flagcdn.com/w20/gb.png">
                      <img src="https://flagcdn.com/w20/gb.png" alt="UK" class="w-5 h-3">
                      <span class="text-sm font-medium">+44</span>
                    </div>
                    <div class="country-option flex items-center justify-between p-2 hover:bg-gray-100 rounded cursor-pointer" data-code="+61" data-flag="https://flagcdn.com/w20/au.png">
                      <img src="https://flagcdn.com/w20/au.png" alt="Australia" class="w-5 h-3">
                      <span class="text-sm font-medium">+61</span>
                    </div>
                    <div class="country-option flex items-center justify-between p-2 hover:bg-gray-100 rounded cursor-pointer" data-code="+971" data-flag="https://flagcdn.com/w20/ae.png">
                      <img src="https://flagcdn.com/w20/ae.png" alt="UAE" class="w-5 h-3">
                      <span class="text-sm font-medium">+971</span>
                    </div>
                  </div>
                </div>
              </div>

                <div class="flex-1">
                  <input
                    id="contactNumber"
                    type="tel"
                    name="{{ __('messages.contact_number') }}"
                    placeholder="{{ __('messages.contact_number') }}"
                    maxlength="10"
                    oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                    class="inputValue w-full h-full p-2 focus:ring-0 focus:outline-none rounded-r-lg"
                    
                  />
                </div>
              </div>
              <p class="text-red-500 text-xs mt-1 hidden error-msg"></p>
            </div>
          </div>

          <div>
           <label class="block text-gray-700 text-sm font-medium mb-1">
              {{ __('messages.your_feedback') }}
            </label>
            <textarea
              id="feedback"
              name="{{ __('messages.your_feedback') }}"
              rows="4"
              placeholder="{{ __('messages.write_your_feedback') }}"
               class="inputValue w-full border border-borderDefault rounded-lg p-3 focus:ring-1 focus:ring-primary focus:outline-none"
              
            ></textarea>
             <p class="text-red-500 text-xs mt-1 hidden error-msg"></p>
          </div>

          <button
            type="submit"
             class="w-full lg:w-fit bg-[#006AFF] hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition"
              >
           {{ __('messages.submit_feedback') }}
          </button>
        </form>
      </div>

      <div
        class="p-4 border border-borderDefault rounded-lg hidden md:flex flex-col h-[610px] overflow-y-auto"
      >
        <h1 class="text-xl">
          {{ __('messages.contact_us') }}
        </h1>
        <p class="my-4">
          {{ __('messages.wel') }}
        </p>
        <div id="contact-us" class=""></div>
      </div>
    </main>
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
            {{ __('messages.success_msg') }}
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
      // Renamed all variables to avoid conflicts
      const feedbackContainer = document.getElementById("contact-us");
      const feedbackSuccessPopup = document.getElementById("success-popup");
      const feedbackSuccessClose = document.getElementById("success-btn");

      // Country dropdown functionality
      const countryDropdownButton = document.getElementById('countryDropdownButton');
      const countryDropdown = document.getElementById('countryDropdown');
      const selectedFlag = document.getElementById('selectedFlag');
      const selectedCode = document.getElementById('selectedCode');
      const countryOptions = document.querySelectorAll('.country-option');
      const phoneInputContainer = document.getElementById('phoneInputContainer'); // New container for border/focus styling
      const contactNumberInput = document.getElementById('contactNumber'); // The actual input

      // Toggle dropdown
      countryDropdownButton.addEventListener('click', function(e) {
        e.stopPropagation();
        countryDropdown.classList.toggle('hidden');
      });

      // Select country option
      countryOptions.forEach(option => {
        option.addEventListener('click', function() {
          const code = this.getAttribute('data-code');
          const flag = this.getAttribute('data-flag');
          
          selectedFlag.src = flag;
          selectedCode.textContent = code;
          countryDropdown.classList.add('hidden');
        });
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!countryDropdownButton.contains(e.target) && !countryDropdown.contains(e.target)) {
          countryDropdown.classList.add('hidden');
        }
      });

      // Close dropdown on scroll (for mobile)
      window.addEventListener('scroll', function() {
        countryDropdown.classList.add('hidden');
      });

      // Reusable icons
      const feedbackIcons = {
        email: `<svg class="w-5 h-5 text-blue-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/><path d="M12 14v7m0-7H5m7 0h7"/></svg>`,
        phone: `<svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.129a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>`,
        location: `<svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 11c0 .552-.224 1.05-.586 1.414A1.993 1.993 0 0110 13c-1.105 0-2-.895-2-2 0-.551.224-1.05.586-1.414A1.993 1.993 0 0110 9c1.105 0 2 .895 2 2z"/><path d="M12 2C8.134 2 5 5.134 5 9c0 7 7 13 7 13s7-6 7-13c0-3.866-3.134-7-7-7z"/></svg>`,
      };

      // contact data
      const feedbackContacts = [
        {
          country: "ABIDJAN",
          email:
            "vikasvijay@satgurutravel.com, rentalcar.abj@satgurutravel.com",
          phone: "+( +225) 0141499954, Tel: (+225) 2720210968",
          address:
            "Rez-de-chaussee immeuble JECEDA 01 BP 2562 Abidjan 01, Abidjan , Cote d'ivoire",
        },
        {
          country: "BURKINA",
          email: "rentalcaroua@satgurutravel.com",
          phone: "+(226) 74515151",
          address:
            "Dr KWAME N' Krumah - Imm. Immeuble Sodife 01 BP 4883 Ouagadougou 01 – Burkina Faso",
        },
        {
          country: "SENEGAL",
          email: "reservation.sn@thecarent.com",
          phone:
            "+(221) 773328591, (221) 787916536 , (221) 338569999, (221)338569898",
          address:
            "Ancienne Piste x Commissariat du Tourisme Lo 44 Merrmoz Pyrotechnique BP: 48117 – Dakar (Senegal)",
        },
        {
          country: "LOME",
          email:
            "carrentallome@satgurutravel.com, vkarani@satgurutravel.com, pdaryani@satgurutravel.com",
          phone: "+228 22208801/02 , +228 93551511 , 93296132",
          address:
            "Immeuble P. THERESE, Boulevard du 13 Janvier Rue des Femmes Savantes, BP : 20640 Lomé - TOGO",
        },
        {
          country: "NIAMEY",
          email:
            "nim.carrental@satgurutravel.com, niamey.carrental@satgurutravel.com",
          phone: "+227 90906512/39 , 95906509",
          address: "Face Lyceé La Fontaine, BP: 11 114 Niamey – Niger",
        },
        {
          country: "MOROCCO",
          email: "morocco@thecarent.com",
          phone: "+(212) 666464812 , (212) 520522386",
          address:
            "94, Rue Jean Jaurès, Quartier Gauthier 20100 Casablanca, Morocco",
        },
        {
          country: "MALI",
          email: "support@carent.com",
          phone: "+223 76212024 , +223 65797951",
          address:
            "Immeuble SATGURU, Rue 239, En face de la Bibliothèque Nationale, B.P.E 1991, Bamako",
        },
      ];

      //   function for contact us
      feedbackContacts.forEach((contact) => {
        const feedbackCard = document.createElement("div");
        feedbackCard.className = "mt-4";
        feedbackCard.innerHTML = `
              <h2 class="text-textPrimary mb-4">${contact.country}</h2>
              <ul class="space-y-3 text-sm md:text-md ml-5 md:ml-10">
                <li class="flex items-start">${feedbackIcons.email}<span>${contact.email}</span></li>
                <li class="flex items-start">${feedbackIcons.phone}<span>${contact.phone}</span></li>
                <li class="flex items-start">${feedbackIcons.location}<span>${contact.address}</span></li>
              </ul>
            `;
        feedbackContainer.appendChild(feedbackCard);
      });

      // client side validation

      // Helper function to show an error message
      function feedbackShowError(inputElement, message) {
        // Find the main container (either the div with id or div that contains the label)
        let container = inputElement.closest("div[id], div:has(label)");

        // Special handling for the combined phone field
        if (inputElement.id === "contactNumber") {
            container = document.getElementById("contactNumberField");
            // Highlight the combined input container
            phoneInputContainer.classList.add("border-red-500");
            phoneInputContainer.classList.remove("border-borderDefault");
        } else {
            // Highlight single input border
            inputElement.classList.add("border-red-500");
            inputElement.classList.remove("border-borderDefault");
        }

        // Find and display the error message
        const feedbackErrorMsg = container.querySelector(".error-msg");

        if (feedbackErrorMsg) {
          feedbackErrorMsg.textContent = message;
          feedbackErrorMsg.classList.remove("hidden");
        }
      }

      // Helper function to hide an error message
      function feedbackHideError(inputElement) {
        let container = inputElement.closest("div[id], div:has(label)");
        
        // Special handling for the combined phone field
        if (inputElement.id === "contactNumber") {
            container = document.getElementById("contactNumberField");
            // Remove highlight from the combined input container
            phoneInputContainer.classList.remove("border-red-500");
            phoneInputContainer.classList.add("border-borderDefault");
        } else {
             // Remove highlight from single input border
            inputElement.classList.remove("border-red-500");
            inputElement.classList.add("border-borderDefault");
        }

        const feedbackErrorMsg = container.querySelector(".error-msg");

        if (feedbackErrorMsg) {
          feedbackErrorMsg.textContent = "";
          feedbackErrorMsg.classList.add("hidden");
        }
      }

      // Main validation function
      function feedbackValidateForm() {
        let feedbackIsValid = true;
        const feedbackForm = document.getElementById("feedbackForm");
        const feedbackInputs = feedbackForm.querySelectorAll(".inputValue"); // Selects all required inputs

        // Email validation regex (simple check)
        const feedbackEmailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        feedbackInputs.forEach((input) => {
          // 1. Clear previous errors
          feedbackHideError(input);

          // 2. Check for required fields (empty value)
          if (input.value.trim() === "") {
            feedbackShowError(
              input,
               `${input.name.charAt(0) + input.name.slice(1).replace(/([A-Z])/g, " $1").toLowerCase()
            } {{ __('messages.is_required') }}`
 
            );
            feedbackIsValid = false;
            return; // Move to the next input
          }

          // 3. Specific validation rules

          // Email validation
          if (input.id === "email" && !feedbackEmailRegex.test(input.value.trim())) {
            feedbackShowError(input, "{{ __('messages.email_msg') }}");
            feedbackIsValid = false;
          }

          // Phone number validation (min length 10)
          if (
            input.id === "contactNumber" &&
            input.value.trim().length !== 10
          ) {
            feedbackShowError(input, "{{ __('messages.contact_us_msg') }}");
            feedbackIsValid = false;
          }
        });

        return feedbackIsValid;
      }

      // Event listener for form submission
      document
        .getElementById("feedbackForm")
        .addEventListener("submit", function (event) {
          // Prevent default form submission
          event.preventDefault();

          if (feedbackValidateForm()) {
            feedbackSuccessPopup.classList.remove("hidden");
            feedbackSuccessClose.addEventListener("click", () => {
              feedbackSuccessPopup.classList.add("hidden");
            });
            this.reset();
          }
        });

      // Add validation on input blur (user leaves the field)
      document.querySelectorAll(".inputValue").forEach((input) => {
        input.addEventListener("blur", function () {
          if (this.value.trim() !== "") {
            feedbackValidateForm(); // Re-validate the whole form or just this field
          }
        });
      });
    </script>
 @include('includes/footer')