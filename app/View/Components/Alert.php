<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type = 'info';
    public $dismissible;

    protected $types = [
        'info',
        'warning',
        'success',
        'danger'
    ];

    protected $classes = ['alert'];

    public function __construct($type = '', $dismissible = false)
    {
        if (in_array($type, $this->types))
            $this->type = $type;

        $this->dismissible = $dismissible;

        $this->classes[] = "alert alert-{$this->type}";

        if ($this->dismissible)
            $this->classes[] = 'alert-dismissible fade show';
    }

    public function render(): View|Closure|string
    {
        return view('components.alert');
    }

    public function link($text, $target = '#')
    {
        $output = "
        <a href='{$target}' class='alert-link'>{$text}</a>
        ";

        return new HtmlString($output);
    }

    public function icon($url = null)
    {
        $icon = $url ?? asset("icons/icon-{$this->type}.svg");
        $output = "<img class='me-2' src='$icon' alt='{$this->type}' />";
        return new HtmlString($output);
    }

    public function getClasses()
    {
        return join(' ', $this->classes);
    }
}
