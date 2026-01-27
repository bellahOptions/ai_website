@extends('layouts.theme')
@section('title', 'Contact Us - AI Digital Agency')
@section('content')
    <main class="bg-linear-to-b from-purple-50 to-white dark:from-gray-900 dark:to-gray-800">
        
        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-linear-to-br from-purple-700 via-purple-900 to-purple-800">            
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        <span class="text-sm text-white font-medium">We're here to help</span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        Let's Start a Conversation
                    </h1>
                    
                    <p class="text-lg md:text-xl text-purple-100 leading-relaxed max-w-2xl mx-auto">
                        Have a project in mind? We'd love to hear about it. Our team is ready to help bring your ideas to life.
                    </p>
                </div>
            </div>                     
        </section>

        <!-- Main Content -->
        <section class="py-12 md:py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 max-w-7xl mx-auto">
                    
                    <!-- Contact Information Sidebar -->
                    <div class="lg:col-span-2 space-y-6">
                        
                        <!-- Contact Cards -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100 dark:border-gray-700">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                                <span class="w-1.5 h-8 bg-linear-to-b from-purple-700 to-purple-900 rounded-full"></span>
                                Get In Touch
                            </h2> 
                            
                            <div class="space-y-6">
                                <!-- Phone -->
                                <div class="group">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 bg-linear-to-br from-purple-700 to-purple-900 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Phone</p>
                                            <a href="tel:+2347077776734" class="text-lg font-semibold text-gray-900 dark:text-white hover:text-purple-900 dark:hover:text-purple-400 transition-colors">
                                                +234 707 777 6734
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="group">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 bg-linear-to-br from-purple-700 to-purple-900 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Email</p>
                                            <a href="mailto:aidigitalagency08@gmail.com" class="text-lg font-semibold text-gray-900 dark:text-white hover:text-purple-900 dark:hover:text-purple-400 transition-colors break-all">
                                                aidigitalagency08@gmail.com
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="group">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 bg-linear-to-br from-purple-700 to-purple-900 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Location</p>
                                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Lagos State, Nigeria
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                            <div class="aspect-[4/3] w-full">
                                <iframe 
                                    class="w-full h-full" 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.9380274525274!2d3.3674707420482566!3d6.537333184432875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8dfdb843befb%3A0xf2de5f1f7bd17a63!2sAi%20Digital%20Agency!5e0!3m2!1sen!2sng!4v1769509776358!5m2!1sen!2sng" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="AI Digital Agency Location Map">
                                </iframe>
                            </div>
                        </div>

                        <!-- Social Proof -->
                        <div class="bg-linear-to-br from-purple-700 to-purple-900 rounded-2xl shadow-lg p-6 text-white">
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="font-bold text-lg">Quick Response</span>
                            </div>
                            <p class="text-purple-100">
                                We typically respond within 24 hours during business days.
                            </p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="lg:col-span-3">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 md:p-10 border border-gray-100 dark:border-gray-700">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                                Send us a Message
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-8">
                                Fill out the form below and we'll get back to you as soon as possible.
                            </p>
                            @if(session('success'))
<div class="bg-purple-300 text-purple-900 font-bold px-6 py-4 rounded-lg mb-6">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-200 text-red-600 font-bold px-6 py-4 rounded-lg mb-6">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="bg-red-200 text-red-600 font-bold px-6 py-4 rounded-lg mb-6">
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

                            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                                @csrf
                                
                                <!-- Full Name -->
                                <div>
                                    <label for="fullName" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="fullName" 
                                        id="fullName" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-purple-700 focus:ring-4 focus:ring-purple-700/10 transition-all duration-200 outline-none"
                                        placeholder="John Doe"
                                    >
                                </div>

                                <!-- Phone and Email Row -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Phone -->
                                    <div>
                                        <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            Phone Number <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="tel" 
                                            name="phone" 
                                            id="phone" 
                                            required
                                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-purple-700 focus:ring-4 focus:ring-purple-700/10 transition-all duration-200 outline-none"
                                            placeholder="+234 xxx xxx xxxx"
                                        >
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            Email Address <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="email" 
                                            name="email" 
                                            id="email" 
                                            required
                                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-purple-700 focus:ring-4 focus:ring-purple-700/10 transition-all duration-200 outline-none"
                                            placeholder="john@example.com"
                                        >
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Subject <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="subject" 
                                        id="subject" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-purple-700 focus:ring-4 focus:ring-purple-700/10 transition-all duration-200 outline-none"
                                        placeholder="How can we help you?"
                                    >
                                </div>

                                <!-- Message -->
                                <div>
                                    <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Message <span class="text-red-500">*</span>
                                    </label>
                                    <textarea 
                                        name="message" 
                                        id="message" 
                                        rows="6" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-purple-700 focus:ring-4 focus:ring-purple-700/10 transition-all duration-200 outline-none resize-none"
                                        placeholder="Tell us more about your project or inquiry..."
                                    ></textarea>
                                </div>

                                <!-- Privacy Notice -->
                                <div class="flex items-start gap-3 p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl border border-purple-100 dark:border-purple-800">
                                    <svg class="w-5 h-5 text-purple-900 dark:text-purple-400 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        Your information is secure and will only be used to respond to your inquiry.
                                    </p>
                                </div>

                                <!-- Submit Button -->
                                <button 
                                    type="submit" 
                                    class="w-full bg-linear-to-r from-purple-900 to-purple-900 hover:from-purple-700 hover:to-purple-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group"
                                >
                                    <span>Send Message</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Additional Info -->
                        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 text-center">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-5 h-5 text-purple-900 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">24/7 Support</p>
                            </div>
                            
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 text-center">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-5 h-5 text-purple-900 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Fast Response</p>
                            </div>
                            
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 text-center">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-5 h-5 text-purple-900 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Expert Team</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section (Optional Enhancement) -->
        <section class="py-16 bg-gray-50 dark:bg-gray-900/50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        Frequently Asked Questions
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Quick answers to common questions
                    </p>
                </div>

                <div class="space-y-4">
                    <details class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <summary class="flex items-center justify-between cursor-pointer p-6 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <span>What services do you offer?</span>
                            <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="px-6 pb-6 text-gray-600 dark:text-gray-400">
                            We offer strategic social media management designed to attract, engage, and convert. What this includes:

Content strategy & planning
Content creation & scheduling
Community management
Brand positioning & messaging
Growth-focused reporting
                        </div>
                    </details>

                    <details class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <summary class="flex items-center justify-between cursor-pointer p-6 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <span>How long does a typical project take?</span>
                            <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="px-6 pb-6 text-gray-600 dark:text-gray-400">
                            Project timelines vary based on scope and complexity. We'll provide a detailed timeline during our initial consultation.
                        </div>
                    </details>

                    <details class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <summary class="flex items-center justify-between cursor-pointer p-6 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <span>Do you offer ongoing support?</span>
                            <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="px-6 pb-6 text-gray-600 dark:text-gray-400">
                            Yes! We provide ongoing maintenance, support, and updates for all our projects to ensure long-term success.
                        </div>
                    </details>
                </div>
            </div>
        </section>
    </main>
@endsection