<?php
class Pegawai
{
    public $nik = 'kosong';

    public int $gaji = 0;

    public $namaLengkap;

    public int $lamaBekerja;

    public string $username;

    private string $password;
    public bool $isAbsen = false;

    public int $totalCuti = 10;

    public function ambilCuti($cuti = 0)
    {
        $this->totalCuti -= $cuti;
        echo 'anda ambil cuti : ' . $cuti . PHP_EOL . "sisa cuti anda : " . $this->totalCuti . PHP_EOL;

    }
    public function setAbsen($absen)
    {
        $this->isAbsen = $absen;
    }
    public function infoAbsen()
    {
        if ($this->isAbsen) {
            echo "nama : " . $this->namaLengkap . 'sudah absen hari ini';
        } else {
            echo "nama : " . $this->namaLengkap . 'belum absen hari ini';
        }
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    private function samarkanPassword()
    {
        return str_replace(['a', 'i', 'u', 'e', 'o'], '*', $this->password);
    }

    public function infoAccount()
    {
        echo <<<EOD
            nama user : $this->namaLengkap
            username :$this->username
            EOD;
        echo PHP_EOL . 'password : ' . $this->samarkanPassword() . PHP_EOL;
    }
    public function setnik($nik)
    {
        $this->nik = $nik;
    }

    public function setNama($namaDepan, $namaBelakang)
    {
        $this->namaLengkap = $namaDepan . '' . $namaBelakang;
    }

    public function setGaji($gaji)
    {
        $this->gaji = $gaji;
    }

    public function setLamaBekerja($lamaBekerja)
    {
        $this->lamaBekerja = $lamaBekerja;
    }

    public function pegawaiData()
    {
        echo '======================================================================' . PHP_EOL;
        echo 'nik pegawai : ' . $this->nik
            . PHP_EOL . 'Nama pegawai : ' . $this->namaLengkap
            . PHP_EOL . 'Gaji Pegawai : Rp. ' . number_format($this->gaji)
            . PHP_EOL;
    }

    public function isPegawai()
    {

        if ($this->nik == "kosong") {
            echo 'anda tidak memiliki nik anda bukan pegawai' . PHP_EOL;
        } else {
            echo 'anda pegawai dan nik anda : ' . $this->nik . PHP_EOL;
        }
    }

    public function isPegawaiJabatan()
    {
        if ($this->lamaBekerja >= 3) {
            echo 'anda sudah karyawan tetap' . PHP_EOL;
        } else {
            echo 'anda masih karyawan kontrak' . PHP_EOL;
        }
    }
}
class PegawaiTetap extends Pegawai
{
    public int $lamaBekerja = 3;
    public int $jamKerja = 9;
    public int $lemburPerJam = 50000;

    public function setJamKerjaToday($jamKerja)
    {
        $this->jamKerja = $jamKerja;
    }

    public function info()
    {
        echo 'pegawai tetap dengan nama ' . $this->namaLengkap . PHP_EOL;
    }

    public function infoLembur()
    {
        echo 'info lembur per jam dari pegawai tetap  ' . $this->namaLengkap . PHP_EOL;
    }

    public function totalLemburYangDidapat()
    {
        $totalLemburan = $this->lemburPerJam * ($this->jamKerja - 9);
        if ($this->jamKerja > 9) {
            echo 'total lembur yang di terima adalah : Rp. ' . number_format($totalLemburan) . PHP_EOL;
        } elseif ($this->jamKerja == 9) {
            echo 'anda tidak ada lembur lembur yang di terima adalah : Rp. ' . number_format($totalLemburan) . PHP_EOL;
        }
    }

    public function gajiDiterima()
    {
        if ($this->jamKerja > 9) {
            $totalLemburan = $this->lemburPerJam * ($this->jamKerja - 9);
            $totalDiterima = $totalLemburan + $this->gaji;
            echo 'total gaji yang di terima adalah : Rp. ' . number_format($totalDiterima) . PHP_EOL;
        } elseif ($this->jamKerja == 9) {
            echo 'anda tidak ada lembur gaji yang di terima adalah : Rp. ' . number_format($this->gaji) . PHP_EOL;
        }
    }
}


class PegawaiKontrak extends Pegawai
{
    public int $lamaBekerja = 1;
    public int $jamKerja = 8;

    public int $lemburPerJam = 30000;

    public function setJamKerjaToday($jamKerja)
    {
        $this->jamKerja = $jamKerja;
    }
    public function info()
    {
        echo 'pegawai kontrak dengan nama ' . $this->namaLengkap . PHP_EOL;
    }
    public function infoLembur()
    {
        echo 'info lembur per jam dari pegawai kontrak  ' . $this->namaLengkap . PHP_EOL;
    }

