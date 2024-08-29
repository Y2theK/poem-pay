<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerater;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required','numeric', 'unique:users','digits_between:8,12']
        ]);

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            $registerPayAmount = Setting::first()->register_pay_amount;
            $wallet = Wallet::firstOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'account_number' => UUIDGenerater::accountNumber(),
                    'amount' => $registerPayAmount
                ]
            );
            if($wallet){
                try {
        
                    $to_account_transaction = new Transaction();
                    $to_account_transaction->ref_no = UUIDGenerater::refNo();
                    $to_account_transaction->trx_id = UUIDGenerater::trxID();
                    $to_account_transaction->user_id = $wallet->user->id;
                    $to_account_transaction->source_id = 0;
                    $to_account_transaction->type = 1;  //income
                    $to_account_transaction->amount = $registerPayAmount;
                    $to_account_transaction->description = 'Register Pay';
                    $to_account_transaction->save();
    
                    $title = 'Welcome Amount Received!';
                    $message = 'Hi there, Look like you are a new comer. Here is your welcome gift - ' . number_format($registerPayAmount) . ' MMK. Feel free to use.';
                    $sourceable_id = $to_account_transaction->id; 
                    $sourceable_type = Transaction::class;
                    $web_link = route('transactions.detail',$to_account_transaction->trx_id);
        
                    Notification::send($wallet->user,new GeneralNotification($title,$message,$sourceable_id,$sourceable_type,$web_link));
    
                   
    
                } catch (\Exception $e) {
                    
                }
              
            }
            DB::commit();

            event(new Registered($user));

            Auth::login($user);

            //update ip and user_agent after register
            if(Auth::guard('web')->check()){
                $user = Auth::guard('web')->user();
                $user->ip = $request->ip();
                $user->user_agent = $request->server('HTTP_USER_AGENT');
                $user->login_at = date('Y-m-d H:i:s');
                $user->update();
            }

            return redirect(RouteServiceProvider::HOME);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['failed' => 'Something Wrong'])->withInput();
        }

        
    }
}
