<?php

namespace App\Console\Commands;

use App\DeliverySlot;
use App\TimeSlot;
use Illuminate\Console\Command;

class CreateDeliverySlots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deliveryslots:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will create the available delivery slots';

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
        $deliverySlots = xmlToJson(simplexml_load_string(getData('deliveryslots')), false)->Deliveryslot;

        foreach ($deliverySlots as $deliverySlot) {

            //Create and get the deliveryslotID, used to bind the TimeSlot
            $deliverySlotObj = DeliverySlot::firstOrCreate(['date' => $deliverySlot->Date]);

            //We use recentlycreated to verify if this is a new date or an existing one
            if ($deliverySlotObj->wasRecentlyCreated) {
                foreach ($deliverySlot->Timeslots as $timeSlots) {
                    foreach ($timeSlots as $timeSlot) {
                        TimeSlot::create(['delivery_slot_id' => $deliverySlotObj->id, 'start_time' => $timeSlot->StartTime,
                            'end_time' => $timeSlot->EndTime, 'price' => $timeSlot->Price]);
                    }
                }
            }
        }

        //maybe write some logic to delete ones which time has past and marked as available,
        //so not yet claimed and won't ever be able to get claimed

    }
}
