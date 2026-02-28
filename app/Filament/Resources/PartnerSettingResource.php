<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerSettingResource\Pages;
use App\Models\PartnerSetting;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PartnerSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model           = PartnerSetting::class;
    protected static ?string $navigationIcon  = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Our Partners';
    protected static ?string $navigationGroup = 'Section Settings';
    protected static ?int    $navigationSort  = 2;

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

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Partner Settings')
                ->columnSpanFull()
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Content')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            Forms\Components\TextInput::make('partner_heading')
                                ->label('Section Heading')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Textarea::make('partner_description')
                                ->label('Section Description')
                                ->required()
                                ->rows(3),
                        ]),
                    Forms\Components\Tabs\Tab::make('Logos')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            Forms\Components\Repeater::make('partner_logos')
                                ->label('Partner Logos')
                                ->addActionLabel('Add Partner Logo')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->schema([
                                    static::imageUpload('logo_image', 'Logo Image', 'sections/partners'),
                                ]),
                        ]),
                ]),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('#')->width(40),
                Tables\Columns\TextColumn::make('partner_heading')
                    ->label('Heading')
                    ->getStateUsing(fn ($r) => $r->getTranslation('partner_heading', 'id')
                        ?? $r->getTranslation('partner_heading', 'en')
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
            'index'  => Pages\ListPartnerSettings::route('/'),
            'create' => Pages\CreatePartnerSetting::route('/create'),
            'edit'   => Pages\EditPartnerSetting::route('/{record}/edit'),
        ];
    }
}
