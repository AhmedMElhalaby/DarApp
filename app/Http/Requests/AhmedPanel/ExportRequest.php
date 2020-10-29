<?php

namespace App\Http\Requests\AhmedPanel;

use App\Export\AhmedPanel\EntityExport;
use Illuminate\Foundation\Http\FormRequest;
use Maatwebsite\Excel\Facades\Excel;
//use Mpdf\Mpdf;
//use Mpdf\MpdfException;

class ExportRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            't' => 'required|in:print,xls',
        ];
    }
    public function preset($view,$crud){
        $Objects   = $crud->getEntity()->get();
        $ext = $this->t;
        if ($ext == 'print')
            return view($view, compact('Objects'))->with($crud->getParams());
//        elseif ($ext == 'pdf'){
//            $html = view($view, compact('Objects'))->with($crud->getParams())->render();
//            try {
//                $mpdf = new Mpdf([
//                    'default_font' => 'frutiger',
//                    'tempDir' => __DIR__ . '/tmp',
//                    // 'orientation' => 'A4'
//                ]);
//                $mpdf->SetProtection(array('print'));
//                $mpdf->SetTitle(__('crud.'.$crud->getLang().'.names'));
//                $mpdf->autoScriptToLang = true;
//                $mpdf->baseScript = 1;
//                $mpdf->autoVietnamese = true;
//                $mpdf->autoArabic = true;
//                $mpdf->autoLangToFont = true;
//                $mpdf->showImageErrors = true;
//                $mpdf->SetDirectionality('rtl');
//                $mpdf->SetDisplayMode('fullpage');
//                $mpdf->WriteHTML($html);
//                $mpdf->Output($crud->getLang().'-'.now(). '.pdf', 'D');
//            } catch (MpdfException $e) {
//                return redirect()->back()->with('error','Error : '.$e->getMessage());
//            }
//        }
        elseif($ext == 'xls')
            if(count($Objects) > 0)
                return Excel::download(new EntityExport($crud,$Objects),$crud->getLang().'-'.now().'.xlsx');
        return $crud->wrongData();
    }
}
