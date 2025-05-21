<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KendaraanResource\Pages;
use App\Filament\Admin\Resources\KendaraanResource\RelationManagers;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;


class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
        TextInput::make('nomor_polisi')
            ->required(),
        TextInput::make('merk')->required(),
        TextInput::make('tipe'),
        Select::make('jenis')
            ->options([
                'Mobil' => 'Mobil',
                'Motor' => 'Motor',
                'Truk' => 'Truk',
            ])->required(),
        TextInput::make('warna'),
        TextInput::make('tahun')->numeric(),
        DatePicker::make('pajak_berlaku_sampai'),
        Select::make('status')
            ->options([
                'Aktif' => 'Aktif',
                'Dijual' => 'Dijual',
                'Rusak' => 'Rusak',
            ])->default('Aktif'),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
        TextColumn::make('nomor_polisi')->searchable()->sortable(),
        TextColumn::make('merk')->searchable(),
        TextColumn::make('jenis'),
        TextColumn::make('tahun'),
        TextColumn::make('status')->badge(),
    ])
    ->filters([
        SelectFilter::make('status')
            ->options([
                'Aktif' => 'Aktif',
                'Dijual' => 'Dijual',
                'Rusak' => 'Rusak',
            ]),
    ])
    ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
