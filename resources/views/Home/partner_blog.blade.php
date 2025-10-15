          <!-- ===== Allied Business Partners ===== -->
<section class="py-12 px-4 w-full">
      <!-- Section Heading -->
    <div class="flex justify-center items-center flex-col text-center mb-10">
        <h2
          class="text-primary text-3xl sm:text-3xl md:text-4xl mb-2 leading-snug"
        >
          {{__('messages.allied')}}
          <span class="text-textSecondary"> {{__('messages.part')}} </span>
        </h2>
      </div>
      <!-- Swiper Container -->
      <div class="w-full mx-auto">
        <div class="swiper alliedPartner-swiper dots-swiper">
          <div class="swiper-wrapper items-center">
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/carent-logo.png')}}"
                alt="Carent Logo"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/brand-1.svg')}}"
                alt="Partner 1"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/brand-2.svg')}}"
                alt="Partner 2"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/brand-3.svg')}}"
                alt="Partner 2"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/brand-4.svg')}}"
                alt="Partner 2"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/brand-1.svg')}}"
                alt="Partner 3"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
            <div class="swiper-slide flex justify-center">
              <img
                src="{{asset('images/brand-4.svg')}}"
                alt="Partner 4"
                class="h-16 sm:h-20 md:h-24 object-contain"
              />
            </div>
          </div>

          <!-- Pagination -->
          <div
            class="swiper-pagination mt-6 sm:mt-8 !relative flex justify-center"
          ></div>
        </div>
    </div>
</section>

<!-- ===== Blogs ===== -->
<section class="py-12 px-4 w-full">
      <!-- Section Heading -->
      <div class="flex justify-center items-center flex-col text-center mb-10">
        <h2
          class="text-primary text-3xl sm:text-3xl md:text-4xl mb-2 leading-snug"
        >
          {{__('messages.check_our')}}
          <span class="text-textSecondary">
            {{__('messages.blog')}}
          </span>
        </h2>
      </div>

      <!-- Swiper Container -->
      <div class="w-full mx-auto">
        <div class="swiper blogs-swiper dots-swiper">
          <div class="swiper-wrapper" id="blog-wrapper-list"></div>

          <!-- Pagination -->
          <div
            class="swiper-pagination mt-6 sm:mt-8 !relative flex justify-center"
          ></div>
          <a
            href="#"
            class="bg-borderDefault w-fit mx-auto px-5 mt-10 py-2 flex justify-center rounded-xl items-center gap-3"
          >
            <span>View All </span><i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </section>