    public function totalLemburYangDidapat()
    {
        $totalLemburan = $this->lemburPerJam * ($this->jamKerja - 8);
        if ($this->jamKerja > 8) {
            echo 'total lembur yang di terima adalah : Rp. ' . number_format($totalLemburan) . PHP_EOL;
        } elseif ($this->jamKerja == 8) {
            echo 'anda tidak ada lembur lembur yang di terima adalah : Rp. ' . number_format($totalLemburan) . PHP_EOL;
        }
    }
    public function gajiDiterima()
    {
        if ($this->jamKerja > 8) {
            $totalLemburan = $this->lemburPerJam * ($this->jamKerja - 8);
            $totalDiterima = $totalLemburan + $this->gaji;
            echo 'total gaji yang di terima adalah : Rp. ' . number_format($totalDiterima) . PHP_EOL;
        } elseif ($this->jamKerja == 8) {
            echo 'anda tidak ada lembur gaji yang di terima adalah : Rp. ' . number_format($this->gaji) . PHP_EOL;
        }
    }
}


$wawan = new PegawaiKontrak;
$wawan->setnik(12341234);
$wawan->setGaji(4900000);
$wawan->setNama('wawan', 'hendrawan');
$wawan->setLamaBekerja(2);
$wawan->pegawaiData();
$wawan->isPegawai();
$wawan->info();
$wawan->ambilCuti();
$wawan->isPegawaiJabatan();
$wawan->setJamKerjaToday(10);
$wawan->infoLembur();
$wawan->gajiDiterima();
$wawan->totalLemburYangDidapat();
$wawan->setUsername('wawanhendrawan');
$wawan->setPassword('wawangantenk');
$wawan->infoAbsen();
$wawan->infoAccount();

$andi = new PegawaiKontrak;
$andi->setnik(35315244434);
$andi->setGaji(6000000);
$andi->setNama('andi', 'mata');
$andi->setLamaBekerja(1);
$andi->pegawaiData();
$andi->isPegawai();
$andi->info();
$andi->ambilCuti();
$andi->isPegawaiJabatan();
$andi->setJamKerjaToday(8);
$andi->infoLembur();
$andi->gajiDiterima();
$andi->totalLemburYangDidapat();
$andi->setUsername('andi');
$andi->setPassword('12r43xc');
$andi->infoAbsen();
$andi->infoAccount();

$eko = new PegawaiTetap;
$eko->setnik(315135123);
$eko->setGaji(6700000);
$eko->setNama('eko', 'utomo');
$eko->setLamaBekerja(5);
$eko->pegawaiData();
$eko->isPegawai();
$eko->info();
$eko->ambilCuti(3);
$eko->isPegawaiJabatan();
$eko->setJamKerjaToday(10);
$eko->infoLembur();
$eko->gajiDiterima();
$eko->totalLemburYangDidapat();
$eko->setUsername('ekoutomo');
$eko->setPassword('eko123eko');
$eko->infoAccount();

$jaya = new PegawaiKontrak;
$jaya->setnik(555325512);
$jaya->setGaji(5200000);
$jaya->setNama('jaya', 'abadi setia');
$jaya->setLamaBekerja(3);
$jaya->pegawaiData();
$jaya->isPegawai();
$jaya->info();
$jaya->ambilCuti();
$jaya->isPegawaiJabatan();
$jaya->setJamKerjaToday(12);
$jaya->infoLembur();
$jaya->gajiDiterima();
$jaya->totalLemburYangDidapat();
$jaya->setUsername('jayaku');
$jaya->setPassword('jayawwaw');
$jaya->infoAbsen();
$jaya->infoAccount();

$wahyu = new PegawaiTetap;
$wahyu->setnik(4332145);
$wahyu->setGaji(7100000);
$wahyu->setNama('wahyu', 'rizki');
$wahyu->setLamaBekerja(7);
$wahyu->pegawaiData();
$wahyu->isPegawai();
$wahyu->info();
$wahyu->ambilCuti(3);
$wahyu->isPegawaiJabatan();
$wahyu->setJamKerjaToday(8);
$wahyu->infoLembur();
$wahyu->gajiDiterima();
$wahyu->totalLemburYangDidapat();
$wahyu->setUsername('wahyuutomo');
$wahyu->setPassword('wahyu123wahyu');
$wahyu->infoAccount();

$indah = new PegawaiKontrak;
$indah->setnik(3214013012);
$indah->setGaji(5100000);
$indah->setNama('indah', 'sari');
$indah->setLamaBekerja(2);
$indah->pegawaiData();
$indah->isPegawai();
$indah->info();
$indah->ambilCuti();
$indah->isPegawaiJabatan();
$indah->setJamKerjaToday(10);
$indah->infoLembur();
$indah->gajiDiterima();
$indah->totalLemburYangDidapat();
$indah->setUsername('indahsar2');
$indah->setPassword('indahcantik');
$indah->infoAbsen();
$indah->infoAccount();

$budi = new PegawaiKontrak;
$budi->setnik(2112312043);
$budi->setGaji(4800000);
$budi->setNama('budi', 'mawan');
$budi->setLamaBekerja(2);
$budi->pegawaiData();
$budi->isPegawai();
$budi->info();
$budi->ambilCuti();
$budi->isPegawaiJabatan();
$budi->setJamKerjaToday(10);
$budi->infoLembur();
$budi->gajiDiterima();
$budi->totalLemburYangDidapat();
$budi->setUsername('budiwan2');
$budi->setPassword('budianto');
$budi->infoAbsen();
$budi->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$karyawan = new PegawaiKontrak;
$karyawan->setnik(2112312043);
$karyawan->setGaji(4800000);
$karyawan->setNama('karyawan', 'mawan');
$karyawan->setLamaBekerja(2);
$karyawan->pegawaiData();
$karyawan->isPegawai();
$karyawan->info();
$karyawan->ambilCuti();
$karyawan->isPegawaiJabatan();
$karyawan->setJamKerjaToday(10);
$karyawan->infoLembur();
$karyawan->gajiDiterima();
$karyawan->totalLemburYangDidapat();
$karyawan->setUsername('karyawanwan2');
$karyawan->setPassword('karyawananto');
$karyawan->infoAbsen();
$karyawan->infoAccount();

$agung = new PegawaiTetap;
$agung->setnik(6664456455);
$agung->setGaji(8000000);
$agung->setNama('agung', 'yoga');
$agung->setLamaBekerja(10);
$agung->pegawaiData();
$agung->isPegawai();
$agung->info();
$agung->ambilCuti(6);
$agung->isPegawaiJabatan();
$agung->setJamKerjaToday(12);
$agung->infoLembur();
$agung->gajiDiterima();
$agung->totalLemburYangDidapat();
$agung->setUsername('agungwaw');
$agung->setPassword('agugn2112');
$agung->infoAccount();

$lisa = new PegawaiTetap;
$lisa->setnik(3454432354);
$lisa->setGaji(8100000);
$lisa->setNama('lisa', 'blekping');
$lisa->setLamaBekerja(7);
$lisa->pegawaiData();
$lisa->isPegawai();
$lisa->info();
$lisa->ambilCuti(3);
$lisa->isPegawaiJabatan();
$lisa->setJamKerjaToday(8);
$lisa->infoLembur();
$lisa->gajiDiterima();
$lisa->totalLemburYangDidapat();
$lisa->setUsername('lisaayu');
$lisa->setPassword('lisa123');
$lisa->infoAccount();

$rahmat = new PegawaiTetap;
$rahmat->setnik(5436335555);
$rahmat->setGaji(9700000);
$rahmat->setNama('rahmat', 'tulloh');
$rahmat->setLamaBekerja(7);
$rahmat->pegawaiData();
$rahmat->isPegawai();
$rahmat->info();
$rahmat->ambilCuti(5);
$rahmat->isPegawaiJabatan();
$rahmat->setJamKerjaToday(13);
$rahmat->infoLembur();
$rahmat->gajiDiterima();
$rahmat->totalLemburYangDidapat();
$rahmat->setUsername('rahmatutomo');
$rahmat->setPassword('rahmat123');
$rahmat->infoAccount();

$karyawan3 = new PegawaiTetap;
$karyawan3->setnik(5436335555);
$karyawan3->setGaji(9700000);
$karyawan3->setNama('karyawan3', 'tulloh');
$karyawan3->setLamaBekerja(7);
$karyawan3->pegawaiData();
$karyawan3->isPegawai();
$karyawan3->info();
$karyawan3->ambilCuti(5);
$karyawan3->isPegawaiJabatan();
$karyawan3->setJamKerjaToday(13);
$karyawan3->infoLembur();
$karyawan3->gajiDiterima();
$karyawan3->totalLemburYangDidapat();
$karyawan3->setUsername('karyawan3utomo');
$karyawan3->setPassword('karyawan3123');
$karyawan3->infoAccount();

$karyawan3 = new PegawaiTetap;
$karyawan3->setnik(5436335555);
$karyawan3->setGaji(9700000);
$karyawan3->setNama('karyawan3', 'tulloh');
$karyawan3->setLamaBekerja(7);
$karyawan3->pegawaiData();
$karyawan3->isPegawai();
$karyawan3->info();
$karyawan3->ambilCuti(5);
$karyawan3->isPegawaiJabatan();
$karyawan3->setJamKerjaToday(13);
$karyawan3->infoLembur();
$karyawan3->gajiDiterima();
$karyawan3->totalLemburYangDidapat();
$karyawan3->setUsername('karyawan3utomo');
$karyawan3->setPassword('karyawan3123');
$karyawan3->infoAccount();

$karyawan3 = new PegawaiTetap;
$karyawan3->setnik(5436335555);
$karyawan3->setGaji(9700000);
$karyawan3->setNama('karyawan3', 'tulloh');
$karyawan3->setLamaBekerja(7);
$karyawan3->pegawaiData();
$karyawan3->isPegawai();
$karyawan3->info();
$karyawan3->ambilCuti(5);
$karyawan3->isPegawaiJabatan();
$karyawan3->setJamKerjaToday(13);
$karyawan3->infoLembur();
$karyawan3->gajiDiterima();
$karyawan3->totalLemburYangDidapat();
$karyawan3->setUsername('karyawan3utomo');
$karyawan3->setPassword('karyawan3123');
$karyawan3->infoAccount();

$karyawan3 = new PegawaiTetap;
$karyawan3->setnik(5436335555);
$karyawan3->setGaji(9700000);
$karyawan3->setNama('karyawan3', 'tulloh');
$karyawan3->setLamaBekerja(7);
$karyawan3->pegawaiData();
$karyawan3->isPegawai();
$karyawan3->info();
$karyawan3->ambilCuti(5);
$karyawan3->isPegawaiJabatan();
$karyawan3->setJamKerjaToday(13);
$karyawan3->infoLembur();
$karyawan3->gajiDiterima();
$karyawan3->totalLemburYangDidapat();
$karyawan3->setUsername('karyawan3utomo');
$karyawan3->setPassword('karyawan3123');
$karyawan3->infoAccount();

$karyawan3 = new PegawaiTetap;
$karyawan3->setnik(5436335555);
$karyawan3->setGaji(9700000);
$karyawan3->setNama('karyawan3', 'tulloh');
$karyawan3->setLamaBekerja(7);
$karyawan3->pegawaiData();
$karyawan3->isPegawai();
$karyawan3->info();
$karyawan3->ambilCuti(5);
$karyawan3->isPegawaiJabatan();
$karyawan3->setJamKerjaToday(13);
$karyawan3->infoLembur();
$karyawan3->gajiDiterima();
$karyawan3->totalLemburYangDidapat();
$karyawan3->setUsername('karyawan3utomo');
$karyawan3->setPassword('karyawan3123');
$karyawan3->infoAccount();

$karyawan3 = new PegawaiTetap;
$karyawan3->setnik(5436335555);
$karyawan3->setGaji(9700000);
$karyawan3->setNama('karyawan3', 'tulloh');
$karyawan3->setLamaBekerja(7);
$karyawan3->pegawaiData();
$karyawan3->isPegawai();
$karyawan3->info();
$karyawan3->ambilCuti(5);
$karyawan3->isPegawaiJabatan();
$karyawan3->setJamKerjaToday(13);
$karyawan3->infoLembur();
$karyawan3->gajiDiterima();
$karyawan3->totalLemburYangDidapat();
$karyawan3->setUsername('karyawan3utomo');
$karyawan3->setPassword('karyawan3123');
$karyawan3->infoAccount();

// class dengan tema Lainnya

class Sepatu
{
    public string $warna;

