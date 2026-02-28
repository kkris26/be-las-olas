<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FocusSettingResource\Pages;
use App\Models\FocusSetting;
use App\Services\ImageService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FocusSettingResource extends Resource
{
    use Translatable;

    protected static ?string $model           = FocusSetting::class;
    protected static ?string $navigationIcon  = 'heroicon-o-magnifying-glass-circle';
    protected static ?string $navigationLabel = 'Our Focus';
    protected static ?string $navigationGroup = 'Section Settings';
    protected static ?int    $navigationSort  = 1;

    // ─── Reusable image factory ───────────────────────────────────────────────

    private static function imageUpload(
        string $field,
        string $label,
        string $dir,
        bool   $required = true
    ): Forms\Components\FileUpload {
        $upload = Forms\Components\FileUpload::make($field)
            ->label($label)
            ->disk('public')
            ->directory($dir)
            ->image()
            ->imageEditor()
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/bmp', 'image/tiff'])
            ->maxSize(3072)
            ->helperText('Recommended upload WebP images. Non-WebP images will be automatically converted to WebP. Maximum file size: 3MB.')
            ->saveUploadedFileUsing(
                fn (TemporaryUploadedFile $file) => ImageService::storeAsWebp($file, $dir)
            );

        return $required ? $upload->required() : $upload->nullable();
    }

    // ─── Form ─────────────────────────────────────────────────────────────────

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Focus Settings')
                ->columnSpanFull()
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Content')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            Forms\Components\TextInput::make('focus_heading')
                                ->label('Section Heading')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Textarea::make('focus_description')
                                ->label('Section Description')
                                ->required()
                                ->rows(3),
                        ]),
                    Forms\Components\Tabs\Tab::make('Items')
                        ->icon('heroicon-o-list-bullet')
                        ->schema([
                            Forms\Components\Repeater::make('focus_items')
                                ->label('Focus Items')
                                ->addActionLabel('Add Focus Item')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->schema([
                                    Forms\Components\Select::make('icon_key')
                                        ->label('Icon Key')
                                        ->required()
                                        ->options([
                                            'personSearch' => 'personSearch – Recruitment',
                                            'assignment'   => 'assignment – Selection',
                                            'document'     => 'document – Documents',
                                            'business'     => 'business – Placement',
                                            'analytics'    => 'analytics – Development',
                                            'partnership'  => 'partnership – Networking',
                                        ]),
                                    Forms\Components\TextInput::make('title')
                                        ->label('Title')
                                        ->required()
                                        ->maxLength(150),
                                    Forms\Components\Textarea::make('description')
                                        ->label('Description')
                                        ->required()
                                        ->rows(3)
                                        ->columnSpanFull(),
                                ])
                                ->columns(2),
                        ]),
                    Forms\Components\Tabs\Tab::make('Background')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            Forms\Components\Section::make('Background Images')
                                ->description('Desktop background is always required. Mobile is optional.')
                                ->columns(2)
                                ->schema([
                                    static::imageUpload('focus_bg_desktop', 'Desktop Background', 'sections/focus'),

                                    Forms\Components\Group::make([
                                        Forms\Components\Toggle::make('use_focus_bg_mobile')
                                            ->label('Use Custom Mobile Background')
                                            ->helperText('Activate to upload a different background image for mobile devices.')
                                            ->live(),
                                        static::imageUpload('focus_bg_mobile', 'Mobile Background', 'sections/focus', false)
                                            ->visible(fn (Get $get) => (bool) $get('use_focus_bg_mobile'))
                                            ->columnSpanFull(),
                                    ]),
                                ]),
                        ]),
                ]),
        ])->columns(1);
    }

    // ─── Table (minimal – single record) ─────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('#')->width(40),
                Tables\Columns\TextColumn::make('focus_heading')
                    ->label('Heading')
                    ->getStateUsing(fn ($r) => $r->getTranslation('focus_heading', 'id')
                        ?? $r->getTranslation('focus_heading', 'en')
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
            'index'  => Pages\ListFocusSettings::route('/'),
            'create' => Pages\CreateFocusSetting::route('/create'),
            'edit'   => Pages\EditFocusSetting::route('/{record}/edit'),
        ];
    }
}
