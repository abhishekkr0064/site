@include('includes.header')
@include('home.navbar')
    <div>
      <!-- Overlay -->
      <div class="bg-bgPrimary p-5">
        <!-- Breadcrumb -->
        <nav class="text-sm text-textSecondary mb-6 mt-28">
          <ol class="list-reset flex">
            <li><a href="/" class="hover:underline">{{__('messages.home')}}</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="">{{__('messages.my_bookings')}}</li>
          </ol>
        </nav>

        <!-- Buttons -->
        <div class="flex items-center justify-between mb-2">
          <div class="flex space-x-4">
            <button
              id="rentalBtn"
              class="toggle-btn flex items-center px-5 py-2 rounded-full shadow transition"
            >
              <img src="{{asset('images/rental-car.svg')}}" alt="car" />
              <span class="ml-2">Rental</span>
            </button>
            <button
              id="airportBtn"
              class="toggle-btn flex items-center px-5 py-2 rounded-full shadow transition"
            >
              <img src="{{asset('images/airport-icon.svg')}}" alt="airport" />
              <span class="ml-2">Airport</span>
            </button>
          </div>
          <h2 class="text-xl hidden md:block">{{__('messages.my_bookings')}}</h2>
        </div>
      </div>

      <div class="bg-black/50">
        <!-- <div class="container mx-auto px-4 py-6"> -->
        <!-- Booking Card -->
        <div
          id="pageWrapper"
          class="min-h-screen bg-cover bg-center transition-all duration-500 p-4"
          style="
            background-image: url('{{asset('images/car-bg.jpg')}}');
          "
        >
          <div
            id="bookingCard"
            class="bg-white max-w-xs rounded-2xl shadow-lg p-6"
          ></div>
        </div>
        <!-- </div> -->
      </div>
    </div>

    <script>
      const rentalBtn = document.getElementById("rentalBtn");
      const airportBtn = document.getElementById("airportBtn");
      const pageWrapper = document.getElementById("pageWrapper");
      const bookingCard = document.getElementById("bookingCard");

      // Backgrounds
      const backgrounds = {
        rental: "{{asset('images/car-bg.jpg')}}",
        airport: "{{asset('images/airport-bg.jpg')}}",
      };

      // Booking Data
      const bookingData = {
        rental: {
          title: "Rental Bookings",
          fields: {
            From: "Noida",
            To: "Ajmer",
            From_Date: "30/09/2025, 09:31:30",
            To_Date: "30/09/2025, 09:31:30",
            Type: "Rental",
            Name: "Test Booking",
            Country: "India",
            Courency: "INR",
            Amount_per_day: "100.00 INR",
            Day: "15",
            Total: "15000 INR",
          },
        },
        airport: {
          title: "Airport Bookings",
          fields: {
            From: "Noida",
            To: "Ajmer",
            From_Date: "30/09/2025, 09:31:30",
            To_Date: "30/09/2025, 09:31:30",
            Type: "Rental",
            Name: "Test Booking",
            Country: "India",
            Courency: "INR",
            Amount_per_day: "100.00 INR",
            Day: "15",
            Total: "15000 INR",
          },
        },
      };

      // Booking Card Template (Reusable)
      function bookingCardTemplate(data) {
        const fieldsHTML = Object.entries(data.fields)
          .map(([label, value]) => `<p><strong>${label}:</strong> ${value}</p>`)
          .join("");

        return `
          <h2 class="text-xl text-start font-bold mb-3">${data.title}</h2>
          <div class="text-left space-y-1">
            ${fieldsHTML}
          </div>
        `;
      }

      // Function to render booking card
      function renderBooking(type) {
        bookingCard.innerHTML = bookingCardTemplate(bookingData[type]);
      }

      // Function to update active button styles
      function setActiveButton(activeBtn, inactiveBtn) {
        activeBtn.classList.add("bg-[#006AFF]", "text-white");
        activeBtn.classList.remove("bg-[#e0e0e0]", "text-gray-800");

        inactiveBtn.classList.add("bg-[#e0e0e0]", "text-textPrimary");
        inactiveBtn.classList.remove("bg-blue-600", "text-white");
      }

      // Default Load (Rental active)
      renderBooking("rental");
      setActiveButton(rentalBtn, airportBtn);

      // Event Listeners
      rentalBtn.addEventListener("click", () => {
        pageWrapper.style.backgroundImage = `url('${backgrounds.rental}')`;
        renderBooking("rental");
        setActiveButton(rentalBtn, airportBtn);
      });

      airportBtn.addEventListener("click", () => {
        pageWrapper.style.backgroundImage = `url('${backgrounds.airport}')`;
        renderBooking("airport");
        setActiveButton(airportBtn, rentalBtn);
      });
    </script>
@include('includes.footer')