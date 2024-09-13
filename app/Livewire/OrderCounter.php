<?php

namespace App\Livewire;

use Livewire\Component;

class OrderCounter extends Component
{

    protected $listeners = ['order_updated' => 'render'];

    public function render()
    {
        return view('livewire.order-counter');
    }
}
