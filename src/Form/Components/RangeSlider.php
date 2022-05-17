<?php

namespace Yepsua\Filament\Forms\Components;

use Filament\Forms\Components\Field;
use Illuminate\Support\Arr;

class RangeSlider extends Field
{
    protected ?int $min = null;
    protected ?int $max = null;
    protected ?int $step = 1;
    protected array $steps = [];
    protected bool $displaySteps = true;

    protected string $view = 'filament-range-field::forms.components.range-slider';

    /**
     * Sets the step value
     *
     * @param int $step
     * @return self
     */
    public function step(int $step): self
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Sets the min value
     *
     * @param int $min
     * @return self
     */
    public function min(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Sets the max value
     *
     * @param int $max
     * @return self
     */
    public function max(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Sets the displays steps value.
     * If tru the steps list should be listed in the form.
     *
     * @param bool $displaySteps
     * @return self
     */
    public function displaySteps(bool $displaySteps = true): self
    {
        $this->displaySteps = $displaySteps;

        return $this;
    }

    /**
     * Sets the steps value.
     *
     * @param array $steps
     * @param bool|null $sort
     * @return self
     */
    public function steps(array $steps, ?bool $sort = null): self
    {
        $stepsAssoc = Arr::isAssoc($steps);
        $sort = $sort !== null ? $sort : $stepsAssoc;
        $this->steps = ($sort) ? Arr::sort($steps) : $steps;
        $min = $stepsAssoc ? array_key_first($this->steps) : 1;
        $max = $stepsAssoc ? array_key_last($this->steps) : sizeof($this->steps);

        return $this->min($min)
                    ->max($max)
                    ->step($min);
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function getSteps(): array
    {
        return $this->steps ?? [];
    }

    public function getStep(): int
    {
        return $this->step;
    }

    public function getDisplaySteps(): bool
    {
        return $this->displaySteps;
    }
}
