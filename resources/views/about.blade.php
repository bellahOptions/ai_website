@extends('layouts.theme')
@section('title', 'About AI Digital Agency')
@section('content')
    <main class="bg-purple-100 ">
        <!--Title-->
        <section class="bg-linear-to-bl from-purple-700 to-purple-900">
            <div class="py-20 flex flex-col px-8 md:px-20 md:w-1/2 mx-auto">
                <h1 class="text-5xl mb-4 text-center text-purple-100">About Us</h1>
                <p class="text-center text-2xl text-purple-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, sunt quam iste eligendi, doloribus assumenda placeat a, deserunt qui quo doloremque ratione explicabo rerum non impedit! Repudiandae voluptas eaque neque!</p>
            </div>
        </section>

        <!--Short Bio-->
    <section class="bio px-10 md:py-30 my-20 bg-purple-100 md:px-50">
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
    </main>
@endsection