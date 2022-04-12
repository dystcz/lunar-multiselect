<div>
    <x-select
        placeholder="{{ __('getcandy-multiselect::multiselect.empty_selection') }}"
        multiselect
        :options="$field['configuration']['lookups']"
        option-label="label"
        option-value="value"
        wire:model.defer="{{ $field['signature'] }}{{ isset($language) ? '.' . $language : null }}"
    />
</div>

