<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


use App\Models\User;
use App\Models\AdminDetails;
use App\Models\PassengerDetails;
use App\Models\Trains;
use App\Models\Bookings;
use App\Models\TrainStops;
use File;
use Mail;
use Image;
use Illuminate\Support\Str;
class MainController extends Controller
{
    public function home(Request $request)
    {
        return view('home');
    }
    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('index');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email'   => 'required',
                'password'  => 'required'
            ]);

            $user_data = array(
                'email'  => $request->get('email'),
                'status'  => "active",
                'email_verified'  => "yes",
                'user_role'  => 2,
                'password' => $request->get('password')
            );

            if (Auth::attempt($user_data)) {
                return redirect('dashboard');
            } else {
                return back()->with('fail', '<ul>
                <li>Make sure your email and password is correct</li>
                <li>Make sure you have confirmed your email</li>
                </ul>');
            }
        }

    }


    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('register');
        }
        if ($request->isMethod('post')) {
        $this->validate($request, [
            'first_name'   => 'required',
            'last_name'   => 'required',
            'phone_number'   => 'required',
            'email'   => 'required | email | unique:users',
            'password_confirmation'  => 'required',
            'password'=> 'required | confirmed | min:6',
           ]);
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_role = 2;
            $user->status = "active";
            $user->save();

            $passenger = new PassengerDetails();
            $passenger->user_id = $user->id;
            $passenger->first_name = $request->first_name;
            $passenger->last_name = $request->last_name;
            $passenger->phone_number = $request->phone_number;
            $passenger->save();

            //commented
            // $details  = [
            //     'link' => Crypt::encryptString($user->id),
            //   ];

            // Mail::to($request->email)->send(new \App\Mail\ConfirmEmail($details));

            return back()->with(['success' => 'Email verification link has been sent to '.$request->email.'Please confirm your email to continue the registration process']);
        }
    }
    public function confirm_email($id,Request $request)
    {

    $user_id = Crypt::decryptString($id);

    $mail_confirmed =  User::where('id', '=', $user_id)->first();
    $mail_confirmed->email_verified = "yes";
    $mail_confirmed->update();
    return view('email_verified');

    }
    public function dashboard()
     {
        $trains_count = Trains::where('status', 'active')->count();
        $bookings_count = Bookings::where('passenger', Auth::user()->id)->count();
         return view('dashboard', ['trains_count' => $trains_count, 'bookings_count' => $bookings_count]);
     }
    public function forgot_password(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('forgot_password');
        }
        if ($request->isMethod('post')) {

            if (User::where("user_role", 2)->where("email", $request->email)->exists()) {
                $login_details = User::where('email', $request->email)->first();
            } else {
                return back()->with('fail', 'Please Enter A Valid Email Address');
            }

            $details  = [
                'body' => "Please Click On The Link Below To Rest Your Password",
                'link1' => Crypt::encryptString($login_details->id),
                'link2' => "reset",


            ];
            Mail::to($request->email)->send(new \App\Mail\ForgotPassword($details));

            return back()->with(['success' => 'Password reset link has been sent to your email']);
        }
    }
    public function reset_password($id, $email, Request $request)
    {
        if ($request->isMethod('get')) {
            return view('reset_password');
        }
        if ($request->isMethod('post')) {

            $user_id = Crypt::decryptString($id);

            $this->validate($request, [
                "password" => "required | min:6 | confirmed",
            ]);
            $password = User::find($user_id);
            $password->password = Hash::make($request->input('password'));
            $password->update();
            return back()->with('success', 'Password successfully updated');
        }
    }


    public function profile(Request $request)
    {
        if ($request->isMethod('get')) {
        $login_details = User::where('id', Auth::user()->id)->first();
        $other_details = PassengerDetails::where('user_id', Auth::user()->id)->first();
        return view('profile', ['login_details' => $login_details, 'other_details' => $other_details]);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'first_name'   => 'required',
                'last_name'   => 'required',
                'phone_number'   => 'required',
                'email'   => 'required',
               ]);

            if(User::where("id", "=", Auth::user()->id)->where("email", "=", $request->email)->exists()){
                $email = $request->email;
            }
            elseif(User::where("email", "=", $request->email)->exists()){
             return back()->with('fail', 'This email is already in use');
            }
            else{
             $email = $request->email;
            }
            if($request->profile_picture == null){
                $image_name =  PassengerDetails::where('user_id', '=', Auth::user()->id)->value('profile_picture');;
            }
            else{
                $image_name = time().'-dp-.'.$request->profile_picture->extension();
                $request->profile_picture->move(public_path('db_files/profile_pictures'), $image_name);
            }
            $passenger_details =  PassengerDetails::where('user_id', '=', Auth::user()->id)->first();;
            $passenger_details->first_name = $request->first_name;
            $passenger_details->last_name = $request->last_name;
            $passenger_details->phone_number = $request->phone_number;
            $passenger_details->country = $request->country;
            $passenger_details->address = $request->address;
            $passenger_details->postal_code = $request->postal_code;
            $passenger_details->city = $request->city;
            $passenger_details->profile_picture = $image_name;
            $passenger_details->update();

            $user = User::find(Auth::user()->id);
            $user->email = $email;
            $user->update();

            return back()->with('success', 'Successfully  Updated');
        }

    }


    function logout()
    {
        Auth::logout();
        return redirect('login');
    }



