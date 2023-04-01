<?php

namespace Backports\Illuminate\View\Compilers;

use Illuminate\View\Compilers\BladeCompiler as LaravelBladeCompiler;

class BladeCompiler extends LaravelBladeCompiler
{
    use Concerns\CompilesHelpers;
}
