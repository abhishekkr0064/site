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
          id="enquiryForm"
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
                placeholder="Enter starting location"
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
                placeholder="Enter destination"
                class="w-full rounded-lg p-2.5 border border-borderDefault focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>

            <!-- Contact Number -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.contact_number') }}
              </label>
              <input
                type="tel"
                name="contact"
                 oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length>10)this.value=this.value.slice(0,10);"
                maxlength="10"
                placeholder="Enter contact number"
                class="w-full rounded-lg p-2.5 border border-borderDefault focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
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
                placeholder="Enter email address"
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
    <script>
      document
        .getElementById("enquiryForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const form = e.target;
          let isValid = true;

          // Remove previous error messages
          form.querySelectorAll(".error-text").forEach((el) => el.remove());
          form
            .querySelectorAll("input")
            .forEach((input) => input.classList.remove("border-red-500"));

          form.querySelectorAll("input").forEach((input) => {
            const value = input.value.trim();
            let error = "";

            if (!value) {
              error = `Please  ${input.placeholder.toLowerCase()}`;
            } else if (input.type === "tel") {
              if (!/^[0-9]{10}$/.test(value)) {
                error = "Please enter a valid 10-digit contact number";
              }
            } else if (input.type === "email") {
              const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!emailPattern.test(value)) {
                error = "Please enter a valid email address";
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
            alert("Enquiry submitted successfully ✅");
            form.reset();
          }
        });

      // Clear error when user types again
      document.querySelectorAll("#enquiryForm input").forEach((input) => {
        input.addEventListener("input", () => {
          input.classList.remove("border-red-500");
          const errorEl = input.parentNode.querySelector(".error-text");
          if (errorEl) errorEl.remove();
        });
      });
    </script>
@include('includes.footer')
