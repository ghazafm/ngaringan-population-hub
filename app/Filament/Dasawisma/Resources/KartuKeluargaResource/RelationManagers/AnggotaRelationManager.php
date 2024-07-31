<?php

namespace App\Filament\Dasawisma\Resources\KartuKeluargaResource\RelationManagers;

use App\Models\Rumah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaRelationManager extends RelationManager
{
    protected static string $relationship = 'anggota';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_reg')
                    ->maxLength(255)
                    ->default(null),
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
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
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
                    ->relationship('rumah', 'id_rumah')
                    ->options(Rumah::all()->pluck('id_rumah'))
                    ->searchable(),
                    Forms\Components\Toggle::make('pbi')
                    ->label('Penerima Bantuan Iuran')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('status_dalam_keluarga')
                    ->label('Status Dalam Keluarga')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelamin')
                    ->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('status_perkawinan')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
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
}
