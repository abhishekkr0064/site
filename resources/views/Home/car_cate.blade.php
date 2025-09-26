    <!-- ===== Car Categories ===== -->
    <section class="py-12 px-4 w-full">
      <!-- Heading -->
      <div
        class="flex justify-center items-center flex-col text-center mb-10 px-4"
      >
        <h2
          class="text-primary text-3xl sm:text-3xl md:text-4xl mb-2 leading-snug"
        >
          A fleet that meets <span class="text-textSecondary">your needs</span>
        </h2>
        <p class="text-sm sm:text-base md:text-lg max-w-xl mx-auto">
          Take the opportunity to test the new models
        </p>
      </div>

      <!-- Swiper -->
      <div class="w-full mx-auto px-4">
        <div class="swiper categories-swiper dots-swiper">
          <div class="swiper-wrapper">
            <!-- Category Card -->

            <div class="swiper-slide flex justify-center">
              <div
                class="w-full max-w-xs sm:max-w-sm p-6 rounded-2xl text-center shadow-sm hover:shadow-xl transition bg-[#E8DDDC]/40"
              >
                <img
                  src="{{asset('images/brezza.svg')}}"
                  alt="SUV"
                  class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg mb-4"
                />
                <p class="font-medium text-base sm:text-lg md:text-xl">SUV</p>
              </div>
            </div>

            <div class="swiper-slide flex justify-center">
              <div
                class="w-full max-w-xs sm:max-w-sm p-6 rounded-2xl text-center shadow-sm hover:shadow-xl transition bg-[#E8DDDC]/40"
              >
                <img
                  src="{{asset('images/fortuner.svg')}}"
                  alt="Sedan"
                  class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg mb-4"
                />
                <p class="font-medium text-base sm:text-lg md:text-xl">Sedan</p>
              </div>
            </div>

            <div class="swiper-slide flex justify-center">
              <div
                class="w-full max-w-xs sm:max-w-sm p-6 rounded-2xl text-center shadow-sm hover:shadow-xl transition bg-[#E8DDDC]/40"
              >
                <img
                  src="{{asset('images/swift.svg')}}"
                  alt="Luxury"
                  class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg mb-4"
                />
                <p class="font-medium text-base sm:text-lg md:text-xl">
                  Luxury
                </p>
              </div>
            </div>

            <div class="swiper-slide flex justify-center">
              <div
                class="w-full max-w-xs sm:max-w-sm p-6 rounded-2xl text-center shadow-sm hover:shadow-xl transition bg-[#E8DDDC]/40"
              >
                <img
                  src="{{asset('images/brezza.svg')}}"
                  alt="Sports"
                  class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg mb-4"
                />
                <p class="font-medium text-base sm:text-lg md:text-xl">
                  Sports
                </p>
              </div>
            </div>

            <div class="swiper-slide flex justify-center">
              <div
                class="w-full max-w-xs sm:max-w-sm p-6 rounded-2xl text-center shadow-sm hover:shadow-xl transition bg-[#E8DDDC]/40"
              >
                <img
                  src="{{asset('images/fortuner.svg')}}"
                  alt="Electric"
                  class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg mb-4"
                />
                <p class="font-medium text-base sm:text-lg md:text-xl">
                  Electric
                </p>
              </div>
            </div>
          </div>

          <!-- Pagination -->
          <div
            class="swiper-pagination mt-6 sm:mt-8 relative flex justify-center"
          ></div>
        </div>
      </div>
    </section>