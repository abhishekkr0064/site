<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
         public function switchLang(Request $request, $locale)
    {
        try {
            if (!in_array($locale, ['en', 'fr'])) {
                $locale = 'en';
            }
            
            Session::put('locale', $locale);
            App::setLocale($locale);
            
            return response()->json([
                'success' => true,
                'message' => 'Language switched successfully',
                'locale' => $locale
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to switch language'
            ], 500);
        }
    }
    
    public function getCurrentLanguage()
    {
        return response()->json([
            'locale' => App::getLocale(),
            'languages' => [
                'en' => 'English',
                'fr' => 'French'
            ]
        ]);
    }
}
