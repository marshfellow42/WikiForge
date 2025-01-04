<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;

class MarkdownBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('markdown')
            ->schema([
                TiptapEditor::make('content')
                    ->profile('simple')
                    ->output(TiptapOutput::Html)
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
