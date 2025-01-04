<?php

namespace App\Filament\Fabricator\Layouts;

use Z3d0X\FilamentFabricator\Layouts\Layout;

class DefaultLayout extends Layout
{
    protected static ?string $name = 'default';

    public function render(): string
    {
        return <<<HTML
        <div class="container mt-4">
            <!-- Header Section -->
            <div class="mb-3 row">
                <div class="col-12">
                    {{ \$this->renderBlocks('header') }}
                </div>
            </div>

            <!-- Main Content Section -->
            <div class="row">
                <div class="col-md-8">
                    {{ \$this->renderBlocks('main_content') }}
                </div>
                <div class="col-md-4">
                    {{ \$this->renderBlocks('sidebar') }}
                </div>
            </div>

            <!-- Footer Section -->
            <div class="mt-5 row">
                <div class="col-12">
                    {{ \$this->renderBlocks('footer') }}
                </div>
            </div>
        </div>
        HTML;
    }
}