    public int $ukuran;

    public string $nama;

    public string $nomorseri;

    public string $kategori;

    public string $merek;

    public function setUkuran($ukuran)
    {
        $this->ukuran = $ukuran;
    }

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }


    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function setSeri($nomorseri)
    {
        $this->nomorseri = $nomorseri;
    }

    public function setKategori($kategori)
    {
        $this->kategori = $kategori;
    }
    public function setMerek($merek)
    {
        $this->merek = $merek;
    }

    public function infoSepatu()
    {
        echo "==============================" . PHP_EOL
            . "merek sepatu : " . $this->merek . PHP_EOL
            . "nama sepatu : " . $this->nama . PHP_EOL
            . "Nomor seri sepatu : " . $this->nomorseri . PHP_EOL
            . "Kategori sepatu : " . $this->kategori . PHP_EOL
            . "Warna sepatu : " . $this->warna . PHP_EOL
            . "Ukuran sepatu : " . $this->ukuran . PHP_EOL;
    }
}

class SepatuHil extends Sepatu
{
    public int $tinggiHil;

    public function setTinggihil($tinggiHil)
    {
        $this->tinggiHil = $tinggiHil;
    }

    public function infoSepatu()
    {
        echo "================================" . PHP_EOL
            . "Merek : " . $this->merek . PHP_EOL
            . "Nama sepatu : " . $this->nama . PHP_EOL
            . "nomor seri sepatu : " . $this->nomorseri . PHP_EOL
            . "kategori sepatu : " . $this->kategori . PHP_EOL
            . "warna sepatu : " . $this->warna . PHP_EOL
            . "ukuran sepatu : " . $this->ukuran . PHP_EOL
            . "tinggi hil : " . $this->tinggiHil . ' cm' . PHP_EOL;
    }
}

