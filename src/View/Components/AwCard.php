<?php


namespace SlavaWins\AdminWinda\View\Components;

use Illuminate\View\Component;

class AwCard extends Component
{

    public $val = null;
    public $icon = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value = null, $icon = null)
    {

        $this->val = $value;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminwinda::components.aw-card');
    }
}
