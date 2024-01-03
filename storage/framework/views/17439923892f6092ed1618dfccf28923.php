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

    public $mailersSend;

    public $title;

    public $content;

    public $w1_name;

    public $w1_number;

    public $w1_email;

    public $w2_name;

    public $w2_number;

    public $w2_email;

    public $w3_name;

    public $w3_number;

    public $w3_email;

    public $story;

    public $id;

    public function mount()
    {
        (new Actions\InitializeState)->execute(static::$__context, $this, get_defined_vars());

        (new Actions\CallHook('mount'))->execute(static::$__context, $this, get_defined_vars());
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