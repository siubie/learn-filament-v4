<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Unique;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('province_id')
                    ->label('Province')
                    ->relationship('province', 'name')
                    ->required()
                    ->searchable(),

                TextInput::make('name')
                    ->label('City Name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true, modifyRuleUsing: function (Unique $rule, $get) {
                        return $rule->where('province_id', $get('province_id'));
                    }),
            ]);
    }
}
