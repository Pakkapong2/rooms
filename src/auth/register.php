<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../output.css" />
    <title>Register</title>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
        <h1 class="text-3xl font-bold text-center mb-6 text-indigo-600">สมัครสมาชิก</h1>

        <form action="register_process.php" method="POST" class="space-y-5">
            <div>
                <label for="username" class="block font-semibold text-gray-700 mb-1">Username</label>
                <input type="text" name="username" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Enter your username" />
            </div>

            <div>
                <label for="email" class="block font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Enter your email" />
            </div>

            <div>
                <label for="password" class="block font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Enter your password" />
            </div>

            <div>
                <label for="confirm_password" class="block font-semibold text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="confirm_password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Confirm your password" />
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                    สมัครสมาชิก
                </button>
            </div>

            <a href="login.php" class="block text-center hover:text-blue-600">มีบัญชีอยู่แล้ว? เข้าสู่ระบบ</a>
        </form>
    </div>
</body>

</html>
