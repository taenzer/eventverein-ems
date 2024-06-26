<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $user = \App\Models\User::factory()->create([
            'name' => 'Moritz',
            'email' => 'admin@der-taenzer.net',
            'password' => '$2y$10$bYhzpsczfNrhE6/Pt7pdKOnyLF6e15WAmXSkPIlYOJ3P7bdw/YO3u'
        ]);


        Product::factory(10)->create();


        Event::factory(2)->create([
            "user_id" => $user->id,
        ])->each(function ($event) {
            Order::factory(random_int(100, 300))->create([
                "event_id" => $event->id,
            ])->each(function ($order) {
                $items = OrderItem::factory(random_int(1, 5))->create([
                    "order_id" => $order->id
                ]);
                $total = 0;
                foreach ($items as $item) {
                    $total += $item->itemTotal;
                }
                $order->total = $total;
                $order->update();
            });
        });
    }
}