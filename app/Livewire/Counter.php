<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Counter extends Component
{

    use WithPagination;

    public $status;


    public function showNew(){
        $this->resetPage();
        $this->status = "new";
    }

    public function showPending(){
        $this->resetPage();
        $this->status = "pending";
    }
    public function showInPrep(){
        $this->resetPage();
        $this->status = "in_preparation";
    }
    public function showDelivered(){
        $this->resetPage();
        $this->status = "delivered";
    }
    public function showCancelled(){
        $this->resetPage();
        $this->status = "cancelled";
    }
    

    public function render()
    {
       $orders = Order::paginate(5);

       if($this->status){
           $orders = Order::where('status',$this->status)->paginate(5);
       }
        

        return view('livewire.counter',compact('orders'));
    }
}
