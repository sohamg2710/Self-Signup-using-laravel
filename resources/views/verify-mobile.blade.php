<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Mobile - Self Sign-up</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- Verify Mobile Section -->
    <section class="flex flex-col items-center justify-center py-12 px-6 md:px-20 lg:px-40">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-700 mb-12 text-center">Self Sign-up</h1>

        <!-- Step indicator -->  
        <div class="flex justify-center mb-10">
            <div class="flex items-center space-x-2">
                <div class="w-4 h-4 bg-blue-700 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between w-full max-w-6xl">
            <!-- Left Content -->
            <div class="md:w-1/2 space-y-6">
            
              @error('mobile')
    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    @if(session('status'))
                    <p class="text-green-600 text-sm mt-2">{{ session('status') }}</p>
                        @endif              

            
                <!-- form action and POST -->
                <form method="POST" action="/verify-mobile"> 
                    @csrf

               
                    <label class="block text-sm font-medium text-gray-700">Enter your mobile number</label>
                    <input type="text" name="mobile" placeholder="South African Mobile Number" required
                        class="border border-gray-400 rounded-md w-full p-2 mt-2 focus:border-blue-600 focus:ring-blue-600">

                    <p class="text-sm text-gray-600 mt-2">
                        We’ll send you a One-Time PIN (OTP) via SMS to verify your number.
                    </p>

                   
                    <div class="mt-6">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-lime-300 border-2 border-blue-700 rounded-full font-semibold text-blue-700 hover:bg-yellow-400 transition">
                            Send OTP
                            <span class="text-xl">➜</span>
                        </button>
                    </div>

                  

                </form>
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
