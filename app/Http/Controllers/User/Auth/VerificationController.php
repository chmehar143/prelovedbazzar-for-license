<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\{
    Cart, Category, Subcategory
};
use Illuminate\{
    Http\Request, Http\Response, Routing\Controller, Auth\Events\Verified, Foundation\Auth\VerifiesEmails,
    Auth\Access\AuthorizationException, Support\Facades\Auth, Support\Facades\Session
};

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.auth');
        $this->middleware('signed')->only('user.verify');
        $this->middleware('throttle:6,1')->only('user.verify', 'resend');

        $user = Auth::guard('user')->user();
        if (Auth::guard('user')->check()) {
            $user = Auth::guard('user');
            $carts = Cart::where('user_id', $user->id())
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
        }
        else {
            $session = Session::getId();
            $carts = Cart::where('session_id', $session)
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
        }
        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();
        $shareData = array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'user' => $user,
            'carts' => $carts
        );

        view()->share('shareData', $shareData);
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('user')->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('user.auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user('user')->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user('user')->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user('user')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user('user')->markEmailAsVerified()) {
            event(new Verified($request->user('user')));
        }

        return redirect($this->redirectPath())->with('verified', true)->message('success', 'User has been verified successfully');
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user('user')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user('user')->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
