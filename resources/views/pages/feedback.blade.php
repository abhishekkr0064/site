@include('includes/header')
@include('home/navbar')
<!-- Breadcrumb -->
    <nav class="py-4 lg:py-6">
      <ol
        id="breadcrumb"
        class="flex items-center text-textSecondary gap-2 m-5 mt-28"
      ></ol>
    </nav>

    <!-- Main Content -->
    <main class="flex justify-between md:gap-5 lg:gap-10 xl:gap-20 m-5">
      <div class="">
        <h1 class="text-2xl font-bold">
          {{ __('messages.what_about') }}
          <span class="text-primary">CARENT</span>
        </h1>
        <p class="my-4">
          {{ __('messages.contact_us_desc') }}
        </p>

        <!-- Feedback Form -->
        <form id="feedbackForm" class="space-y-5">
          <h2 class="">Enter Details</h2>
          <div class="sm:grid grid-cols-2 gap-4 space-y-3">
            <!-- Name -->
            <div class="mt-3">
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.first_name') }}
              </label>
              <input
                type="text"
                class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>

            <!-- Last Name -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.last_name') }}
              </label>
              <input
                type="text"
                class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>

            <!-- Email -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.email_add') }}
              </label>
              <input
                type="text"
                class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>

            <!-- Phone -->
            <div>
              <label class="block text-sm font-medium mb-1">
                {{ __('messages.phone') }}
              </label>
              <input
                type="text"
                class="w-full border border-borderDefault rounded-lg p-2 focus:ring-1 focus:ring-primary focus:outline-none"
                required
              />
            </div>
          </div>

          <!-- Feedback Message -->
          <div>
            <label class="block text-gray-700 text-sm font-medium mb-1"
              >Your Feedback is valuable to us!</label
            >
            <textarea
              rows="4"
              placeholder="Write your feedback here..."
              class="w-full border border-borderDefault rounded-lg p-3 focus:ring-1 focus:ring-primary focus:outline-none"
              required
            ></textarea>
          </div>

          <!-- Submit -->
          <button
            type="submit"
            class="w-full lg:w-fit bg-[#006AFF] hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg"
          >
           {{ __('messages.submit_feedback') }}
          </button>
        </form>
      </div>

      <!-- contact us card -->
      <div
        class="p-4 border border-borderDefault rounded-lg hidden md:flex flex-col h-[610px] overflow-y-auto"
      >
        <h1 class="text-xl">
          {{ __('messages.contact_us') }}
        </h1>
        <p class="my-4">
          {{ __('messages.wel') }}
        </p>
        <div id="contact-us" class=""></div>
      </div>
    </main>

    <script>
      const container = document.getElementById("contact-us");

      // Reusable icons
      const icons = {
        email: `<svg class="w-5 h-5 text-blue-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/><path d="M12 14v7m0-7H5m7 0h7"/></svg>`,
        phone: `<svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.129a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>`,
        location: `<svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 11c0 .552-.224 1.05-.586 1.414A1.993 1.993 0 0110 13c-1.105 0-2-.895-2-2 0-.551.224-1.05.586-1.414A1.993 1.993 0 0110 9c1.105 0 2 .895 2 2z"/><path d="M12 2C8.134 2 5 5.134 5 9c0 7 7 13 7 13s7-6 7-13c0-3.866-3.134-7-7-7z"/></svg>`,
      };

      // contact data
      const contacts = [
        {
          country: "ABIDJAN",
          email:
            "vikasvijay@satgurutravel.com, rentalcar.abj@satgurutravel.com",
          phone: "+( +225) 0141499954, Tel: (+225) 2720210968",
          address:
            "Rez-de-chaussee immeuble JECEDA 01 BP 2562 Abidjan 01, Abidjan , Cote d'ivoire",
        },
        {
          country: "BURKINA",
          email: "rentalcaroua@satgurutravel.com",
          phone: "+(226) 74515151",
          address:
            "Dr KWAME N’ Krumah - Imm. Immeuble Sodife 01 BP 4883 Ouagadougou 01 – Burkina Faso",
        },
        {
          country: "SENEGAL",
          email: "reservation.sn@thecarent.com",
          phone:
            "+(221) 773328591, (221) 787916536 , (221) 338569999, (221)338569898",
          address:
            "Ancienne Piste x Commissariat du Tourisme Lo 44 Merrmoz Pyrotechnique BP: 48117 – Dakar (Senegal)",
        },
        {
          country: "LOME",
          email:
            "carrentallome@satgurutravel.com, vkarani@satgurutravel.com, pdaryani@satgurutravel.com",
          phone: "+228 22208801/02 , +228 93551511 , 93296132",
          address:
            "Immeuble P. THERESE, Boulevard du 13 Janvier Rue des Femmes Savantes, BP : 20640 Lomé - TOGO",
        },
        {
          country: "NIAMEY",
          email:
            "nim.carrental@satgurutravel.com, niamey.carrental@satgurutravel.com",
          phone: "+227 90906512/39 , 95906509",
          address: "Face Lyceé La Fontaine, BP: 11 114 Niamey – Niger",
        },
        {
          country: "MOROCCO",
          email: "morocco@thecarent.com",
          phone: "+(212) 666464812 , (212) 520522386",
          address:
            "94, Rue Jean Jaurès, Quartier Gauthier 20100 Casablanca, Morocco",
        },
        {
          country: "MALI",
          email: "support@carent.com",
          phone: "+223 76212024 , +223 65797951",
          address:
            "Immeuble SATGURU, Rue 239, En face de la Bibliothèque Nationale, B.P.E 1991, Bamako",
        },
      ];

      //   function for contact us
      contacts.forEach((c) => {
        const card = document.createElement("div");
        card.className = "mt-4";
        card.innerHTML = `
              <h2 class="text-textPrimary mb-4">${c.country}</h2>
              <ul class="space-y-3 text-sm md:text-md ml-5 md:ml-10">
                <li class="flex items-start">${icons.email}<span>${c.email}</span></li>
                <li class="flex items-start">${icons.phone}<span>${c.phone}</span></li>
                <li class="flex items-start">${icons.location}<span>${c.address}</span></li>
              </ul>
            `;
        container.appendChild(card);
      });
      // Dynamic Breadcrumb
      const breadcrumbData = [
        { label: "{{__('messages.home')}}", url: "/" },
        { label: "{{__('messages.feedback')}}", url: "#" },
      ];

      const breadcrumbEl = document.getElementById("breadcrumb");
      breadcrumbData.forEach((item, index) => {
        const li = document.createElement("li");
        li.className = "flex items-center";

        if (item.url && item.url !== "#") {
          li.innerHTML = `<a href="${item.url}" class="text-textSecondary hover:underline">${item.label}</a>`;
        } else {
          li.innerHTML = `<span class="text-textSecondary">${item.label}</span>`;
        }

        breadcrumbEl.appendChild(li);

        if (index < breadcrumbData.length - 1) {
          const separator = document.createElement("span");
          separator.className = " text-textSecondary";
          separator.textContent = "/";
          breadcrumbEl.appendChild(separator);
        }
      });
    </script>
 @include('includes/footer')