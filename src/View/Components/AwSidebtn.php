<?php


namespace SlavaWins\AdminWinda\View\Components;

use Illuminate\View\Component;

class AwSidebtn extends Component
{

    public $href = "xxx";
    public $icon = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = null, $icon = null)
    {

        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminwinda::components.aw-sidebtn');
    }
}
