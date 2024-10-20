<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskPage extends Component
{
    public $tasks = [];
    public $groups = [];

    public $dynamicGroupName;
    public $currentGroup = 'your day';
    public $groupID = 1;
    public $currentGroupType = 'static';
    public $task = '';

    public function mount() {
        $this->tasks = Todo::all();
        $this->groups = Group::all();

        // dd($this->tasks);
        // dd($this->groups);
    }

    public function CreateTask()
    {
        $currentGroupID = collect($this->groups)->firstWhere('group_name', $this->currentGroup);
        // dd($currentGroupID['id']);
        Todo::create([
            'task' => $this->task,
            'group_id_fk' => $currentGroupID['id'],
        ]);

        $this->tasks = Todo::all();
    }


    public function dynamicGroupNameHandler() {
        // dd("it works");
        Group::where('group_name', $this->currentGroup)->update(['group_name' => $this->dynamicGroupName]);
        $this->groups = Group::all();
        $this->dispatch('group-title-updated');
    }

    #[On("data-updated")]
    public function EditTaskRespond() {
        $this->tasks = Todo::all();
    }

    #[On("data-deleted")]
    public function DeleteTaskRespond() {
        $this->tasks = Todo::all();
    }

    #[On("switch-group")]
    public function groupSwitcher($data) {
        $this->currentGroup = $data['newgroup'];
        $this->currentGroupType = $data['grouptype'];
        $this->groupID = $data['id'];

        // dd($this->currentGroup);
    }

    public function render()
    {
        return view('livewire.task-page');
    }
}
