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

        <div class="px-5 z-10 md:w-1/2 text-center mx-auto sm:px-6 lg:px-8">
        <h1 class="text-purple-100 text-center md:text-8xl text-3xl font-bold" style="color:#fdf9ff">Welcome</h1>
        <p class="w-full mx-auto text-center text-gray-100 text-xl my-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, at. Tempora doloribus temporibus dignissimos obcaecati quam nisi asperiores vitae velit provident labore maiores maxime cumque accusamus aspernatur, qui fuga nostrum.</p>
        <div class="flex flex-col space-y-5 md:flex-row justify-center w-full my-5 mx-auto space-x-10">
            <a href="" class="flex justify-between py-4 px-10 bg-purple-900 font-bold w-full text-purple-100 rounded-lg border border-purple-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
</svg>
Book an Appointment
</a>
             <a href="" class="flex justify-between py-4 px-10 bg-purple-900 font-bold w-full text-purple-100 rounded-lg border border-purple-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
</svg>
Book an Appointment
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
                <p class="text-xl font-bold">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio distinctio aperiam sapiente reprehenderit molestiae incidunt error ipsum suscipit, sequi accusamus obcaecati alias ab cum est commodi numquam officia sed voluptatibus.</p>
            </div>
            <div class="img">
                <img src="https://placehold.co/600x400" class="rounded-xl rotate-2 bg-purple-100"/>
            </div>
        </div>
    </section>

    <!--Services -->
    <section class="bio py-30 bg-purple-100 px-10 md:px-50">
        <div class="what-we-do my-5 py-20">
            <h1 class="text-4xl text-center font-bold mb-5">What we do</h1>
            <p class="text-center text-xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam asperiores reprehenderit dicta, suscipit neque commodi, expedita consectetur iusto ex, cumque tempora maiores repellat quo at doloremque ipsam voluptatum sint aliquid.</p>
            <div class="grid grid-cols-1 mt-10 md:grid-cols-4 gap-5">
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
    <section class="cs">
        <div class="clients my-5 py-20 px-10 md:px-50">
            <h1 class="text-4xl text-center font-bold mb-5">Our Clients</h1>
            <p class="text-center text-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-10 mt-10 items-center">
                <div class="client-logo flex justify-center items-center">
                    <img src="https://placehold.co/150x80" />
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="https://placehold.co/150x80" />
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="https://placehold.co/150x80" />
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="https://placehold.co/150x80" />
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="https://placehold.co/150x80" />
                </div>
                <div class="client-logo flex justify-center items-center">
                    <img src="https://placehold.co/150x80" />
                </div>
            </div>
        </div>
    </section>

    <!---why us section-->
    <section class="why-us bg-purple-950 py-40 px-10 md:px-50">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="img">
                <img src="https://placehold.co/600x400" class="rounded-xl -rotate-2 bg-purple-100"/>
            </div>
            <div class="content">
                <h1 class="text-4xl text-purple-200 font-bold mb-5">Why Choose Us?</h1>
                <p class="text-xl mb-5 text-purple-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                <ul class="md:text-xl space-y-3">
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 sm:hidden mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>
    
                    Experienced Professionals: Our team consists of skilled experts in their respective fields.</li >
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-10 size-10 mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>    
                    Customized Solutions: We tailor our services to meet your specific needs and goals.</li>
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-10 size-10 mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>    
                    Quality Assurance: We are committed to delivering high-quality results that exceed your expectations.</li>
                    <li class="bg-purple-900 py-4 px-5 flex justify-between items-center space-x-8 overflow-x-wrap rounded-xl border border-purple-700 text-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-10 size-10 mr-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>    
                    Excellent Customer Support: Our support team is always ready to assist you.</li>
                </ul>
            </div>
        </div>
    </section>

    <!--Testimonials Section-->
    <section class="testimonials px-10 md:py-30 bg-purple-100 md:px-50">
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
    <section class="cta bg-purple-900 m-15 rounded-2xl text-purple-100 py-20 px-10 md:px-50">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-5">Ready to Get Started?</h1>
            <p class="text-xl mb-10">Contact us today to discuss your project and discover how we can help you achieve your goals.</p>
            <a href="" class="bg-purple-100 text-purple-900 font-bold py-4 px-10 rounded-lg">Contact Us</a>
        </div>
    </section>      

</main>

@endsection