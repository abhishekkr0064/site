@include('includes/header')
@include('home/navbar')
  {{-- <body class="bg-bgPrimary text-textPrimary font-outfit"> --}}
    <div class="w-full h-full mx-auto p-4 lg:p-6 mt-28">
      <!-- Breadcrumb -->
      <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-textSecondary">
          <li>
            <a href="/" class="hover:text-blue-600">
            {{ __('messages.home') }}
            </a>
          </li>
          <li>/</li>
          <li class="">
            {{ __('messages.listing') }}
          </li>
        </ol>
      </nav>

      <!-- Filter Controls -->
      <div class="flex flex-wrap items-center justify-between gap-3 mb-8">
        <div class="flex gap-3 items-baseline">
          <h2 class="text-3xl font-bold">
            {{ __('messages.listing') }}
          </h2>
          <span class="text-textSecondary">
            {{ __('messages.list') }}
          </span>
        </div>
        <div class="flex flex-wrap gap-3">
          <!-- Per Page Dropdown -->
          <select
            id="perPage"
            class="px-4 py-2 bg-bgPrimary border border-borderDefault rounded-lg text-sm"
          >
            <option value="4">{{ __('messages.per_page') }} 4</option>
            <option value="6">{{ __('messages.per_page') }} 6</option>
            <option value="8">{{ __('messages.per_page') }} 8</option>
          </select>

          <!-- Sort Button -->
          <button
            id="sortBtn"
            class="px-4 py-2 bg-bgPrimary border border-borderDefault rounded-lg text-sm"
          >
            {{ __('messages.price') }}
          </button>
        </div>
      </div>

      <!-- Car Cards Grid -->
      <div class="flex justify-center mx-auto">
        <div
          id="carList"
          class="grid gap-8 xl:gap-20 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
        ></div>
      </div>

      <!-- Pagination -->
      <div id="pagination" class="flex justify-center mt-8 gap-2"></div>
    </div>

    <script>
      // Sample car data
      const cars = [
        {
          name: "Tesla Model S",
          type: "Electric Sedan",
          price: 80000,
          image: "{{asset('images/fortuner.svg')}}",
        },
        {
          name: "BMW M4",
          type: "Luxury Sports",
          price: 82000,
          image: "{{asset('images/swift.svg')}}",
        },
        {
          name: "Audi Q7",
          type: "Premium SUV",
          price: 82000,
          image: "{{asset('images/brezza.svg')}}",
        },
        {
          name: "Mercedes S-Class",
          type: "Luxury Sedan",
          price: 95000,
          image: "{{asset('images/fortuner.svg')}}",
        },
        {
          name: "Toyota Corolla",
          type: "Compact Sedan",
          price: 25000,
          image: "{{asset('images/swift.svg')}}",
        },
        {
          name: "Ford Mustang",
          type: "Sports Car",
          price: 55000,
          image: "{{asset('images/brezza.svg')}}",
        },
        {
          name: "Porsche 911",
          type: "Luxury Sports",
          price: 120000,
          image: "{{asset('images/fortuner.svg')}}",
        },
        {
          name: "Honda Civic",
          type: "Sedan",
          price: 22000,
          image: "{{asset('images/swift.svg')}}",
        },
      ];

      let currentPage = 1;
      let perPage = 4;
      let sortAsc = true;

      function renderCars() {
        const carList = document.getElementById("carList");
        carList.innerHTML = "";

        // Sorting
        const sortedCars = [...cars].sort((a, b) =>
          sortAsc ? a.price - b.price : b.price - a.price
        );

        // Pagination
        const start = (currentPage - 1) * perPage;
        const paginatedCars = sortedCars.slice(start, start + perPage);

        paginatedCars.forEach((car) => {
          const card = `
            <div
              class="w-full sm:w-72 md:w-80 xl:w-72 border border-borderDefault rounded-3xl overflow-hidden hover:shadow-lg transition"
            >
              <div
                class="relative z-40 w-full flex justify-between items-center p-2"
              >
                <span
                  class="bg-primary w-fit px-3 py-0.5 text-white rounded-full"
                >
                  ${car.type}
                </span>
                <a href="https://wa.me/916395799943">
                  <div
                    class="bg-[#16a34a] w-8 h-8 rounded-full flex items-center justify-center"
                  >
                    <i class="fab fa-whatsapp text-white text-lg"></i>
                  </div>
                </a>
              </div>

              <div class="w-full aspect-[4/3] mb-4 hover:bg-borderDefault">
                <img
                 src="${car.image}" alt="${car.name}
                  class="w-full h-auto transform transition-transform duration-500 hover:scale-110"
                />
              </div>

              <div class="px-2 py-4 ">
                <span
                  class="bg-[#006AFF]/70 text-center text-bgPrimary px-3 py-1 rounded-lg text-base w-fit"
                >
                  ${car.name}
                </span>
              </div>

              <div class="px-2 pb-3 flex items-center justify-between gap-4">
                <button onclick="window.location='{{ route('pages.car-booking') }}'"
                  class="bg-primary hover:bg-primaryHover text-bgPrimary px-3 py-1 rounded-xl text-base w-full"
                >
                 {{ __('messages.book_now') }}
                </button>
                <button onclick="window.location='{{ route('pages.enquiry') }}'"
                  class="bg-primary hover:bg-primaryHover text-bgPrimary px-3 py-1 rounded-xl text-base w-full"
                >
                  {{__('messages.enquiry_now')}}
                </button>
              </div>
            </div>
            `;

          //   const card = `
          //     <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
          //       <img src="${car.image}" alt="${
          //     car.name
          //   }" class="w-full h-48 object-cover" />
          //       <div class="p-4">
          //         <h3 class="text-lg font-semibold">${car.name}</h3>
          //         <p class="text-gray-600 text-sm mt-1">${car.type}</p>
          //         <div class="flex justify-between items-center mt-3">
          //           <span class="text-red-600 font-bold">$${car.price.toLocaleString()}</span>
          //           <button class="px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">View Details</button>
          //         </div>
          //       </div>
          //     </div>`;

          carList.innerHTML += card;
        });

        renderPagination(sortedCars.length);
      }

      function renderPagination(totalCars) {
        const pagination = document.getElementById("pagination");
        pagination.innerHTML = "";
        const totalPages = Math.ceil(totalCars / perPage);

        for (let i = 1; i <= totalPages; i++) {
          const btn = document.createElement("button");
          btn.textContent = i;
          btn.className = `px-3 py-1 border rounded ${
            i === currentPage
              ? "bg-blue-600 text-white"
              : "bg-white text-gray-700 hover:bg-gray-100"
          }`;
          btn.onclick = () => {
            currentPage = i;
            renderCars();
          };
          pagination.appendChild(btn);
        }
      }

      // Event Listeners
      document.getElementById("perPage").addEventListener("change", (e) => {
        perPage = parseInt(e.target.value);
        currentPage = 1;
        renderCars();
      });

      document.getElementById("sortBtn").addEventListener("click", () => {
        sortAsc = !sortAsc;
        document.getElementById("sortBtn").textContent = sortAsc
          ? "Price: Low to High"
          : "Price: High to Low";
        renderCars();
      });

      // Initial render
      renderCars();
    </script>
    @include('includes/footer')