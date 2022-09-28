<?php

namespace Dystcz\LunarMultiselect;

use Illuminate\Support\Arr;
use Lunar\Base\FieldType;
use Lunar\Exceptions\FieldTypeException;

class Multiselect implements FieldType
{
    /**
     * @var array<string>
     */
    protected array $value = [];

    /**
     * Create a new instance of Multiselect field type.
     *
     * @param string|array|null $value
     */
    public function __construct(array|string|null $value = [])
    {
        $this->setValue($value);
    }

    /**
     * Serialize the class.
     *
     * @return string
     */
    public function jsonSerialize(): mixed
    {
        return json_encode($this->value);
    }

    /**
     * Return the value of this field.
     *
     * @return array<string>
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * Set the value of this field.
     *
     * @param string|array $value
     *
     * @return void
     */
    public function setValue(...$value): void
    {
        $value = is_array($value) ? Arr::flatten($value) : func_get_args();

        if ($value && !is_array($value)) {
            throw new FieldTypeException(self::class . ' value must be an array of string values.');
        }

        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel(): string
    {
        return __('lunar-multiselect::multiselect.label');
    }

    /**
     * {@inheritDoc}
     */
    public function getSettingsView(): string
    {
        return 'lunar-multiselect::settings';
    }

    /**
     * {@inheritDoc}
     */
    public function getView(): string
    {
        return 'lunar-multiselect::view';
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig(): array
    {
        return [
            'options' => [
                'lookups' => 'array',
                'lookups.*.label' => 'string|required',
                'lookups.*.value' => 'nullable|string',
            ],
        ];
    }
}
