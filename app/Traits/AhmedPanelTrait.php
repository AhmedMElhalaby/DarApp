<?php

namespace App\Traits;

use App\Http\Requests\AhmedPanel\ActivationRequest;
use App\Http\Requests\AhmedPanel\DestroyRequest;
use App\Http\Requests\AhmedPanel\ExportRequest;
use App\Http\Requests\AhmedPanel\SearchRequest;
use App\Http\Requests\AhmedPanel\StoreRequest;
use App\Http\Requests\AhmedPanel\UpdatePasswordRequest;
use App\Http\Requests\AhmedPanel\UpdateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

trait AhmedPanelTrait
{
    protected $view_index = 'AhmedPanel.crud.index';
    protected $view_show = 'AhmedPanel.crud.show';
    protected $view_create = 'AhmedPanel.crud.create';
    protected $view_edit = 'AhmedPanel.crud.edit';
    protected $view_export = 'AhmedPanel.crud.export';
    protected $redirect = '/';
    protected $lang;
    protected $entity;
    protected $table;
    protected $Columns = array();
    protected $Column;
    protected $Fields = array();
    protected $Field;
    protected $Links = array();
    protected $Link;
    protected $Filters = array();
    protected $Filter;
    protected $export = true;
    protected $create = true;

    /**
     * AhmedPanelTrait constructor.
     */
    public function __construct()
    {
        $this->setup();
        parent::__construct();
    }


    public function setup(){

    }



    public function wrongData()
    {
        return redirect($this->getRedirect())->withErrors(__('admin.messages.wrong_data'));
    }

