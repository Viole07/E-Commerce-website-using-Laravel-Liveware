<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Gaming Mouse
    \App\Models\Product::updateOrCreate(
        ['name' => 'Gaming Mouse'],
        [
            'description' => 'RGB 12000 DPI, Ergonomic Design',
            'price' => 3499.00, //
            'image' => 'https://images.unsplash.com/photo-1629429408209-1f912961dbd8?q=80&w=1170&auto=format&fit=crop'
        ]
    );
    
    // Mechanical Keyboard
    \App\Models\Product::updateOrCreate(
        ['name' => 'Mechanical Keyboard'],
        [
            'description' => 'Tactile Blue Switches, Rainbow Backlit',
            'price' => 6999.00, //
            'image' => 'https://images.unsplash.com/photo-1606075014584-5ccf554b50db?q=80&w=1332&auto=format&fit=crop'
        ]
    );

    // TWS Earbuds
    \App\Models\Product::updateOrCreate(
        ['name' => 'TWS Earbuds'],
        [
            'description' => 'Active Noise Cancellation, 30hr Battery',
            'price' => 2999.00, //
            'image' => 'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?q=80&w=1289&auto=format&fit=crop'
        ]
    );

    // Gaming Monitor
    \App\Models\Product::updateOrCreate(
        ['name' => 'Gaming Monitor'],
        [
            'description' => '27-inch 144Hz, 1ms Response Time',
            'price' => 18499.00, //
            'image' => 'https://images.unsplash.com/photo-1757774636742-0a5dc7e5c07a?q=80&w=1074&auto=format&fit=crop'
        ]
    );

    // Smartwatch
    \App\Models\Product::updateOrCreate(
        ['name' => 'Smartwatch'],
        [
            'description' => 'Amoled Display, Heart Rate & SpO2 Tracking',
            'price' => 3499.00, //
            'image' => 'https://images.unsplash.com/photo-1722153768985-9286321b8769?q=80&w=1332&auto=format&fit=crop'
        ]
    );

    // Power Bank
    \App\Models\Product::updateOrCreate(
        ['name' => 'Power Bank'],
        [
            'description' => '20000mAh, 22.5W Fast Charging',
            'price' => 1499.00, //
            'image' => 'https://images.unsplash.com/photo-1594843665794-446ce915d840?q=80&w=1170&auto=format&fit=crop'
        ]
    );
}
}
