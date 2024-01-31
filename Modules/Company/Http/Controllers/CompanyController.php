<?php

namespace Modules\Company\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\AdminDetails;
use App\Models\PassengerDetails;
use App\Models\Trains;
use App\Models\Bookings;
use App\Models\TrainStops;
use File;
use Mail;
use Image;
use League\Csv\Writer;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

     public function index(Request $request)
     {
         if($request->isMethod('get')){
             return view('company::login');
          }
          if($request->isMethod('post')){
             $this->validate($request, [
                 'email'   => 'required',
                 'password'  => 'required'
                ]);

                $user_data = array(
                 'email'  => $request->get('email'),
                 'status'  => "active",
                 'user_role'  => 1,
                 'password' => $request->get('password')
                );

                if(Auth::attempt($user_data))
                {
                 return redirect('company/dashboard');
                }
                else
                {
                 return back()->with('fail', 'Wrong Login Details');
                }
          }
     }
     public function dashboard()
     {
        $admin_count = User::where('user_role', '1')->count();
        $passenger_count = User::where('user_role', '2')->count();
        $trains_count = Trains::count();
        $bookings_count = Bookings::count();
         return view('company::dashboard2', ['admin_count' => $admin_count, 'passenger_count' => $passenger_count, 'trains_count' => $trains_count
         , 'bookings_count' => $bookings_count]);
     }
     function logout()
     {
      Auth::logout();
      return redirect('company');
     }
     public function admins()
     {
         $admins = User::where('user_role','1')->get();
         return view('company::admins',['admins' => $admins]);
     }
     public function add_admin(Request $request)
     { if($request->isMethod('get')){
         return view('company::add_admin');
     }
     if($request->isMethod('post')){
     $this->validate($request, [
             'name'   => 'required',
             'phone'   => 'required',
             'email'   => 'required | email | unique:users',
             "password" => "required | confirmed | min:6",
            ]);
            if($request->status){
             $status = 'active';
            }
            else{
             $status = 'inactive';
            }
            DB::beginTransaction();
            $user = User::create([
               "email" => $request->email,
               "password" => Hash::make($request->password),
               "user_role" => 1,
              "email_confirmed" => '-',
               "status" => $status
            ]);

            $userDetails = new AdminDetails();
            $userDetails->user_id =$user->id;
            $userDetails->name = $request->name;
            $userDetails->phone = $request->phone;
            $userDetails->save();
            DB::commit();
             return back()->with('success', 'Admin Successfully Added');

     }

     }
     public function deactivate_admin($id){
         $user = User::find($id);
         $user->status = "inactive";
         $user->update();
         return back()->with('success', 'Admin Deactivated');

     }
     public function activate_admin($id){
         $user = User::find($id);
         $user->status = "active";
         $user->update();
         return back()->with('success', 'Admin Activated');

     }
     public function edit_admin($id,Request $request)
     {
     if($request->isMethod('get')){
     $login_details = User::where('id',$id)->get();
     $other_details = AdminDetails::where('user_id',$id)->get();
     return view('company::edit_admin', ['login_details' => $login_details,'other_details' => $other_details]);
     }
     if($request->isMethod('post')){
     $this->validate($request, [
             'name'   => 'required',
             'email'   => 'required',
             'phone'  => 'required',
     ]);
     if($request->status){
         $status = 'active';
     }
     else{
         $status = 'inactive';
     }

     if(!$request->current_password == null || !$request->password == null || !$request->password_confirmation == null){
         $this->validate($request, [
             "password" => "required | confirmed | min:6",
             "current_password" => "required",
            ]);
            if (Hash::check($request->input('current_password'), User::where('id', $id)->value('password'))) {
             if(User::where("id", "=", $id)->where("email", "=", $request->email)->exists()){
                 $email = $request->email;
             }
             elseif(User::where("email", "=", $request->email)->exists()){
              return back()->with('fail', 'This email is already in use');
             }
             else{
              $email = $request->email;
             }

             $userDetails =  AdminDetails::where('user_id', '=', $id)->first();;
             $userDetails->name = $request->name;
             $userDetails->phone = $request->phone;
             $userDetails->update();
             $user = User::find($id);
             $user->email = $email;
             $user->password = Hash::make($request->input('password'));
             $user->status = $status;
             $user->update();
             return back()->with('success', 'Admin Details Successfully  Updated');
            }
            else{
             return back()->with('fail', 'Current password is incorrect.');
         }
     }
     else{
         if(User::where("id", "=", $id)->where("email", "=", $request->email)->exists()){
             $email = $request->email;
         }
         elseif(User::where("email", "=", $request->email)->exists()){
          return back()->with('fail', 'This email is already in use');
         }
         else{
          $email = $request->email;
         }

         $userDetails =  AdminDetails::where('user_id', '=', $id)->first();;
         $userDetails->name = $request->name;
         $userDetails->phone = $request->phone;
         $userDetails->update();
         $user = User::find($id);
         $user->email = $email;
         $user->status = $status;
         $user->update();
         return back()->with('success', 'Admin Details Successfully  Updated');
     }


     }

     }

     public function passengers()
     {
         $passengers = User::where('user_role','2')->get();
         return view('company::passengers',['passengers' => $passengers]);
     }
     public function add_passenger(Request $request)
     { if($request->isMethod('get')){
         return view('company::add_passenger');
     }
     if($request->isMethod('post')){
     $this->validate($request, [
             'first_name'   => 'required',
             'last_name'   => 'required',
             'phone_number'   => 'required',
             'email'   => 'required | email | unique:users',
             "password" => "required | confirmed | min:6",
            ]);
            if($request->status){
             $status = 'active';
            }
            else{
             $status = 'inactive';
            }
            DB::beginTransaction();
            $user = User::create([
               "email" => $request->email,
               "password" => Hash::make($request->password),
               "user_role" => 2,
              "email_confirmed" => '-',
               "status" => $status
            ]);

            $passenger = new PassengerDetails();
            $passenger->user_id = $user->id;
            $passenger->first_name = $request->first_name;
            $passenger->last_name = $request->last_name;
            $passenger->phone_number = $request->phone_number;
            $passenger->save();
            DB::commit();
             return back()->with('success', 'Passenger Successfully Added');

     }

     }
     public function deactivate_passenger($id){
         $user = User::find($id);
         $user->status = "inactive";
         $user->update();
         return back()->with('success', 'Passenger Deactivated');

     }
     public function activate_passenger($id){
         $user = User::find($id);
         $user->status = "active";
         $user->update();
         return back()->with('success', 'Passenger Activated');

     }
     public function edit_passenger($id,Request $request)
     {
     if($request->isMethod('get')){
     $login_details = User::where('id',$id)->first();
     $other_details = PassengerDetails::where('user_id',$id)->first();
     return view('company::edit_passenger', ['login_details' => $login_details,'other_details' => $other_details]);
     }
     if($request->isMethod('post')){
     $this->validate($request, [
        'first_name'   => 'required',
        'last_name'   => 'required',
        'phone_number'   => 'required',
        'email'   => 'required | email',
     ]);
     if($request->status){
         $status = 'active';
     }
     else{
         $status = 'inactive';
     }

     if(!$request->password == null || !$request->password_confirmation == null){
         $this->validate($request, [
             "password" => "required | confirmed | min:6",
             "current_password" => "required",
            ]);
            if (Hash::check($request->input('current_password'), User::where('id', $id)->value('password'))) {
             if(User::where("id", "=", $id)->where("email", "=", $request->email)->exists()){
                 $email = $request->email;
             }
             elseif(User::where("email", "=", $request->email)->exists()){
              return back()->with('fail', 'This email is already in use');
             }
             else{
              $email = $request->email;
             }

             $passenger =  PassengerDetails::where('user_id', '=', $id)->first();;
             $passenger->first_name = $request->first_name;
             $passenger->last_name = $request->last_name;
             $passenger->phone_number = $request->phone_number;
             $passenger->royalty_deduction = $request->royalty_deduction;
             $passenger->update();
             $user = User::find($id);
             $user->email = $email;
             $user->password = Hash::make($request->input('password'));
             $user->status = $status;
             $user->update();
             return back()->with('success', 'Passenger Details Successfully  Updated');
            }
            else{
             return back()->with('fail', 'Current password is incorrect.');
         }
     }
     else{
         if(User::where("id", "=", $id)->where("email", "=", $request->email)->exists()){
             $email = $request->email;
         }
         elseif(User::where("email", "=", $request->email)->exists()){
          return back()->with('fail', 'This email is already in use');
         }
         else{
          $email = $request->email;
         }

         $passenger =  PassengerDetails::where('user_id', '=', $id)->first();;
         $passenger->first_name = $request->first_name;
         $passenger->last_name = $request->last_name;
         $passenger->phone_number = $request->phone_number;
         $passenger->royalty_deduction = $request->royalty_deduction;
         $passenger->update();
         $user = User::find($id);
         $user->email = $email;
         $user->status = $status;
         $user->update();
         return back()->with('success', 'Passenger Details Successfully  Updated');
     }


     }

     }

     //kavinda
     public function add_train(Request $request)
     { if($request->isMethod('get')){
         return view('company::add_train');
     }
     if($request->isMethod('post')){
     $this->validate($request, [
             'name'   => 'required',
             'route'   => 'required',
             'departure'   => 'required',
             'arrival'   => 'required',
             'departure_time'   => 'required',
             'no_of_passengers'   => 'required',
            ]);
            if($request->status){
             $status = 'active';
            }
            else{
             $status = 'inactive';
            }


            $train = new Trains();
            $train->name =$request->name;
            $train->route = $request->route;
            $train->departure = $request->departure;
            $train->arrival = $request->arrival;
            $train->departure_time = $request->departure_time;
            $train->no_of_passengers = $request->no_of_passengers;
            $train->fee = $request->fee;
            $train->latitude = $request->latitude;
            $train->longitude = $request->longitude;
            $train->status = $status;
            $train->save();

            if(!$request->stop_name == null){
                $c=0;
                foreach($request->stop_name as $stop){
                    if(!$stop == null){
                    $stops = new TrainStops();
                    $stops->train_id =$train->id;
                    $stops->stop_name = $stop;
                    $stops->distance = $request->distance[$c];
                    $stops->save();
                    $c=$c+1;
                    }
            }
            }
            return back()->with('success', 'Train Successfully Added');

     }

     }
     //Kavinda
     public function trains()
     {
         $trains = Trains::get();
         return view('company::trains',['trains' => $trains]);
     }
     public function deactivate_train($id){
        $train = Trains::find($id);
        $train->status = "inactive";
        $train->update();
        return back()->with('success', 'Train Deactivated');

    }
    public function activate_train($id){
        $train = Trains::find($id);
        $train->status = "active";
        $train->update();
        return back()->with('success', 'Train Activated');

    }



    //Kavinda edit train
    public function edit_train($id,Request $request)
    {
    if($request->isMethod('get'))
    {
         $train_details = Trains::where('id',$id)->first();
        $train_stops = TrainStops::where('train_id',$id)->get();
        return view('company::edit_train', ['train_details' => $train_details,'train_stops' => $train_stops]);
    }

    if($request->isMethod('post'))
    {
        $this->validate($request, [
            'name'   => 'required',
            'route'   => 'required',
            'departure'   => 'required',
            'arrival'   => 'required',
            'departure_time'   => 'required',
            'no_of_passengers'   => 'required',
        ]);

            if($request->status){
                $status = 'active';
            }
            else{
                $status = 'inactive';
            }

            $train =  Trains::where('id', '=', $id)->first();;
            $train->name =$request->name;
            $train->route = $request->route;
            $train->departure = $request->departure;
            $train->arrival = $request->arrival;
            $train->departure_time = $request->departure_time;
            $train->no_of_passengers = $request->no_of_passengers;
            $train->fee = $request->fee;
            $train->latitude = $request->latitude;
            $train->longitude = $request->longitude;
            $train->status = $status;
            $train->update();

        if(!$request->stop_name == null){
            $c=0;
            foreach($request->stop_name as $stop)
            {
                if(!$stop == null)
                {
                    $stops = new TrainStops();
                    $stops->train_id =$train->id;
                    $stops->stop_name = $stop;
                    $stops->distance = $request->distance[$c];
                    $stops->save();
                    $c=$c+1;
                }
            }
        }
        return back()->with('success', 'Train Details Successfully  Updated');
    }

    }
    public function delete_train_stop($id){
        TrainStops::where('id',$id)->delete();
        return back()->with('success', 'Train Stop Removed');

    }
    public function booking_history()
     {
         $bookings = Bookings::get();
         return view('company::booking_history',['bookings' => $bookings]);
     }
     public function view_booking_details($id)
     {
         $booking = Bookings::where('id', $id)->first();
         return view('company::view_booking_details',['booking' => $booking]);
     }
     public function download_passenger_list(Request $request)
    {

                $customer_header = ['Passenger List'];
                $header = ['ID', 'Email', 'First Name', 'Last Name', 'Phone Number', 'Country', 'Address', 'Postal Code', 'City', 'Royalty Deduction', 'Total Bookings', 'Total Booking Value', 'Status'];
                $emptyheader = ['', '', '', '', ''];
                $emptyheader2 = ['', '', '', '', ''];
                $title_array[] = array(
                    'ID'  => "",
                    'Email'  => "",
                    'First Name'   => "",
                    'Last Name' =>    "",
                    'Phone Number' => "",
                    'Country' => "",
                    'Address' => "",
                    'Postal Code'  => "",
                    'City'  => "",
                    'Royalty Deduction'  => "",
                    'Total Bookings'  => "",
                    'Total Booking Value'  => "",
                    'Status'  => "",
                   );


                $customers = PassengerDetails::get();

                foreach($customers as $customer){
                $order_count = 0;
                $total_order_value = 0;
                $email = User::where('id', $customer->user_id)->value('email');
                $status = User::where('id', $customer->user_id)->value('status');
                $bookings = Bookings::where('passenger',$customer->user_id)->orderBy('id')->get();
                foreach($bookings as $booking){
                    $order_count = $order_count + 1;
                    $total_order_value = $total_order_value + $booking->booking_total;
                }


                   $title_array[] = array(
                    'ID'  => "#".$customer->user_id,
                    'Email'  => $email,
                    'First Name'   => $customer->first_name,
                    'Last Name' =>  $customer->last_name,
                    'Phone Number' => $customer->phone_number,
                    'Country' => $customer->country,
                    'Address' =>  $customer->address,
                    'Postal Code'  => $customer->postal_code,
                    'City'  => $customer->city,
                    'Royalty Deduction'  => $customer->royalty_deduction."%",
                    'Total Bookings'  => $order_count,
                    'Total Booking Value'  => "LKR ".number_format($total_order_value),
                    'Status'  => $status,
                   );
                }


                //load the CSV document from a string
                $csv = Writer::createFromString('');

                //insert the header
                $csv->insertOne($customer_header);
                $csv->insertOne($header);

                //insert all the records
                $csv->insertAll($title_array);
                $csv->insertOne($emptyheader);
                $csv->insertOne($emptyheader2);
                $csv->output('Passenger List - '.date("Y-m-d").'.csv');

    }
    public function download_booking_list(Request $request)
    { if($request->isMethod('get')){
        return view('company::download_booking_list');
    }
    if($request->isMethod('post')){
    $this->validate($request, [
            'from'   => 'required',
            'to'   => 'required',
           ]);

           $order_header = ['Booking List'];
           $header = ['First Name','Last Name', 'Email', 'Phone Number', 'Country', 'Address', 'Postal Code', 'City', 'Train',
           'Date', 'From', 'To', 'No of tickets', 'Total', 'Status'];
           $emptyheader = ['', '', '', '', ''];
           $emptyheader2 = ['', '', '', '', ''];
           $title_array[] = array(
            'First Name'  => "",
            'Last Name'  => "",
            'Email'   => "",
            'Phone Number' =>    "",
            'Country'    => "",
            'Address'    => "",
            'Postal Code'    => "",
            'City'    => "",
            'Train'    => "",
            'Date'    => "",
            'From'    => "",
            'To'    => "",
            'No of tickets'    => "",
            'Total'    => "",
            'Status'    => ""
           );

           $bookings = Bookings::whereBetween('created_at', [$request->from, $request->to])->get();

           foreach($bookings as $booking){
            $train_name = Trains::where('id', $booking->train_id)->value('name');
            $from_name = TrainStops::where('id', $booking->from_stop)->value('stop_name');
            $to_name = TrainStops::where('id', $booking->to_stop)->value('stop_name');
           $title_array[] = array(
            'First Name'  => $booking->first_name,
            'Last Name'  => $booking->last_name,
            'Email'   => $booking->email,
            'Phone Number' =>    $booking->phone_number,
            'Country'    => $booking->country,
            'Address'    => $booking->address,
            'Postal Code'    => $booking->postal_code,
            'City'    => $booking->city,
            'Train'    => $train_name,
            'Date'    => $booking->date,
            'From'    => $from_name,
            'To'    =>  $to_name,
            'No of tickets'    => $booking->tickets,
            'Total'    => "LKR ".number_format($booking->booking_total),
            'Status'    => $booking->status,
           );
           }


           //load the CSV document from a string
           $csv = Writer::createFromString('');

           //insert the header
           $csv->insertOne($order_header);
           $csv->insertOne($header);

           //insert all the records
           $csv->insertAll($title_array);
           $csv->insertOne($emptyheader);
           $csv->insertOne($emptyheader2);
           $csv->output('Bookings - '.$request->from.'-'.$request->to.'.csv');

    }

}
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('company::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('company::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('company::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
