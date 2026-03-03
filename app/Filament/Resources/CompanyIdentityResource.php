<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyIdentityResource\Pages;
use App\Models\CompanyIdentity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CompanyIdentityResource extends Resource
{
    use Translatable;

    protected static ?string $model           = CompanyIdentity::class;
    protected static ?string $navigationIcon  = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Company Identity';
    protected static ?string $navigationGroup = 'Global Settings';
    protected static ?int    $navigationSort  = 1;

    // ─── Form ─────────────────────────────────────────────────────────────────

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Sections')
                ->persistTabInQueryString()
                ->columnSpanFull()
                ->tabs([

                    // ── Tab 1: General Info ───────────────────────────────
                    Forms\Components\Tabs\Tab::make('General Info')
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            Forms\Components\TextInput::make('company_name')
                                ->label('Company Name')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('tagline')
                                ->label('Tagline')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('floating_whatsapp_link')
                                ->label('Floating WhatsApp Link')
                                ->placeholder('https://wa.me/62812xxx')
                                ->required()
                                ->maxLength(500)
                                ->columnSpanFull(),
                        ]),

                    // ── Tab 2: Contact Details ────────────────────────────
                    Forms\Components\Tabs\Tab::make('Contact Details')
                        ->icon('heroicon-o-phone')
                        ->schema([
                            Forms\Components\Repeater::make('contact_items')
                                ->label('Contact Items')
                                ->addActionLabel('Add Contact')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->maxItems(3)
                                ->columnSpanFull()
                                ->schema([
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('label')
                                            ->label('Label (e.g. Email, Phone)')
                                            ->required()
                                            ->maxLength(100),
                                        Forms\Components\Select::make('icon_key')
                                            ->label('Icon')
                                            ->required()
                                            ->options([
                                                'email'     => 'Email',
                                                'phone'     => 'Phone',
                                                'whatsapp'  => 'WhatsApp',
                                            ]),
                                    ]),
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('value')
                                            ->label('Display Value')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('link')
                                            ->label('Link (href)')
                                            ->required()
                                            ->placeholder('mailto:... / tel:... / https://wa.me/...')
                                            ->maxLength(500),
                                    ]),
                                ]),
                        ]),

                    // ── Tab 3: Office Locations ───────────────────────────
                    Forms\Components\Tabs\Tab::make('Office Locations')
                        ->icon('heroicon-o-map-pin')
                        ->schema([
                            Forms\Components\Repeater::make('location_items')
                                ->label('Office Locations')
                                ->addActionLabel('Add Location')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                         ->maxItems(2)
                                ->columnSpanFull()
                                ->schema([
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Location Title')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Select::make('category')
                                            ->label('Category')
                                            ->required()
                                            ->options([
                                                'headOffice'  => 'Head Office',
                                                'operational' => 'Operational Office',
                                            ]),
                                    ]),
                                    Forms\Components\Textarea::make('address')
                                        ->label('Address')
                                        ->required()
                                        ->rows(3)
                                        ->columnSpanFull(),
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('google_maps_link')
                                            ->label('Google Maps Link')
                                            ->maxLength(2048)
                                            ->required()
                                            ->placeholder('https://maps.google.com/...'),
                                        Forms\Components\Textarea::make('map_embed_url')
                                            ->label('Map Embed URL (iframe src)')
                                            ->required()
                                            ->rows(2),
                                    ]),
                                ]),
                        ]),

                    // ── Tab 4: Social Media ───────────────────────────────
                    Forms\Components\Tabs\Tab::make('Social Media')
                        ->icon('heroicon-o-share')
                        ->schema([
                            Forms\Components\Repeater::make('social_items')
                                ->label('Social Media Accounts')
                                ->addActionLabel('Add Social Account')
                                ->collapsible()
                                ->cloneable()
                                ->defaultItems(0)
                                ->columnSpanFull()
                                ->schema([
                                    Forms\Components\Grid::make(3)->schema([
                                        Forms\Components\TextInput::make('platform_name')
                                            ->label('Platform Name')
                                            ->required()
                                            ->maxLength(100),
                                        Forms\Components\Select::make('icon_key')
                                            ->label('Icon')
                                            ->required()
                                            ->options([
                                                'instagram' => 'Instagram',
                                                'tiktok'    => 'TikTok',
                                                'facebook'  => 'Facebook',
                                                'linkedin'  => 'LinkedIn',
                                                'twitter'   => 'Twitter / X',
                                                'threads'   => 'Threads',
                                                'youtube'   => 'YouTube',
                                            ]),
                                        Forms\Components\TextInput::make('url')
                                            ->label('Profile URL')
                                            ->required()
                                            ->maxLength(500)
                                            ->placeholder('https://instagram.com/...'),
                                    ]),
                                ]),
                        ]),

                ]),
        ]);
    }

    // ─── Table ────────────────────────────────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')->label('Company Name'),
                Tables\Columns\TextColumn::make('tagline')
                    ->label('Tagline')
                    ->getStateUsing(fn ($record) => $record->getTranslation('tagline', app()->getLocale())),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCompanyIdentities::route('/'),
            'create' => Pages\CreateCompanyIdentity::route('/create'),
            'edit'   => Pages\EditCompanyIdentity::route('/{record}/edit'),
        ];
    }
}