public function change_password($id,Request $request)
{
        $this->validate($request, [
            "password" => "required | confirmed | min:6",
            "current_password" => "required",
           ]);
           if (Hash::check($request->input('current_password'), User::where('id', $id)->value('password'))) {

            $user = User::find($id);
            $user->password = Hash::make($request->input('password'));
            $user->update();
            return back()->with('success', 'Successfully  Updated');
           }
        else{
            return back()->with('fail', 'Current password is incorrect.');
        }


}
public function book_trains()
     {
         $trains = Trains::where('status', 'active')->get();
         return view('book_trains',['trains' => $trains]);
     }
     public function book_train($id,Request $request)
     {
        if ($request->isMethod('get')) {
         $train_details = Trains::where('id', $id)->first();
         $login_details = User::where('id', Auth::user()->id)->first();
         $other_details = PassengerDetails::where('user_id', Auth::user()->id)->first();
         $train_stops = TrainStops::where('train_id', $id)->get();
         return view('book_train',['train_details' => $train_details,'login_details' => $login_details,'other_details' => $other_details
         ,'train_stops' => $train_stops]);
        }

        if ($request->isMethod('post')) {
            $booking = new Bookings();
            $booking->passenger =Auth::user()->id;
            $booking->first_name =$request->first_name;
            $booking->last_name = $request->last_name;
            $booking->email = $request->email;
            $booking->phone_number = $request->phone_number;
            $booking->country = $request->country;
            $booking->address = $request->address;
            $booking->postal_code = $request->postal_code;
            $booking->city = $request->city;
            $booking->train_id = $request->train_id;
            $booking->from_stop = $request->from;
            $booking->to_stop = $request->to;
            $booking->tickets = $request->tickets;
            $booking->booking_total = $request->booking_total;
            $booking->date = $request->date;
            $booking->status = "pending";
            $booking->save();

        $booking_details = Bookings::where('id',$booking->id)->first();

        $hash = strtoupper(
        md5(
        "1223533" .
        $booking_details->id .
        number_format($booking_details->booking_total, 2, '.', '') .
        "LKR" .
        strtoupper(md5("MjY3NzkwNzgxNjMyOTgwMTE4NjM5OTIzNjM4NjEzNzc0NjMzNzMw"))
        )
        );

        return view('pay_here_form',['hash' => $hash,'booking_details' => $booking_details]);
        }
     }
     public function checkout_return(Request $request){

        return view('success_page',['message' => 'Payment Successful.']);
    }

    public function checkout_cancel(Request $request){

        return view('fail_page',['message' => 'Payment Fail.']);
    }
    public function checkout_notify(Request $request){

        $merchant_id         = $request->input('merchant_id');
        $order_id            = $request->input('order_id');
        $payhere_amount      = $request->input('payhere_amount');
        $payhere_currency    = $request->input('payhere_currency');
        $status_code         = $request->input('status_code');
        $md5sig              = $request->input('md5sig');



        $merchant_secret = 'MjY3NzkwNzgxNjMyOTgwMTE4NjM5OTIzNjM4NjEzNzc0NjMzNzMw';

        $local_md5sig = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                $payhere_amount .
                $payhere_currency .
                $status_code .
                strtoupper(md5($merchant_secret))
            )
        );

        if ($local_md5sig == $md5sig && $status_code == 2){
            $booking =  Bookings::where('id', '=', $order_id)->first();
            $booking->status = "success";
            $booking->payment_id = $request->input('payment_id');
            $booking->method = $request->input('method');
            $booking->update();

            $user_id = Bookings::where('id', '=', $order_id)->value('passenger');
            $user_email = User::where('id', '=', $user_id)->value('email');
            Mail::to($user_email)->send(new \App\Mail\BookingSuccess());
        }
        else{
            $booking =  Bookings::where('id', '=', $order_id)->first();
            $booking->status = "failed";
            $booking->update();
        }
        }
        public function get_price(Request $request){
            $from_distance = TrainStops::where('id', $request->from)->value('distance');
            $to_distance = TrainStops::where('id', $request->to)->value('distance');
            $final_distance = $to_distance-$from_distance;
            if($final_distance > 0){
                $km_cost = Trains::where('id', $request->train_id)->value('fee');
                $before_deduction_cost = ($km_cost*$final_distance)*$request->tickets;
                $royalty_deduction = PassengerDetails::where('user_id', Auth::user()->id)->value('royalty_deduction');
                if($royalty_deduction <= 0){
                    $royalty_deduction_price = 0;
                }
                else{
                    $royalty_deduction_price = ($before_deduction_cost)*($royalty_deduction/100);
                }
                $after_deduction_cost = $before_deduction_cost-$royalty_deduction_price;
                echo json_encode(array("status"=> "success","before_deduction_cost"=> $before_deduction_cost
                ,"royalty_deduction_price"=> round($royalty_deduction_price),"after_deduction_cost"=> $after_deduction_cost));
            }
            else{
                echo json_encode(array("status"=> "fail","message"=> "Please select a correct from and to stop"));
            }

        }

public function my_bookings()
     {
         $bookings = Bookings::where('passenger', Auth::user()->id)->get();
         return view('my_bookings',['bookings' => $bookings]);
     }

     public function view_booking_details($id)
     {
         $booking = Bookings::where('id', $id)->first();
         return view('view_booking_details',['booking' => $booking]);
     }
     public function cancel_booking($id,Request $request)
     {

     $booking = Bookings::where('id', $id)->first();
     $booking->status = "canceled";
     $booking->update();
     return back()->with('fail', 'Booking Canceled');

     }
}



