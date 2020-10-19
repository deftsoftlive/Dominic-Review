<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Traits\EmailTraits\EmailNotificationTrait;

class cronEmail extends Command
{
    use EmailNotificationTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qualification:expire';

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
        $current_date = $date->toDateTimeString('Y-m-d');

        foreach($coach_documents as $doc)
        {
            // dd($doc->created_at->addMonths(1)->format('Y-m-d'));

            if($doc->notification == 'No Reminder')
            {
                $date = '';
            }
            else if($doc->notification == '1 Month')
            {
                $date = $doc->created_at;
                $date = strtotime("+1 month");
                $date1 = date('Y-m-d', $date);
            }
            else if($doc->notification == '3 Months')
            {
                $date = $doc->created_at;
                $date = strtotime("+3 month");
                $date1 = date('Y-m-d', $date);
            }
            else if($doc->notification == '6 Months')
            {
                $date = $doc->created_at;
                $date = strtotime("+6 month");
                $date1 = date('Y-m-d', $date);
            }

            // dd($date1);


            if($current_date > $date1)
            {
                $this->CoachQualificationExpiredSuccess($doc->id);
            }
            
        }
    }
}
