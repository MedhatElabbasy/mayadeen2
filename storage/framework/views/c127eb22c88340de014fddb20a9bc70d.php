<?php

use Livewire\Volt\Actions;
use Livewire\Volt\CompileContext;
use Livewire\Volt\Contracts\Compiled;
use Livewire\Volt\Component;

new class extends Component implements Livewire\Volt\Contracts\FunctionalComponent
{
    public static CompileContext $__context;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public $completed;

    public $experience;

    public $guidelines;

    public $literaryEvents;

    public $entertainmentEvents;

    public $restaurant;

    public $referral;

    public $next;

    public $suggestion;

    public $opinion;

    public $rating;

    public function mount()
    {
        (new Actions\InitializeState)->execute(static::$__context, $this, get_defined_vars());

        (new Actions\CallHook('mount'))->execute(static::$__context, $this, get_defined_vars());
    }

    public function updateExperience($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateExperience'))->execute(...$arguments);
    }

    public function updateguidelines($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateguidelines'))->execute(...$arguments);
    }

    public function updateLiteraryEvents($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateLiteraryEvents'))->execute(...$arguments);
    }

    public function updateEntertainmentEvents($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateEntertainmentEvents'))->execute(...$arguments);
    }

    public function updateRestaurant($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateRestaurant'))->execute(...$arguments);
    }

    public function updateReferral($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateReferral'))->execute(...$arguments);
    }

    public function updateNext($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateNext'))->execute(...$arguments);
    }

    public function updateSuggestion($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateSuggestion'))->execute(...$arguments);
    }

    public function updateRating($key, $value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('updateRating'))->execute(...$arguments);
    }

    public function submit()
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('submit'))->execute(...$arguments);
    }

    protected function rules()
    {
        return (new Actions\ReturnRules)->execute(static::$__context, $this, []);
    }

};