<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
    use App\Models\Event;
use App\Models\Registration;
use App\Models\Ticket;
use App\Models\User;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $organizer = User::factory()->create([
        'name' => 'Demo Organizer',
        'email' => 'organizer@example.test',
    ]);
    $event = Event::create([
        'organizer_id' => $organizer->id,
        'title' => 'Laravel Workshop Day',
        'description' => 'Build a useful web application.',
        'location' => 'Innovation Lab',
        'starts_at' => now()->addDays(7),
        'ends_at' => now()->addDays(7)->addHours(4),
        'status' => 'published',
    ]);
    $workshop = $event->workshops()->create([
        'title' => 'Blade Foundations',
        'description' => 'Templates, forms, and validation.',
        'capacity' => 30,
    ]);
    $student = User::factory()->create([
        'name' => 'Demo Student',
        'email' => 'student@example.test',
        'email_verified_at' => now(),
    ]);
    $registration = Registration::create([
        'user_id' => $student->id,
        'workshop_id' => $workshop->id,
        'status' => 'confirmed',
    ]);
    Ticket::create([
        'registration_id' => $registration->id,
        'code' => 'TKT-DEMO-001',
    ]);
}

}
