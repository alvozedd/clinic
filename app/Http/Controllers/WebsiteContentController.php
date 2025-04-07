<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    /**
     * Display a listing of the website content.
     */
    public function index()
    {
        $contents = WebsiteContent::all();
        return view('admin.website_content.index', compact('contents'));
    }

    /**
     * Show the form for editing the specified website content.
     */
    public function edit(WebsiteContent $content)
    {
        return view('admin.website_content.edit', compact('content'));
    }

    /**
     * Update the specified website content in the database.
     */
    public function update(Request $request, WebsiteContent $content)
    {
        // Validate the request
        $request->validate([
            'value' => 'required|string',
        ]);

        // Update the content
        $content->update($request->only('value'));

        return redirect()->route('admin.website_content.index')->with('success', 'Content updated successfully.');
    }
}