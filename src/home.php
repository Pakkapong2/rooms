<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>หน้าแรก | DormBooking</title>
  <link rel="stylesheet" href="output.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
</head>

<body class="bg-indigo-50 text-gray-800">

  <?php include('includes/navbar.php'); ?>

  <!-- กล่องค้นหา -->
  <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-lg mt-10 space-y-6 border border-indigo-200">
    <div class="flex flex-wrap gap-4">
      <button class="px-4 py-2 rounded-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium transition">
        การเข้าพักข้ามคืน
      </button>
      <button class="px-4 py-2 rounded-full bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-medium transition">
        การเข้าพักช่วงกลางวัน
      </button>
    </div>

    <div>
      <input type="text" placeholder="ใส่จุดหมายปลายทางหรือชื่อที่พัก"
        class="w-full border border-amber-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-400 bg-white" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- วันที่เข้า -->
      <div class="border border-amber-200 rounded-lg px-4 py-3 cursor-pointer bg-white" onclick="checkinPicker.open()">
        <div class="text-sm text-gray-500">เช็คอิน</div>
        <div id="checkin-display" class="font-medium text-gray-800">วันที่เช็คอิน</div>
        <input type="text" id="checkin" class="absolute opacity-0 pointer-events-none" />
      </div>

      <!-- วันที่ออก -->
      <div class="border border-amber-200 rounded-lg px-4 py-3 cursor-pointer bg-white" onclick="checkoutPicker.open()">
        <div class="text-sm text-gray-500">เช็คเอาท์</div>
        <div id="checkout-display" class="font-medium text-gray-800">วันที่เช็คเอาท์</div>
        <input type="text" id="checkout" class="absolute opacity-0 pointer-events-none" />
      </div>

      <!-- จำนวนคน -->
      <div class="relative">
        <div onclick="toggleGuestDropdown()"
          class="border border-amber-200 bg-white rounded-lg px-4 py-3 flex justify-between items-center cursor-pointer">
          <div>
            <div class="text-sm text-gray-500">ผู้เข้าพัก</div>
            <div id="guest-summary" class="font-medium text-gray-800">
              ผู้ใหญ่ 2 คน<br>
              <span class="text-sm text-gray-500">1 ห้อง</span>
              <span id="pet-summary" class="text-sm text-gray-500 hidden">รับสัตว์</span>
            </div>
          </div>
          <span class="text-gray-500 text-lg">⌄</span>
        </div>


        <div id="guest-dropdown"
          class="absolute bg-white/90 backdrop-blur-md shadow-xl border border-gray-200 rounded-2xl p-4 mt-2 w-full hidden z-20 space-y-4">
          <div class="flex justify-between items-center">
            <span class="text-gray-700 font-medium">ผู้ใหญ่</span>
            <div class="flex items-center gap-2">
              <button onclick="changeGuestCount(-1)"
                class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-bold">−</button>
              <span id="guest-count" class="text-lg font-semibold text-gray-800">2</span>
              <button onclick="changeGuestCount(1)"
                class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-bold">+</button>
            </div>
          </div>

          <div class="flex justify-between items-center">
            <span class="text-gray-700 font-medium">ห้อง</span>
            <div class="flex items-center gap-2">
              <button onclick="changeRoomCount(-1)"
                class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-bold">−</button>
              <span id="room-count" class="text-lg font-semibold text-gray-800">1</span>
              <button onclick="changeRoomCount(1)"
                class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-bold">+</button>
            </div>
          </div>

          <div>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" id="pet-checkbox" onchange="toggleAnimalOptions()" class="accent-indigo-500">
              <span class="text-gray-700 font-medium">นำสัตว์เลี้ยงเข้าพัก</span>
            </label>

            <div id="animal-options" class="flex justify-between items-center mt-3 hidden">
              <span class="text-gray-700 font-medium">จำนวนสัตว์</span>
              <div class="flex items-center gap-2">
                <button onclick="changeAnimalCount(-1)"
                  class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-bold">−</button>
                <span id="animal-count" class="text-lg font-semibold text-gray-800">1</span>
                <button onclick="changeAnimalCount(1)"
                  class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-bold">+</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- ปุ่มค้นหา -->
    <div>
      <button
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-lg shadow text-lg transition">
        ค้นหา
      </button>
    </div>
  </div>

  <p class="text-center mt-5 font-line font-bold text-2xl ">หอพักเเนะนำ</p>
  <!-- แสดงสไลด์ -->
  <div class="w-full max-w-6xl mx-auto mt-10 px-4 mb-20">
    <div class="flex flex-col md:flex-row gap-8 items-center">

      <!-- Slide ทางซ้าย -->
      <div class="w-full md:w-1/2">
        <div id="carouselExampleIndicators" class="carousel slide w-full" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner rounded-lg overflow-hidden">
            <div class="carousel-item active">
              <img src="assets/hotel.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 1">
            </div>
            <div class="carousel-item">
              <img src="assets/indoors.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 2">
            </div>
            <div class="carousel-item">
              <img src="assets/bedroom.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 3">
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">ก่อนหน้า</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">ถัดไป</span>
          </button>
        </div>
      </div>

      <!-- ข้อความทางขวา -->
      <div class="w-full md:w-1/2">
        <h2 class="text-2xl font-bold text-indigo-700 mb-4">หอพักพิมพ์ใจ</h2>
        <p class="text-gray-700 leading-relaxed">
          หอพักพิมพ์ใจเหมาะสำหรับนักศึกษาที่ต้องการความสงบและความเป็นส่วนตัว อยู่ใกล้มหาวิทยาลัยเพียง 300 เมตร
          มีสิ่งอำนวยความสะดวกครบครัน ทั้งแอร์ เครื่องทำน้ำอุ่น และระบบเข้า-ออกด้วยคีย์การ์ด
        </p>
        <ul class="list-disc list-inside mt-4 text-gray-600">
          <li>ห้องพักส่วนตัว พร้อมเฟอร์นิเจอร์</li>
          <li>เข้า-ออกด้วยระบบคีย์การ์ด</li>
          <li>ฟรีอินเทอร์เน็ตความเร็วสูง</li>
          <li>ใกล้ร้านสะดวกซื้อและร้านอาหาร</li>
        </ul>
        <div class="mt-6 flex flex-wrap gap-4  justify-end">
          <a href="#details" class="bg-indigo-600 text-white px-5 py-2 rounded-xl shadow hover:bg-indigo-700 transition no-underline" style="text-decoration: none;">
            ดูรายละเอียด
          </a>
        </div>

      </div>

    </div>
  </div>

  <div class="w-full max-w-6xl mx-auto mt-10 px-4 mb-20">
    <div class="flex flex-col md:flex-row gap-8 items-center">

      <!-- Slide ทางซ้าย -->
      <div class="w-full md:w-1/2">
        <div id="carouselExampleIndicators" class="carousel slide w-full" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner rounded-lg overflow-hidden">
            <div class="carousel-item active">
              <img src="assets/hotel.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 1">
            </div>
            <div class="carousel-item">
              <img src="assets/indoors.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 2">
            </div>
            <div class="carousel-item">
              <img src="assets/bedroom.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 3">
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">ก่อนหน้า</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">ถัดไป</span>
          </button>
        </div>
      </div>

      <!-- ข้อความทางขวา -->
      <div class="w-full md:w-1/2">
        <h2 class="text-2xl font-bold text-indigo-700 mb-4">หอพักบ้านสุขใจ</h2>
        <p class="text-gray-700 leading-relaxed">
          หอพักบ้านสุขใจเหมาะสำหรับผู้ที่ชอบบรรยากาศเป็นกันเอง เป็นอาคาร 4 ชั้นพร้อมที่จอดรถ
          พื้นที่ภายในตกแต่งแบบโมเดิร์น พร้อมเครื่องซักผ้าหยอดเหรียญและพื้นที่นั่งเล่นรวม
        </p>
        <ul class="list-disc list-inside mt-4 text-gray-600">
          <li>มีลิฟต์บริการทุกชั้น</li>
          <li>ห้องน้ำในตัว พร้อมเครื่องทำน้ำอุ่น</li>
          <li>พื้นที่พักผ่อนรวม และโต๊ะอ่านหนังสือ</li>
          <li>ใกล้ป้ายรถเมล์และวินมอเตอร์ไซค์</li>
        </ul>
        <div class="mt-6 flex flex-wrap justify-end gap-4">
          <a href="#details" class="bg-indigo-600 text-white px-5 py-2 rounded-xl shadow hover:bg-indigo-700 transition no-underline" style="text-decoration: none;">
            ดูรายละเอียด
          </a>

        </div>

      </div>

    </div>
  </div>

  <div class="w-full max-w-6xl mx-auto mt-10 px-4 mb-20">
    <div class="flex flex-col md:flex-row gap-8 items-center">

      <!-- Slide ทางซ้าย -->
      <div class="w-full md:w-1/2">
        <div id="carouselExampleIndicators" class="carousel slide w-full" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner rounded-lg overflow-hidden">
            <div class="carousel-item active">
              <img src="assets/hotel.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 1">
            </div>
            <div class="carousel-item">
              <img src="assets/indoors.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 2">
            </div>
            <div class="carousel-item">
              <img src="assets/bedroom.jpg" class="d-block w-100 rounded-3" style="height: 360px; object-fit: cover;" alt="หอพัก 3">
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">ก่อนหน้า</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">ถัดไป</span>
          </button>
        </div>
      </div>

      <!-- ข้อความทางขวา -->
      <div class="w-full md:w-1/2">
        <h2 class="text-2xl font-bold text-indigo-700 mb-4">หอพักร่มรื่น เพลส</h2>
        <p class="text-gray-700 leading-relaxed">
          หอพักร่มรื่น เพลส ตั้งอยู่ในซอยที่เงียบสงบ มีต้นไม้ใหญ่ให้ร่มเงา
          เหมาะสำหรับนักเรียน นักศึกษา หรือคนทำงานที่ต้องการความเรียบง่ายและความเป็นธรรมชาติ
        </p>
        <ul class="list-disc list-inside mt-4 text-gray-600">
          <li>มีสวนหย่อมเล็กสำหรับพักผ่อน</li>
          <li>ระบบรักษาความปลอดภัย 24 ชม.</li>
          <li>สามารถเลี้ยงแมวหรือสุนัขพันธุ์เล็กได้</li>
          <li>ราคาย่อมเยา เริ่มต้นเพียง 2,500 บาท/เดือน</li>
        </ul>
        <div class="mt-6 flex flex-wrap justify-end gap-4">
          <a href="#details" class="bg-indigo-600 text-white px-5 py-2 rounded-xl shadow hover:bg-indigo-700 transition no-underline" style="text-decoration: none;">
            ดูรายละเอียด
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="flex justify-center mb-16">
    <a href="rooms.php"
      class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition">
      ดูห้องทั้งหมด
    </a>
  </div>


  <div class="mt-20">
    <?php include('includes/footer.php'); ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    let checkinPicker = flatpickr("#checkin", {
      dateFormat: "d M Y",
      onChange: function(selectedDates, dateStr) {
        document.getElementById("checkin-display").textContent = dateStr;
      }
    });

    let checkoutPicker = flatpickr("#checkout", {
      dateFormat: "d M Y",
      onChange: function(selectedDates, dateStr) {
        document.getElementById("checkout-display").textContent = dateStr;
      }
    });

    function toggleGuestDropdown() {
      document.getElementById("guest-dropdown").classList.toggle("hidden");
    }

    function changeGuestCount(delta) {
      let count = parseInt(document.getElementById("guest-count").textContent);
      count = Math.max(1, count + delta);
      document.getElementById("guest-count").textContent = count;
      updateGuestSummary();
    }

    function changeRoomCount(delta) {
      let count = parseInt(document.getElementById("room-count").textContent);
      count = Math.max(1, count + delta);
      document.getElementById("room-count").textContent = count;
      updateGuestSummary();
    }

    function changeAnimalCount(delta) {
      let count = parseInt(document.getElementById("animal-count").textContent);
      count = Math.max(0, count + delta);
      document.getElementById("animal-count").textContent = count;
    }

    function updateGuestSummary() {
      let guests = document.getElementById("guest-count").textContent;
      let rooms = document.getElementById("room-count").textContent;
      document.getElementById("guest-summary").innerHTML =
        `ผู้ใหญ่ ${guests} คน<br><span class="text-sm text-gray-500">${rooms} ห้อง</span>` +
        (document.getElementById("pet-checkbox").checked ?
          `<span id="pet-summary" class="text-sm text-gray-500"> รับสัตว์</span>` :
          `<span id="pet-summary" class="text-sm text-gray-500 hidden">รับสัตว์</span>`);
    }

    function toggleAnimalOptions() {
      const checkbox = document.getElementById("pet-checkbox");
      const options = document.getElementById("animal-options");
      const petSummary = document.getElementById("pet-summary");

      options.classList.toggle("hidden", !checkbox.checked);
      petSummary.classList.toggle("hidden", !checkbox.checked);
    }
  </script>
</body>

</html>