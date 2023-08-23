<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\MailController;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to all user by running this command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customers = DB::table('customers')->get();
        foreach ($customers as $customer) {
            $cusPaymentPeriod = DB::table('customers_payment_period')->where([['status','unpaid'],['cid', $customer->id]])->orderBy('id', 'desc')->first();
            if($cusPaymentPeriod){
                $ppToDate = Carbon::parse($cusPaymentPeriod->pp_to);
                $todayDate = Carbon::now();
                $fiveDaysLaterDate = $todayDate->addDays(5);

                if($ppToDate->isSameDay($fiveDaysLaterDate)){
                    $this->info('your subscription will expire in 5 days');
                    MailController::remainderEmail($customer->email);
                }
            }
        }
    }
}