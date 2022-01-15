<x-app-layout>
    <div class="flex justify-center items-center w-full h-full">
        <div class="border border-gray-200  rounded-xl h-max	pt-6 pb-16 px-6  w-full  sm:w-8/12 md:w-5/12 min-w-[350px]">

            <form method="post" action="{{ route('groups.expenses.store', $group) }}">
@csrf
            <div x-data="{ show_item:false}">
                <div>
                    <x-label for="name" :value="__('Who')" />
                    <select id="name" name="name" :value="old('name')" autofocus >
                        @foreach($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>




                </div>
                <x-error name="name"/>


                    <x-label for="option" :value="__('How')" />
                    <select id="how" name="how" @change='event.target.value == "item" ? show_item = true : show_item = false'  >
                        <option name="money" value="money">Money</option>
                        <option name="item" value="item">Item</option>
                    </select>

                    <x-show-item group={{ $group }} />

                </div>
                <div class="flex  items-center mt-10">
                    <x-button type="submit" class="  font-medium font-bold" >
                        Confirm
                    </x-button>
                </div>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>
