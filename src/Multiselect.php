<?php

namespace Dystcz\GetcandyMultiselect;

use GetCandy\Base\FieldType;
use GetCandy\Exceptions\FieldTypeException;
use Illuminate\Support\Arr;

class Multiselect implements FieldType
{
    /**
     * @var array<string>
     */
    protected array $value;

    /**
     * Create a new instance of Multiselect field type.
     *
     * @param array<string> $value
     */
    public function __construct(array $value = [])
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of this field.
     *
     * @param string|array $value
     */
    public function setValue(...$value)
    {
        $value = is_array($value) ? Arr::flatten($value) : func_get_args();

        if ($value && ! is_array($value)) {
            throw new FieldTypeException(self::class.' value must be an array of string values.');
        }

        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel(): string
    {
        return __('getcandy-multiselect::multiselect.label');
    }

    /**
     * {@inheritDoc}
     */
    public function getSettingsView(): string
    {
        return 'getcandy-multiselect::settings';
    }

    /**
     * {@inheritDoc}
     */
    public function getView(): string
    {
        return 'getcandy-multiselect::view';
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
