<?php

namespace spec\DeSmart\DomainCore\Stubs\Entity;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Illuminate\Database\Eloquent\Model;

class EloquentEntitySpec extends ObjectBehavior
{

    function let(Model $model)
    {
        $this->beConstructedWith($model);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DeSmart\DomainCore\Stubs\Entity\EloquentEntity');
        $this->shouldUseTrait('Laracasts\Commander\Events\EventGenerator');
    }

    function it_returns_model(Model $model)
    {
        $this->getModel()->shouldReturn($model);
    }

    public function getMatchers() {
        return [
            'useTrait' => function($subject, $trait) {
                $parent = current(class_parents($subject));
                $used_traits = class_uses($parent);

                return isset($used_traits[$trait]);
            }
        ];
    }
}
