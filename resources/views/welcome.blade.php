@extends('layouts.theme')
@section('title', 'Welcome to AI Digital agency')
@section('content')
<main class="bg-purple-950 min-h-screen">
    <!--Hero-->
    <div class="hero flex flex-col start-cta py-30 h-screen relative overflow-hidden items-center">
          <!-- Animated Background -->
        <div class="absolute inset-0 bg-linear-to-br from-gray-900 via-purple-900 to-gray-900">
            <div class="absolute inset-0 opacity-30">
                <div class="absolute top-0 left-0 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
                <div class="absolute top-0 right-0 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-purple-900 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
            </div>
        </div>

         <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <svg class="absolute top-0 left-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.8"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative z-10 text-center mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-purple-100 text-center text-8xl font-bold">Welcome</h1>
        <p class="w-1/2 mx-auto text-center text-gray-100 text-xl my-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, at. Tempora doloribus temporibus dignissimos obcaecati quam nisi asperiores vitae velit provident labore maiores maxime cumque accusamus aspernatur, qui fuga nostrum.</p>
        <div class="flex flex-row justify-center w-full my-5 mx-auto space-x-10">
            <a href="" class="py-4 px-10 bg-purple-900 font-bold text-purple-100 rounded-lg border border-purple-500">Book an Appointment</a>
            <a href="" class="py-4 px-10 bg-gray-900 font-bold text-gray-100 rounded-lg border border-gray-500">Book an Appointment</a>
        </div>
</div>
         <!-- Floating Particles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="particle w-2 h-2 bg-purple-400 rounded-full absolute top-1/4 left-1/4 animate-float"></div>
            <div class="particle w-3 h-3 bg-purple-400 rounded-full absolute top-1/3 right-1/4 animate-float animation-delay-1000"></div>
            <div class="particle w-2 h-2 bg-purple-200 rounded-full absolute bottom-1/4 left-1/3 animate-float animation-delay-2000"></div>
            <div class="particle w-3 h-3 bg-purple-400 rounded-full absolute bottom-1/3 right-1/3 animate-float animation-delay-3000"></div>
        </div>
    </div>

</main>

@endsection