<?php

namespace App\Filament\Dasawisma\Resources\RumahResource\RelationManagers;

use App\Models\Rumah;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Collection;

class PendudukRelationManager extends RelationManager
{
    protected static string $relationship = 'penduduk';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_reg')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('no_kk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('status_perkawinan')
                    ->options([
                        'belum kawin' => 'Belum Kawin',
                        'kawin' => 'Kawin',
                        'cerai hidup' => 'Cerai Hidup',
                        'cerai mati' => 'Cerai Mati',
                    ]),
                Forms\Components\Select::make('kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),
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
                    ]),
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
                    ]),
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
                    ->searchable(),
                Forms\Components\Select::make('keterangan')
                    ->required()
                    ->options([
                        'penduduk' => 'Penduduk',
                        'pindah' => 'Pindah',
                        'meninggal' => 'Meninggal',
                    ]),
                Forms\Components\Select::make('id_rumah')
                    ->required()
                    ->relationship('rumah', 'id_rumah')
                    ->options(Rumah::all()->pluck('id_rumah'))
                    ->searchable(),
                Forms\Components\Toggle::make('pbi')
                    ->label('Penerima Bantuan Iuran')
                    ->required(),
            ]);
        // return $form
        //     ->schema([
        //         Forms\Components\Select::make('select_or_create')
        //             ->label('Select or Create Penduduk')
        //             ->options([
        //                 'select' => 'Select Existing Penduduk',
        //                 'create' => 'Create New Penduduk',
        //             ])
        //             ->default('select') // Default to 'select' to update existing
        //             ->reactive(),

        //         Forms\Components\Section::make('Select Existing Penduduk')
        //             ->schema([
        //                 Forms\Components\Select::make('existing_penduduk_id')
        //                     ->label('Select Penduduk')
        //                     ->relationship('penduduk', 'id')
        //                     ->options(Penduduk::all()->pluck('nama', 'id'))
        //                     ->searchable(),
        //             ])
        //             ->hidden(fn ($get) => $get('select_or_create') !== 'select'),

        //             // Forms\Components\TextInput::make('debug')
        //             // ->label('Debug')
        //             // ->default(fn ($get) => $get('select_or_create'))
        //             // ->disabled(),

        //         Forms\Components\Section::make('Create New Penduduk')
        //             ->schema([
        //                 Forms\Components\TextInput::make('no_reg')
        //                     ->label('No. Reg')
        //                     ->maxLength(255)
        //                     ->default(null),
        //                 Forms\Components\Select::make('no_kk')
        //                     ->label('No. Kartu Keluarga')
        //                     ->required()
        //                     ->options(KartuKeluarga::all()->pluck('no_kk', 'no_kk'))
        //                     ->searchable()
        //                     ->native(false),
        //                 Forms\Components\TextInput::make('nama')
        //                     ->required()
        //                     ->maxLength(100),
        //                 Forms\Components\Select::make('status_perkawinan')
        //                     ->label('Status Perkawinan')
        //                     ->options([
        //                         'belum kawin' => 'Belum Kawin',
        //                         'kawin' => 'Kawin',
        //                         'cerai hidup' => 'Cerai Hidup',
        //                         'cerai mati' => 'Cerai Mati',
        //                     ])
        //                     ->native(false),
        //                 Forms\Components\Select::make('kelamin')
        //                     ->options([
        //                         'laki-laki' => 'Laki-laki',
        //                         'perempuan' => 'Perempuan',
        //                     ])
        //                     ->native(false),
        //                 Forms\Components\Select::make('pendidikan')
        //                     ->options([
        //                         'tidak/belum sekolah' => 'Tidak/Belum Sekolah',
        //                         'belum tamat sd/sederajat' => 'Belum Tamat SD/Sederajat',
        //                         'tamat sd/sederajat' => 'Tamat SD/Sederajat',
        //                         'sltp/sederajat' => 'SLTP/Sederajat',
        //                         'slta/sederajat' => 'SLTA/Sederajat',
        //                         'diploma i/ii' => 'Diploma I/II',
        //                         'akademi/diploma iii/sarjana muda' => 'Akademi/Diploma III/Sarjana Muda',
        //                         'diploma iv/strata i' => 'Diploma IV/Strata I',
        //                         'strata ii' => 'Strata II',
        //                         'strata iii' => 'Strata III',
        //                     ])
        //                     ->native(false),
        //                 Forms\Components\DatePicker::make('tanggal_lahir'),
        //                 Forms\Components\Select::make('status_dalam_keluarga')
        //                     ->options([
        //                         'suami' => 'Suami',
        //                         'istri' => 'Istri',
        //                         'anak' => 'Anak',
        //                         'menantu' => 'Menantu',
        //                         'cucu' => 'Cucu',
        //                         'orangtua' => 'Orangtua',
        //                         'mertua' => 'Mertua',
        //                         'famili lain' => 'Famili Lain',
        //                         'pembantu' => 'Pembantu',
        //                         'lainnya' => 'Lainnya',
        //                     ])
        //                     ->native(false),
        //                 Forms\Components\Select::make('pekerjaan')
        //                     ->options([
        //                         'belum/tidak bekerja' => 'Belum/Tidak Bekerja',
        //                         'mengurus rumah tangga' => 'Mengurus Rumah Tangga',
        //                         'pelajar/mahasiswa' => 'Pelajar/Mahasiswa',
        //                         'pensiunan' => 'Pensiunan',
        //                         'pegawai negeri sipil (pns)' => 'Pegawai Negeri Sipil (PNS)',
        //                         'tentara nasional indonesia (tni)' => 'Tentara Nasional Indonesia (TNI)',
        //                         'kepolisian ri (polri)' => 'Kepolisian RI (Polri)',
        //                         'perdagangan' => 'Perdagangan',
        //                         'petani/pekebun' => 'Petani/Pekebun',
        //                         'peternak' => 'Peternak',
        //                         'nelayan/perikanan' => 'Nelayan/Perikanan',
        //                         'industri' => 'Industri',
        //                         'konstruksi' => 'Konstruksi',
        //                         'transportasi' => 'Transportasi',
        //                         'karyawan swasta' => 'Karyawan Swasta',
        //                         'karyawan bumn' => 'Karyawan BUMN',
        //                         'karyawan bumd' => 'Karyawan BUMD',
        //                         'karyawan honorer' => 'Karyawan Honorer',
        //                         'buruh harian lepas' => 'Buruh Harian Lepas',
        //                         'buruh tani/perkebunan' => 'Buruh Tani/Perkebunan',
        //                         'buruh nelayan/perikanan' => 'Buruh Nelayan/Perikanan',
        //                         'buruh peternakan' => 'Buruh Peternakan',
        //                         'pembantu rumah tangga' => 'Pembantu Rumah Tangga',
        //                         'tukang cukur' => 'Tukang Cukur',
        //                         'tukang listrik' => 'Tukang Listrik',
        //                         'tukang batu' => 'Tukang Batu',
        //                         'tukang kayu' => 'Tukang Kayu',
        //                         'tukang sol sepatu' => 'Tukang Sol Sepatu',
        //                         'tukang las/pandai besi' => 'Tukang Las/Pandai Besi',
        //                         'tukang jahit' => 'Tukang Jahit',
        //                         'tukang gigi' => 'Tukang Gigi',
        //                         'penata rias' => 'Penata Rias',
        //                         'penata busana' => 'Penata Busana',
        //                         'mekanik' => 'Mekanik',
        //                         'seniman' => 'Seniman',
        //                         'tabib' => 'Tabib',
        //                         'paraji' => 'Paraji',
        //                         'perancang busana' => 'Perancang Busana',
        //                         'penerjemah' => 'Penerjemah',
        //                         'imam masjid' => 'Imam Masjid',
        //                         'pendeta' => 'Pendeta',
        //                         'pastor' => 'Pastor',
        //                         'wartawan' => 'Wartawan',
        //                         'ustadz/mubaligh' => 'Ustadz/Mubaligh',
        //                         'juru masak' => 'Juru Masak',
        //                         'promotor acara' => 'Promotor Acara',
        //                         'anggota dpr-ri' => 'Anggota DPR-RI',
        //                         'anggota dpd' => 'Anggota DPD',
        //                         'anggota bpk' => 'Anggota BPK',
        //                         'presiden' => 'Presiden',
        //                         'wakil presiden' => 'Wakil Presiden',
        //                         'anggota mahkamah konstitusi' => 'Anggota Mahkamah Konstitusi',
        //                         'anggota kabinet kementrian' => 'Anggota Kabinet Kementrian',
        //                         'duta besar' => 'Duta Besar',
        //                         'gubernur' => 'Gubernur',
        //                         'wakil gubernur' => 'Wakil Gubernur',
        //                         'bupati' => 'Bupati',
        //                         'wakil bupati' => 'Wakil Bupati',
        //                         'walikota' => 'Walikota',
        //                         'wakil walikota' => 'Wakil Walikota',
        //                         'anggota dprp prop.' => 'Anggota DPRP Prop.',
        //                         'anggota dprp kab.' => 'Anggota DPRP Kab.',
        //                         'dosen' => 'Dosen',
        //                         'guru' => 'Guru',
        //                         'pilot' => 'Pilot',
        //                         'pengacara' => 'Pengacara',
        //                         'notaris' => 'Notaris',
        //                         'arsitek' => 'Arsitek',
        //                         'akuntan' => 'Akuntan',
        //                         'konsultan' => 'Konsultan',
        //                         'dokter' => 'Dokter',
        //                         'bidan' => 'Bidan',
        //                         'perawat' => 'Perawat',
        //                         'apoteker' => 'Apoteker',
        //                         'psikiater/psikolog' => 'Psikiater/Psikolog',
        //                         'penyiar televisi' => 'Penyiar Televisi',
        //                         'penyiar radio' => 'Penyiar Radio',
        //                         'pelaut' => 'Pelaut',
        //                         'peneliti' => 'Peneliti',
        //                         'sopir' => 'Sopir',
        //                         'pialang' => 'Pialang',
        //                         'paranormal' => 'Paranormal',
        //                         'pedagang' => 'Pedagang',
        //                         'perangkat desa' => 'Perangkat Desa',
        //                         'kepala desa' => 'Kepala Desa',
        //                         'biarawati' => 'Biarawati',
        //                         'wiraswasta' => 'Wiraswasta',
        //                         'lainnya' => 'Lainnya',
        //                     ])
        //                     ->default(null)
        //                     ->searchable()
        //                     ->native(false),
        //                 Forms\Components\Toggle::make('pbi')
        //                     ->label('Penerima Bantuan Iuran')
        //                     ->required(),
        //                 Forms\Components\Select::make('keterangan')
        //                     ->required()
        //                     ->options([
        //                         'penduduk' => 'Penduduk',
        //                         'pindah' => 'Pindah',
        //                         'meninggal' => 'Meninggal',
        //                     ])
        //                     ->native(false),
        //                 Forms\Components\Select::make('id_rumah')
        //                     ->label('ID Rumah')
        //                     ->relationship('rumah', 'id_rumah')
        //                     ->options(Rumah::all()->pluck('id_rumah','id_rumah'))
        //                     ->searchable()
        //                     ->native(false),
        //             ])
        //             ->hidden(fn ($get) => $get('select_or_create') !== 'create'),
        //     ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('no_kk'),
                Tables\Columns\TextColumn::make('status_perkawinan'),
                Tables\Columns\TextColumn::make('kelamin'),
                Tables\Columns\TextColumn::make('pendidikan'),
                Tables\Columns\TextColumn::make('tanggal_lahir'),
                Tables\Columns\TextColumn::make('status_dalam_keluarga'),
                Tables\Columns\TextColumn::make('pekerjaan'),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('pbi'),
                // Tables\Columns\TextColumn::make('id_rumah'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function (Penduduk $record) {
                        $record->id_rumah = null;
                        $record->save();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function (Collection $records) {
                            $records->each(function (Penduduk $record) {
                                $record->id_rumah = null;
                                $record->save();
                            });
                        }),

                ]),
            ]);
    }

    // public function save(): void
    // {
    //     $form = $this->getForm('form');
    //     $data = $form->getState();

    //     if ($data['select_or_create'] === 'create') {
    //         $penduduk = new Penduduk();
    //         $penduduk->fill($data);
    //         $penduduk->id_rumah = $this->record->id; // Or use the relevant value
    //         $penduduk->save();
    //     } elseif ($data['select_or_create'] === 'select') {
    //         $existingPenduduk = Penduduk::find($data['existing_penduduk_id']);
    //         if ($existingPenduduk) {
    //             $existingPenduduk->id_rumah = $this->record->id; // Update the `id_rumah`
    //             $existingPenduduk->save();
    //         }
    //     }
    // }
}
