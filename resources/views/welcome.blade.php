@extends('layouts.theme')
@section('title', 'Welcome to AI Digital agency')
@section('content')
<main class="bg-purple-100 ">
    <!--Hero-->
    <div class="hero flex flex-col mn-h-screen mb-20 start-cta py-30 md:py-40 md:px-50 h-auto relative overflow-hidden items-center">
          <!-- Animated Background -->
        <div class="absolute inset-0 bg-linear-to-br from-gray-900 via-purple-900 to-purple-800 overflow-hidden">
            <div class="absolute inset-0 opacity-30">
                <div class="absolute top-0 left-0 w-72 h-auto bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
                <div class="absolute top-0 right-0 w-72 h-auto bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-0 left-1/2 w-72 h-auto bg-purple-900 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
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

        <div class="px-5 z-10 w-full md:w-1/2 text-center mx-auto sm:px-6 lg:px-8" style="@media (max-width: 768px) { width:60%}">
        <h1 class="text-purple-100 text-center md:text-8xl text-3xl font-bold" style="color:#fdf9ff">Building Brands That <span class="bg-purple-700 px-5 md:py-2 md:text-7xl font-bold my-2 rotate-1 rounded-xl border border-purple-500">Thrive</span></h1>
        <p class="w-full mx-auto text-center text-gray-100 text-xl my-5">We help brands show up with audacity through strategic social media management that drives visibility, engagement, and growth</p>
            <a href="" class="flex justify-center space-x-5 mx-auto my-5 py-4 px-10 bg-purple-900 font-bold md:w-1/2 w-full text-purple-100 rounded-lg border border-purple-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
</svg>
 Book a Clarity Call today
</a>
             
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

    <!--Short Bio-->
    <section class="bio px-10 md:py-30 bg-purple-100 md:px-50">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-10">
            <div class="bio">
                <p class="text-xl font-bold">AI Digital Agency is a results-driven digital solutions company helping brands stand out in today’s crowded digital space. We currently specialize in social media management, helping brands become visible, relevant, and unforgettable online.</p>
                <p class="text-xl font-bold text-purple-600 bg-purple-200 py-5 my-4 px-2 rounded-xl text-center">Our mission is to empower brands to show up boldly and grow with integrity.</p>
            </div>
            <div class="img">
                <img src="https://www.searchsolutiongroup.com/wp-content/uploads/2023/09/hiring-manager-smiling-1.webp" class="rounded-xl rotate-2 bg-purple-100"/>
            </div>
        </div>        
    </section>
    <!--the problem-->
        <div class="text-purple-100 text-center bg-linear-to-bl from-purple-700 to-purple-900 px-6 py-20  sm:my-10 md:py-30 bg-purple-100 md:px-50">
            <div class="md:w-1/2 mx-auto">
            <h1 class="text-purple-100 text-5xl mb-5">The Problem</h1>
            <p class="text-xl mb-5">Running a business already demands your full attention. <br>
Most business owners understand that social media matters. They know visibility leads to trust, and trust leads to sales. But social media isn’t magic, it requires time, consistency, and strategy.
<span class="bg-purple-500 p-1 rounded-lg">And that’s the challenge.</span></p>
<p class="text-xl mb-5">Between managing operations, serving customers, and handling day-to-day realities that keep the business running, there’s little time left to:</p>
<ul class="md:text-xl space-y-1 my-5">
                    <li class="bg-purple-900 py-4 px-5 flex items-center space-x-15 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">                   
                    <span class="bg-purple-300 p-2 mx-6"></span>
                    Plan content consistently</li >
                    <li class="bg-purple-900 py-4 px-5 flex items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                   <span class="bg-purple-300 p-2 mx-6"></span>
                   Study trends and platform algorithms</li>
                    <li class="bg-purple-900 py-4 px-5 flex items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <span class="bg-purple-300 p-2 mx-6"></span>
                    Show up online with clarity and intention</li>
                    <li class="bg-purple-900 py-4 px-5 flex items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">                    
                    <span class="bg-purple-300 p-2 mx-6"></span>
Stay disciplined long enough to see results</li>
                </ul>

