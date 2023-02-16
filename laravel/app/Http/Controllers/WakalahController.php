<?php

namespace App\Http\Controllers;

use App\Models\Majelis;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Wakalah;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PDF;

class WakalahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wakalah =Wakalah::where('status','OnProses')->get();
        $petugas =Petugas::where('status','!=','non aktif')->get();
        $majelis=Majelis::all();
        // return $wakalah;
        return view('wakalah.index',['title'=>'Wakalah'],compact('wakalah','petugas','majelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas =Petugas::where('status','!=','non aktif')->get();
        $majelis=Majelis::all();
        return view('wakalah.create',['title'=>'Create Wakalah'],compact('petugas','majelis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trxDate=$request->trx_date;
        $namaAnggota=$request->nama_anggota;
        $majelis=$request->majelis;
        $petugas=$request->petugas;
        $nominal=$request->nominal;
        for($i=0; $i<count($petugas);$i++){
            $data =[
                'petugas'=>$petugas[$i],
                'nama_anggota'=>$namaAnggota[$i],
                'majelis'=>$majelis[$i],
                'nominal'=>str_replace('.','',$nominal[$i]),
                'status'=>'OnProses',
                'trx_wkl'=>$trxDate
            ];
            Wakalah::create($data);
        }
        return back()->with('success','Wakalah hasbeen successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wakalah=Wakalah::findOrFail($id);
        $wakalah->nama_anggota=$request->nama;
        $wakalah->majelis=$request->majelis;
        $wakalah->petugas=$request->petugas;
        $wakalah->nominal=str_replace('.','',$request->nominal);
        $wakalah->save();
        return redirect()->route('wakalah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saldo_wakalah(Request $request){
        $dari =$request->dari;
        $sampai=$request->sampai;
        $status=$request->status;
        $wakalah =Wakalah::select(DB::raw('petugas, sum(nominal) as total'))
        ->whereBetween('trx_wkl',[$dari,$sampai])
        ->where('status',$status)
        ->groupBy('petugas')
        ->get();
        return view('wakalah.saldo',['title'=>'Saldo Wakalah'],compact('wakalah'));
    }

    public function status($status,$id){
        $wakalah=Wakalah::findOrFail($id);
        $wakalah->status=$status;
        if ($status =='Approve') {
            $wakalah->trx_mba=now();
        }
        $wakalah->save();
        return back();
    }


    public function edit_wkl($id){
        $wakalah =Wakalah::findOrFail($id);
        $petugas=Petugas::all();
        $majelis=Majelis::all();
        
        return view('wakalah.edit',['title'=>'Edit Wakalah'],compact('wakalah','petugas','majelis'));
    }

    public function saldo(Request $request){
        $dari =$request->dari;
        $sampai=$request->sampai;
        $saldo =Wakalah::whereBetween('trx_wkl',[$dari,$sampai])->where('status','OnProses')->groupBy('petugas')->get();
        return response()->json($saldo);
    }

    public function show_wakalah(){
        return view('wakalah.load');
    }

    public function cetak_pdf($dari,$sampai,$status){
        $wakalah =Wakalah::select(DB::raw('petugas, sum(nominal) as total'))
        ->whereBetween('trx_wkl',[$dari,$sampai])
        ->where('status',$status)
        ->groupBy('petugas')
        ->get();
        $pdf = PDF::loadView('wakalah.cetak_pdf',compact('wakalah'));
        return $pdf->stream('wakalah.pdf');
    }

    public function cetak_xlsx($dari,$sampai,$status){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Saldo Wakalah Petugas');

        $wakalah =Wakalah::select(DB::raw('petugas, sum(nominal) as total'))
        ->whereBetween('trx_wkl',[$dari,$sampai])
        ->where('status',$status)
        ->groupBy('petugas')
        ->get();
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $sheet->setCellValue('A3', 'Petugas');
        $sheet->setCellValue('B3', 'Nominal');
        $sheet->getStyle('A3:B3')->applyFromArray($styleArray);
        
        $row = 4;
        foreach ($wakalah as $item) {
        $sheet->setCellValue('A'.$row, $item->petugas);
        $sheet->setCellValue('B'.$row, $item->total);
        $sheet->getStyle('A'.$row.':B'.$row)->applyFromArray($styleArray);
        $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Wakalah-' . $dari .' s/d '.$sampai . '.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'"'); 
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function list_saldo_wakalah(Request $request){
        $dari =$request->dari;
        $sampai=$request->sampai;
        $status=$request->status;
        $wakalah =Wakalah::whereBetween('trx_wkl',[$dari,$sampai])->where('status',$status)->get();
        return view('wakalah.list_saldo_wakalah',['title'=>'List Saldo Wakalah'],compact('wakalah'));
    }

    public function list_saldo_pdf($dari,$sampai,$status){
        $wakalah =Wakalah::whereBetween('trx_wkl',[$dari,$sampai])->where('status',$status)->get();
        $pdf = PDF::loadView('wakalah.list_saldo_pdf',compact('wakalah','sampai'));
        return $pdf->stream('wakalah.pdf');
    }

    public function list_saldo_xlsx($dari,$sampai,$status){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Saldo Wakalah');

        // Set data
        $sheet->setCellValue('A1', 'Saldo Wakalah Cabang Mannonjaya');
        $sheet->mergeCells('A1:C1');
        $wakalah =Wakalah::whereBetween('trx_wkl',[$dari,$sampai])->where('status',$status)->get();
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $sheet->setCellValue('A4', 'Tanggal Wakalah');
        $sheet->setCellValue('B4', 'Petugas');
        $sheet->setCellValue('C4', 'Nama Anggota');
        $sheet->setCellValue('D4', 'Majelis');
        $sheet->setCellValue('E4', 'Nominal');
        $sheet->getStyle('A4:E4')->applyFromArray($styleArray);
        
        $row = 5;
        foreach ($wakalah as $item) {
        $sheet->setCellValue('A'.$row, date('d/m/Y',strtotime($item->trx_wkl)));
        $sheet->setCellValue('B'.$row, $item->petugas);
        $sheet->setCellValue('C'.$row, $item->nama_anggota);
        $sheet->setCellValue('D'.$row, $item->majelis);
        $sheet->setCellValue('E'.$row, $item->nominal);
        $sheet->getStyle('A'.$row.':E'.$row)->applyFromArray($styleArray);
        $row++;
        }
        $sheet->setCellValue('E' . $row, '=SUM(E5:E' . ($row - 1) . ')');
        $writer = new Xlsx($spreadsheet);
        $filename = 'List saldo wakalah-'. $sampai . '.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'"'); 
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
