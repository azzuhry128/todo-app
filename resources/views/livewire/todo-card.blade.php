<div class="rounded container flex flex-row justify-between gap-4 border border-blue-400 mt-2">
    <button class="bg-blue-400 hover:bg-sky-600 ease-in-out duration-300 w-12 font-light">Finish</button>
    <input wire:model="newTask" type="text" class="flex-auto border- text-start p-2" placeholder="{{$task->task}}"/>
    <button wire:click="updateTask" class="p-2">save</button>
    <button wire:click="deleteTask" class="p-2 text-red-400">delete</button>
</div>
