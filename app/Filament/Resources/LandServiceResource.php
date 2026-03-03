<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandServiceResource\Pages;
use App\Models\LandService;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class LandServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = LandService::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Land Services';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int    $navigationSort  = 8;

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
            ->required()
            ->helperText('Recommended upload WebP images. Non-WebP images will be automatically converted to WebP. Maximum file size: 3MB.')
            ->saveUploadedFileUsing(
                fn (TemporaryUploadedFile $file) => ImageService::storeAsWebp($file, $dir)
            );
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                static::imageUpload('image', 'Card Image', 'services/land')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('heading')
                    ->label('Heading')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')
                        ->label('Button Text')
                        ->required(),
                    Forms\Components\TextInput::make('button_link')
                        ->label('Button Link')
                        ->required(),
                ]),

                Forms\Components\TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower number = shown first.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image')->disk('public')->circular()->size(50),
                Tables\Columns\TextColumn::make('heading')
                    ->label('Heading')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLandServices::route('/'),
            'create' => Pages\CreateLandService::route('/create'),
            'edit' => Pages\EditLandService::route('/{record}/edit'),
        ];
    }
}

