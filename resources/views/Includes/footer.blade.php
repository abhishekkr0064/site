    <!-- Footer Section -->
    <footer class="w-full mx-auto bg-textPrimary text-bgPrimary p-4 lg:p-6 ">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
        <!-- Logo & Description -->
        <div class="max-w-[350px]">
          <img src="{{asset('images/carent-logo.png')}}" alt="Logo" class="h-12 mb-5" />
          <p class="text-sm text-textSecondary">
            {{__('messages.footer_description')}}
          </p>
        </div>

        <!-- Explore -->
        <div>
          <h3 class="text-lg font-semibold mb-4">{{__('messages.explore')}}</h3>
          <ul class="space-y-2 text-textSecondary">
            <li>
              <a href="{{ route('pages.about-us') }}" class="hover:text-red-500">{{__('messages.about_us')}}</a>
            </li>
            <li><a href="#" class="hover:text-red-500">{{__('messages.blog')}}</a></li>
            <li>
              <a href="{{route('pages.contact-us')}}" class="hover:text-red-500"
                >
                {{__('messages.contact_us')}}</a
              >
            </li>
          </ul>
        </div>

        <!-- Contact -->
        <div>
          <h3 class="text-lg font-semibold mb-4">{{__('messages.contact_us')}} </h3>
          <ul class="space-y-3 text-textSecondary">
            <li class="flex items-center space-x-3">
              <i class="fas fa-map-marker-alt text-textSecondary"></i>
              <span>Ajmer, India</span>
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-envelope text-textSecondary"></i>
              <a href="mailto:bookings@carent-me.com" class="hover:text-primary"
                >bookings@carent-me.com</a
              >
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-phone text-textSecondary"></i>
              <a href="tel:+1234567890" class="hover:text-primary"
                >+1 234 567 890</a
              >
            </li>
          </ul>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-semibold mb-4">{{__('messages.quick_links')}}</h3>
          <ul class="space-y-2 text-textSecondary">
            <li>
              <a href="{{route('pages.terms-conditions')}}" class="hover:text-red-500">{{__('messages.terms_conditions')}}</a>
            </li>
            <li><a href="#" class="hover:text-red-500">{{__('messages.privacy_policy')}}</a></li>
          </ul>
          <!-- Social Media -->
          <div class="flex space-x-4 mt-8">
            <a href="#" class="hover:text-red-500"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a href="#" class="hover:text-red-500"
              ><i class="fab fa-twitter"></i
            ></a>
            <a href="#" class="hover:text-red-500"
              ><i class="fab fa-instagram"></i
            ></a>
            <a href="#" class="hover:text-red-500"
              ><i class="fab fa-linkedin-in"></i
            ></a>
          </div>
        </div>
      </div>

      <!-- App Store & Play Store Buttons -->
      <div class="overflow-hidden flex items-end justify-end gap-4 mt-5">
        <a
          href="https://www.apple.com/app-store/"
          class="flex items-center bg-bgPrimary text-textPrimary space-x-2 py-1 px-2 rounded-lg"
        >
          <i class="fab fa-apple text-2xl"></i>
          <span class="text-xs"
            >Download on the <br /><strong>App Store</strong></span
          >
        </a>
        <a
          href="https://play.google.com/store/games?device=windows"
          class="flex items-center bg-white text-textPrimary space-x-4 py-1 px-2 rounded-lg"
        >
          <img src="{{asset('images/playstore.svg')  }}" alt="playstore" />
          <span class="text-xs font-outfit"
            >Get it on <br /><strong>Google Play</strong></span
          >
        </a>
      </div>

      <!-- Bottom Text -->
      <div class="mt-10 text-center text-textSecondary text-sm">
        © 2025 CarEnt. All rights reserved.
      </div>
    </footer>
    <!-- WhatsApp Button (Bottom Left) -->
    <a
      href="https://wa.me/1234567890"
      target="_blank"
      class="fixed bottom-5 left-5 rounded-bl-[50px] rounded-br-[50px] rounded-tl-xl rounded-tr-[50px] bg-[#25D366] p-[11px] text-white shadow md:p-4 z-50"
    >
      <svg
        stroke="currentColor"
        fill="currentColor"
        stroke-width="0"
        viewBox="0 0 24 24"
        height="28"
        width="28"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"
        ></path>
      </svg>
    </a>
   <!-- Request a Callback Button (Right Side Vertical) -->
    <div class="w-full flex justify-end">
      <button
        id="callbackBtn"
        onclick="openModal()"
        class="hidden fixed top-1/2 -right-14 -translate-y-1/2 -rotate-90 bg-primary text-bgPrimary text-sm px-3 py-2 rounded-t-lg hover:bg-primaryHover transition z-50"
      >
        {{__('messages.request_a_call_back')}}
      </button>
    </div>

    <!-- Modal Background -->
    <div
      id="callbackModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
      <!-- Modal Content -->
      <div class="bg-white w-11/12 max-w-sm rounded-2xl shadow-lg p-6 relative">
        <!-- Close Button -->
        <button
          onclick="closeModal()"
          class="absolute top-3 right-3 text-gray-500 hover:text-red-600"
        >
          <i class="fas fa-times text-xl"></i>
        </button>

        <div>
          <h2 class="text-2xl font-bold text-textPrimary">
            {{__('messages.request_a_call_back')}}
          </h2>
          <p class="text-sm text-textSecondary my-2">
            {{__('messages.fill_details_below')}}
          </p>
        </div>

        <!-- Callback Form -->
        <form class="space-y-4">
          <div
             class="w-full flex items-center gap-2 border border-borderDefault rounded-lg"
            >

            <i class="fas fa-user text-textSecondary pl-2"></i>
            <input
              type="text"
              name="name"
              class="w-full h-full p-2 border-none focus:outline-none focus:ring-0 rounded-r-lg"
              placeholder="{{__('messages.enter_your_name')}}"
              required
            />
          </div>

          <div
            class="w-full flex items-center gap-2 border border-gray-300 rounded-lg"
          >
            <i class="fas fa-phone text-textSecondary pl-2"></i>
            <input
              type="number"
              name="phone"
              class="w-full h-full p-2 border-none focus:outline-none focus:ring-0 rounded-r-lg"
              placeholder="{{__('messages.phone')}}"
              required
            />
          </div>

          <div
            class="w-full flex items-center gap-2 border border-gray-300 rounded-lg"
          >
            <i class="fas fa-envelope text-textSecondary pl-2"></i>
            <input
              type="email"
              name="email"
              class="w-full h-full p-2 border-none focus:outline-none focus:ring-0 rounded-r-lg"
              placeholder="{{__('messages.email_add')}}"
              required
            />
          </div>

          <div
            class="w-full flex items-center gap-2 border border-gray-300 rounded-lg"
          >
            <i class="fas fa-map-marker-alt text-textSecondary pl-2"></i>
            <input
              type="text"
              name="from_location"
              class="w-full h-full p-2 border-none focus:outline-none focus:ring-0 rounded-r-lg"
              placeholder="{{__('messages.from_location')}}"
              required
            />
          </div>

          <div
            class="w-full flex items-center gap-2 border border-gray-300 rounded-lg"
          >
            <i class="fas fa-map-marker-alt text-textSecondary pl-2"></i>
            <input
              type="text"
              name="to_location"
              class="w-full h-full p-2 border-none focus:outline-none focus:ring-0 rounded-r-lg"
              placeholder="{{__('messages.to_location')}}"
              required
            />
          </div>

          <div
            class="w-full flex items-center gap-2 border border-gray-300 rounded-lg"
          >
            <textarea
              name="message"
              id=""
              class="w-full h-full p-2 border-none focus:outline-none focus:ring-0 rounded-lg"
              placeholder="{{__('messages.message')}}"
              required
            ></textarea>
          </div>

          <button
            type="submit"
            class="w-full bg-primary text-bgPrimary py-2 rounded-lg hover:bg-primaryHover transition"
          >
            {{__('messages.submit')}}
          </button>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- @vite(['resources/js/script.js']) --}}
    @include('includes.localization')
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