    /**
     * @return array
     */
    public function getParams(){
        return [
            'redirect'=>$this->getRedirect(),
            'Columns'=>$this->getColumns(),
            'Fields'=>$this->getFields(),
            'lang'=>$this->getLang(),
            'Links'=>$this->getLinks(),
            'export'=>$this->isExport(),
            'create'=>$this->isCreate(),
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Factory|View
     */
    public function index(SearchRequest $request)
    {
        return $request->preset($this);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view($this->getViewCreate())->with($this->getParams());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @return RedirectResponse|Redirector
     */
    public function store(StoreRequest $request)
    {
        $validator = Validator::make($request->all(),$this->FieldsRules());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $validator = Validator::make($request->all(),$this->FieldsRules(true,$id));
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this,$id);
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function show($id)
    {
        $Object =$this->getEntity()->find($id);
        if(!$Object)
            return $this->wrongData();
        return view($this->getViewShow(),compact('Object'))->with($this->getParams());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function edit($id)
    {
        $Object =$this->getEntity()->find($id);
        if(!$Object)
            return $this->wrongData();
        return view($this->getViewEdit(),compact('Object'))->with($this->getParams());
    }

    /**
     * @param ActivationRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function activation(ActivationRequest $request, $id)
    {
        return  $request->preset($this,$id);
    }

    /**
     * Update the Password resource in storage.
     *
     * @param UpdatePasswordRequest $request
     * @return RedirectResponse|Redirector
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|max:255|confirmed|min:6',
            'id' => 'required|exists:'.$this->getTable().',id',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequest $request
     * @return RedirectResponse|Redirector
     */
    public function destroy(DestroyRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:'.$this->getTable().',id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this);
    }

    /**
     * Export resource in storage.
     *
     * @param ExportRequest $request
     * @return Factory|RedirectResponse|View|BinaryFileResponse
     */
    public function export(ExportRequest $request)
    {
        return  $request->preset($this->view_export,$this);
    }

    /**
     * @param $column
     * @param $object
     * @return Factory|View
     */
    public static function Columns($column, $object){
        switch ($column['type']){
            case 'file':
                return view('AhmedPanel.base.columns.file',compact('column','object'));
                break;
            case 'select':
                return view('AhmedPanel.base.columns.select',compact('column','object'));
                break;
            case 'datetime':
                return view('AhmedPanel.base.columns.datetime',compact('column','object'));
                break;
            case 'relation':
                return view('AhmedPanel.base.columns.relation',compact('column','object'));
                break;
            case 'custom_relation':
                return view('AhmedPanel.base.columns.custom_relation',compact('column','object'));
                break;
            case 'active':
                return view('AhmedPanel.base.columns.active',compact('column','object'));
                break;
            case 'email':
                return view('AhmedPanel.base.columns.email',compact('column','object'));
                break;
            case 'text-custom':
                return view('AhmedPanel.base.columns.text-custom',compact('column','object'));
                break;
            case 'image':
                return view('AhmedPanel.base.columns.image',compact('column','object'));
                break;
            case 'text':
            default :
                return view('AhmedPanel.base.columns.default',compact('column','object'));
                break;
        }
    }

    /**
     * @param $link
     * @param $object
     * @param $redirect
     * @return string
     */
    public static function Links($link, $object, $redirect){
        switch($link){
            case 'show' :
                return view('AhmedPanel.base.links.show',compact('link','object','redirect'));
                break;
            case 'edit' :
                return view('AhmedPanel.base.links.edit',compact('link','object','redirect'));
                break;
            case 'active' :
                return view('AhmedPanel.base.links.active',compact('link','object','redirect'));
                break;
            case 'change_password' :
                return view('AhmedPanel.base.links.change_password',compact('link','object','redirect'));
                break;
            case 'timeline' :
                return view('AhmedPanel.base.links.timeline',compact('link','object','redirect'));
                break;
            case 'finish' :
                return view('AhmedPanel.base.links.finish',compact('link','object','redirect'));
                break;
            case 'delete' :
                return view('AhmedPanel.base.links.delete',compact('link','object','redirect'));
                break;
            default :{
                if(is_array($link)){
                    return view('AhmedPanel.base.links.custom',compact('link','object','redirect'));
                }
                return '';
                break;
            }
        }
    }

    /**
     * @param $Columns
     * @return array
     */
    public static function SearchAppends($Columns){
        $array = [
            'order_by' => request()->order_by,
            'order_type' => request()->order_type,
        ];
        foreach($Columns as $Column)
            if($Column['is_searchable']){
                $array[$Column['name']] = request($Column['name']);
            }
        return $array;
    }

    /**
     * @param $Column
     * @param $lang
     * @return Factory|View|string
     */
    public static function SearchColumns($Column,$lang){
        if($Column['is_searchable'])
            switch ($Column['type']){
                case 'select':
                    return view('AhmedPanel.base.search.select',compact('Column','lang'));
                    break;
                case 'active':
                    return view('AhmedPanel.base.search.active',compact('Column','lang'));
                    break;
                case 'relation':
                    return view('AhmedPanel.base.search.relation',compact('Column','lang'));
                    break;
                case 'custom_relation':
                    return view('AhmedPanel.base.search.custom_relation',compact('Column','lang'));
                    break;
                case 'datetime':
                    return view('AhmedPanel.base.search.datetime',compact('Column','lang'));
                    break;
                case 'text-custom':
                case 'text':
                case 'email':
                    return view('AhmedPanel.base.search.default',compact('Column','lang'));
                    break;
                default :
                    return '';
            }
        else
            return '';
    }

    /**
     * @param $Field
     * @param $value
     * @return Factory|View
     */
    public static function Fields($Field, $value,$lang){
        switch ($Field['type']){
            case 'select':
                return view('AhmedPanel.base.fields.select',compact('Field','value','lang'));
                break;
            case 'relation':
                return view('AhmedPanel.base.fields.relation',compact('Field','value','lang'));
                break;
            case 'custom_relation':
                return view('AhmedPanel.base.fields.custom_relation',compact('Field','value','lang'));
                break;
            case 'active':
                return view('AhmedPanel.base.fields.active',compact('Field','value','lang'));
                break;
            case 'datetime':
                return view('AhmedPanel.base.fields.datetime',compact('Field','value','lang'));
                break;
            case 'multi_checkbox':
                return view('AhmedPanel.base.fields.multi_checkbox',compact('Field','value','lang'));
                break;
            case 'textarea':
                return view('AhmedPanel.base.fields.textarea',compact('Field','value','lang'));
                break;
            case 'image':
                return view('AhmedPanel.base.fields.image',compact('Field','value','lang'));
                break;
            case 'images':
                return view('AhmedPanel.base.fields.images',compact('Field','value','lang'));
                break;
            case 'email':
                return view('AhmedPanel.base.fields.email',compact('Field','value','lang'));
                break;
            case 'added_by':
                return view('AhmedPanel.base.fields.added_by',compact('Field','value','lang'));
                break;
            case 'password':
                return view('AhmedPanel.base.fields.password',compact('Field','value','lang'));
                break;
            case 'text':
            default :
                return view('AhmedPanel.base.fields.text',compact('Field','value','lang'));
                break;
        }
    }

    /**
     * @param bool $update
     * @param null $ref_id
     * @return array
     */
    public function FieldsRules($update = false,$ref_id = null){
        $rules =[];
        foreach ($this->getFields() as $field) {
            $text = '';
            if($update && isset($field['editable']) && $field['editable'] == false)
                continue;
            if ($field['is_required'])
                if($update && isset($field['is_required_update']) && ($field['is_required_update']== false))
                    $text .= 'sometimes';
                else
                    $text .= 'required';
            else
                $text .= 'sometimes';

            if ($field['type'] == 'text')
                $text .= '|string|max:255';

            if ($field['type'] == 'email')
                $text .= '|email|max:255';

            if ($field['type'] == 'password')
                $text .= '|max:255' . ($field['confirmation']) ? '|confirmed' : '';

            if (isset($field['is_unique'])&&$field['is_unique']){
                if($update)
                    $text .= '|unique:' . $this->getTable().','. $field['name'].','.$ref_id;
                else
                    $text .= '|unique:' . $this->getTable();
            }
            $rules[$field['name']] =$text;
        }
        return $rules;
    }



    /**
     * @return string
     */
    public function getViewIndex(): string
    {
        return $this->view_index;
    }

    /**
     * @param string $view_index
     */
    public function setViewIndex(string $view_index): void
    {
        $this->view_index = $view_index;
    }

    /**
     * @return string
     */
    public function getViewShow(): string
    {
        return $this->view_show;
    }

    /**
     * @param string $view_show
     */
    public function setViewShow(string $view_show): void
    {
        $this->view_show = $view_show;
    }

    /**
     * @return string
     */
    public function getViewCreate(): string
    {
        return $this->view_create;
    }

    /**
     * @param string $view_create
     */
    public function setViewCreate(string $view_create): void
    {
        $this->view_create = $view_create;
    }

    /**
     * @return string
     */
    public function getViewEdit(): string
    {
        return $this->view_edit;
    }

    /**
     * @param string $view_edit
     */
    public function setViewEdit(string $view_edit): void
    {
        $this->view_edit = $view_edit;
    }

    /**
     * @return string
     */
    public function getViewExport(): string
    {
        return $this->view_export;
    }

    /**
     * @param string $view_export
     */
    public function setViewExport(string $view_export): void
    {
        $this->view_export = $view_export;
    }

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param mixed $redirect
     */
    public function setRedirect($redirect): void
    {
        $this->redirect = $redirect;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param mixed $entity
     */
    public function setEntity($entity): void
    {
        $this->entity = $entity;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->Columns;
    }

    /**
     * @param array $Columns
     */
    public function setColumns(array $Columns): void
    {
        $this->Columns = $Columns;
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->Column;
    }

    /**
     * @param mixed $Column
     */
    public function setColumn($Column): void
    {
        $this->Column = $Column;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->Fields;
    }

    /**
     * @param array $Fields
     */
    public function setFields(array $Fields): void
    {
        $this->Fields = $Fields;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->Field;
    }

    /**
     * @param mixed $Field
     */
    public function setField($Field): void
    {
        $this->Field = $Field;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->Links;
    }

    /**
     * @param array $Links
     */
    public function setLinks(array $Links): void
    {
        $this->Links = $Links;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->Link;
    }

    /**
     * @param mixed $Link
     */
    public function setLink($Link): void
    {
        $this->Link = $Link;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table): void
    {
        $this->table = $table;
    }

    /**
     * @return bool
     */
    public function isExport(): bool
    {
        return $this->export;
    }

    /**
     * @param bool $export
     */
    public function setExport(bool $export): void
    {
        $this->export = $export;
    }

    /**
     * @return bool
     */
    public function isCreate(): bool
    {
        return $this->create;
    }

    /**
     * @param bool $create
     */
    public function setCreate(bool $create): void
    {
        $this->create = $create;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->Filters;
    }

    /**
     * @param array $Filters
     */
    public function setFilters(array $Filters): void
    {
        $this->Filters = $Filters;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->Filter;
    }

    /**
     * @param mixed $Filter
     */
    public function setFilter($Filter): void
    {
        $this->Filter = $Filter;
    }

}
