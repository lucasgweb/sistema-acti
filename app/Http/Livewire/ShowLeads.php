<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLeads extends Component
{
    use WithPagination;

    public $startDate = '1980-09-26 23:10:42';
    public $endDate = '2500-09-26 23:10:42';
    public $userId = '0';

    public function render()
    {

        $leads = Lead::all();

        if (!empty($this->userId != 0))
        {
            $leads = Lead::where('created_at','>',$this->startDate)->where('created_at','<',$this->endDate)->where('user_id',$this->userId)->paginate(10);
        } else {
            $leads = Lead::where('created_at','>',$this->startDate)->where('created_at','<',$this->endDate)->paginate(10);
        }

        return view('livewire.show-leads', [
            'leads' => $leads,
            'users' => User::all()
        ]);
    }
}