    <!-- ===== Hero Carousel (Swiper) ===== -->
<section
      class="relative w-full h-[250px] sm:h-[300px] md:h-[350px] lg:h-[450px] xl:h-[500px] mt-20"
    >
      <div class="hero-swiper h-full w-full">
        <!-- Slides -->
        <div class="swiper-wrapper">
          <div class="swiper-slide relative">
            <img
              src="{{asset('images/carousel.svg')}}"
              class="w-full h-full object-cover"
              alt="Luxury Car"
            />
          </div>
          <div class="swiper-slide relative">
            <img
              src="https://cdn.pixabay.com/photo/2016/05/18/10/52/buick-1400243_1280.jpg"
              class="w-full h-full object-cover"
              alt="Sports Car"
            />
          </div>
          <div class="swiper-slide relative">
            <img
              src="{{asset('images/image.png')}}"
              class="w-full h-full object-cover"
              alt="SUV Adventure"
            />
          </div>
        </div>

        <!-- Pagination (dots) -->
        <div class="swiper-pagination !bottom-4"></div>

        <!-- Navigation buttons -->
        <div class="swiper-button-prev !text-white"></div>
        <div class="swiper-button-next !text-white"></div>
      </div>
</section>
