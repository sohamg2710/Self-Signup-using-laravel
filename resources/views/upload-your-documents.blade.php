<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Your Documents - Self Sign-up</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <x-user-navbar></x-user-navbar>

    <section class="flex flex-col items-center justify-center py-10 md:py-16 px-6">
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

        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-5xl">
            <div class="md:w-1/2 space-y-5">
                <h2 class="text-lg font-semibold mb-6">Upload Your Documents</h2>

                <!-- ✅ Added method, action, enctype -->
                <form method="POST" action="{{ route('signup.uploadDocuments') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- ID Upload -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">
                            Upload good quality picture of your ID 
                            <span class="text-xs text-gray-500">(jpg, jpeg, png)</span>
                        </label>
                        <input type="file" name="id_document" required
                               class="block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-700">
                    </div>

                    <!-- Proof of Address -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Upload Proof of Address</label>
                        <input type="file" name="proof_of_address" required
                               class="block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-700">
                    </div>

                    <!-- Work Permit -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Upload Work Permit (optional)</label>
                        <input type="file" name="work_permit"
                               class="block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-700">
                    </div>

                    <!-- Dates -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Work Permit Issue Date</label>
                        <input type="date" name="issue_date"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Work Permit Expiry Date</label>
                        <input type="date" name="expiry_date"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-blue-700 focus:ring-blue-700">
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                           class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-lime-300 border-2 border-blue-700 rounded-full font-semibold text-blue-700 hover:bg-lime-400 transition">
                            Submit
                            <span class="text-lg">➜</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="md:w-1/2 flex justify-center mt-10 md:mt-0">
                <img src="{{ asset('images/imb-card_orange1.png') }}" alt="IMB Card" class="w-[400px] drop-shadow-xl">
            </div>
        </div>
    </section>

    <x-user-footer></x-user-footer>
</body>
</html>
