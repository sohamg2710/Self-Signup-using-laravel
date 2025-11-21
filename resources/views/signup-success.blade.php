<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Self Sign-up - Success</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- Main Section -->
    <section class="flex flex-col items-center justify-center py-24 px-6 text-center">
        <h1 class="text-4xl font-bold text-blue-700 mb-8">Self Sign-up</h1>

        <!-- Success Icon -->
        <div class="flex flex-col items-center space-y-4">
            <div class="w-14 h-14 flex items-center justify-center rounded-full border-2 border-lime-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-lime-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <p class="text-gray-700 text-lg">Thank you for your application</p>
        </div>
    </section> 

    <!-- Footer -->
    <x-user-footer></x-user-footer>

</body>
</html>
