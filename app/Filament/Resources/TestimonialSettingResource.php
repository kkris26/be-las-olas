<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialSettingResource\Pages;
use App\Models\TestimonialSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model           = TestimonialSetting::class;
    protected static ?string $navigationIcon  = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Testimonials Section';
    protected static ?string $navigationGroup = 'Section Settings';
    protected static ?int    $navigationSort  = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\TextInput::make('testimonial_heading')
                ->label('Section Heading')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Forms\Components\Textarea::make('testimonial_description')
                ->label('Section Description')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('testimonial_button_text')
                ->label('Button Text (e.g. "Lihat Lainnya")')
                ->required()
                ->maxLength(100)
                ->columnSpanFull(),

        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('#')->width(40),
                Tables\Columns\TextColumn::make('testimonial_heading')
                    ->label('Heading')
                    ->getStateUsing(fn ($r) => $r->getTranslation('testimonial_heading', 'id')
                        ?? $r->getTranslation('testimonial_heading', 'en')
                        ?? 'N/A')
                    ->limit(60),
                Tables\Columns\TextColumn::make('updated_at')->label('Last Updated')->dateTime('d M Y, H:i')->sortable(),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([])
            ->paginated(false);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTestimonialSettings::route('/'),
            'create' => Pages\CreateTestimonialSetting::route('/create'),
            'edit'   => Pages\EditTestimonialSetting::route('/{record}/edit'),
        ];
    }
}
