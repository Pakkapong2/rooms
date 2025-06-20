<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../output.css" />
    <title>Login</title>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
        <h1 class="text-3xl font-bold text-center mb-6 text-indigo-600">เข้าสู่ระบบ</h1>

        <form id="loginForm" class="space-y-5">
            <div>
                <label for="Username" class="block font-semibold text-gray-700 mb-1">Username</label>
                <input type="text" name="Username" placeholder="Enter your username" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label for="Password" class="block font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="Password" placeholder="Enter your password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                    เข้าสู่ระบบ
                </button>
            </div>
            <a href="register.php" class="block text-center hover:text-blue-600">คุณยังไม่มีบัญชี / สมัครสมาชิก </a>
        </form>
    </div>
</body>
<script>
    document.getElementById("loginForm").addEventListener("submit", async function(e) {
        e.preventDefault();

        const form = new FormData(this);
        const username = form.get("Username");
        const password = form.get("Password");

        const response = await fetch("http://localhost:3000/api/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                username,
                password
            })
        });

        const result = await response.json();

        if (result.success) {
            alert("เข้าสู่ระบบสำเร็จ");
            // window.location.href = "home.php"; 
        } else {
            alert("เข้าสู่ระบบไม่สำเร็จ: " + result.message);
        }
    });
</script>

</html>