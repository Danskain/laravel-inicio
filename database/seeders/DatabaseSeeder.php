<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;
use App\Models\Card;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::factory(20)
            ->create()
            ->each(function($user){
                $image = Image::factory()
                    ->user()
                    ->make();
                    
                    $user->image()->save($image);
                });
                
        $orders = Order::factory(10)
            ->make()
            ->each(function($order) use ($users) {
                $order->customer_id = $users->random()->id;
                $order->save();
        
                $payment = Payment::factory()->make();
                /* $payment->order_id = $order->id();
                $payment->save(); */

                $order->payment()->save($payment);
            });
            
            // \App\Models\User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]);
            $cards = Card::factory(20)->create();

            $products = Product::factory(50)
                ->create()
                ->each(function($product) use ($orders, $cards) {
                        $order = $orders->random();

                        $order->products()->attach([
                            $product->id => ['quantity' => mt_rand(1, 3)],
                        ]);


                        $card = $cards->random();

                        $card->products()->attach([
                            $product->id => ['quantity' => mt_rand(1, 3)],
                        ]);

                        $images = Image::factory(mt_rand(2, 4))->make();
                        $product->images()->saveMany($images);
                });
}
}
