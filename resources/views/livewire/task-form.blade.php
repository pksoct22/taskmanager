<div>
    <label for="task">Task</label>
    <input wire:model="task" type="text" class="form-control" required>
    @if ($errors->has('task'))
        <p style="color: red">{{ $errors->first('task') }}</p>
    @endif
    <label for="Due Date">Due Date</label>
    <input wire:model="duedate" type="datetime-local" class="form-control" required>
    @if ($errors->has('duedate'))
        <p style="color: red">{{ $errors->first('duedate') }}</p>
    @endif
    <label for="priority">Priority(Low,Mediam,High)</label>
    <input wire:model="priority" type="text" class="form-control" required>
    @if ($errors->has('priority'))
        <p style="color: red">{{ $errors->first('priority') }}</p>
    @endif

    <br/>
    <button wire:click="save" class="btn btn-info">Add</button>

</div>
