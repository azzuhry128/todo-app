<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoCard extends Component
{
    public $task;
    public $newTask;

    public function mount($task) {
        $this->task = $task;
        $this->newTask = $task->task;
    }

    public function updateTask() {
        Todo::where('id', $this->task->id)->update(['task' => $this->newTask]);
        $this->dispatch('data-updated');
    }

    public function deleteTask() {
        // dump($this->task->id);
        Todo::where('id', $this->task->id)->delete();
        $this->dispatch('data-deleted');
    }

    public function render()
    {
        if($this->task) {
            return view('livewire.todo-card');
        }
        return '';
    }
}
