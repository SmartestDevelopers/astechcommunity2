<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HireRequest;
use App\Freelancer;

class HireController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'freelancer_id' => 'required|exists:freelancers,id',
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'project_brief' => 'required|string|min:10',
        ]);

        $hireRequest = HireRequest::create($data);

        return redirect()->route('freelancers.show', $data['freelancer_id'])
            ->with('success', 'Your hire request has been sent. We will contact you shortly.');
    }
}


