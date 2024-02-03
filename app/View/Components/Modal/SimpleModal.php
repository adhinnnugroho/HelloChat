<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class SimpleModal extends Component
{
    public $title, $subtitle, $icon, $show_id, $footer;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $subtitle = null, $id, $footer = null, $show_id = null, $icon = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->icon = $icon;
        $this->id = $id;
        $this->footer = $footer;
        $this->show_id = $show_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.simple-modal');
    }
}
