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

    public $score;

    public function mount()
    {
        (new Actions\InitializeState)->execute(static::$__context, $this, get_defined_vars());

        (new Actions\CallHook('mount'))->execute(static::$__context, $this, get_defined_vars());
    }

    #[\Livewire\Attributes\Computed()]
    public function questions()
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('questions'))->execute(...$arguments);
    }

    #[\Livewire\Attributes\Computed()]
    public function questionsTotal()
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('questionsTotal'))->execute(...$arguments);
    }

    public function incrementScore()
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('incrementScore'))->execute(...$arguments);
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