@include('includes.header')
@include('home.navbar')
    <nav class="p-4 lg:p-6 text-sm mt-32">
      <ol class="flex items-center space-x-2 text-sm text-textSecondary">
        <li><a href="/" class="hover:text-blue-600">
        {{ __('messages.home') }}
        </a></li>
        <li>/</li>
        <li>
          {{ __('messages.terms_conditions') }}
        </li>
      </ol>
    </nav>
    <!-- Header -->
    <div class="h-16 md:h-20 bg-primary my-6 flex items-center">
      <h1 class="text-3xl md:text-4xl font-bold text-bgPrimary px-4">
        {{ __('messages.terms_conditions') }}
      </h1>
    </div>

    <div class="mx-auto px-4 py-4">
      <!-- Intro -->
      <p class="leading-relaxed text-md md:text-lg text-medium px-6">
       {{__('messages.terms_conditions_content')}}
      </p>

      <!-- Sections -->
      <div class="p-6">
        <div class="flex items-top justify-start gap-4">
          <div class="mt-1">
            <i data-feather="x-circle" class="text-primary w-8 h-8"></i>
          </div>
          <div class="">
            <h2 class="text-lg font-semibold">
              {{__('messages.cancelation_policy')}}
            </h2>
            <p class="">
             {{__('messages.cancel_desc')}}
            </p>
          </div>
        </div>

        <hr class="w-full border border-textPrimary my-10" />

        <!-- 2. Meetup -->
        <div class="flex items-top justify-start gap-4">
          <div class="mt-1">
            <i data-feather="users" class="text-[#E50914] w-5 h-5"></i>
          </div>
          <div class="">
            <h2 class="text-lg font-semibold">
              {{__('messages.meet_up_confirm')}}
            </h2>
            <p class="">
             {{__('messages.meet_desc')}}
            </p>
          </div>
        </div>

        <hr class="w-full border border-textPrimary my-10" />

        <!-- 3. Payments -->
        <div class="flex items-top justify-start gap-4">
          <div class="mt-1">
            <i data-feather="credit-card" class="text-[#E50914] w-5 h-5"></i>
          </div>
          <div class="">
            <h2 class="text-lg font-semibold">{{__('messages.payment_&_charges')}}</h2>
            <p class="">
              {{__('messages.payment_desc')}}
            </p>
          </div>
        </div>

        <hr class="w-full border border-textPrimary my-10" />

        <!-- 4. Services -->
        <div class="flex items-top justify-start gap-4">
          <div class="mt-1">
            <i data-feather="wifi" class="text-[#E50914] w-5 h-5"></i>
          </div>
          <div class="">
            <h2 class="text-lg font-semibold"> {{__('messages.additional_services')}}</h2>
            <p class="">
              {{__('messages.additional_desc')}}
            </p>
          </div>
        </div>

        <hr class="w-full border border-textPrimary my-10" />

        <!-- 5. Waiting Time -->
        <div class="flex items-top justify-start gap-4">
          <div class="mt-1">
            <i data-feather="clock" class="text-[#E50914] w-5 h-5"></i>
          </div>
          <div class="">
            <h2 class="text-lg font-semibold">{{__('messages.waiting_time')}}</h2>
            <p class="">
              {{__('messages.waiting_desc')}}
            </p>
          </div>
        </div>

        <hr class="w-full border border-textPrimary my-10" />

        <!-- 6. Contact -->
        <div class="flex items-top justify-start gap-4">
          <div class="mt-1">
            <i data-feather="phone" class="text-[#E50914] w-5 h-5"></i>
          </div>
          <div class="">
            <h2 class="text-lg font-semibold">{{_('messages.contact_info')}}</h2>
            <p class="">
             {{__('messages.contact_desc')}}
              <a href="tel:+221773328591" class="text-[#E50914] font-medium"
                >+221773328591</a
              >.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Activate Icons -->
    <script>
      feather.replace();
    </script>
@include('includes.footer')