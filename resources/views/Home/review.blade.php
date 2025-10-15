    <section class="py-12 px-4 w-full">
      <!-- Section Heading -->
      <div class="flex justify-center items-center flex-col text-center mb-10">
        <h2
          class="text-primary text-3xl sm:text-3xl md:text-4xl mb-2 leading-snug"
        >
          {{__('messages.customer')}}
          <span class="text-textSecondary">{{__('messages.reviews')}}</span>
        </h2>
      </div>

      <!-- Swiper Container -->
      <div class="w-full mx-auto">
        <div class="swiper reviews-swiper dots-swiper">
          <div
            class="swiper-wrapper items-center"
            id="review-wrapper-list"
          ></div>

          <!-- Pagination -->
          <div
            class="swiper-pagination mt-6 sm:mt-8 !relative flex justify-center"
          ></div>
        </div>
      </div>
    </section>
