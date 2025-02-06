<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Attribute;
use App\Models\Orders;
use App;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        $user = auth()->user();
        $orders = Orders::where('users_id', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'orders' => $orders,
        ]);

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'date' => 'nullable|date',
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->date = $request->date;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function show($id)
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

            $user = auth()->user();
            $order = Orders::where('users_id', $user->id)->findOrFail($id);

            $quantities = json_decode($order->quantity_array);
        
        $data = array(
            'attribute' => $attribute,
            'order' => $order,
            'quantities' => $quantities,
        );

        return view('profile.show')->with($data);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = $request->user();

        if($request->current_password == $request->password){
            return redirect()->back()->with('error', trans('Old and new passwords matched'));
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password does not match your password.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'password-updated');
    }
}
