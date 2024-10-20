<div class="flex flex-col justify-between gap-4 p-4 h-full bg-slate-100 rounded-md">
    <div id="static-list" class="flex flex-col gap-4">
        <button wire:click="switchGroup('1','your day', 'static')">
            <div class="flex p-2 gap-2 items-center font-medium capitalize hover:bg-[#14213d] hover:text-white rounded-md transition ease-in-out duration-300">
                <i class="fa-solid fa-sun"></i>
                <h1>your day</h1>
            </div>
        </button>
        <button wire:click="switchGroup('2','scheduled', 'static')">
            <div class="flex p-2 gap-2 items-center font-medium capitalize hover:bg-[#14213d] hover:text-white rounded-md transition ease-in-out duration-300">
                <i class="fa-solid fa-calendar"></i>
                <h1>scheduled</h1>
            </div>
        </button>
        <button wire:click="switchGroup('3','important', 'static')">
            <div class="flex p-2 gap-2 items-center font-medium capitalize hover:bg-[#14213d] hover:text-white rounded-md transition ease-in-out duration-300">
                <i class="fa-solid fa-star"></i>
                <h1>important</h1>
            </div>
        </button>
    </div>
    <div class="border-t border-gray-300 my-4"></div>
    <div id="group container" class="flex-grow">
        @foreach ($createdGroups as $group )
            @if ($group->group_type == "dynamic")
                <button wire:click="switchGroup({{$group->id}}, '{{$group->group_name}}', '{{$group->group_type}}')" class="w-full">
                    <div class="flex p-2 gap-2 items-center font-medium capitalize hover:bg-[#14213d] hover:text-white rounded-md transition ease-in-out duration-300">
                        {{-- <i class="fa-solid fa-calendar"></i> --}}
                        <h1>{{$group->group_name}}</h1>
                    </div>
                </button>
            @endif
        @endforeach
    </div>
    <button wire:click="createGroup">
        <div class="flex gap-2 p-2 items-center font-medium capitalize hover:bg-[#14213d] hover:text-white border rounded-md transition ease-in-out duration-300">
            <i class="fa-solid fa-plus"></i>
            <h1>add new list</h1>
        </div>
    </button>
</div>
