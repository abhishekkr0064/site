<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function setLocale(Request $request)
    {
        $locale = $request->input('locale');
        $allowed = ['en', 'fr']; // extend as needed

        if (! in_array($locale, $allowed)) {
            return response()->json(['ok' => false, 'message' => 'Locale not supported'], 422);
        }

        // Create session cookie (0 minutes => session cookie)
        // Cookie::make(name, value, minutes)
        $cookie = Cookie::make('locale', $locale, 0, '/', null, false, true, false, 'Lax');

        // Optionally set userCountry and userCurrency cookies if provided
        $country = $request->input('country'); // optional
        if ($country) {
            $cookieCountry = Cookie::make('userCountry', $country, 0, '/', null, false, true, false, 'Lax');
            Cookie::queue($cookieCountry);
        }

        Cookie::queue($cookie);

        // Also set app locale for the current request
        App::setLocale($locale);

        return response()->json(['ok' => true, 'locale' => $locale])->withCookie($cookie);
    }

    /**
     * Optional: GET endpoint for simple redirects (web)
     */
    public function setLocaleRedirect($locale)
    {
        $allowed = ['en', 'fr'];
        if (! in_array($locale, $allowed)) {
            abort(404);
        }
        $cookie = Cookie::make('locale', $locale, 0, '/', null, false, true, false, 'Lax');
        Cookie::queue($cookie);

        return redirect()->back()->withCookie($cookie);
    }
}
