<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'A Simple Social Media Marketing Checklist for Businesses',
                'category' => 'strategy',
                'cover_image' => 'one.png',
                'published_at' => '2025-06-01',
                'excerpt' => 'A quick checklist to keep your brand consistent and visible online, even on your busiest weeks.',
                'body' => "<p>Social media doesn't have to feel overwhelming. Most brands that struggle to stay consistent aren't lacking ideas — they're lacking a simple system to follow. Here's a checklist to keep you on track.</p>"
                    . "<p><strong>1. Know your audience.</strong> Before you post anything, be clear on who you're talking to and what they care about.</p>"
                    . "<p><strong>2. Plan a week ahead.</strong> A simple content calendar — even a basic spreadsheet — saves you from last-minute scrambling.</p>"
                    . "<p><strong>3. Mix your content types.</strong> Balance promotional posts with educational and behind-the-scenes content so your page doesn't feel like one long advert.</p>"
                    . "<p><strong>4. Reply to every comment and DM.</strong> Engagement is a two-way conversation, not a broadcast.</p>"
                    . "<p><strong>5. Review what's working monthly.</strong> Check which posts performed best and do more of that.</p>"
                    . "<p>Consistency beats perfection. A brand that shows up reliably every week will always outperform one that posts brilliantly once a month.</p>",
            ],
            [
                'title' => 'Transforming Social Media Challenges into Opportunities',
                'category' => 'growth',
                'cover_image' => 'two.png',
                'published_at' => '2025-05-15',
                'excerpt' => 'Common social media struggles — low engagement, inconsistent posting, unclear messaging — are all fixable with the right approach.',
                'body' => "<p>Every business owner runs into the same social media frustrations at some point: low engagement, inconsistent posting, or simply not knowing what to say. The good news is that each of these challenges points to a fixable gap, not a dead end.</p>"
                    . "<p><strong>Low engagement</strong> is usually a signal that your content isn't speaking to a specific enough audience. Narrowing your focus almost always increases connection.</p>"
                    . "<p><strong>Inconsistent posting</strong> is rarely about motivation — it's about missing a repeatable process. A content calendar and a batch-creation habit fix this quickly.</p>"
                    . "<p><strong>Unclear messaging</strong> comes from trying to speak to everyone at once. The brands that grow fastest are usually the most specific about who they serve and how.</p>"
                    . "<p>Treat every challenge as information, not failure. The brands that grow are the ones that adjust quickly, not the ones that got it right the first time.</p>",
            ],
            [
                'title' => '5 Content Ideas Nigerian SMEs Can Post This Week',
                'category' => 'strategy',
                'cover_image' => 'three.png',
                'published_at' => '2025-07-10',
                'excerpt' => 'Simple, low-effort content ideas that still build trust and visibility for small businesses.',
                'body' => "<p>You don't need a big budget or a production team to post good content consistently. Here are five ideas any small business can shoot with a phone this week.</p>"
                    . "<p><strong>1. A behind-the-scenes look</strong> at how your product is made or your service is delivered.</p>"
                    . "<p><strong>2. A customer question, answered</strong> — turn something you get asked often into a short post.</p>"
                    . "<p><strong>3. A before-and-after</strong> showing the transformation your product or service provides.</p>"
                    . "<p><strong>4. A team introduction</strong> — people trust brands they can put a face to.</p>"
                    . "<p><strong>5. A simple testimonial</strong> — even a screenshot of a happy customer's message works.</p>"
                    . "<p>None of these require a studio. They require a phone, a bit of intention, and the discipline to post regularly.</p>",
            ],
            [
                'title' => 'Why Consistency Beats Virality for Small Business Pages',
                'category' => 'growth',
                'cover_image' => 'four.png',
                'published_at' => '2025-08-05',
                'excerpt' => 'Chasing a viral moment is a poor growth strategy. Steady, reliable posting builds the trust that actually drives sales.',
                'body' => "<p>It's tempting to chase the one viral post that changes everything. But for most small businesses, virality is the wrong goal — consistency is what actually builds a customer base.</p>"
                    . "<p>A viral post brings a flood of attention from people who don't know your brand and may never buy from you. Consistent, steady posting builds familiarity with the people most likely to become paying customers.</p>"
                    . "<p>Trust is built through repetition. The more often someone sees your brand show up with something useful or relevant, the more likely they are to remember you when they're ready to buy.</p>"
                    . "<p>Instead of asking 'how do I go viral,' ask 'how do I show up reliably for the next 90 days.' That question is far more likely to grow your business.</p>",
            ],
            [
                'title' => 'How to Turn WhatsApp Status Into a Sales Channel',
                'category' => 'strategy',
                'cover_image' => 'five.png',
                'published_at' => '2025-09-01',
                'excerpt' => 'WhatsApp Status is one of the most underused sales tools available to Nigerian businesses. Here is how to use it well.',
                'body' => "<p>For many Nigerian business owners, WhatsApp is already where customers reach out — but WhatsApp Status is often left unused as a sales tool.</p>"
                    . "<p><strong>Post product updates regularly.</strong> New stock, new services, or limited offers all work well as short Status updates.</p>"
                    . "<p><strong>Share real customer moments.</strong> A quick photo of a delivered order or a happy customer builds trust quickly.</p>"
                    . "<p><strong>Keep a rhythm.</strong> A few updates a week keeps your business top of mind without overwhelming your contacts.</p>"
                    . "<p><strong>Make it easy to buy.</strong> Always be clear about how someone can order — a direct message is usually enough.</p>"
                    . "<p>WhatsApp Status won't replace a full social media strategy, but for many small businesses it's one of the fastest, lowest-cost ways to stay visible to people who already know them.</p>",
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate(
                ['slug' => Str::slug($post['title'])],
                array_merge($post, ['slug' => Str::slug($post['title'])])
            );
        }
    }
}
