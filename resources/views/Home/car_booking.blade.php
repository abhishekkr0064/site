    <section class="py-12 px-4 w-full">
      <div class="flex justify-center items-center flex-col text-center mb-10">
        <h2
          class="text-primary text-3xl sm:text-3xl md:text-4xl mb-2 leading-snug"
        >
          {{__('messages.find_your_dream_car')}}
          <span class="text-textSecondary">{{__('messages.easly_and_quickly')}}</span>
        </h2>
        <p class="text-sm sm:text-base md:text-lg max-w-xl mx-auto">
         {{__('messages.browse_thousands')}}
        </p>
      </div>

      <!-- Swiper -->
      <div class="w-full mx-auto">
        <div class="swiper findCar-swiper dots-swiper" dir="rtl">
          <div class="swiper-wrapper" id="car-wrapper-list"></div>

          <!-- Pagination -->
          <div
            class="swiper-pagination mt-6 sm:mt-8 !relative flex justify-center"
          ></div>
        </div>
      </div>
    </section>