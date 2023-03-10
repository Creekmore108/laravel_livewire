<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\ContactForm;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactFormTest extends TestCase
{
    /** @test */
    public function main_page_contains_contact_form_livewire_component()
    {
        $this->get('/examples')
            ->assertSeeLivewire('contact-form');
    }

    /** @test  */
    public function contact_form_sends_out_an_email()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Steve')
            ->set('email', 'steve.creekmore@gmail.com')
            ->set('phone', '720-688-9234')
            ->set('message', 'This is the test message')
            ->call('submitForm')
            ->assertSee('We got it');

            // Mail::assertSent(function (ContactFormMailable $mail) {
            //     $mail->build();
    
                // return $mail->hasTo('andre@andre.com') &&
                //     $mail->hasFrom('someguy@someguy.com') &&
                //     $mail->subject === 'Contact Form Submission';
            // });
    }

    /** @test */
    public function contact_form_name_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'someguy@someguy.com')
            ->set('phone', '12345')
            ->set('message', 'This is my message.')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function contact_form_message_field_has_minimum_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('message', 'abc')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'min']);
    }

}
