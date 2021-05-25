<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class Tasks extends Component
{
    use WithPagination;
    public $action;
    public $selectedItem;

    protected $listeners = [
        'refreshParent' =>'$refresh'
    ];

    public function selectItem($itemId, $action){

        $this->selectedItem = $itemId;
        if($action=='delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        }else{
            $this->emit('getModelId',$this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function delete($itemId){

        Task::destroy($this->selectItem);
        $this->dispatchBrowserEvent('closeDeleteModal');

    }

    public function render()
    {
        return view('livewire.tasks',[
            'tasks'=> Task::where('user_id','=', auth()->user()->id)->paginate(3)
        ]);
    }
}