class SepatuRoda extends Sepatu
{
    public int $banyakRoda;

    public string $warnaRoda;

    public function setbanyakRoda($banyakRoda)
    {
        $this->banyakRoda = $banyakRoda;
    }

    public function setwarnaRoda($warnaRoda)
    {
        $this->warnaRoda = $warnaRoda;
    }

    public function infoSepatu()
    {
        echo "================================" . PHP_EOL
            . "Merek : " . $this->merek . PHP_EOL
            . "Nama sepatu : " . $this->nama . PHP_EOL
            . "nomor seri sepatu : " . $this->nomorseri . PHP_EOL
            . "kategori sepatu : " . $this->kategori . PHP_EOL
            . "warna sepatu : " . $this->warna . PHP_EOL
            . "ukuran sepatu : " . $this->ukuran . PHP_EOL
            . "banyak roda : " . $this->banyakRoda . PHP_EOL
            . "warna roda : " . $this->warnaRoda . PHP_EOL;
    }
}



$adidas1 = new Sepatu;
$adidas1->setNama('adidas OG wew');
$adidas1->setMerek('adidas');
$adidas1->setseri(233412413);
$adidas1->setWarna('merah');
$adidas1->setUkuran(40);
$adidas1->setKategori('perempuan');
$adidas1->infoSepatu();

$adidas2 = new Sepatu;
$adidas2->setNama('adidas lari asik');
$adidas2->setMerek('adidas');
$adidas2->setseri(3334463413);
$adidas2->setWarna('coklat');
$adidas2->setUkuran(43);
$adidas2->setKategori('anak');
$adidas2->infoSepatu();

$adidas3 = new Sepatu;
$adidas3->setNama('adidas garis 3');
$adidas3->setMerek('adidas');
$adidas3->setseri(48579849834);
$adidas3->setWarna('hitam');
$adidas3->setUkuran(31);
$adidas3->setKategori('pria');
$adidas3->infoSepatu();

$sepatu4 = new Sepatu;
$sepatu4->setNama('onitsuka sport');
$sepatu4->setMerek('onitsuka');
$sepatu4->setseri(20130129);
$sepatu4->setWarna('hijau');
$sepatu4->setUkuran(43);
$sepatu4->setKategori('pria');
$sepatu4->infoSepatu();

$sepatu5 = new Sepatu;
$sepatu5->setNama('ventela se');
$sepatu5->setMerek('ventela');
$sepatu5->setseri(234325435);
$sepatu5->setWarna('hitam');
$sepatu5->setUkuran(44);
$sepatu5->setKategori('pria');
$sepatu5->infoSepatu();

$sepatu5 = new Sepatu;
$sepatu5->setNama('ventela sad');
$sepatu5->setMerek('ventela');
$sepatu5->setseri(234325435);
$sepatu5->setWarna('hitam');
$sepatu5->setUkuran(44);
$sepatu5->setKategori('pria');
$sepatu5->infoSepatu();

$sepatu5 = new Sepatu;
$sepatu5->setNama('ventela asd');
$sepatu5->setMerek('ventela');
$sepatu5->setseri(234325435);
$sepatu5->setWarna('hitam');
$sepatu5->setUkuran(44);
$sepatu5->setKategori('pria');
$sepatu5->infoSepatu();

$sepatu5 = new Sepatu;
$sepatu5->setNama('ventela asd');
$sepatu5->setMerek('ventela');
$sepatu5->setseri(234325435);
$sepatu5->setWarna('hitam');
$sepatu5->setUkuran(44);
$sepatu5->setKategori('pria');
$sepatu5->infoSepatu();

$sepatu5 = new Sepatu;
$sepatu5->setNama('ventela das');
$sepatu5->setMerek('ventela');
$sepatu5->setseri(234325435);
$sepatu5->setWarna('hitam');
$sepatu5->setUkuran(44);
$sepatu5->setKategori('pria');
$sepatu5->infoSepatu();

$hil1 = new SepatuHil;
$hil1->setNama('clara hil');
$hil1->setMerek('clara');
$hil1->setseri(99302021);
$hil1->setWarna('merah');
$hil1->setUkuran(38);
$hil1->setKategori('wanita');
$hil1->setTinggihil(3);
$hil1->infoSepatu();

$hil2 = new SepatuHil;
$hil2->setNama('lv hil');
$hil2->setMerek('lv');
$hil2->setseri(444324);
$hil2->setWarna('putih');
$hil2->setUkuran(40);
$hil2->setKategori('wanita');
$hil2->setTinggihil(10);
$hil2->infoSepatu();

$hil3 = new SepatuHil;
$hil3->setNama('queen hil');
$hil3->setMerek('queen');
$hil3->setseri(1242352);
$hil3->setWarna('merah');
$hil3->setUkuran(42);
$hil3->setKategori('wanita');
$hil3->setTinggihil(4);
$hil3->infoSepatu();

$hil4 = new SepatuHil;
$hil4->setNama('uniqlo women');
$hil4->setMerek('uniqlo');
$hil4->setseri(12432432);
$hil4->setWarna('hijau');
$hil4->setUkuran(44);
$hil4->setKategori('wanita');
$hil4->setTinggihil(2);
$hil4->infoSepatu();

$hil5 = new SepatuHil;
$hil5->setNama('kvc hil');
$hil5->setMerek('kvc');
$hil5->setseri(3242332);
$hil5->setWarna('merah');
$hil5->setUkuran(40);
$hil5->setKategori('wanita');
$hil5->setTinggihil(3);
$hil5->infoSepatu();

