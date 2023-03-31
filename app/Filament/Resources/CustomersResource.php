<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomersResource\Pages;
use App\Filament\Resources\CustomersResource\RelationManagers;
use App\Models\Customers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomersResource extends Resource
{
    protected static ?string $model = Customers::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama'),
            Forms\Components\DatePicker::make('tanggal_lahir')
            ->minDate(now()->subYears(150))
            ->maxDate(now()),
            Forms\Components\Toggle::make('status')
            ->onColor('success')
            ->offColor('danger'),
            Forms\Components\Radio::make('jenis_kelamin')
            ->options([
                'L' => 'Laki-laki',
                'P' => 'perempuan',
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('tanggal_lahir'),
                Tables\Columns\BadgeColumn::make('status')
                    ->enum([
                    0 => 'Tidak Aktif',
                    1 => 'Aktif',
                    
                    ])->colors([
                        'danger' => static fn ($state): bool => $state == 0,
                        'success' => static fn ($state): bool => $state == 1,
                    ]),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCustomers::route('/'),
        ];
    }    
}
