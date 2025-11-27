<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP - Self Sign-up</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- Main Section -->
    <section class="flex flex-col items-center justify-center py-10 md:py-16 px-6">
        <!-- Heading -->
        <h1 class="text-4xl font-bold text-blue-700 mb-8 text-center">Self Sign-up</h1>

        <!-- Step Indicator -->
        <div class="flex justify-center mb-10">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div> 
                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-5xl">
            
            <!-- Left Section -->
            <div class="md:w-1/2 space-y-5 text-center md:text-left">
              


@if (session('status'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-3">
        {{ session('status') }}
    </div>

    <script>
        console.log("{{ session('status') }}");
    </script>
@endif

                <h2 class="text-2xl font-bold">Enter Your OTP</h2>


                <form method="POST" action="/verify-otp" class="space-y-5 max-w-sm mx-auto md:mx-0">
                    @csrf 

                    <div class="flex flex-col items-center md:items-start">
                        <label for="otp" class="block text-gray-700 font-medium mb-1">OTP</label>
                        <input type="text" id="otp" name="otp" maxlength="6" required
                               class="w-60 px-4 py-2 border border-gray-300 rounded-md focus:border-blue-700 focus:ring-blue-700"
                               placeholder="000000" />
                               @error('otp')
                               <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                               @enderror
                    </div>

                  <!-- submit button -->
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-lime-300 border-2 border-blue-700 rounded-full font-semibold text-blue-700 hover:bg-yellow-400 transition">
                        Submit
                        <span class="text-lg">➜</span>
                    </button>

                    <!--  Error message --> 
                    @if(session('error'))
                        <p class="text-red-600 text-sm mt-2">{{ session('error') }}</p>
                    @endif
                </form>
            </div>

            <!-- Right Image -->
            <div class="md:w-1/2 flex justify-center mt-10 md:mt-0">
                <img src="{{ asset('images/imb-card_orange1.png') }}" alt="IMB Card" class="w-[400px] drop-shadow-xl">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-user-footer></x-user-footer>

</body>
</html>
