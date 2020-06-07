<?php

namespace App\Console\Commands;

use App\Promotion;
use Illuminate\Console\Command;

class CreateUpdatePromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotions:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will create and overwrite all old promotions';

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
        Promotion::truncate();
        // xmlToJson will convert our xml to json
        // getData is a simple get request based on ENV(API_BASE_URL)
        $promotionObj = xmlToJson(simplexml_load_string(file_get_contents(getData('promotions'))))->Promotion;

        Promotion::truncate();

        foreach ($promotionObj->Discount as $promotion) {
            $product = Promotion::firstOrCreate(['ean' => $promotion->EAN], ['ean' => $promotion->EAN, 'discount_price' => $promotion->DiscountPrice,
                'valid_until' => $promotion->ValidUntil]);
        }
    }
}
