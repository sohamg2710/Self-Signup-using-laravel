<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Your Documents - Self Sign-up</title>
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
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
                <div class="w-3 h-3 bg-blue-700 rounded-full"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-5xl">

            <!-- Left Section -->
            <div class="md:w-1/2 space-y-5">
                <h2 class="text-lg font-semibold mb-6">Upload Your Documents</h2>

                <form class="space-y-5" enctype="multipart/form-data">
                    <!-- ID Upload -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">
                            Upload good quality picture of your ID 
                            <span class="text-xs text-gray-500">(jpg, jpeg, png)</span>
                        </label>
                        <button type="button" class="flex items-center gap-2 px-4 py-2 bg-indigo-100 text-blue-700 border border-blue-700 rounded-full font-medium hover:bg-indigo-200 transition">
                            File Uploaded ⭳
                        </button>
                    </div>

                    <!-- Proof of Address -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Upload Proof of Address</label>
                        <input type="file" class="block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-700">
                    </div>

                    <!-- Work Permit -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Upload good quality picture of your work permit (optional)</label>
                        <input type="file" class="block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-700">
                    </div>

                    <!-- Dates -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Work Permit Issue Date</label>
                        <input type="date" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Work Permit Expiry Date</label>
                        <input type="date" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <a href="/signup-success"
                           class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-lime-300 border-2 border-blue-700 rounded-full font-semibold text-blue-700 hover:bg-lime-400 transition">
                            Submit
                            <span class="text-lg">➜</span>
                        </a>
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