$homie1 = new SepatuRoda;
$homie1->setNama('sepatu roda anak');
$homie1->setMerek('homiepad');
$homie1->setseri(213456423);
$homie1->setWarna('merah');
$homie1->setUkuran(25);
$homie1->setKategori('anak');
$homie1->setbanyakRoda(8);
$homie1->setwarnaRoda('merah');
$homie1->infoSepatu();

$roda1 = new SepatuRoda;
$roda1->setNama('sepatu roda semua kalangan');
$roda1->setMerek('nike');
$roda1->setseri(3124235235);
$roda1->setWarna('hitam');
$roda1->setUkuran(39);
$roda1->setKategori('semua');
$roda1->setbanyakRoda(2);
$roda1->setwarnaRoda('putih');
$roda1->infoSepatu();

$roda2 = new SepatuRoda;
$roda2->setNama('soke sss');
$roda2->setMerek('nike');
$roda2->setseri(12432432);
$roda2->setWarna('hijau');
$roda2->setUkuran(33);
$roda2->setKategori('anak');
$roda2->setbanyakRoda(4);
$roda2->setwarnaRoda('putih');
$roda2->infoSepatu();

$roda1 = new SepatuRoda;
$roda1->setNama('mcd shoes');
$roda1->setMerek('mcd');
$roda1->setseri(342342332);
$roda1->setWarna('merah');
$roda1->setUkuran(34);
$roda1->setKategori('anak');
$roda1->setbanyakRoda(4);
$roda1->setwarnaRoda('putih');
$roda1->infoSepatu();

$roda1 = new SepatuRoda;
$roda1->setNama('kdcse kalangan');
$roda1->setMerek('nikekdcse');
$roda1->setseri(423432435);
$roda1->setWarna('kuning');
$roda1->setUkuran(39);
$roda1->setKategori('semua');
$roda1->setbanyakRoda(8);
$roda1->setwarnaRoda('putih');
$roda1->infoSepatu();

class Buku
{
    public string $judulBuku;

    public string $penulis;

    public string $penerbit;

    public int $harga;

    public int $halaman;

    public function setjudulBuku($judulBuku)
    {
        $this->judulBuku = $judulBuku;
    }

    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }

    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function setHalaman($halaman)
    {
        $this->halaman = $halaman;
    }

    public function infoBuku()
    {
        echo "==============================" . PHP_EOL
            . "Judul : " . $this->judulBuku . PHP_EOL
            . "Penulis buku : " . $this->penulis . PHP_EOL
            . "nama Penerbit  : " . $this->penerbit . PHP_EOL
            . "Harga buku : " . $this->harga . PHP_EOL
            . "banyak halaman : " . $this->halaman . PHP_EOL;
    }
}

class Komik extends Buku
{
    public bool $isBerwarna;

    public string $subtitle;

    public function setIsBerwarna($isBerwarna)
    {
        $this->isBerwarna = $isBerwarna;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function infoBuku()
    {
        $gambarKomik = "";
        if ($this->isBerwarna) {
            $gambarKomik = "FULL COLOR";
        } else {
            $gambarKomik = "HITAM PUTIH";
        }
        echo "=============================" . PHP_EOL
            . "judul buku : " . $this->judulBuku . PHP_EOL
            . "Penulis : " . $this->penulis . PHP_EOL
            . "Penerbit : " . $this->penerbit . PHP_EOL
            . "harga : " . $this->harga . PHP_EOL
            . "Jumlah halaman : " . $this->halaman . PHP_EOL
            . "subtitile berbahasa : " . $this->subtitle . PHP_EOL
            . "komik gambar dengan : " . $gambarKomik . PHP_EOL;
    }
}

class Kamus extends Buku
{
    public string $dariBahasa;

    public string $keBahasa;

    public int $banyakKata;

    public function setdariBahasa($dariBahasa)
    {
        $this->dariBahasa = $dariBahasa;
    }

    public function setkeBahasa($keBahasa)
    {
        $this->keBahasa = $keBahasa;
    }

    public function setbanyakKata($banyakKata)
    {
        $this->banyakKata = $banyakKata;
    }

