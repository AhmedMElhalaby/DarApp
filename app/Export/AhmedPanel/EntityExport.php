<?php

namespace App\Export\AhmedPanel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EntityExport implements WithMapping,WithHeadings,FromCollection
{
    protected $crud;
    protected $Objects;

    /**
     * TargetsExport constructor.
     * @param $crud
     * @param $Objects
     */
    public function __construct($crud,$Objects)
    {
        $this->crud = $crud;
        $this->Objects = $Objects;
    }

    /**
     * @param mixed $object
     * @return array
     */
    public function map($object): array
    {
        $arr['id'] = $object->id;
        foreach ($this->crud->getFields() as $field){
            $export = true;
            if(isset($field['export']) && $field['export'] == false) $export = false;
            if ($export){
                $arr[$field['name']] = $object->{$field['name']};
            }
        }
        return $arr;
    }

    /**
     */
    public function collection()
    {
        return $this->Objects;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $heading = array();
        array_push($heading,'#');
        foreach ($this->crud->getFields() as $field){
            $export = true;
            if(isset($field['export']) && $field['export'] == false) $export = false;
            if ($export){
                array_push($heading,__('crud.'.$this->crud->getLang().'.'.$field['name']));
            }
        }
        return $heading;
    }
}
