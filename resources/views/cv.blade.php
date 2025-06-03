<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Digital Resume</title>
</head>
<body class="bg-gray-100">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header Section -->
        <header class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $cvData['personal_info']['name'] }}
            </h1>
            <div class="mt-2 text-gray-600">
                <!-- Add more personal info here -->
                <p>Professional Title</p>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="bg-white rounded-lg shadow-md p-6 mb-6">
            <!-- Experience Section -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Experience</h2>
                <!-- Add experience content here -->
            </section>

            <!-- Education Section -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Education</h2>
                <!-- Add education content here -->
            </section>

            <!-- Skills Section -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Skills</h2>
                <!-- Add skills content here -->
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white rounded-lg shadow-md p-6">
            <div class="text-center text-gray-600">
                <p>Contact Information</p>
                <!-- Add contact details here -->
            </div>
        </footer>
    </div>
</body>
</html>