    public function infoBuku()
    {
        echo "===========================" . PHP_EOL
            . "Judul buku : " . $this->judulBuku . PHP_EOL
            . "Penulis : " . $this->penulis . PHP_EOL
            . "Penerbit : " . $this->penerbit . PHP_EOL
            . "harga : " . $this->harga . PHP_EOL
            . "Jumlah halaman : " . $this->halaman . PHP_EOL
            . "terjemahkan bahasa : " . $this->dariBahasa . PHP_EOL
            . "ke bahasa : " . $this->keBahasa . PHP_EOL
            . "banyak kata dalam kamus : " . $this->banyakKata . PHP_EOL;
    }
}

$buku1 = new Buku;
$buku1->setjudulBuku('programming enak');
$buku1->setPenulis('junaedi');
$buku1->setPenerbit('karya buku indo');
$buku1->setHarga(52500);
$buku1->setHalaman(145);
$buku1->infoBuku();

$buku2 = new Buku;
$buku2->setjudulBuku('membangun rumah');
$buku2->setPenulis('wawan sang penulis');
$buku2->setPenerbit('buku abadi jaya');
$buku2->setHarga(45300);
$buku2->setHalaman(32);
$buku2->infoBuku();

$buku3 = new Buku;
$buku3->setjudulBuku('membangun atap');
$buku3->setPenulis('wawan sang penulis');
$buku3->setPenerbit('buku abadi jaya');
$buku3->setHarga(43300);
$buku3->setHalaman(35);
$buku3->infoBuku();

$buku4 = new Buku;
$buku4->setjudulBuku('membayar kasir');
$buku4->setPenulis('rahasia penulis');
$buku4->setPenerbit('buku wes wos');
$buku4->setHarga(6000);
$buku4->setHalaman(50);
$buku4->infoBuku();

$buku5 = new Buku;
$buku5->setjudulBuku('cara menjadi baik');
$buku5->setPenulis('wawan orang baik');
$buku5->setPenerbit('kami');
$buku5->setHarga(54300);
$buku5->setHalaman(50);
$buku5->infoBuku();

$buku6 = new Buku;
$buku6->setjudulBuku('cara berbuat baik');
$buku6->setPenulis('wawan orang');
$buku6->setPenerbit('wwa ini');
$buku6->setHarga(54300);
$buku6->setHalaman(50);
$buku6->infoBuku();

$buku7 = new Buku;
$buku7->setjudulBuku('tutorial menjadi baik');
$buku7->setPenulis(' orang baik');
$buku7->setPenerbit('ksad');
$buku7->setHarga(54300);
$buku7->setHalaman(50);
$buku7->infoBuku();

$buku8 = new Buku;
$buku8->setjudulBuku('cara baik');
$buku8->setPenulis('kami orang baik');
$buku8->setPenerbit('ss ini');
$buku8->setHarga(54300);
$buku8->setHalaman(50);
$buku8->infoBuku();

$buku9 = new Buku;
$buku9->setjudulBuku('cara menjadi baik 2');
$buku9->setPenulis('wawan orang ');
$buku9->setPenerbit('asdaww');
$buku9->setHarga(54300);
$buku9->setHalaman(50);
$buku9->infoBuku();

$buku10 = new Buku;
$buku10->setjudulBuku('1 cara menjadi baik');
$buku10->setPenulis('wawan  baik');
$buku10->setPenerbit('kami ini');
$buku10->setHarga(54300);
$buku10->setHalaman(50);
$buku10->infoBuku();

$wanpis = new Komik;
$wanpis->setjudulBuku('one piece chapter 1034');
$wanpis->setPenulis('Echiro oda');
$wanpis->setPenerbit('japanese book');
$wanpis->setHarga(43000);
$wanpis->setHalaman(57);
$wanpis->setIsBerwarna(false);
$wanpis->setSubtitle('Indonesia');
$wanpis->infoBuku();

$naruto = new Komik;
$naruto->setjudulBuku('naruto the last');
$naruto->setPenulis('mashasi kishimoto');
$naruto->setPenerbit('mangaku');
$naruto->setHarga(45000);
$naruto->setHalaman(49);
$naruto->setIsBerwarna(true);
$naruto->setSubtitle('Indonesia');
$naruto->infoBuku();

$goku = new Komik;
$goku->setjudulBuku('Dragon ball');
$goku->setPenulis('Akira Toriyama');
$goku->setPenerbit('manga jepang');
$goku->setHarga(55500);
$goku->setHalaman(61);
$goku->setIsBerwarna(false);
$goku->setSubtitle('Indonesia');
$goku->infoBuku();

$conan = new Komik;
$conan->setjudulBuku('Kudo shinci');
$conan->setPenulis('anonim');
$conan->setPenerbit('manga jepang');
$conan->setHarga(53000);
$conan->setHalaman(64);
$conan->setIsBerwarna(false);
$conan->setSubtitle('Indonesia');
$conan->infoBuku();

$tsubatsa = new Komik;
$tsubatsa->setjudulBuku('captain tsubatsa');
$tsubatsa->setPenulis('matsuyama');
$tsubatsa->setPenerbit('mangakita');
$tsubatsa->setHarga(45000);
$tsubatsa->setHalaman(50);
$tsubatsa->setIsBerwarna(false);
$tsubatsa->setSubtitle('Indonesia');
$tsubatsa->infoBuku();

$wanpis = new Komik;
$wanpis->setjudulBuku('one piece chapter 1039');
$wanpis->setPenulis('Echiro oda2');
$wanpis->setPenerbit('samehadaku');
$wanpis->setHarga(43000);
$wanpis->setHalaman(57);
$wanpis->setIsBerwarna(false);
$wanpis->setSubtitle('Indonesia');
$wanpis->infoBuku();

$wanpis = new Komik;
$wanpis->setjudulBuku('one piece chapter 1099');
$wanpis->setPenulis('Echiro oda1');
$wanpis->setPenerbit('samehadaku');
$wanpis->setHarga(43000);
$wanpis->setHalaman(57);
$wanpis->setIsBerwarna(false);
$wanpis->setSubtitle('Indonesia');
$wanpis->infoBuku();

$wanpis = new Komik;
$wanpis->setjudulBuku('one piece chapter 988');
$wanpis->setPenulis('Echiro oda3');
$wanpis->setPenerbit('samehadaku');
$wanpis->setHarga(43000);
$wanpis->setHalaman(57);
$wanpis->setIsBerwarna(false);
$wanpis->setSubtitle('Indonesia');
$wanpis->infoBuku();

$kamus = new Kamus;
$kamus->setjudulBuku('Jago berbahasa spanyol');
$kamus->setPenulis('s inggris');
$kamus->setPenerbit('s english');
$kamus->setHarga(60000);
$kamus->setHalaman(103);
$kamus->setdariBahasa('Spanyol');
$kamus->setkeBahasa('Indonesia');
$kamus->setbanyakKata(324600);
$kamus->infoBuku();

$kamus2 = new Kamus;
$kamus2->setjudulBuku('inggris populer');
$kamus2->setPenulis('kampung s');
$kamus2->setPenerbit('jago s');
$kamus2->setHarga(64000);
$kamus2->setHalaman(124);
$kamus2->setdariBahasa('Inggris');
$kamus2->setkeBahasa('Indonesia');
$kamus2->setbanyakKata(323600);
$kamus2->infoBuku();

$kamus2 = new Kamus;
$kamus2->setjudulBuku('inggris sad');
$kamus2->setPenulis('kampung s');
$kamus2->setPenerbit('jago s');
$kamus2->setHarga(64000);
$kamus2->setHalaman(124);
$kamus2->setdariBahasa('Inggris');
$kamus2->setkeBahasa('Indonesia');
$kamus2->setbanyakKata(323600);
$kamus2->infoBuku();

$kamus2 = new Kamus;
$kamus2->setjudulBuku('inggris wew');
$kamus2->setPenulis('kampung inggris');
$kamus2->setPenerbit('jago english');
$kamus2->setHarga(64000);
$kamus2->setHalaman(124);
$kamus2->setdariBahasa('Inggris');
$kamus2->setkeBahasa('Indonesia');
$kamus2->setbanyakKata(323600);
$kamus2->infoBuku();

$kamus2 = new Kamus;
$kamus2->setjudulBuku('inggris ss');
$kamus2->setPenulis('kampung inggris');
$kamus2->setPenerbit('jago english');
$kamus2->setHarga(64000);
$kamus2->setHalaman(124);
$kamus2->setdariBahasa('Inggris');
$kamus2->setkeBahasa('Indonesia');
$kamus2->setbanyakKata(323600);
$kamus2->infoBuku();

$kamus3 = new Kamus;
$kamus3->setjudulBuku('jepang wibu ');
$kamus3->setPenulis('tomiyasu');
$kamus3->setPenerbit('berbahasa asik');
$kamus3->setHarga(70000);
$kamus3->setHalaman(142);
$kamus3->setdariBahasa('Jepang');
$kamus3->setkeBahasa('Indonesia');
$kamus3->setbanyakKata(323600);
$kamus3->infoBuku();

$kamus4 = new Kamus;
$kamus4->setjudulBuku('pintar rusia');
$kamus4->setPenulis('rodonov');
$kamus4->setPenerbit(' pintar bahasa');
$kamus4->setHarga(40000);
$kamus4->setHalaman(146);
$kamus4->setdariBahasa('Rusia');
$kamus4->setkeBahasa('Indonesia');
$kamus4->setbanyakKata(323690);
$kamus4->infoBuku();

$kamus5 = new Kamus;
$kamus5->setjudulBuku('India asik');
$kamus5->setPenulis('ladusing');
$kamus5->setPenerbit('bahasa oke');
$kamus5->setHarga(55000);
$kamus5->setHalaman(144);
$kamus5->setdariBahasa('India');
$kamus5->setkeBahasa('Indonesia');
$kamus5->setbanyakKata(323600);
$kamus5->infoBuku();

class Gadget
{
    public string $merek;

