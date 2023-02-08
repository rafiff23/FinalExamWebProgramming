<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessController extends Controller
{
    //
    function ShowSuccess()
    {
        return view('success', [
            'title' => 'Success!',
            'message' => 'We will contact you 1x24 hours.',
            'link_message' => 'Click here to"Home"',
            'uri' => '/home'
        ]);
    }
}
