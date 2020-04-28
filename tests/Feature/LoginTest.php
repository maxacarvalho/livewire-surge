<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_login_page()
    {
        $this->get(route('auth.login'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.login');
    }

    /** @test */
    public function is_redirected_if_already_logged_in()
    {
        auth()->login(
            factory(User::class)->create()
        );

        $this->get(route('auth.login'))
            ->assertRedirect('/');
    }

    /** @test */
    public function can_login()
    {
        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'secret')
            ->call('login');

        $this->assertTrue(
            auth()->user()->is(User::where('email', $user->email)->first())
        );
    }

    /** @test */
    public function is_redirected_to_intended_after_login_prompt_from_auth_guard()
    {
        Route::get('/intended')->middleware('auth');

        $user = factory(User::class)->create();

        $this->get('/intended')->assertRedirect('/login');

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'secret')
            ->call('login')
            ->assertRedirect('/intended');
    }

    /** @test */
    public function is_redirected_to_root_after_login()
    {
        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'secret')
            ->call('login')
            ->assertRedirect('/');
    }

    /** @test */
    public function email_is_required()
    {
        factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('password', 'secret')
            ->call('login')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function email_must_be_valid_email()
    {
        factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', 'invalid-email')
            ->set('password', 'secret')
            ->call('login')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function password_is_required()
    {
        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->call('login')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    public function bad_login_attempt_shows_message()
    {
        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'bad-password')
            ->call('login')
            ->assertHasErrors('email');

        $this->assertNull(auth()->user());
    }
}
