<?php

namespace Yepsua\Filament\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Support\Arr;

class RangeSlider extends Field
{
    protected float | int | Closure | null $min = null;
    protected float | int | Closure | null $max = null;
    protected float | int | Closure | null $step = 1;
    protected bool | Closure $displaySteps = true;
    protected bool $stepsAssoc = false;
    protected array $steps = [];

    protected string $view = 'filament-range-field::forms.components.range-slider';

    /**
     * Sets the step value
     *
     * @param float $step
     * @return self
     */
    public function step(float | int | Closure $step): self
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Sets the min value
     *
     * @param float $min
     * @return self
     */
    public function min(float | int | Closure $min): self
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Sets the max value
     *
     * @param float $max
     * @return self
     */
    public function max(float | int | Closure $max): self
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
    public function displaySteps(bool | Closure $displaySteps = true): self
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
        $this->stepsAssoc = Arr::isAssoc($steps);
        $sort = $sort !== null ? $sort : $this->stepsAssoc;
        $this->steps = ($sort) ? Arr::sort($steps) : $steps;
        $min = $this->stepsAssoc ? array_key_first($this->steps) : 1;
        $max = $this->stepsAssoc ? array_key_last($this->steps) : sizeof($this->steps);

        return $this->min($min)
                    ->max($max)
                    ->step($min);
    }

    /**
     * @return mixed null | int | float
     */
    public function getMin(): mixed
    {
        return $this->evaluate($this->min);
    }

    /**
     * @return mixed null | int | float
     */
    public function getMax(): mixed
    {
        return $this->evaluate($this->max);
    }

    public function getSteps(): array
    {
        return $this->steps ?? [];
    }

    public function getStep(): int | float
    {
        return $this->evaluate($this->step);
    }

    public function getDisplaySteps(): bool
    {
        return $this->evaluate($this->displaySteps);
    }

    public function getStepsAssoc(): bool
    {
        return $this->stepsAssoc;
    }
}
