<section class="py-12 px-4 w-full">
      <!-- Heading -->
      <div
        class="flex justify-center items-center flex-col text-center mb-10 px-4"
      >
        <h2
          class="text-primary text-3xl sm:text-3xl md:text-4xl mb-2 leading-snug"
        >
         {{__('messages.a_fit_msg')}} <span class="text-textSecondary">{{__('messages.your_needs')}}</span>
        </h2>
        <p class="text-sm sm:text-base md:text-lg max-w-xl mx-auto">
          {{__('messages.take_the_opportunity')}}
        </p>
      </div>

      <!-- Swiper -->
      <div class="w-full mx-auto px-4">
        <div class="swiper categories-swiper dots-swiper">
          <div class="swiper-wrapper" id="category-wrapper-list"></div>

          <!-- Pagination -->
          <div
            class="swiper-pagination mt-6 sm:mt-8 relative flex justify-center"
          ></div>
        </div>
      </div>
    </section>