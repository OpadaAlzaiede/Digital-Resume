<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>{{ $cvData['personal_info']['name'] }} - Resume</title>
    <style>
        details > summary {
            list-style: none;
            cursor: pointer;
        }
        details > summary::-webkit-details-marker {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <a href="{{ route('cv.download') }}" class="fixed bottom-8 right-8 bg-blue-600 text-white rounded-full p-4 shadow-lg hover:bg-blue-700 transition-colors duration-200 flex items-center gap-2 z-50">
        <i class="fas fa-file-pdf text-xl"></i>
            <span>Download PDF</span>
    </a>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <details class="mb-6" open>
            <summary class="bg-white rounded-t-lg shadow-md p-6 hover:bg-gray-50">
                <h1 class="text-3xl font-bold text-gray-800 inline-flex items-center">
                    {{ $cvData['personal_info']['name'] }}
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </h1>
            </summary>
            <div class="bg-white rounded-b-lg shadow-md p-6 border-t">
                <p class="text-xl text-gray-600">{{ $cvData['personal_info']['title'] }}</p>
                <div class="mt-4 text-gray-600">
                    <p class="mb-2">{{ $cvData['personal_info']['email'] }} | {{ $cvData['personal_info']['phone'] }}</p>
                    <p class="mb-2">{{ $cvData['personal_info']['address'] }}</p>
                    <div class="flex gap-4 mt-3">
                        <a href="{{ $cvData['personal_info']['links']['website'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center gap-2">
                            <i class="fas fa-globe text-lg"></i>
                        </a>
                        <a href="{{ $cvData['personal_info']['links']['linkedin'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center gap-2">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="{{ $cvData['personal_info']['links']['github'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center gap-2">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                </div>
                </div>
                <p class="mt-4 text-gray-700">{{ $cvData['personal_info']['summary'] }}</p>
            </div>
        </details>

        <details class="mb-6" open>
            <summary class="bg-white rounded-t-lg shadow-md p-6 hover:bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800 inline-flex items-center">
                    Work Experience
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </h2>
            </summary>
            <div class="bg-white rounded-b-lg shadow-md p-6 border-t">
                @foreach($cvData['work_experience'] as $experience)
                    <div class="mb-6 last:mb-0">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $experience['position'] }}</h3>
                        <p class="text-gray-600 mb-2">{{ $experience['company'] }}</p>
                        <p class="text-gray-500 text-sm mb-2">
                            {{ $experience['start_date'] }} - {{ $experience['end_date'] ?? 'Present' }}
                        </p>
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach($experience['responsibilities'] as $responsibility)
                                <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </details>

        <details class="mb-6" open>
            <summary class="bg-white rounded-t-lg shadow-md p-6 hover:bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800 inline-flex items-center">
                    Education
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </h2>
            </summary>
            <div class="bg-white rounded-b-lg shadow-md p-6 border-t">
                @foreach($cvData['education'] as $education)
                    <div class="mb-6 last:mb-0">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $education['degree'] }}</h3>
                        <p class="text-gray-600 mb-2">{{ $education['institution'] }}</p>
                        <p class="text-gray-500 text-sm mb-2">{{ $education['start_date'] }} - {{ $education['end_date'] }}</p>
                        <p class="text-gray-700">{{ $education['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </details>

        <details class="mb-6" open>
            <summary class="bg-white rounded-t-lg shadow-md p-6 hover:bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800 inline-flex items-center">
                    Skills
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </h2>
            </summary>
            <div class="bg-white rounded-b-lg shadow-md p-6 border-t">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Technical Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($cvData['skills']['technical'] as $skill)
                                <span class="bg-gray-200 px-3 py-1 rounded-full text-gray-700">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Soft Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($cvData['skills']['soft'] as $skill)
                                <span class="bg-gray-200 px-3 py-1 rounded-full text-gray-700">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </details>

        <details class="mb-6" open>
            <summary class="bg-white rounded-t-lg shadow-md p-6 hover:bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800 inline-flex items-center">
                    Languages
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </h2>
            </summary>
            <div class="bg-white rounded-b-lg shadow-md p-6 border-t">
                <div class="flex flex-wrap gap-4">
                    @foreach($cvData['languages'] as $language)
                        <div class="bg-gray-100 px-4 py-2 rounded-lg">
                            <span class="font-semibold">{{ $language['name'] }}</span>
                            <span class="text-gray-600"> - {{ $language['proficiency'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </details>
    </div>
</body>
</html>
