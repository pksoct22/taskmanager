<div>

<!-- Button trigger modal -->
<div class="row justify-content-center">
    <div class="col-sm-10">
        <h2>Example Task</h2>
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square"></i>
          </button>
    </div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @livewire('task-form')
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="ModalFormDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalFormDeleteLabel">Delete Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <h3>Do You Wish To Continue ?</h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" wire:click="delete" class="btn btn-primary">Yes</button>
          </div>
      </div>
    </div>
  </div>
<div>
    <br/>

    @if ($tasks->count())


    @foreach ($tasks as $item)
        <div class="card border-primary mb-3" style="max-width: 43rem;">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">{{ $item->duedate }} </div>
                    <div class="p-2 bd-highlight"><button wire:click="selectItem({{ $item->id }},'update')" class="btn btn-outline-primary"><i class="fa fa-edit fa-lg"></i></button></div>
                    <div class="p-2 bd-highlight"><button wire:click="selectItem({{ $item->id }},'delete')" class="btn btn-outline-danger"><i class="fa fa-trash fa-lg"></i></button></div>
                  </div>
            </div>
            <div class="card-body text-primary">
            <h5 class="card-title">{{ $item->task }}</h5>
            <p class="card-text">{{ $item->priority }}</p>
            </div>
        </div>
    @endforeach

    {{ $tasks->links() }}

@endif
</div>

</div>
