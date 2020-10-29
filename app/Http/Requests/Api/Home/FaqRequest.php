<?php

namespace App\Http\Requests\Api\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\FaqResource;
use App\Models\Faq;
use App\Traits\ResponseTrait;

class FaqRequest extends ApiRequest
{
    use ResponseTrait;

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
        ];
    }

    public function persist()
    {
        $Faqs = new Faq();
        $Faqs = $Faqs->where('is_active',true);
        if($this->filled('q')){
            if(app()->getLocale() == 'ar'){
                $Faqs = $Faqs->where('question_ar','Like',"%{$this->q}%");
            }else{
                $Faqs = $Faqs->where('question','Like',"%{$this->q}%");
            }
        }
        $Faqs = $Faqs->get();
        return $this->successJsonResponse([],FaqResource::collection($Faqs),'Faqs');
    }
}
