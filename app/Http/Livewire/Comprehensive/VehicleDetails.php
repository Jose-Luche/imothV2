<?php

namespace App\Http\Livewire\Comprehensive;

use Livewire\Component;

class VehicleDetails extends Component
{
    public $value = 0;
    public $vehicleUse;
    public $carMake;
    public $year;
    public $date;

    protected $rules = [
        'value' => 'required|max:255',
        'vehicleUse' => 'required|string',
        'carMake' => 'required|string',
        'year' => 'numeric|string',
        'date' => 'required|date|after:yesterday',
    ];

    public function render()
    {
        return view('livewire.comprehensive.vehicle-details');
    }

    public function updateValue()
    {
        $this->value = number_format(str_replace("," , "" , $this->value));
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'value' => 'required|max:255',
            'vehicleUse' => 'required|string',
            'carMake' => 'required|string',
            'year' => 'numeric|string',
            'date' => 'required|date|after:yesterday',
        ]);

        dd("Here");
    }
}
