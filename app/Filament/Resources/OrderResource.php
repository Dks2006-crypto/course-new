<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = "Заказ";

    protected static ?string $pluralModelLabel = "Заказы";

    protected static ?string $navigationLabel = 'Заказы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Статаус')->schema([
                    Toggle::make('is_approve')
                        ->label('Одобрено'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Пользователь'),
                TextColumn::make('user.email')
                    ->label('Почта'),
                IconColumn::make('is_approve')
                    ->label('Статус')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('course.name')
                    ->label('Курс'),
                TextColumn::make('total_price')
                    ->label('Стоимость')->money('rub'),
                TextColumn::make('created_at')
                    ->label('Время создания')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('is_approve')
                    ->label('статус ')
                    ->options([
                        '1' => 'Одобренные',
                        '0' => 'На модерации',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
