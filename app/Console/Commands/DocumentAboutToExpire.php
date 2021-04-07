<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Traits\EmailTraits\EmailNotificationTrait;
use App\Helpers\helper;

class DocumentAboutToExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'about_to:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Qualification description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $coach_documents = \DB::table('coach_documents')->get();
        $date = Carbon::now();  
        /*$current_date = $date->toDateTimeString('Y-m-d');*/
        $current_date = date('Y-m-d');

        foreach($coach_documents as $doc)
        {
            // dd($doc->created_at->addMonths(1)->format('Y-m-d'));
            //dd( $doc );

            if($doc->notification == 'No Reminder')
            {
                $date = '';
                continue;
            }
            else if($doc->notification == '1 Month')
            {
                $dateOld = $doc->expiry_date;
                
                $date = strtotime($dateOld."-30 days");
                
                $date1 = date('Y-m-d', $date);
                
            }
            else if($doc->notification == '3 Months')
            {
                $dateOld = $doc->expiry_date;
                
                $date = strtotime($dateOld."-90 days");
                
                $date1 = date('Y-m-d', $date);
                
            }
            else if($doc->notification == '6 Months')
            {
                $dateOld = $doc->expiry_date;
                
                $date = strtotime($dateOld."-180 days");
                
                $date1 = date('Y-m-d', $date);
                
            }else{
                continue;
            }

            /*echo strtotime($current_date).'--------------'.strtotime($date1).'<br>';*/
            

            //dd( $current_date, $date1 );
            if( strtotime( $current_date ) == strtotime( $date1 ) )
            {            
                $coach_document = \App\CoachDocument::where( 'id', $doc->id )->first();
                $user = \App\User::where( 'id', $coach_document->coach_id )->first();
                /*echo strtotime($current_date).'--------------'.strtotime($date1).'<br>';*/
                if ( !empty( $user ) ) {
                    $coach_name = $user['name'];
                    $coach_email = $user['email'];                    
                    /*$coach_email = 'test44@yopmail.com';*/
                    $data = array( 'name'=>$coach_name, "doc_id" => $doc->id ); 
                    $created_at = $dateOld;
                    $expire_on = $date1;
                    \Mail::send("emails.document-about-to-expire", ['name' => $coach_name,'email' => $coach_email, 'doc_id'=>$doc->id, 'created_at'=> $created_at, 'expire_on' => $expire_on, 'document_name'=> $coach_document->document_name ], 
                        function($message) use ($coach_name, $coach_email) {
                            $message->to($coach_email, $coach_name)
                            ->subject('Document is about to expire');
                    });
                }
            }
        }
    }
}