<p class="text-xl mb-5">So social media becomes something important, but never urgent enough.
Some businesses try to handle it themselves, but without the time to stay consistent or strategic, effort gets scattered and growth stalls.
</p>
</div>
        </div>

        <!--WHY THIS MATTERS-->
        <div class="#">
            <div class="text-purple-100 py-20 text-center bg-linear-to-bl from-purple-700 to-purple-900 px-7 md:py-30 bg-purple-100 md:px-50">
            <div class="md:w-1/2 mx-auto">
            <h1 class="text-purple-100 text-5xl mb-5">Why This Matters</h1>
            <span class="text-5xl mb-6">Over <span class="rotate-1" style="font-weight: bolder">5.3 billion</span> people spend <span class="rotate-1" style="font-weight: bolder">2+ hours</span>  daily on social media.</span>
            <p class="text-xl my-5">Your audience is already there, but staying visible requires more than occasional posting. It requires focus most business owners simply don’t have the capacity to give.
        </div>
            </div>
            </div>

    <!--Services -->
    <section class="bio py-20 md:py-30 bg-purple-50 px-5 mx-auto md:px-50" style="@media (max-width: 480px) { margin: 0; padding:0;}">
        <div class="what-we-do my-5 py-20 text-gray-700">
            <h1 class="text-4xl text-center text-gray-900 font-bold mb-5">What we do</h1>
            <span class="w-1/2" style="width:70%"> 
            <p class="text-center text-3xl mb-3" style="font-style: italic;">That’s where we come in.</p>
            <p class="text-center text-xl">We take social media off their plate, so they can focus on running their business, while their brand shows up consistently, strategically, and confidently online.</p>
            <p class="text-center text-xl">We don’t just post. <span class="text-purple-500 text-3xl" style="font-style: italic; font-weight: normal"> We manage their presence with intention, patience, and long-term growth in mind.</span></p>
            </span>
            <div class="flex flex-row-reverse space-x-9 md:px-15 py-20 md:py-30 w-auto bg-white mt-7 rounded-xl">
                <div class="mx-10 w-full text-xl text-gray-700">
                    <h1 class="mb-3 text-3xl text-gray-500">OUR SOLUTION (FOCUSED) </h1>
                    <p>
                        We offer strategic social media management designed to attract, engage, and convert.
What this includes:
<ul class="flex flex-wrap space-y-5 md:space-x-5 w-full my-4">
    <li class="bg-purple-200  w-full md:w-auto rounded-xl p-4 text-purple-900 font-bold text-base md:text-xl mb-3">Content strategy & planning</li>
    <li class="bg-purple-200 rounded-xl p-4 text-purple-900 font-bold text-base md:text-xl  w-full md:w-auto mb-3">Content creation & scheduling</li>
    <li class="bg-purple-200 rounded-xl p-4 text-purple-900 font-bold text-base md:text-xl w-full md:w-auto mb-3">Community management</li>
    <li class="bg-purple-200 rounded-xl p-4 text-purple-900 font-bold text-base md:text-xl  w-full md:w-auto mb-3">Brand positioning & messaging</li>
    <li class="bg-purple-200 rounded-xl p-4 text-purple-900 font-bold text-base md:text-xl  w-full md:w-auto mb-3">Brand positioning & messagingg</li>
    <li class="bg-purple-200 rounded-xl p-4 text-purple-900 font-bold text-base md:text-xl w-full md:w-auto mb-3">Growth-focused reporting</li>
</ul>
Everything we do is built around one goal: helping your brand thrive online
                    </p>
                </div>
                <div class="hidden">
                    <img src="https://placehold.co/600x600" class="w-full h-auto rotate-2 rounded-3xl" alt="" srcset="">
                </div>
            </div>
            <div class="hidden grid grid-cols-1 mt-10 md:grid-cols-4 gap-5">
                <div class="card bg-white rounded-xl overflow-hidden pb-10 flex flex-col">
                    <img class="mb-5" src="https://placehold.co/100x70" />
                    <h2 class="text-center text-purple-800 font-bold text-2xl">Social Media management</h2>
                    <p class="text-center my-5 px-5 md:px-10 text-xl text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="bg-purple-300 flex space-4 justify-between px-2 md:px-5 text-purple-600 font-bold py-4 w-full md:w-1/2 text-center md:mx-auto rounded-lg" style="width: 80%; margin: 0 auto;">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </button>
                </div>
                <div class="card bg-white rounded-xl overflow-hidden pb-10 flex flex-col">
                    <img class="mb-5" src="https://placehold.co/100x70" class="h-10"/>
                    <h2 class="text-center text-purple-800 font-bold text-2xl">Graphic Design</h2>
                    <p class="text-center my-5 px-5 md:px-10 text-xl text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="bg-purple-300 flex space-4 justify-between px-2 md:px-5 text-purple-600 font-bold py-4 w-full md:w-1/2 text-center md:mx-auto rounded-lg" style="width: 80%; margin: 0 auto;">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </button>
                </div>
                <div class="card bg-white rounded-xl overflow-hidden pb-10 flex flex-col">
                    <img class="mb-5" src="https://placehold.co/100x70" />
                    <h2 class="text-center text-purple-800 font-bold text-2xl">Graphic Design</h2>
                    <p class="text-center my-5 px-5 md:px-10 text-xl text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="bg-purple-300 flex space-4 justify-between px-2 md:px-5 text-purple-600 font-bold py-4 w-full md:w-1/2 text-center md:mx-auto rounded-lg" style="width: 80%; margin: 0 auto;">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </button>
                </div>
                <div class="card bg-white rounded-xl overflow-hidden pb-10 flex flex-col">
                    <img class="mb-5" src="https://placehold.co/100x70" />
                    <h2 class="text-center text-purple-800 font-bold text-2xl">Graphic Design</h2>
                    <p class="text-center my-5 px-5 md:px-10 text-xl text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button class="bg-purple-300 flex space-4 justify-between px-2 md:px-5 text-purple-600 font-bold py-4 w-full md:w-1/2 text-center md:mx-auto rounded-lg" style="width: 80%; margin: 0 auto;">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!--Client section(a list of clients/associations and their brand logo)-->
    <section class="cs bg-white text-gray-600">
        <div class="clients my-5 py-20 px-10 md:px-50">
            <h1 class="text-4xl text-center font-bold mb-5">Our Clients</h1>
            <p class="text-center text-xl">We work with: 
                <span class="text-purple-700"> SMEs and startups,  </span>
            <span class="text-purple-800"> NGOs and social enterprises,  </span>
            <span class="text-purple-700">Service-based businesses </span>
            Creators, educators, and personal brands
