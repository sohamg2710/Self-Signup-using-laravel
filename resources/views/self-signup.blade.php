<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Self Sign-up</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- Self Sign-up Section -->
    <section class="flex flex-col items-center justify-center py-12 px-6 md:px-20 lg:px-40">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-700 mb-12 text-center">Self Sign-up</h1>

        <div class="flex flex-col md:flex-row items-center justify-between w-full max-w-6xl">
            <!-- Left Content -->
            <div class="md:w-1/2 space-y-6">
                <h2 class="text-3xl font-extrabold">Welcome</h2>
                <p class="text-lg font-medium">Open your account in a few easy steps</p>

                <h3 class="text-xl font-semibold mt-6">Here’s what you’ll need before you start:</h3>
                <ul class="space-y-3 mt-4">
                    <li class="flex items-center gap-2">
                        ✅ <span>South African mobile number</span>
                    </li>
                    <li class="flex items-center gap-2">
                        ✅ <span>18 years or older</span>
                    </li>
                    <li class="flex items-center gap-2">
                        ✅ <span>SA ID, Passport, or Asylum/Refugee document (permit if required)</span>
                    </li>
                    <li class="flex items-center gap-2">
                        ✅ <span>Proof of address (not older than 3 months)</span>
                    </li>
                    <li class="flex items-center gap-2">
                        ✅ <span>A selfie holding your ID</span>
                    </li>
                </ul>

                <!-- Button -->
                <div class="mt-10">
                    <a href="/verify-mobile"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-lime-300 border-2 border-blue-700 rounded-full font-semibold text-blue-700 hover:bg-lime-400 transition">
                        Start my application
                        <span class="text-xl">➜</span>
                    </a>
                </div>

                <!-- Terms -->
                <p class="text-sm text-gray-600 mt-6">
                    By clicking “Start my application”, you accept all IMB 
                    <a href="https://imb.datafree.co/legal/" target="_blank"
                       class="text-blue-600 underline hover:text-blue-800">
                        terms and conditions
                    </a>
                </p>
            </div>

            <!-- Right Image -->
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <img src="{{ asset('images/imb-card_orange1.png') }}" alt="IMB Card" class="w-[480px] drop-shadow-xl">
            </div>
        </div>
    </section>
    <!-- Footer -->
    <x-user-footer></x-user-footer>

</body>
</html>
