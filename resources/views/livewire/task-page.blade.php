<div class="flex-grow grid grid-cols-4 p-4">
    @livewire('task-page.sidebar')

    <div class="col-span-3 flex flex-col flex-grow gap-4 p-4">

        @if ($currentGroupType == "static")
            <h1 class="font-medium text-3xl p-2 capitalize">{{$currentGroup}}</h1>
        @else
            <div class="flex justify-between">
                <input type="text" wire:model.blur="dynamicGroupName" wire:blur="dynamicGroupNameHandler" class="font-medium max-w-max text-3xl p-2 capitalize focus:outline-none focus:border-none" placeholder="{{$currentGroup}}"/>
                <button wire:click="deleteGroup" class="text-red-500 p-2 h-12 rounded border-red-500 border hover:bg-red-500 hover:text-white font-medium capitalize transition ease-in-out duration-300">
                    delete group
                </button>
            </div>
        @endif

        <div class="h-max flex flex-col gap-2 mt-4">
            <form>
                <input wire:model="task" type="text" class="w-full p-2 rounded border border-slate-400 placeholder-gray-400 text-white font-medium transition ease-in-out duration-300 hover:bg-[#14213d] focus:bg-[#14213d] focus:outline-none" placeholder="Do Something Today">
            </form>
            <button wire:click="CreateTask" class="w-36 p-2 rounded bg-blue-400 hover:bg-[#14213d] font-medium transition ease-in-out duration-300 text-medium hover:text-white capitalize">add task</button>
        </div>

        @if ($tasks->isEmpty() && $currentGroup == 'your day')
        <di v class="container mx-auto flex flex-grow mt-6 justify-center items-center">
            <div class="flex flex-col justify-center mx-auto items-center gap p-2 max-w-max rounded-lg bg-[#14213d]">
                <i class="fa-solid fa-scroll fa-5x" style="color: white"></i>
                <h3 class="font-medium text-lg text-gray-100 capitalize">No task available</h3>
                <h3 class="font-regular text-gray-100 text-center capitalize w-64">add tasks to your day, refreshes everyday</h3>
            </div>
        </di>
        @elseif ($tasks->isEmpty())
        <div></div>
        @else
        <div class="container mx-auto flex-grow mt-6">
            @foreach($tasks as $task)
                @if ($task->group_id_fk == $groupID)
                    @livewire('todo-card', ['task' => $task], key($task->id))
                @endif
            @endforeach
        </div>
        @endif

    </div>
</div>