    public int $tahunProduksi;

    public string $sistemOperasi;

    public int $ram;

    public int $rom;

    public int $harga;

    public string $prosesor;
    public function setMerek($merek)
    {
        $this->merek = $merek;
    }

    public function setsistemOperasi($sistemOperasi)
    {
        $this->sistemOperasi = $sistemOperasi;
    }

    public function settahunProduksi($tahunProduksi)
    {
        $this->tahunProduksi = $tahunProduksi;
    }

    public function setram($ram)
    {
        $this->ram = $ram;
    }

    public function setrom($rom)
    {
        $this->rom = $rom;
    }
    public function setprosesor($prosesor)
    {
        $this->prosesor = $prosesor;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }
}

class Handphone extends Gadget
{

    public string $glass;

    public function setGlass($glass)
    {
        $this->glass = $glass;
    }

    public function infoHp()
    {
        echo "=============================" . PHP_EOL
            . "merek : " . $this->merek . PHP_EOL
            . "tahun produksi : " . $this->tahunProduksi . PHP_EOL
            . "sistem Operasi : " . $this->sistemOperasi . PHP_EOL
            . "Harga : " . $this->harga . PHP_EOL
            . "ram : " . $this->ram . PHP_EOL
            . "rom : " . $this->rom . PHP_EOL
            . "glass : " . $this->glass . PHP_EOL;
    }



}

class Laptop extends Gadget
{

    public string $sikuDerajat;

    public function setsikuDerajat($sikuDerajat)
    {
        $this->sikuDerajat = $sikuDerajat;
    }

    public function infoLaptop()
    {
        echo "===============================" . PHP_EOL
            . "merek : " . $this->merek . PHP_EOL
            . "tahun produksi : " . $this->tahunProduksi . PHP_EOL
            . "sistem Operasi : " . $this->sistemOperasi . PHP_EOL
            . "Harga : " . $this->harga . PHP_EOL
            . "ram : " . $this->ram . PHP_EOL
            . "rom : " . $this->rom . PHP_EOL
            . "lipatan siku laptop : " . $this->sikuDerajat . PHP_EOL;
    }
}

$hp1 = new Handphone;
$hp1->setMerek('OPPO');
$hp1->settahunProduksi(2015);
$hp1->setsistemOperasi('Android');
$hp1->setprosesor('mediatek');
$hp1->setram(4);
$hp1->setrom(500);
$hp1->setHarga(4000000);
$hp1->setGlass('Gorila');
$hp1->infoHp();

$hp2 = new Handphone;
$hp2->setMerek('VIVO');
$hp2->settahunProduksi(2021);
$hp2->setsistemOperasi('Android');
$hp1->setprosesor('mediatek');
$hp2->setram(8);
$hp2->setrom(250);
$hp2->setHarga(2000000);
$hp2->setGlass('Gorila');
$hp2->infoHp();

$hp3 = new Handphone;
$hp3->setMerek('infinix');
$hp3->settahunProduksi(2021);
$hp3->setsistemOperasi('Android');
$hp3->setprosesor('mediatek');
$hp3->setram(2);
$hp3->setrom(128);
$hp3->setHarga(1000000);
$hp3->setGlass('Gorila');
$hp3->infoHp();

$hp4 = new Handphone;
$hp4->setMerek('IPHONE');
$hp4->settahunProduksi(2022);
$hp4->setsistemOperasi('IOS');
$hp4->setprosesor('bionic');
$hp4->setram(2);
$hp4->setrom(500);
$hp4->setHarga(12000000);
$hp4->setGlass('Gorila');
$hp4->infoHp();

$hp5 = new Handphone;
$hp5->setMerek('ASUS');
$hp5->settahunProduksi(2018);
$hp5->setsistemOperasi('Android');
$hp5->setprosesor('mediatek');
$hp5->setram(4);
$hp5->setrom(500);
$hp5->setHarga(1000000);
$hp5->setGlass('Gorila');
$hp5->infoHp();

$hp5 = new Handphone;
$hp5->setMerek('ASUS');
$hp5->settahunProduksi(2018);
$hp5->setsistemOperasi('Android');
$hp5->setprosesor('mediatek');
$hp5->setram(4);
$hp5->setrom(500);
$hp5->setHarga(1000000);
$hp5->setGlass('Gorila');
$hp5->infoHp();

$hp5 = new Handphone;
$hp5->setMerek('ASUS');
$hp5->settahunProduksi(2018);
$hp5->setsistemOperasi('Android');
$hp5->setprosesor('mediatek');
$hp5->setram(4);
$hp5->setrom(500);
$hp5->setHarga(1000000);
$hp5->setGlass('Gorila');
$hp5->infoHp();

$hp5 = new Handphone;
$hp5->setMerek('ASUS');
$hp5->settahunProduksi(2018);
$hp5->setsistemOperasi('Android');
$hp5->setprosesor('mediatek');
$hp5->setram(4);
$hp5->setrom(500);
$hp5->setHarga(1000000);
$hp5->setGlass('Gorila');
$hp5->infoHp();

$hp5 = new Handphone;
$hp5->setMerek('ASUS');
$hp5->settahunProduksi(2018);
$hp5->setsistemOperasi('Android');
$hp5->setprosesor('mediatek');
$hp5->setram(4);
$hp5->setrom(500);
$hp5->setHarga(1000000);
$hp5->setGlass('Gorila');
$hp5->infoHp();

$hp5 = new Handphone;
$hp5->setMerek('ASUS');
$hp5->settahunProduksi(2018);
$hp5->setsistemOperasi('Android');
$hp5->setprosesor('mediatek');
$hp5->setram(4);
$hp5->setrom(500);
$hp5->setHarga(1000000);
$hp5->setGlass('Gorila');
$hp5->infoHp();

$laptop1 = new Laptop;
$laptop1->setMerek('ASUS');
$laptop1->settahunProduksi(2018);
$laptop1->setsistemOperasi('windows');
$laptop1->setprosesor('intel core i3');
$laptop1->setram(8);
$laptop1->setrom(1000);
$laptop1->setHarga(8000000);
$laptop1->setsikuDerajat(100);
$laptop1->infoLaptop();

$laptop2 = new Laptop;
$laptop2->setMerek('ASUS');
$laptop2->settahunProduksi(2021);
$laptop2->setsistemOperasi('windows');
$laptop2->setprosesor('intel core i5');
$laptop2->setram(8);
$laptop2->setrom(1000);
$laptop2->setHarga(10000000);
$laptop2->setsikuDerajat(100);
$laptop2->infoLaptop();

$laptop3 = new Laptop;
$laptop3->setMerek('ASUS');
$laptop3->settahunProduksi(2020);
$laptop3->setsistemOperasi('windows');
$laptop3->setprosesor('intel core i7');
$laptop3->setram(8);
$laptop3->setrom(1000);
$laptop3->setHarga(13000000);
$laptop3->setsikuDerajat(100);
$laptop3->infoLaptop();

$laptop4 = new Laptop;
$laptop4->setMerek('Lenovo');
$laptop4->settahunProduksi(2021);
$laptop4->setsistemOperasi('windows');
$laptop4->setprosesor('intel core i5');
$laptop4->setram(8);
$laptop4->setrom(1000);
$laptop4->setHarga(10000000);
$laptop4->setsikuDerajat(360);
$laptop4->infoLaptop();

$laptop5 = new Laptop;
$laptop5->setMerek('Lenovo');
$laptop5->settahunProduksi(2020);
$laptop5->setsistemOperasi('windows');
$laptop5->setprosesor('ryzen 3');
$laptop5->setram(4);
$laptop5->setrom(500);
$laptop5->setHarga(5000000);
$laptop5->setsikuDerajat(240);
$laptop5->infoLaptop();

class Game
{
    public string $nameGame;

