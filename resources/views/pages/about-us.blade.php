@include('includes/header')
@include('home/navbar')
    <!-- Breadcrumb -->
    <nav class="p-4 lg:p-6 text-sm mt-28">
      <ol class="flex items-center space-x-2 text-sm text-textSecondary">
        <li><a href="/" class="hover:text-blue-600">
        {{ __('messages.home') }}
        </a></li>
        <li>/</li>
        <li>
          {{ __('messages.about_us') }}
        </li>
      </ol>
    </nav>

    <!-- Hero Section -->
    <div class="bg-primary text-white">
      <h1 class="text-4xl pl-4 py-5 font-bold">
        {{__('messages.about_us')}}
      </h1>
    </div>

    <!-- Who We Are -->
    <section class="p-4 xl:px-8">
      <p class="">
        {{__('messages.about_us_content')}}
      </p>
      <div class="mx-auto grid md:grid-cols-2 gap-10 items-center">
        <img src="{{asset('images/brezza.svg')}}" alt="About Us" class="mx-auto" />
        <div>
          <h2 class="text-2xl py-2 text-primary">
            {{__('messages.who_we_are')}}
          </h2>
          <p class="text-textSecondary leading-relaxed">
            {{__('messages.who_we_are_desc')}}
          </p>
        </div>
      </div>
    </section>

    <!-- Our Mission -->
    <section class="p-4 xl:px-8">
      <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
          <h2 class="text-2xl pb-2 text-primary">
            {{__('messages.our_mission')}}
          </h2>
          <p class="text-textSecondary leading-relaxed">
            {{__('messages.our_mission_desc')}}
          </p>
        </div>
        <img src="{{asset('images/fortuner.svg')}}" alt="Mission" class="mx-auto" />
      </div>
    </section>

    <!-- Core Values -->
    <section class="p-4 xl:px-8">
      <div class="text-center">
        <h2 class="text-2xl py-4 text-primary">{{__('messages.our_value')}}</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
          <div class="p-4 border rounded-lg hover:shadow-md">
            <h3 class="font-bold mb-2">
              {{ __('messages.trust') }}
            </h3>
            <p class="text-textSecondary text-sm">
             {{ __('messages.trust_desc') }}
            </p>
          </div>
          <div class="p-4 border rounded-lg hover:shadow-md">
            <h3 class="font-bold mb-2">
              {{ __('messages.reliability') }}
            </h3>
            <p class="text-textSecondary text-sm">
             {{ __('messages.reliability_desc') }}
            </p>
          </div>
          <div class="p-4 border rounded-lg hover:shadow-md">
            <h3 class="font-bold mb-2">
              {{ __('messages.customer_first') }}
            </h3>
            <p class="text-textSecondary text-sm">
              {{ __('messages.cust_desc') }}
            </p>
          </div>
          <div class="p-4 border rounded-lg hover:shadow-md">
            <h3 class="font-bold mb-2">
              {{ __('messages.innovation') }}
            </h3>
            <p class="text-textSecondary text-sm">
             {{ __('messages.innovation_desc') }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="p-4 xl:px-8">
      <div class="mx-auto p-4 text-center">
        <h2 class="text-2xl mb-10 text-primary">{{__('messages.meet_team')}}</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
          <div
            class="bg-white p-6 rounded-lg border border-borderDefault hover:shadow-xl"
          >
            <img
              src="https://tse1.mm.bing.net/th/id/OIP.4Sf5Qzlwrq-0iNoydcGW0wHaLH?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
              class="w-24 h-24 mx-auto rounded-full mb-4"
            />
            <h3 class="font-bold">John Doe</h3>
            <p class="text-sm text-textSecondary">Founder & CEO</p>
          </div>
           <div
            class="bg-white p-6 rounded-lg border border-borderDefault hover:shadow-xl"
          >
            <img
              src="https://tse1.mm.bing.net/th/id/OIP.4Sf5Qzlwrq-0iNoydcGW0wHaLH?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
              class="w-24 h-24 mx-auto rounded-full mb-4"
            />
            <h3 class="font-bold">Jane Smith</h3>
            <p class="text-sm text-textSecondary">Head of Operations</p>
          </div>
           <div
            class="bg-white p-6 rounded-lg border border-borderDefault hover:shadow-xl"
          >
            <img
              src="https://tse1.mm.bing.net/th/id/OIP.4Sf5Qzlwrq-0iNoydcGW0wHaLH?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
              class="w-24 h-24 mx-auto rounded-full mb-4"
            />
            <h3 class="font-bold">Michael Lee</h3>
            <p class="text-sm text-textSecondary">Tech Lead</p>
          </div>
         <div
            class="bg-white p-6 rounded-lg border border-borderDefault hover:shadow-xl"
          >
            <img
              src="https://tse1.mm.bing.net/th/id/OIP.4Sf5Qzlwrq-0iNoydcGW0wHaLH?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
              class="w-24 h-24 mx-auto rounded-full mb-4"
            />
            <h3 class="font-bold">Emily Davis</h3>
            <p class="text-sm text-textSecondary">Marketing Manager</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Breadcrumb JS -->

@include('includes/footer')