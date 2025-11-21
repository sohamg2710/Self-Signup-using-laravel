<nav class="w-full h-20 bg-white flex items-center justify-between px-16   border-b border-blue-50 shadow-sm">

    <!-- Left Logo -->
    <div class="flex items-center space-x-3">
        <!-- <div class="flex items-center justify-center w-14 h-14 rounded-full border-2 border-blue-600 bg-blue-200"> -->
            <!-- <span class="text-2xl font-bold text-blue-700">imb</span> -->
             <img src="{{ asset('images/logo.png') }}" alt="IMB Logo" class="w-15 h-15 mb-3">
        </div>
    </div>

    <!-- Center Navigation -->
    <ul class="flex space-x-6 text-gray-500  text-lg">
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">Home</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">Smart Dr</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">Products & Services</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">About Us</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">Gallery</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">Legal</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">FAQ</a></li>
        <li><a href="#" class="hover:text-blue-600 border-b-[3px] border-transparent hover:border-blue-600 transition">Contact Us</a></li>
    </ul>

    <!-- Right Buttons -->
    <div class="flex items-center space-x-4">
        <a href="/personal-login" 
           class="px-5 py-1.5 rounded-full text-blue-700 font-semibold bg-gray-100   hover:bg-blue-50 transition">
            PERSONAL LOGIN
        </a>

        <a href="/self-signup" 
           class="px-6 py-1.5 rounded-full text-blue-700 font-bold bg-lime-300 border-2 border-blue-600 hover:bg-yellow-400 transition">
            SELF SIGN-UP
        </a>
    </div>

</nav>