    public string $developer;

    public string $console;

    public string $kategoriGame;

    public bool $isOnline;


    public function setnameGame($nameGame)
    {
        $this->nameGame = $nameGame;
    }

    public function setDeveloper($developer)
    {
        $this->developer = $developer;
    }

    public function setConsole($console)
    {
        $this->console = $console;
    }

    public function setkategoriGame($kategoriGame)
    {
        $this->kategoriGame = $kategoriGame;
    }

    public function setisOnline($isOnline)
    {
        $this->isOnline = $isOnline;
    }

    public function infoGame()
    {
        $onlineEngga = "";
        if ($this->isOnline) {
            $onlineEngga = "ONLINE";
        } else {
            $onlineEngga = "OFFLINE";
        }
        echo "===============================" . PHP_EOL
            . "nama Game : " . $this->nameGame . PHP_EOL
            . "console : " . $this->console . PHP_EOL
            . "kategori Game : " . $this->kategoriGame . PHP_EOL
            . "tipe game : " . $onlineEngga . PHP_EOL
            . "developer : " . $this->developer . PHP_EOL;
    }
}

$game1 = new Game;
$game1->setnameGame('Mobile legend');
$game1->setConsole('Handphone');
$game1->setkategoriGame('Moba');
$game1->setisOnline(true);
$game1->setDeveloper('moonton');
$game1->infoGame();

$game2 = new Game;
$game2->setnameGame('Gta');
$game2->setConsole('PC');
$game2->setkategoriGame('Open world');
$game2->setisOnline(true);
$game2->setDeveloper('rockstar');
$game2->infoGame();

$game1 = new Game;
$game1->setnameGame('red dead 2');
$game1->setConsole('pc');
$game1->setkategoriGame('open world');
$game1->setisOnline(true);
$game1->setDeveloper('rockstar');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('call of duty');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('worldgame');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('free fire');
$game1->setConsole('Handphone');
$game1->setkategoriGame('survival');
$game1->setisOnline(true);
$game1->setDeveloper('garena');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('point blank');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(true);
$game1->setDeveloper('zepetto');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('FIFA');
$game1->setConsole('pc');
$game1->setkategoriGame('sport');
$game1->setisOnline(true);
$game1->setDeveloper('ea');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('NBA');
$game1->setConsole('pc');
$game1->setkategoriGame('sport');
$game1->setisOnline(true);
$game1->setDeveloper('ea');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('far cry');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('far cry 2');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('far cry 3');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('far cry 4');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('far cry 5');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 2');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Mobile legend');
$game1->setConsole('Handphone');
$game1->setkategoriGame('Moba');
$game1->setisOnline(true);
$game1->setDeveloper('moonton');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 3');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 4');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed black flag');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 4');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed ww');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 32');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 432e');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed e4');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed e');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed black');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed white');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed red');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed sus');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed wars');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();

$game1 = new Game;
$game1->setnameGame('Assasin creed 23sw');
$game1->setConsole('pc');
$game1->setkategoriGame('fps');
$game1->setisOnline(false);
$game1->setDeveloper('ubisoft');
$game1->infoGame();