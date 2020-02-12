<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function atm(Request $request)
    {
        
        $fiveHundred = 0;
        $oneHundred = 0;
        $fifty = 0;
        $twenty = 0;
        $ten = 0;
        $five = 0;
        $insf = "";

        $amount = $request->amount;

        if( ($amount % 500) != $amount ){
            $fiveHundred = (int)($amount / 500);
            $amount = $amount % 500;
            
        }
        elseif( ($amount % 100) != $amount ){
            $oneHundred = (int)($amount / 100);
            $amount = $amount % 100;
            // dd('a');
        }
        elseif( ($amount % 50) != $amount ){
            $fifty = (int)($amount / 50);
            $amount = $amount % 50;
        }
        elseif( ($amount % 20) != $amount ){
            $twenty = (int)($amount / 20);
            $amount = $amount % 20;
        }
        elseif( ($amount % 10) != $amount ){
            $ten = (int)($amount / 10);
            $amount = $amount % 10;
        }
        elseif( ($amount % 5) != $amount || ($amount % 5) == 0){
            // dd('a');
            $five = (int)($amount / 5);
            $amount = $amount % 5;
        }


        if($fiveHundred != 0){

        if( ($amount % 100) != $amount ){
            $oneHundred = (int)($amount / 100);
            $amount = $amount % 100;
        }
        elseif( ($amount % 50) != $amount ){
            $fifty = (int)($amount / 50);
            $amount = $amount % 50;
        }
        elseif( ($amount % 20) != $amount ){
            $twenty = (int)($amount / 20);
            $amount = $amount % 20;
        }
        elseif( ($amount % 10) != $amount ){
            $ten = (int)($amount / 10);
            $amount = $amount % 10;
        }
        elseif( ($amount % 5) != $amount ){
            $five = (int)($amount / 5);
            $amount = $amount % 5;
        }

        }

        if($oneHundred != 0){

        
        if( ($amount % 50) != $amount ){
            $fifty = (int)($amount / 50);
            $amount = $amount % 50;
        }
        elseif( ($amount % 20) != $amount ){
            $twenty = (int)($amount / 20);
            $amount = $amount % 20;
        }
        elseif( ($amount % 10) != $amount ){
            $ten = (int)($amount / 10);
            $amount = $amount % 10;
        }
        elseif( ($amount % 5) != $amount ){
            $five = (int)($amount / 5);
            $amount = $amount % 5;
        }

        }

        if($fifty != 0){

        
        if( ($amount % 20) != $amount ){
            $twenty = (int)($amount/ 20);
            $amount = $amount % 20;
        }
        elseif( ($amount % 10) != $amount ){
            $ten = (int)($amount / 10);
            $amount = $amount % 10;
        }
        elseif( ($amount % 5) != $amount ){
            $five = (int)($amount / 5);
            $amount = $amount % 5;
        }

        }
        // dd($amount);

        if($twenty != 0){
        
        if( ($amount % 10) != $amount ){
            $ten = (int)($amount / 10);
            $amount = $amount % 10;
        }
        elseif( ($amount % 5) != $amount || ($amount % 5) == 0 ){
            $five = (int)($amount / 5);
            $amount = $amount % 5;
        }

        }
        // dd($amount3);
        if($ten != 0){

        if( ($amount % 5) != $amount ){
            $five = (int)($amount / 5);
            $amount = $amount % 5;
        }

        }


        $notes = Note::find(1);
        // dd($notes);
        $fiveHundredAvl = $notes->fiveh;
        $oneHundredAvl = $notes->oneh;
        $fiftyAvl = $notes->fifty;
        $twentyAvl = $notes->twenty;
        $tenAvl = $notes->ten;
        $fiveAvl = $notes->five;

        // dd($fiveHundredAvl);

        if($fiveHundredAvl >= $fiveHundred){
            $fiveHundred = $fiveHundred;
        }else{
            $NA = ($fiveHundred - $fiveHundredAvl);
            $fiveHundred = $fiveHundredAvl;
            $oneHundred = $oneHundred + ($NA * 5);
        }

        if($oneHundredAvl >= $oneHundred){
            $oneHundred = $oneHundred;
        }else{
            $NA = ($oneHundred - $oneHundredAvl);
            $oneHundred = $oneHundredAvl;
            $fifty = $fifty + ($NA * 2);
        }

        if($fiftyAvl >= $fifty){
            $fifty = $fifty;
        }else{
            $NA = ($fifty - $fiftyAvl);
            $fifty = $fiftyAvl;
            $twenty = $twenty + ($NA * 2);
            $ten = $ten + ($NA * 1);
        }
        if($twentyAvl >= $twenty){
            $twenty = $twenty;
        }else{
            $NA = ($twenty - $twentyAvl);
            $twenty = $twentyAvl;
            $ten = $ten + ($NA * 2);
        }

        if($tenAvl >= $ten){
            $ten = $ten;
        }else{
            $NA = ($ten - $tenAvl);
            $ten = $tenAvl;
            $five = $five + ($NA * 2);
        }

        if($fiveAvl >= $five){
            $five = $five;
            $notes = array($fiveHundred,$oneHundred,$fifty,$twenty,$ten,$five);
        }else{
            $insf = "You have insufficient balance in your account!";
        }

        
        return view('home',['notes'=>$notes, 'insf' => $insf]);

    }   

}
