<div 
    x-data="select({
        searchable:  true,
        multiselect: true,
        readonly:    false,
        disabled:    false,
        placeholder: '{{ __('lunar-multiselect::multiselect.empty_selection') }}',
        optionValue: 'value',
        optionLabel: 'label',
    })" 
    class="relative"
>
    <div class="relative">
        <div class="">
            <div class="relative rounded-md  shadow-sm ">
                <div class="absolute left-0 inset-y-0 pl-2 pr-14 w-full flex items-center overflow-hidden cursor-pointer" :class="{ 'pointer-events-none': disabled || readonly }" x-show="multiselect" x-on:click="togglePopover" style="display: none;">
                    <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                        <span class="inline-flex text-secondary-700 dark:text-secondary-400 text-sm" x-show="selectedOptions.length" x-text="model ? model.length : ''" style="display: none;"></span>
                        <template x-for="selected in selectedOptions" :key="`selected.${selected.value}`">
                            <span class="
                                inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium
                                border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700
                                dark:bg-secondary-700 dark:text-secondary-400 dark:border-none
                                ">
                                <span style="max-width: 5rem" class="truncate" x-text="selected.label"></span>
                                <button class="
                                    shrink-0 h-4 w-4 flex items-center text-secondary-400
                                    justify-center hover:text-secondary-500 focus:outline-none
                                    " x-on:click.stop="unSelect(selected.value)" type="button">
                                    <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </span>
                        </template>
                    </div>
                </div>
                <input type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm cursor-pointer overflow-hidden dark:text-secondary-400" x-ref="select" x-on:click="togglePopover" x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()" x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()" x-bind:placeholder="getPlaceholderText()" x-bind:value="getValueText()" readonly="readonly" name="model" id="20f35e630daf44dbfa4c3f68f5399d8c" placeholder="Select one status">
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 gap-x-2">
                    <button class="focus:outline-none" x-show="!isEmptyModel() &amp;&amp; !disabled &amp;&amp; !readonly" x-on:click="clearModel" type="button" style="display: none;">
                        <svg class="w-4 h-4 text-secondary-400 hover:text-negative-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <button class="focus:outline-none" x-on:click="togglePopover" type="button">
                        <svg class="w-5 h-5
                            text-secondary-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div 
        class="absolute w-full mt-1 rounded-lg overflow-hidden shadow-md bg-white z-10 border border-secondary-200 dark:bg-secondary-800 dark:border-secondary-600" 
        x-show="popover" 
        x-on:click.outside="closePopover" 
        x-on:keydown.escape.window="closePopover"
    >
        <div class="px-2 my-2">
            <div class="">
                <div class="relative rounded-md ">
                    <input type="text" autocomplete="off" class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none border-transparent focus:border-transparent focus:ring-transparent pr-8 focus:shadow-md bg-slate-100 focus:ring-primary-600 focus:border-primary-600 border border-secondary-200 dark:border-secondary-600 duration-300" x-ref="search" x-model="search" x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()" x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()" placeholder="Search here" wire:key="select-search">
                    <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none text-secondary-400">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <ul class="max-h-60 overflow-y-auto select-none" tabindex="-1" x-ref="optionsContainer" x-on:keydown.tab.prevent="$event.shiftKey || getNextFocusable().focus()" x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()" x-on:keydown.shift.tab.prevent="getPrevFocusable().focus()" x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()">
            @foreach ($field['configuration']['lookups'] as $option)
                <li 
                    data-label="{{ $option['label'] }}" 
                    data-value="{{ $loop->index + 1 }}" 
                    class="py-2 px-3 focus:outline-none transition-colors ease-in-out duration-50 relative group text-secondary-600 dark:text-secondary-400 cursor-pointer focus:bg-primary-100 focus:text-primary-800 hover:text-primary-100 dark:focus:bg-secondary-700 hover:bg-primary-500 dark:hover:bg-secondary-700" 
                    tabindex="0" 
                    x-on:click="select('{{ $loop->index + 1 }}')" 
                    x-on:keydown.enter="select('{{ $loop->index + 1 }}')" 
                    :class="{
                        'font-semibold': isSelected('{{ $loop->index + 1 }}'),
                        'hover:bg-negative-500 dark:hover:text-secondary-100': isSelected('{{ $loop->index + 1 }}'),
                        'hover:bg-primary-500 dark:hover:bg-secondary-700': !isSelected('{{ $loop->index + 1 }}'),
                    }">
                    {{ $option['label'] }}
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4" x-show="isSelected('{{ $loop->index + 1 }}')" style="display: none;">
                        <svg class="w-5 h-5 text-primary-600 dark:text-secondary-500 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
