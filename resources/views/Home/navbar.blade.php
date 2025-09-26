 <header
      id="main-header"
      class="sticky top-0 z-50 bg-white border-b border-borderDefault transition-all duration-300 !pb-0">
      <div
        class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3"
      >
        <a href="#" class="flex items-center">
          <img
            src="{{asset('images/carent-logo.png')}}"
            alt="CarRent Logo"
            class="h-12 w-auto md:h-16 lg:h-20"
          />
        </a>

        <nav class="hidden md:flex items-center space-x-6 text-textPrimary">
          <a href="#" class="hover:text-primaryHover">Home</a>
          <a href="#" class="hover:text-primaryHover">About Us</a>
          <a href="#" class="hover:text-primaryHover">My Booking</a>

          <div
            id="language-trigger"
            class="relative cursor-pointer hover:text-primaryHover"
          >
            <i class="fas fa-globe"></i> EN | IN
          </div>

          <a
            href="#"
            class="py-2 px-4 shadow-md rounded-lg hover:text-primaryHover"
            >Register / Login</a
          >
        </nav>

        <button id="menu-btn" class="md:hidden flex flex-col space-y-1">
          <span class="w-6 h-0.5 bg-textPrimary"></span>
          <span class="w-6 h-0.5 bg-textPrimary"></span>
          <span class="w-6 h-0.5 bg-textPrimary"></span>
        </button>
      </div>

      <div
        id="mobile-menu"
        class="hidden md:hidden flex flex-col space-y-4 px-4 pb-4 bg-white border-t border-borderDefault"
      >
        <a href="#" class="hover:text-primaryHover">Home</a>
        <a href="#" class="hover:text-primaryHover">About Us</a>
        <a href="#" class="hover:text-primaryHover">My Booking</a>
        <div
          id="language-trigger"
          class="relative cursor-pointer hover:text-primaryHover"
        >
          <i class="fas fa-globe"></i> EN | IN
        </div>

        <a
          href="#"
          class="py-2 px-4 shadow-md rounded-lg hover:text-primaryHover"
          >Register / Login</a
        >
      </div>
    </header>

  <div
      id="language-modal"
      class="hidden fixed inset-0 z-[100] bg-black bg-opacity-50 flex justify-center items-center"
    >
    <div
        class="bg-white p-6 rounded-lg shadow-xl w-[90%] md:w-[75%] lg:w-[60%] max-w-2xl"
      >
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-semibold text-textPrimary">Select Options</h3>
          <button
            id="close-modal-btn"
            class="text-textSecondary hover:text-primary font-bold text-2xl"
          >
            &times;
          </button>
        </div>

        <div class="flex border-b border-borderDefault mb-4">
          <button
            id="lang-tab-btn"
            class="flex-1 py-3 px-2 text-center text-sm font-medium border-b-2 border-primary text-primary transition-colors duration-200"
          >
            <i class="fas fa-globe mr-2"></i> Language & Region
          </button>
          <button
            id="currency-tab-btn"
            class="flex-1 py-3 px-2 text-center text-sm font-medium border-b-2 border-transparent text-textSecondary hover:text-textPrimary transition-colors duration-200"
          >
            <i class="fas fa-coins mr-2"></i> Currency
          </button>
        </div>

        <div id="lang-tab-content" class="tab-content">
          <div class="mb-4">
            <input
              type="text"
              id="country-search"
              placeholder="Search for a country..."
              class="w-full px-4 py-2 border border-borderDefault rounded-lg focus:outline-none focus:ring-1 focus:ring-primary"
            />
          </div>

          <div id="country-list" class="h-64 overflow-y-auto"></div>
        </div>

        <div id="currency-tab-content" class="tab-content hidden">
          <h4 class="text-lg font-semibold mb-2">Select Currency</h4>
          <div class="space-y-2">
            <div class="flex items-center space-x-2">
              <input
                type="radio"
                id="usd"
                name="currency"
                value="USD"
                checked
                class="text-primary focus:ring-primary"
              />
              <label for="usd">USD - US Dollar</label>
            </div>
            <div class="flex items-center space-x-2">
              <input
                type="radio"
                id="inr"
                name="currency"
                value="INR"
                class="text-primary focus:ring-primary"
              />
              <label for="inr">INR - Indian Rupee</label>
            </div>
          </div>
        </div>

        <div class="flex justify-end mt-6">
          <button
            id="apply-btn"
            class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-primaryHover transition-colors duration-200"
          >
            Apply
        </button>
      </div>
    </div>
  </div>