<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
	// payout Payment

   public $token_headers = [
    'Accept-Language: en_US',
    'Accept: application/json'
  ];

    public function payouts(Request $enc_req) {
        if($enc_req->data && strlen($enc_req->data)) {
            $str = '';
            for($j=0; $j<strlen($enc_req->data); $j++) {
                if($j > 7) {
                    $str .= $enc_req->data[$j];
                }
            }
            
            $req = json_decode(base64_decode( $str ));
            
            if($req->vendor_id) {
                $username = 'ATM1-l4SIZt42mV4cWma2TQKjMXFFUF94dWEy-aaCjnqrqseiUYHlnrzF4-QDZlXq1TU4cLrToOlPBuS'; // Client ID
                $password = 'ELjF2Vl_1rypi6xY-uZRZNJ9gl5Ey2_x14QZPy3Y4h-oEpYVC1h6qrQn6L0q9GYWpdP0xjtM7UkVSxHL'; // Secret
        
                $adminAmount = ($req->amount*3.5)/100;
                $vendorAmount = number_format($req->amount - $adminAmount, 1);
                $charity_paypal_email = $req->paypal_email;
                
                $ch = curl_init();
        
                curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");  //Post Fields
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
                curl_setopt($ch, CURLOPT_HTTPHEADER, $this->token_headers);
                $server_output = curl_exec($ch);
                curl_close ($ch);
                $json = json_decode($server_output, true);
                
                $payout_headers = [
                    'Content-Type: application/json',
                    'Authorization: Bearer '. $json['access_token']
               ];
               
              $data = [
                        "sender_batch_header" => [ 
                            "sender_batch_id" => time(),
                            "email_subject" => "You have been payed amount by payout!",
                            "email_message" => "You have received a payout! Thanks for using our service!" 
                            ],
                            'items'  => [
                                [
                                    'recipient_type' => 'EMAIL',
                                    'amount' => [ 
                                        "value" => $vendorAmount,
                                        "currency" => "USD"
                                    ],
                                "note" => "Thanks for your patronage!",
                                "sender_item_id" => time().'ch',
                                "receiver" => 'sellerrrr@gmail.com'
                                // "receiver" => $charity_paypal_email
                                ]
                            ]
                    ];
        
                $payout = curl_init();
        
                curl_setopt($payout, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payouts");
                curl_setopt($payout, CURLOPT_POST, 1);
                curl_setopt($payout, CURLOPT_POSTFIELDS, json_encode($data));  //Post Fields
                curl_setopt($payout, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($payout, CURLOPT_HTTPHEADER, $payout_headers);
                $payout_server_output = curl_exec($payout);
                curl_close ($payout);
                $payout_json = json_decode($payout_server_output, true);

                dd($payout_json);
        
                Payment::create([
                    'donor_id' => Auth::User()->id,
                    'payout_batch_id' => $payout_json['batch_header']['payout_batch_id'],
                    'status' => $payout_json['batch_header']['batch_status'],
                    'vendor_id' => $req->vendor_id,
                    'amount' => $req->amount
                    ]);
                    
                return response()->json($payout_json);
            } else {
              return response()->json(['message' => 'Something Went Wrong'], 404);   
            }
        } else {
            return response()->json(['message' => 'Something Went Wrong'], 404);
        }
       
    }


    public function batch_id_detatils(Request $req) {
        if($req->payout_batch_id) {
            $username = 'ATM1-l4SIZt42mV4cWma2TQKjMXFFUF94dWEy-aaCjnqrqseiUYHlnrzF4-QDZlXq1TU4cLrToOlPBuS'; // Client ID
            $password = 'ELjF2Vl_1rypi6xY-uZRZNJ9gl5Ey2_x14QZPy3Y4h-oEpYVC1h6qrQn6L0q9GYWpdP0xjtM7UkVSxHL';// Secret
    
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->token_headers);
            $server_output = curl_exec($ch);
            curl_close ($ch);
            $json = json_decode($server_output, true);
            
            $payout_headers = [
                'Content-Type: application/json',
                'Authorization: Bearer '. $json['access_token']
           ];
          
            $payout = curl_init();
    
            curl_setopt($payout, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/payments/payouts/'.$req->payout_batch_id);
            curl_setopt($payout, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($payout, CURLOPT_HTTPHEADER, $payout_headers);
            $payout_server_output = curl_exec($payout);
            curl_close ($payout);
            $payout_json = json_decode($payout_server_output, true);
            
            $payment = Payment::where('payout_batch_id', $req->payout_batch_id)->first();

            $payment->update(['status' => $payout_json['batch_header']['batch_status']]);
                         
            return response()->json($payment);
        } else {
          return response()->json(['message' => 'Something Went Wrong'], 404);   
        } 
    }

    public function paypalAuth(Request $request) {
    	dd($request->all());
    }
}
