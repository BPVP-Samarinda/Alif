<?php

namespace App\Filament\Resources\KatagoriResource\Pages;

use App\Filament\Resources\KatagoriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKatagoris extends ManageRecords
{
    protected static string $resource = KatagoriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
