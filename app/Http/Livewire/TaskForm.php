<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskForm extends Component
{

    public $task;
    public $duedate;
    public $priority;
    public $modelId;

    protected $listeners =[
        'getModelId'
    ];

    public function getModelId($modelId){

        $this->modelId = $modelId;

        $model = Task::find($this->modelId);
        $this->task = $model->task;
        $this->duedate = $model->duedate;
        $this->priority = $model->priority;

    }


    public function save(){

        $this->validate([

            'task' => 'required',
            'duedate' => 'required',
            'priority' => 'required',

        ]);

        $data=[

            'task'=> $this->task,
            'duedate'=> $this->duedate,
            'priority'=> $this->priority,
            'user_id'=> auth()->user()->id,

        ];

        if($this->modelId){
            Task::find($this->modelId)->update($data);
        }else{

            Task::create($data);
        }


        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->clearVars();

    }

    private function clearVars(){

        $this->task = null;
        $this->duedate = null;
        $this->priority = null;



    }



    public function render()
    {
        return view('livewire.task-form');
    }
}
