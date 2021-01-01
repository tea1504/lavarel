<?php

namespace App\Exports;

use App\Loai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Illuminate\Support\Facades\Storage;

class LoaiExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable, RegistersEventListeners;
    public function view(): View
    {
        return view('backend.loai.excel')
            ->with("dsloai", Loai::all());
    }

    /**
     * @return BaseDrawing|BaseDrawing[]
     */
    public function drawings()
    {
        $arrDrawings = [];

        // Hình logo
        $drawingLogo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawingLogo->setName('Logo');
        $drawingLogo->setDescription('Logo');
        $drawingLogo->setPath(public_path('storage/logo/logo.png'));
        $drawingLogo->setHeight(90);
        $drawingLogo->setCoordinates('C4');
        $offsetX = 325; //pixels
        $offsetY = 5; //pixels
        $drawingLogo->setOffsetX($offsetX); //pixels
        $drawingLogo->setOffsetY($offsetY); //pixels
        $arrDrawings[] = $drawingLogo;
        return $arrDrawings;
    }

    /* Event beforeExport
    */
    public static function beforeExport(BeforeExport $event)
    {
        //
    }

    /* Event beforeWriting
    */
    public static function beforeWriting(BeforeWriting $event)
    {
        //
    }

    /* Event beforeSheet
    */
    public static function beforeSheet(BeforeSheet $event)
    {
        //
    }

    /* Event afterSheet
    */
    public static function afterSheet(AfterSheet $event)
    {
        // Set khổ giấy in ngang
        $event->sheet->getDelegate()->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set dòng 4 (dùng chứ ảnh logo) có chiều cao 100
        $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(100);

        // Format dòng tiêu đề giới thiệ "Công ty"
        $event->sheet->getDelegate()->getStyle('A1:C5')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        // Format dòng tiêu đề "Danh sách sản phẩm"
        $event->sheet->getDelegate()->getStyle('A5:F5')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        // Format dòng tiêu đề "Tiêu đề cột"
        $event->sheet->getDelegate()->getStyle('A6:F6')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '00000000'],
                    ],
                ]
            ]
        );

        // Dòng bắt đầu xuất Excel danh sách sản phẩm
        $startRow = 7;

        // Lấy danh sách Sản Phẩm, set độ cao của dòng là 50
        $ds_loai = Loai::all();
        foreach ($ds_loai as $index => $l) {
            $currentRow = $startRow + $index;
            $event->sheet->getDelegate()->getRowDimension($currentRow)->setRowHeight(15);

            $coordinate = "A${currentRow}:F${currentRow}";
            $event->sheet->getDelegate()->getStyle($coordinate)->applyFromArray(
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ]
                ]
            );
            $event->sheet->getDelegate()->getStyle("C${currentRow}")->applyFromArray(
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]
                ]
            );
            if($l->l_trangthai==1){
                $event->sheet->getDelegate()->getStyle($coordinate)->applyFromArray(
                    [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['rgb' => 'CCCCCC']
                        ]
                    ]
                );
            }
        }
    }
}
