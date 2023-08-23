<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\MailController;

class AddPaymentPeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:addpaymentperiod';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add new payment period after one month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customers = DB::table('customers')->get();

        foreach ($customers as $customer) {
            $cusPaymentPeriod = DB::table('customers_payment_period')->where([['cid', $customer->id]])->orderBy('id', 'desc')->first();
            if($cusPaymentPeriod){
                $ppToDate = Carbon::parse($cusPaymentPeriod->pp_to);
                $todayDate = Carbon::now();
    
                if($ppToDate->isSameDay($todayDate)){
                    $this->info('payment period added');
                    $ppFrom = Carbon::parse($cusPaymentPeriod->pp_to)->addDays(1);
                    $ppTo = Carbon::parse($ppFrom)->addMonth();
                    $ppTo = Carbon::parse($ppTo)->subDays(1);
    
                    $data = [
                        'cid' => $customer->id,
                        'pp_from' => $ppFrom,
                        'pp_to' => $ppTo,
                        'amount' => '20',
                        'status' => 'unpaid',
                    ];
    
                    DB::table('customers_payment_period')->insert($data);
                }
            }
        }
    }
}