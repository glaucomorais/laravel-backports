<?php

namespace Backports\Illuminate\View\Compilers\Concerns;

use Backports\Illuminate\Foundation\Vite;

trait CompilesHelpers
{
    /**
     * Compile the "vite" statements into valid PHP.
     *
     * @param  string|null  $arguments
     * @return string
     */
    protected function compileVite($arguments)
    {
        $arguments ??= '()';

        $class = Vite::class;

        return "<?php echo app('$class'){$arguments}; ?>";
    }

    /**
     * Compile the "viteReactRefresh" statements into valid PHP.
     *
     * @return string
     */
    protected function compileViteReactRefresh()
    {
        $class = Vite::class;

        return "<?php echo app('$class')->reactRefresh(); ?>";
    }
}
