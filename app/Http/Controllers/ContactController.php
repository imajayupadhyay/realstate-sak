<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('ContactUs/Index');
    }

    public function store(StoreEnquiryRequest $request): RedirectResponse
    {
        $enquiry = $request->validated();

        // TODO: make dynamic — save $enquiry to an `enquiries` table and/or
        // email it to the office. For now it is only validated.

        return back()->with('success', 'Thank you! Our team will get in touch with you shortly.');
    }
}
