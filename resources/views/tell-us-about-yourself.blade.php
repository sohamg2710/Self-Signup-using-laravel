<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tell Us About You - Self Sign-up</title>
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
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div> <!-- ✅ Updated current step -->
                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-5xl">

            <!-- Left Section -->
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-lg font-semibold">Tell Us About You</h2>

                
                <form method="POST" action="/tell-us-about-yourself" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">First name</label>
                        <input type="text" name="first_name" required
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700"
                               placeholder="Lorem ipsum">
                    @error('first_name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div> 

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Last name</label>
                        <input type="text" name="last_name" required
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700"
                               placeholder="Lorem ipsum">
                    @error('last_name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Date of birth</label>
                        <input type="date" name="date_of_birth" required
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                    @error('date_of_birth')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                   @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Gender</label>
                        <select name="gender" required
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                            <option value="">Select</option>
                            @foreach($validGender as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    @error('gender')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                   @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">ID Type</label>
                        <select name="id_type" required
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                            <option value="">Select</option>
                            @foreach($validId as $type)
                     <option value="{{ $type }}">{{ $type }}</option>
                              @endforeach
                        </select>
                    @error('id_type')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Document Number</label>
                        <input type="text" name="id_number" required
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700"
                               placeholder="Lorem ipsum">
                     @error('id_number')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
                   @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Country of issue</label>
                        <input type="text" name="country_of_issue" required
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700"
                               placeholder="Lorem ipsum">
                    @error('country_of_issue')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div> 


                    <div class="pt-4">
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-lime-300 border-2 border-blue-700 rounded-full font-semibold text-blue-700 hover:bg-lime-400 transition">
                            Next
                            <span class="text-lg">➜</span>
                        </button>
                    </div>
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
