<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class NhanvienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $faker    = Faker\Factory::create('vi_VN');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $nEmployee = 10;
        $minFemales = 3;
        $maxFemales = 6;
        $nFemales   = VnBase::RandomNumber($minFemales, $maxFemales);
        $nMales     = $nEmployee - $nFemales;
        $females    = $uFN->FullNames(VnBase::VnFemale, $nFemales);
        $males      = $uFN->FullNames(VnBase::VnMale,   $nMales);
        $employees  = [];
        $m = 0;
        $f = 0;
        while ($m <= $nMales-1 || $f <= $nFemales-1) {
            if ($m == $nMales) {          //Đã chọn hết nam
                array_push($employees, ["gender"=>VnBase::VnFemale, "name"=>$females[$f]]);
                $f++;
            } else if ($f == $nFemales) { //Đã chọn hết nữ
                array_push($employees, ["gender"=>VnBase::VnMale,   "name"=>$males[$m]]);
                $m++;
            } else {
                if (VnBase::RandomNumber(0, 1000) < 550) {
                    array_push($employees, ["gender"=>VnBase::VnMale,   "name"=>$males[$m]]);
                    $m++;
                } else {
                    array_push($employees, ["gender"=>VnBase::VnFemale, "name"=>$females[$f]]);
                    $f++;
                }
            }
        }
        for ($i=1; $i <= $nEmployee; $i++) {
            $xs   = VnBase::RandomNumber(0, 1000);
            if ($xs > 100) {
                $step = "P";
                if ($xs < 400) {
                    $step .= "T";
                    $xs = VnBase::RandomNumber(0, 1000);
                    if ($xs < 400) {
                        $step .= VnBase::RandomNumber(1000, 10800);
                    } else if ($xs < 700) {
                        $step .= VnBase::RandomNumber(10801, 21600);
                    } else if ($xs < 900) {
                        $step .= VnBase::RandomNumber(21601, 43200);
                    } else {
                        $step .= VnBase::RandomNumber(43201, 86400);                    
                    }
                    $step .= "S";
                } else {
                    $xs = VnBase::RandomNumber(0, 1000);
                    if ($xs < 500) {
                        $step .= VnBase::RandomNumber(1, 5);
                    } else if ($xs < 800) {
                        $step .= VnBase::RandomNumber(6, 15);
                    } else {
                        $step .= VnBase::RandomNumber(16, 25);                    
                    }
                    $step .= "D";
                }
                $nextTime = new DateInterval($step);
                $today->add($nextTime);
            }
            $gender   = $employees[$i - 1]["gender"];
            $name     = $employees[$i - 1]["name"];
            $age      = $uPI->Age(20);
            $birthYear= $uPI->BirthYearValue($age);
            $birthdate= $uPI->Birthdate($birthYear);
            $email    = $uPI->Email   ($name, $birthdate, "", "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
            $username = $uPI->Username($name, $birthdate,     "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
            $password = $faker->password;
            $phone    = $uPI->Mobile("", VnBase::VnFalse);
            $address  = $uPI->Address();
            array_push($list,[
                'nv_ma'             => $i,
                'nv_taikhoan'       => $username,
                'nv_matkhau'        => $password,
                'nv_hoten'          => $name,
                'nv_gioitinh'       => $gender == VnBase::VnMale,
                'nv_email'          => $email,
                'nv_ngaysinh'       => $birthdate["birthdate"],
                'nv_diachi'         => $address,
                'nv_dienthoai'      => $phone,
                'nv_taomoi'         => $today->format('Y-m-d H:i:s'),
                'nv_capnhat'        => $today->format('Y-m-d H:i:s'),
                'nv_trangthai'      => '2',
                'q_ma'              => $faker->numberBetween(1, 6)
            ]);
        }
        DB::table('cusc_nhan_vien')->insert($list);
    }
}
