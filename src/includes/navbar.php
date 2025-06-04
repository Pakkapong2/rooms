<?php
session_start();
$is_logged_in = isset($_SESSION['user']);
$user_role = $_SESSION['user']['role'] ?? null; // ตัวอย่าง: 'customer' หรือ 'admin'
?>

<nav class="bg-indigo-700 shadow-md py-4">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
    <a href="/home.php" class="text-xl font-bold text-white no-underline">DormBooking</a>

    <div class="space-x-4">
      <?php if (!$is_logged_in): ?>
        <a href="auth/login.php" class="text-white hover:text-blue-300 no-underline">เข้าสู่ระบบ</a>
        <a href="auth/register.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 no-underline">สมัครสมาชิก</a>
      <?php else: ?>
        <?php if ($user_role === 'customer'): ?>
          <a href="src/customer/booking.php" class="text-white hover:text-blue-300 no-underline">จองหอพัก</a>
          <a href="src/customer/profile.php" class="text-white hover:text-blue-300 no-underline">โปรไฟล์</a>
        <?php elseif ($user_role === 'admin'): ?>
          <a href="src/admin/dashboard.php" class="text-white hover:text-blue-300 no-underline">แดชบอร์ด</a>
          <a href="src/admin/manage-rooms.php" class="text-white hover:text-blue-300 no-underline">จัดการห้อง</a>
        <?php endif; ?>
        <a href="src/auth/logout.php" class="text-red-400 hover:text-red-300 no-underline">ออกจากระบบ</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<style>
  nav a {
    text-decoration: none;
  }
</style>
