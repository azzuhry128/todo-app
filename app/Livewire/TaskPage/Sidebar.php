<?php

namespace App\Livewire\TaskPage;

use Livewire\Component;
use App\Models\Group;
use Livewire\Attributes\On;

class Sidebar extends Component
{

    public $createdGroups = [];

    public function mount() {
        $this->createdGroups = Group::all();
        // dd($this->createdGroups);
    }

    public function switchGroup($groupID, $newGroup, $newGroupType) {
        $data = [
            "message" => "switch-group",
            "id" => $groupID,
            "newgroup" =>$newGroup,
            "grouptype" => $newGroupType
        ];

        $this->dispatch("switch-group", $data);
    }

    public function createGroup() {
        Group::create([
            'group_name' =>  "untitled group",
            'group_type' =>  "dynamic",
        ]);

        $this->createdGroups = Group::all();
    }

    #[On("group-title-updated")]
    public function groupUpdatedHandler() {
        $this->createdGroups = Group::all();
    }


    public function render()
    {
        return view('livewire.task-page.sidebar');
    }
}
