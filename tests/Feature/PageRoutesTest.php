<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_schema_and_seeded_records_match_the_pos_directories(): void
    {
        $this->assertTrue(Schema::hasColumns('customers', ['customer_id', 'full_name', 'email', 'phone', 'address', 'status']));
        $this->assertTrue(Schema::hasColumns('users', ['user_id', 'username', 'full_name', 'email', 'role', 'status']));
        $this->assertSame(8, Customer::query()->count());
        $this->assertSame(6, User::query()->count());
        $this->assertSame('Alyssa Mendoza', Customer::query()->whereKey('CUS-1001')->value('full_name'));
        $this->assertSame('sdelgado', User::query()->whereKey('USR-1001')->value('username'));
    }

    public function test_all_four_pages_render_with_working_navigation(): void
    {
        foreach (['/', '/about', '/customers', '/users'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('href="'.route('home').'"', false)
                ->assertSee('href="'.route('about').'"', false)
                ->assertSee('href="'.route('customers.index').'"', false)
                ->assertSee('href="'.route('users.index').'"', false);
        }
    }

    public function test_dashboard_and_directories_show_seeded_database_records(): void
    {
        $this->get('/')
            ->assertViewHas('customerCount', 8)
            ->assertViewHas('userCount', 6)
            ->assertViewHas('activeCount', 11);

        $this->get('/customers')
            ->assertSee('CUS-1001')
            ->assertSee('Alyssa Mendoza')
            ->assertSee('+63 917 555 0101')
            ->assertSee('Rafael Navarro');

        $this->get('/users')
            ->assertSee('USR-1001')
            ->assertSee('Sofia Delgado')
            ->assertSee('@sdelgado')
            ->assertSee('Jan 12, 2026')
            ->assertSee('Adrian Flores');
    }

    public function test_new_eloquent_records_appear_without_controller_changes(): void
    {
        Customer::create([
            'customer_id' => 'CUS-2001',
            'full_name' => 'Taylor Test',
            'email' => 'taylor@example.com',
            'phone' => '+63 999 000 0000',
            'address' => 'Manila',
            'status' => 'Active',
        ]);

        User::create([
            'user_id' => 'USR-2001',
            'username' => 'taylor',
            'full_name' => 'Taylor Teammate',
            'email' => 'teammate@example.com',
            'role' => 'Staff',
            'status' => 'Active',
        ]);

        $this->get('/')->assertViewHas('customerCount', 9)->assertViewHas('userCount', 7)->assertViewHas('activeCount', 13);
        $this->get('/customers')->assertSee('Taylor Test');
        $this->get('/users')->assertSee('Taylor Teammate')->assertSee('@taylor');
    }
}
