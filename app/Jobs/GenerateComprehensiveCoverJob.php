<?php

namespace App\Jobs;

use App\Services\GenerateCover;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateComprehensiveCoverJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $applicationDetails;
    public $paymentDetails;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($applicationDetails,$paymentDetails)
    {
        $this->applicationDetails = $applicationDetails;
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GenerateCover $generateCover)
    {
        //Initiate Cover generation for this
        $generateCover->generateComprehensiveCover($this->applicationDetails,$this->paymentDetails);
    }
}