</p>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-10 mt-10 items-center">
                <div class="client-logo flex justify-center items-center">
                    <img src="{{asset('1.jpg')}}" class="w-150 grayscale hover:grayscale-0"/>
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="{{asset('2.jpg')}}" class="w-150 grayscale hover:grayscale-0"/>
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="{{asset('3.jpg')}}" class="w-150 grayscale hover:grayscale-0"/>
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="{{asset('1.jpg')}}" class="w-150 grayscale hover:grayscale-0"/>
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="{{asset('3.jpg')}}" class="w-150 grayscale hover:grayscale-0"/>
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="{{asset('2.jpg')}}" class="w-150 grayscale hover:grayscale-0"/>
                </div>
            </div>
        </div>
    </section>

    <!---why us section-->
    <section class="why-us bg-purple-950 py-40 px-10 md:px-50">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="img">
                <img src="https://wp.technologyreview.com/wp-content/uploads/2024/11/DeepLearningIndaba-Image-1.jpg" class="rounded-xl -rotate-2 bg-purple-100"/>
            </div>
            <div class="content">
                <h1 class="text-4xl text-purple-200 font-bold mb-5">Why Choose Us?</h1>
                <p class="text-xl mb-5 text-purple-200">Why Brands Choose AI Digital Agency</p>
                <ul class="md:text-xl space-y-3">
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 sm:hidden mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>Focused Expertise  - We’re not scattered. We do social media and we do it well.</li >
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-10 size-10 mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>    Strategy Before Aesthetics - Every post, caption, and campaign has a purpose.</li>
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-10 size-10 mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>    
                    Audacity with Integrity - We help brands show up boldly while operating with honesty and care.</li>
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-10 size-10 mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>    
                    Genuine Care - We are personally invested in the growth of every brand we manage.</li>
                </ul>
            </div>
        </div>
    </section>

    <!--Testimonials Section-->
    <section class="hidden testimonials px-10 md:py-30 bg-purple-100 md:px-50">
        <div class="my-5 py-20">
            <h1 class="text-4xl text-center font-bold mb-5">What Our Clients Say</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
                <div class="testimonial bg-white rounded-xl p-10">
                    <p class="text-gray-600 italic">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel urna nec leo facilisis cursus. Sed euismod, nunc at convallis."</p>
                    <h3 class="mt-5 font-bold text-purple-800">John Doe</h3>
                    <p class="text-gray-500">CEO, Acme Corp</p>
                </div>
                <div class="testimonial bg-white rounded-xl p-10">
                    <p class="text-gray-600 italic">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel urna nec leo facilisis cursus. Sed euismod, nunc at convallis."</p>
                    <h3 class="mt-5 font-bold text-purple-800">Jane Smith</h3>
                    <p class="text-gray-500">Marketing Manager, Beta Inc</p>
                </div>
                <div class="testimonial bg-white rounded-xl p-10">
                    <p class="text-gray-600 italic">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel urna nec leo facilisis cursus. Sed euismod, nunc at convallis."</p>
                    <h3 class="mt-5 font-bold text-purple-800">Alice Johnson</h3>
                    <p class="text-gray-500">Founder, Gamma LLC</p>
                </div>
            </div>
        </div>
    </section>

    <!--CTA Section-->
    <section class="cta bg-purple-900 md:m-15 md:rounded-2xl text-purple-100 py-20 px-10 md:px-50">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-5">Ready to Get Started?</h1>
            <p class="text-xl mb-10">Ready to build a consistent and visible social media presence?</p>
            <a href="" class="bg-purple-100 text-purple-900 font-bold py-4 px-10 rounded-lg">Book a Clarity Call</a>
        </div>
    </section>      

</main>

@endsection