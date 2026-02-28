<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class TestimonialResource extends Resource
{
    use Translatable;

    protected static ?string $model           = Testimonial::class;
    protected static ?string $navigationIcon  = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationLabel = 'Testimonials';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int    $navigationSort  = 1;

    // ─── Reusable image factory ───────────────────────────────────────────────

    private static function imageUpload(string $field, string $label, string $dir): Forms\Components\FileUpload
    {
        return Forms\Components\FileUpload::make($field)
            ->label($label)
            ->disk('public')
            ->directory($dir)
            ->image()
            ->imageEditor()
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/bmp', 'image/tiff'])
            ->maxSize(3072)
            ->nullable()
            ->helperText('Recommended upload WebP images. Non-WebP images will be automatically converted to WebP. Maximum file size: 3MB.')
            ->saveUploadedFileUsing(
                fn (TemporaryUploadedFile $file) => ImageService::storeAsWebp($file, $dir)
            );
    }

    // ─── Form ─────────────────────────────────────────────────────────────────

    public static function form(Form $form): Form
    {
        return $form->schema([

            static::imageUpload('image', 'Photo', 'testimonials')
                ->columnSpanFull(),

            Forms\Components\TextInput::make('name')
                ->label('Full Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('position')
                ->label('Position / Job Title')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('testimonial')
                ->label('Testimonial Text')
                ->required()
                ->rows(5)
                ->columnSpanFull(),

        ])->columns(2);
    }

    // ─── Table ────────────────────────────────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Photo')
                    ->disk('public')
                    ->circular()
                    ->size(50),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Position')
                    ->getStateUsing(fn ($record) => $record->getTranslation('position', 'id')
                        ?? $record->getTranslation('position', 'en')
                        ?? 'N/A')
                    ->limit(50)
                    ->sortable(),

                Tables\Columns\TextColumn::make('testimonial')
                    ->label('Preview')
                    ->getStateUsing(fn ($record) => $record->getTranslation('testimonial', 'id')
                        ?? $record->getTranslation('testimonial', 'en')
                        ?? '')
                    ->limit(80),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit'   => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
