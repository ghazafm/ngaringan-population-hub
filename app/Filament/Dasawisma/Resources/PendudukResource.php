<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\PendudukResource\Pages;
use App\Filament\Dasawisma\Resources\PendudukResource\RelationManagers;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Rumah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class PendudukResource extends Resource
{
    protected static ?string $model = Penduduk::class;

    protected static ?string $label = 'Penduduk';

    protected static ?string $pluralLabel = 'Penduduk';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kependudukan';

    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_reg')
                    ->label('No. Reg')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('no_kk')
                    ->label('No. Kartu Keluarga')
                    ->required()
                    ->options(KartuKeluarga::all()->pluck('no_kk', 'no_kk'))
                    ->searchable()
                    ->native(false),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->options([
                        'belum kawin' => 'Belum Kawin', 
                        'kawin' => 'Kawin', 
                        'cerai hidup' => 'Cerai Hidup', 
                        'cerai mati' => 'Cerai Mati',
                    ])
                    ->native(false),
                Forms\Components\Select::make('kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->native(false),
                Forms\Components\Select::make('pendidikan')
                    ->options([
                        'tidak/belum sekolah' => 'Tidak/Belum Sekolah',
                        'belum tamat sd/sederajat' => 'Belum Tamat SD/Sederajat',
                        'tamat sd/sederajat' => 'Tamat SD/Sederajat',
                        'sltp/sederajat' => 'SLTP/Sederajat',
                        'slta/sederajat' => 'SLTA/Sederajat',
                        'diploma i/ii' => 'Diploma I/II',
                        'akademi/diploma iii/sarjana muda' => 'Akademi/Diploma III/Sarjana Muda',
                        'diploma iv/strata i' => 'Diploma IV/Strata I',
                        'strata ii' => 'Strata II',
                        'strata iii' => 'Strata III',
                    ])
                    ->native(false),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\Select::make('status_dalam_keluarga')
                    ->options([
                        'suami' => 'Suami',
                        'istri' => 'Istri',
                        'anak' => 'Anak',
                        'menantu' => 'Menantu',
                        'cucu' => 'Cucu',
                        'orangtua' => 'Orangtua',
                        'mertua' => 'Mertua',
                        'famili lain' => 'Famili Lain',
                        'pembantu' => 'Pembantu',
                        'lainnya' => 'Lainnya',
                    ])
                    ->native(false),
                Forms\Components\Select::make('pekerjaan')
                    ->options([
                        'belum/tidak bekerja' => 'Belum/Tidak Bekerja',
                        'mengurus rumah tangga' => 'Mengurus Rumah Tangga',
                        'pelajar/mahasiswa' => 'Pelajar/Mahasiswa',
                        'pensiunan' => 'Pensiunan',
                        'pegawai negeri sipil (pns)' => 'Pegawai Negeri Sipil (PNS)',
                        'tentara nasional indonesia (tni)' => 'Tentara Nasional Indonesia (TNI)',
                        'kepolisian ri (polri)' => 'Kepolisian RI (Polri)',
                        'perdagangan' => 'Perdagangan',
                        'petani/pekebun' => 'Petani/Pekebun',
                        'peternak' => 'Peternak',
                        'nelayan/perikanan' => 'Nelayan/Perikanan',
                        'industri' => 'Industri',
                        'konstruksi' => 'Konstruksi',
                        'transportasi' => 'Transportasi',
                        'karyawan swasta' => 'Karyawan Swasta',
                        'karyawan bumn' => 'Karyawan BUMN',
                        'karyawan bumd' => 'Karyawan BUMD',
                        'karyawan honorer' => 'Karyawan Honorer',
                        'buruh harian lepas' => 'Buruh Harian Lepas',
                        'buruh tani/perkebunan' => 'Buruh Tani/Perkebunan',
                        'buruh nelayan/perikanan' => 'Buruh Nelayan/Perikanan',
                        'buruh peternakan' => 'Buruh Peternakan',
                        'pembantu rumah tangga' => 'Pembantu Rumah Tangga',
                        'tukang cukur' => 'Tukang Cukur',
                        'tukang listrik' => 'Tukang Listrik',
                        'tukang batu' => 'Tukang Batu',
                        'tukang kayu' => 'Tukang Kayu',
                        'tukang sol sepatu' => 'Tukang Sol Sepatu',
                        'tukang las/pandai besi' => 'Tukang Las/Pandai Besi',
                        'tukang jahit' => 'Tukang Jahit',
                        'tukang gigi' => 'Tukang Gigi',
                        'penata rias' => 'Penata Rias',
                        'penata busana' => 'Penata Busana',
                        'mekanik' => 'Mekanik',
                        'seniman' => 'Seniman',
                        'tabib' => 'Tabib',
                        'paraji' => 'Paraji',
                        'perancang busana' => 'Perancang Busana',
                        'penerjemah' => 'Penerjemah',
                        'imam masjid' => 'Imam Masjid',
                        'pendeta' => 'Pendeta',
                        'pastor' => 'Pastor',
                        'wartawan' => 'Wartawan',
                        'ustadz/mubaligh' => 'Ustadz/Mubaligh',
                        'juru masak' => 'Juru Masak',
                        'promotor acara' => 'Promotor Acara',
                        'anggota dpr-ri' => 'Anggota DPR-RI',
                        'anggota dpd' => 'Anggota DPD',
                        'anggota bpk' => 'Anggota BPK',
                        'presiden' => 'Presiden',
                        'wakil presiden' => 'Wakil Presiden',
                        'anggota mahkamah konstitusi' => 'Anggota Mahkamah Konstitusi',
                        'anggota kabinet kementrian' => 'Anggota Kabinet Kementrian',
                        'duta besar' => 'Duta Besar',
                        'gubernur' => 'Gubernur',
                        'wakil gubernur' => 'Wakil Gubernur',
                        'bupati' => 'Bupati',
                        'wakil bupati' => 'Wakil Bupati',
                        'walikota' => 'Walikota',
                        'wakil walikota' => 'Wakil Walikota',
                        'anggota dprp prop.' => 'Anggota DPRP Prop.',
                        'anggota dprp kab.' => 'Anggota DPRP Kab.',
                        'dosen' => 'Dosen',
                        'guru' => 'Guru',
                        'pilot' => 'Pilot',
                        'pengacara' => 'Pengacara',
                        'notaris' => 'Notaris',
                        'arsitek' => 'Arsitek',
                        'akuntan' => 'Akuntan',
                        'konsultan' => 'Konsultan',
                        'dokter' => 'Dokter',
                        'bidan' => 'Bidan',
                        'perawat' => 'Perawat',
                        'apoteker' => 'Apoteker',
                        'psikiater/psikolog' => 'Psikiater/Psikolog',
                        'penyiar televisi' => 'Penyiar Televisi',
                        'penyiar radio' => 'Penyiar Radio',
                        'pelaut' => 'Pelaut',
                        'peneliti' => 'Peneliti',
                        'sopir' => 'Sopir',
                        'pialang' => 'Pialang',
                        'paranormal' => 'Paranormal',
                        'pedagang' => 'Pedagang',
                        'perangkat desa' => 'Perangkat Desa',
                        'kepala desa' => 'Kepala Desa',
                        'biarawati' => 'Biarawati',
                        'wiraswasta' => 'Wiraswasta',
                        'lainnya' => 'Lainnya',
                        ])
                        ->default(null)
                        ->searchable()
                        ->native(false),
                Forms\Components\Toggle::make('pbi')
                    ->label('Penerima Bantuan Iuran')
                    ->required(),
                Forms\Components\Select::make('keterangan')
                    ->required()
                    ->options([
                        'penduduk' => 'Penduduk',
                        'pindah' => 'Pindah',
                        'meninggal' => 'Meninggal',
                    ])
                    ->native(false),
                Forms\Components\Select::make('id_rumah')
                    ->label('ID Rumah')
                    ->relationship('rumah', 'id_rumah')
                    ->options(Rumah::all()->pluck('id_rumah', 'id_rumah'))
                    ->searchable()
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_reg')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_kk')
                    ->label('No. Kartu Keluarga')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pendidikan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_dalam_keluarga')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('pbi')
                    ->label('PBI')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_rumah')
                    ->label('ID Rumah')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rumah.dasawisma')
                    ->label('Dasawisma')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('updated_at', 'desc') // Mengurutkan berdasarkan kolom created_at secara menurun
            ->filters([
                Tables\Filters\SelectFilter::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ]),
                Tables\Filters\SelectFilter::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->options([
                        'belum kawin' => 'Belum Kawin', 
                        'kawin' => 'Kawin', 
                        'cerai hidup' => 'Cerai Hidup', 
                        'cerai mati' => 'Cerai Mati',
                    ]),
                Tables\Filters\SelectFilter::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->options([
                        'belum/tidak bekerja' => 'Belum/Tidak Bekerja',
                        'mengurus rumah tangga' => 'Mengurus Rumah Tangga',
                        'pelajar/mahasiswa' => 'Pelajar/Mahasiswa',
                        'pensiunan' => 'Pensiunan',
                        'pegawai negeri sipil (pns)' => 'Pegawai Negeri Sipil (PNS)',
                        'tentara nasional indonesia (tni)' => 'Tentara Nasional Indonesia (TNI)',
                        'kepolisian ri (polri)' => 'Kepolisian RI (Polri)',
                        'perdagangan' => 'Perdagangan',
                        'petani/pekebun' => 'Petani/Pekebun',
                        'peternak' => 'Peternak',
                        'nelayan/perikanan' => 'Nelayan/Perikanan',
                        'industri' => 'Industri',
                        'konstruksi' => 'Konstruksi',
                        'transportasi' => 'Transportasi',
                        'karyawan swasta' => 'Karyawan Swasta',
                        'karyawan bumn' => 'Karyawan BUMN',
                        'karyawan bumd' => 'Karyawan BUMD',
                        'karyawan honorer' => 'Karyawan Honorer',
                        'buruh harian lepas' => 'Buruh Harian Lepas',
                        'buruh tani/perkebunan' => 'Buruh Tani/Perkebunan',
                        'buruh nelayan/perikanan' => 'Buruh Nelayan/Perikanan',
                        'buruh peternakan' => 'Buruh Peternakan',
                        'pembantu rumah tangga' => 'Pembantu Rumah Tangga',
                        'tukang cukur' => 'Tukang Cukur',
                        'tukang listrik' => 'Tukang Listrik',
                        'tukang batu' => 'Tukang Batu',
                        'tukang kayu' => 'Tukang Kayu',
                        'tukang sol sepatu' => 'Tukang Sol Sepatu',
                        'tukang las/pandai besi' => 'Tukang Las/Pandai Besi',
                        'tukang jahit' => 'Tukang Jahit',
                        'tukang gigi' => 'Tukang Gigi',
                        'penata rias' => 'Penata Rias',
                        'penata busana' => 'Penata Busana',
                        'mekanik' => 'Mekanik',
                        'seniman' => 'Seniman',
                        'tabib' => 'Tabib',
                        'paraji' => 'Paraji',
                        'perancang busana' => 'Perancang Busana',
                        'penerjemah' => 'Penerjemah',
                        'imam masjid' => 'Imam Masjid',
                        'pendeta' => 'Pendeta',
                        'pastor' => 'Pastor',
                        'wartawan' => 'Wartawan',
                        'ustadz/mubaligh' => 'Ustadz/Mubaligh',
                        'juru masak' => 'Juru Masak',
                        'promotor acara' => 'Promotor Acara',
                        'anggota dpr-ri' => 'Anggota DPR-RI',
                        'anggota dpd' => 'Anggota DPD',
                        'anggota bpk' => 'Anggota BPK',
                        'presiden' => 'Presiden',
                        'wakil presiden' => 'Wakil Presiden',
                        'anggota mahkamah konstitusi' => 'Anggota Mahkamah Konstitusi',
                        'anggota kabinet kementrian' => 'Anggota Kabinet Kementrian',
                        'duta besar' => 'Duta Besar',
                        'gubernur' => 'Gubernur',
                        'wakil gubernur' => 'Wakil Gubernur',
                        'bupati' => 'Bupati',
                        'wakil bupati' => 'Wakil Bupati',
                        'walikota' => 'Walikota',
                        'wakil walikota' => 'Wakil Walikota',
                        'anggota dprp prop.' => 'Anggota DPRP Prop.',
                        'anggota dprp kab.' => 'Anggota DPRP Kab.',
                        'dosen' => 'Dosen',
                        'guru' => 'Guru',
                        'pilot' => 'Pilot',
                        'pengacara' => 'Pengacara',
                        'notaris' => 'Notaris',
                        'arsitek' => 'Arsitek',
                        'akuntan' => 'Akuntan',
                        'konsultan' => 'Konsultan',
                        'dokter' => 'Dokter',
                        'bidan' => 'Bidan',
                        'perawat' => 'Perawat',
                        'apoteker' => 'Apoteker',
                        'psikiater/psikolog' => 'Psikiater/Psikolog',
                        'penyiar televisi' => 'Penyiar Televisi',
                        'penyiar radio' => 'Penyiar Radio',
                        'pelaut' => 'Pelaut',
                        'peneliti' => 'Peneliti',
                        'sopir' => 'Sopir',
                        'pialang' => 'Pialang',
                        'paranormal' => 'Paranormal',
                        'pedagang' => 'Pedagang',
                        'perangkat desa' => 'Perangkat Desa',
                        'kepala desa' => 'Kepala Desa',
                        'biarawati' => 'Biarawati',
                        'wiraswasta' => 'Wiraswasta',
                        'lainnya' => 'Lainnya',
                    ]),
                Tables\Filters\SelectFilter::make('keterangan')
                    ->label('Keterangan')
                    ->options([
                        'penduduk' => 'Penduduk',
                        'pindah' => 'Pindah',
                        'meninggal' => 'Meninggal',
                    ]),
                Tables\Filters\SelectFilter::make('pendidikan')
                    ->label('Pendidikan')
                    ->options([
                        'tidak/belum sekolah' => 'Tidak/Belum Sekolah',
                        'belum tamat sd/sederajat' => 'Belum Tamat SD/Sederajat',
                        'tamat sd/sederajat' => 'Tamat SD/Sederajat',
                        'sltp/sederajat' => 'SLTP/Sederajat',
                        'slta/sederajat' => 'SLTA/Sederajat',
                        'diploma i/ii' => 'Diploma I/II',
                        'akademi/diploma iii/sarjana muda' => 'Akademi/Diploma III/Sarjana Muda',
                        'diploma iv/strata i' => 'Diploma IV/Strata I',
                        'strata ii' => 'Strata II',
                        'strata iii' => 'Strata III',
                    ]),
                Tables\Filters\SelectFilter::make('status_dalam_keluarga')
                    ->label('Status Dalam Keluarga')
                    ->options([
                        'suami' => 'Suami',
                        'istri' => 'Istri',
                        'anak' => 'Anak',
                        'menantu' => 'Menantu',
                        'cucu' => 'Cucu',
                        'orangtua' => 'Orangtua',
                        'mertua' => 'Mertua',
                        'famili lain' => 'Famili Lain',
                        'pembantu' => 'Pembantu',
                        'lainnya' => 'Lainnya',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->requiresConfirmation(),
                ])
                ->label('Opsi Lain'),
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
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
