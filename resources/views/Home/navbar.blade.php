   <header
      id="main-header"
      class="fixed w-full p-4 py-5 top-0 z-50 bg-white border-b border-borderDefault transition-all duration-300"
    >
      <div class="w-full mx-auto flex items-center justify-between">
        <a href="/" class="flex items-center">
          <img
            id="header-logo"
            src="{{asset('images/carent-logo.png')}}"
            alt="CarRent Logo"
            class="h-12 w-auto md:h-16 lg:h-20"
          />
        </a>

        <nav class="hidden md:flex items-center space-x-6 text-textPrimary">
          <a href="/" class="hover:text-primaryHover"> {{__('messages.home')}} </a>
          <a href="{{route('pages.about-us')}}" class="hover:text-primaryHover"> {{__('messages.about_us')}} </a>
          <a href="{{route('pages.my-booking')}}"  class="hover:text-primaryHover hidden"
            id="my-bookings" > {{__('messages.my_bookings')}}
            </a
          >

          <div
            id="language-trigger"
            class="relative cursor-pointer hover:text-primaryHover"
          >
           
            <span class="currency-selection">IN</span>
            | 
            <i class="fas fa-globe"></i> 
            @if(app()->getLocale() == 'en') 
              EN 
              @else
                FR
            @endif
           
          </div>

         <div class="register-container">
            <button
              onclick="Auth.open('login')"
              class="registerLog-button py-2 px-4 shadow-md rounded-lg hover:text-primaryHover"
            >
              {{__('messages.register_login')}}
            </button>
          </div>
        </nav>

        <button id="menu-btn" class="md:hidden flex flex-col space-y-1">
          <span class="w-6 h-0.5 bg-textPrimary"></span>
          <span class="w-6 h-0.5 bg-textPrimary"></span>
          <span class="w-6 h-0.5 bg-textPrimary"></span>
        </button>
      </div>

      <!-- mobile menu -->
      <div
        id="mobile-menu"
        class="hidden md:hidden flex flex-col space-y-4 px-4 pb-4 bg-white border-t border-borderDefault"
      >
        <a href="/" class="hover:text-primaryHover">{{__('messages.home')}}</a>
        <a href="{{route('pages.about-us')}}" class="hover:text-primaryHover">{{__('messages.about_us')}}</a>
        <a href="{{route('pages.my-booking')}}" class="hover:text-primaryHover hidden"
           id="my-bookings-mobile">
          {{__('messages.my_bookings')}}
          </a
        >

        <div
          id="mobile-language-trigger"
          class="relative cursor-pointer hover:text-primaryHover"
        >
         <span class="currency-selection">INR</span>|
          <i class="fas fa-globe"></i>
           @if(app()->getLocale() == 'en') 
              EN 
              @else
                FR
            @endif
            
        </div>

        <div class="register-container">
            <button
              onclick="Auth.open('login')"
              class="registerLog-button py-2 px-4 shadow-md rounded-lg hover:text-primaryHover"
            >
             {{__('messages.register_login')}}
            </button>
          </div>
      </div>
      <!-- language model hidden -->
      <div
        id="language-modal"
        class="fixed inset-0 z-[100] bg-black bg-opacity-50 flex justify-center items-center hidden"
      >
        <div
          class="relative bg-bgPrimary p-4 rounded-lg shadow-xl w-[90%] md:w-[75%] lg:w-[60%] max-w-2xl"
         >
          <i
            class="fa fa-times absolute top-1 right-2 text-textSecondary hover:text-primaryHover cursor-pointer"
            id="languageModal-close"
          ></i>
          
          <!-- buttons -->
          <div class="w-full flex justify-start items-center gap-2 flex-wrap">
            <button
              id="currency-tab-btn"
              class="py-2 px-4 bg-borderDefault rounded-2xl text-sm font-medium text-bgPrimary transition-colors duration-200"
            >
              <i class="fas fa-coins mr-2"></i> {{__('messages.currency')}}
            </button>
               <button
              id="lang-tab-btn"
              class="py-2 px-4 bg-borderDefault rounded-2xl text-sm font-medium text-bgPrimary transition-colors duration-200"
            >
              <i class="fas fa-globe mr-2"></i> {{__('messages.language_region')}}
            </button>

            <div class="w-full sm:w-fit my-4">
              <input
                type="hidden"
                id="country-search"
                placeholder="Search for a country..."
                class="w-full px-4 py-2 border border-borderDefault rounded-lg focus:outline-none focus:ring-1 focus:ring-primary"
              />
            </div>
          </div>

          <h2 id="heading-text" class=""></h2>

          <!-- language content -->
          <div id="lang-tab-content" class="tab-content">
            <div
              id="country-list"
              class="h-64 overflow-y-auto flex flex-wrap justify-start"
            ></div>
          </div>

          <!-- currency content -->
          <div id="currency-tab-content" class="tab-content hidden">
            <div
              id="currency-list"
              class="h-64 overflow-y-auto flex flex-wrap justify-start"
            ></div>
          </div>

          <div class="flex justify-end mt-6">
            <button
              id="apply-btn"
              class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-primaryHover transition-colors duration-200"
            >
              {{__('messages.apply')}}
            </button>
          </div>
        </div>
      </div>

      <!-- Auth Popup -->
      <div
        id="auth-popup"
        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 hidden"
      >
        <div
          class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm relative"
          role="dialog"
          aria-labelledby="auth-title"
          aria-modal="true"
        >
          <!-- Close -->
          <button
            onclick="Auth.close()"
            class="absolute top-3 right-3 text-textSecondary hover:text-primaryHover"
            aria-label="Close"
          >
            ✕
          </button>

          <!-- Header -->
          <div class="text-center">
            <h2
              id="auth-title"
              class="text-[#252525] text-2xl font-bold flex gap-1"
            >
              <span id="auth-title-text"></span>
              <img
                src="{{asset('images/carent-logo.png')}}"
                alt="Carent Logo"
                class="w-20 h-auto"
              />
            </h2>
            <p id="auth-subtitle" class=""></p>
          </div>

          <!-- Dynamic form -->
          <form
            onsubmit="event.preventDefault(); UserSession.login(this); UserSession.userRegister(this); Auth.close()"
            id="auth-form"
            class="space-y-3 flex flex-col justify-center items-center"
          ></form>

          <!-- Footer -->
          <p class="text-[#999999] text-xs text-center mt-6">
            {{__('messages.see_our_policy')}}
            <a
              href="{{route('pages.terms-conditions')}}"
              class="text-textPrimary font-medium hover:text-primary underline"
            >
              {{__('messages.terms_conditions')}}
            </a>
          </p>
        </div>
      </div>
      


      <!-- Profile Sidebar -->
      <div
        id="profile-popup" 
        class="hidden fixed top-20 md:top-24 border border-borderDefault rounded-lg right-4 h-fit w-56 bg-white z-50 transform transition-transform duration-300 ease-in-out p-3 space-y-3"
      >
        <div
          class="flex items-center gap-3 p-2 border border-borderDefault rounded-md cursor-pointer" 
          id="sidebar-language"
        >
          <i class="fas fa-globe"></i>
          <p class="text-md">
            Language
            <span class="text-textSecondary text-xs pl-2" id="profile-language">
              @if(app()->getLocale() == 'en') 
              EN 
              @else
                FR
            @endif
            </span>
          </p>
        </div>

        <div
          class="flex items-center gap-3 p-2 border border-borderDefault rounded-md cursor-pointer"
          id="sidebar-currency"
        >
          <i class="fa-solid fa-money-check-dollar"></i>
          <p class="text-md">
            {{ __('messages.currency') }}
            <span class="text-textSecondary text-xs pl-2" id="profile-currency"
              >IN</span
            >
          </p>
        </div>

        <a
          href="{{route('pages.contact-us')}}"
          class="flex items-center p-2 gap-3 border border-borderDefault rounded-md"
        >
          <i class="fa-solid fa-phone"></i>

          <span class="text-md" >{{ __('messages.contact_us') }}</span>
        </a>

        <a
          href="{{route('pages.terms-conditions')}}"
          class="flex items-center p-2 gap-3 border border-borderDefault rounded-md"
        >
          <!-- <i class="fas fa-globe"></i> -->
          <img
            src="{{asset('images/term&condition.svg')}}"
            alt="ters condition"
            width="20"
          />

          <span class="text-md" >{{ __('messages.terms_conditions') }}</span>
        </a>

        <a
          href="{{route('pages.feedback')}}"
          class="flex items-center p-2 gap-3 border border-borderDefault rounded-md"
        >
          <i class="fa-solid fa-comment"></i>

          <span class="text-md" >{{ __('messages.feedback') }}</span>
        </a>

        <div
          id="rate-us"
          class="flex items-center p-2 gap-3 border border-borderDefault rounded-md cursor-pointer"
        >
          <i class="fa-solid fa-star"></i>

          <span class="text-md" >{{ __('messages.rate_us') }}</span>
        </div>

        <button
          onclick="UserSession.logout()"
          class="text-bgPrimary bg-primary hover:bg-primaryHover p-2 w-full rounded-xl"
        >
          {{ __('messages.logout') }}
        </button>
      </div>

      <!-- rate us  -->
      <div
        id="rate-modal"
        class="hidden fixed inset-0 z-[100] bg-black bg-opacity-50 flex justify-center items-center"
      >
        <div
          class="bg-white w-[90%] sm:w-[400px] rounded-2xl p-6 relative flex flex-col items-center text-center"
        >
          <!-- Close Button -->
          <button
            id="close-rateUs"
            class="absolute top-0 right-3 text-textSecondary hover:text-primary text-2xl"
          >
            &times;
          </button>

          <!-- Title -->
          <h1 class="text-xl sm:text-2xl">
            {{ __('messages.please_rate_us') }}
          </h1>
          <p class="text-textSecondary text-sm sm:text-base my-4">
            {{ __('messages.rate_us_desc') }}
          </p>

          <!-- Stars -->
          <div
            id="stars"
            class="flex justify-center gap-3 text-3xl sm:text-4xl text-borderDefault"
          >
            <i class="fa fa-star cursor-pointer" data-value="1"></i>
            <i class="fa fa-star cursor-pointer" data-value="2"></i>
            <i class="fa fa-star cursor-pointer" data-value="3"></i>
            <i class="fa fa-star cursor-pointer" data-value="4"></i>
            <i class="fa fa-star cursor-pointer" data-value="5"></i>
          </div>

          <!-- Feedback Input -->
           <div class="w-full my-5">
            <textarea
              id="feedback"
              rows="4"
              class="w-full border border-borderDefault rounded-lg p-3 text-sm sm:text-base focus:ring-1 focus:ring-primary focus:outline-none resize-none"
              placeholder="Write your feedback here..."
            ></textarea>
          </div>

          <!-- Submit Button -->
          <button
            id="submit-rating"
            class="w-fit bg-[#006AFF] hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-medium transition"
          >
            {{ __('messages.submit_feedback') }}
          </button>
        </div>
      </div>
    </header>
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
            {{ __('messages.request_sent') }}
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
