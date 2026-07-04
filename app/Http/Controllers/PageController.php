<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactNotification;
use App\Models\Contact;
use App\Models\Post;
use App\Models\PortfolioItem;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $latestPosts = Post::published()->latest('published_at')->take(2)->get();

        $portfolioItems = PortfolioItem::published()->featured()->orderBy('sort_order')->take(8)->get();
        if ($portfolioItems->count() < 8) {
            $portfolioItems = $portfolioItems->concat(
                PortfolioItem::published()
                    ->whereNotIn('id', $portfolioItems->pluck('id'))
                    ->orderByDesc('created_at')
                    ->take(8 - $portfolioItems->count())
                    ->get()
            );
        }

        return view('welcome', compact('latestPosts', 'portfolioItems'));
    }
    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     */
    public function submitContact(ContactFormRequest $request)
    {
        try {
            // Save contact to database
            $contact = Contact::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Send notification email to admin
            Mail::to('sales@aidigitalagency.com.ng')->send(new ContactNotification($contact));

            return redirect()
                ->back()
                ->with('success', 'Thank you for contacting us! We\'ll get back to you soon.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Sorry, something went wrong. Please try again.');
        }
    }

    /**
     * Handle newsletter subscription from the footer form.
     */
    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'subscribe_email' => 'required|email|max:191',
        ]);

        Subscriber::firstOrCreate(['email' => $request->subscribe_email]);

        return back()->with('success', 'Thanks for subscribing!')->with('_newsletter', true);
    }

    public function blogList()
    {
        $posts = Post::published()->latest('published_at')->paginate(6);

        return view('blog.list', compact('posts'));
    }

    public function blogDetail(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(2)
            ->get();

        return view('blog.detail', compact('post', 'related'));
    }

    public function portfolio()
    {
        $items = PortfolioItem::published()->orderBy('sort_order')->orderByDesc('created_at')->paginate(12);

        return view('portfolio', compact('items'));
    }
}
