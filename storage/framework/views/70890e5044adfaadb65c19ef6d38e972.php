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

    public $type;

    public $name;

    public $content;

    public $author;

    public $phone;

    public $email;

    public function mount()
    {
        (new Actions\InitializeState)->execute(static::$__context, $this, get_defined_vars());

        (new Actions\CallHook('mount'))->execute(static::$__context, $this, get_defined_vars());
    }

    public function selectedType($value)
    {
        $arguments = [static::$__context, $this, func_get_args()];

        return (new Actions\CallMethod('selectedType'))->execute(...$arguments);
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