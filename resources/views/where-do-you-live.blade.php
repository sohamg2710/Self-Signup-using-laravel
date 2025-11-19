<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Where Do You Live? - Self Sign-up</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <x-user-navbar></x-user-navbar>

    <!-- Main Section -->
    <section class="flex flex-col items-center justify-center py-10 md:py-16 px-6">
        <h1 class="text-4xl font-bold text-blue-700 mb-8 text-center">Self Sign-up</h1>

        <!-- Step Indicator -->
        <div class="flex justify-center mb-10">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div> <!--  Highlighted this step -->
                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-5xl">

            <!-- Left Section -->
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-lg font-semibold mb-6">Where Do You Live?</h2>

             
                <form method="POST" action="/where-do-you-live" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Street Name and Number</label>
                        <input type="text" name="street" required placeholder="Lorem ipsum"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                                @error('street')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                 @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Suburb</label>
                        <input type="text" name="suburb" required placeholder="Lorem ipsum"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                                @error('suburb')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">City</label>
                        <input type="text" name="city" required placeholder="Lorem ipsum"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                                @error('city')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Postal Code</label>
                        <input type="text" name="postal_code" maxlength="6" required placeholder="0000"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                               @error('postal_code')
                               <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                               @enderror
                    </div>
                                    
                        <div> 
                            
    <label class="block text-gray-700 font-medium mb-1">Country</label>         
    <select name="country" id="countrySelect" required               
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
        <option value="">Select Country</option>

        @foreach($countries as $country)
            <option value="{{ $country->id }}"
                {{ request('country_id') == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>

    @error('country')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<div>
    <label class="block text-gray-700 font-medium mb-1">Province</label>
    <select name="province" id="provinceSelect" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
        <option value="">Select Province</option>

        @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
    </select>

    @error('province')
    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
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

    <x-user-footer></x-user-footer>

<script>
document.getElementById('countrySelect').addEventListener('change', async function() {
    let countryId = this.value;

    let provinceDropdown = document.getElementById('provinceSelect');
    provinceDropdown.innerHTML = '<option value="">Loading...</option>';

    try {
        let response = await fetch(`/get-provinces/${countryId}`);
        if (!response.ok) throw new Error("Route not found");

        let provinces = await response.json();

        provinceDropdown.innerHTML = '<option value="">Select Province</option>';

        provinces.forEach(province => {
            provinceDropdown.innerHTML += 
            `<option value="${province.id}">${province.name}</option>`;
        });

    } catch (error) {
        provinceDropdown.innerHTML = '<option value="">Not Available</option>';
        console.error(error);
    }
});
</script>


</body>
</html>
