<?php

namespace App\Libraries;

use ReflectionClass;

trait DataTableHelper
{

    private $search = [];


    public function searchArrayInDT(array $searches = null){
        if (is_array($searches) && count($searches)){
            foreach ($searches as $search) {
                $this->searchInDT($search);
            }
        }
        return $this;
    }


    public function searchInDT($search = null)
    {

        if (!is_null($search)) {
            $this->search[] = $search;
            $qbWhere = $this->accessProtected($this->builder(), 'QBWhere');
            if (($searchableFieldsCount = count($this->searchableFields))) {
                $i = 0;
                if (!count($qbWhere)) {
                    $this->builder()->like($this->searchableFields[$i++], $search);
                }
                for (; $i < $searchableFieldsCount;) {
                    $this->builder()->orLike($this->searchableFields[$i++], $search);
                }
            }
            $qbJoin = $this->accessProtected($this->builder(), 'QBJoin');
            if (property_exists($this, 'searchableJoinedFields') && count($this->searchableJoinedFields) && count($qbJoin)) {
                $keys = array_keys($this->searchableJoinedFields);
                foreach ($qbJoin as $join) {
                    foreach ($keys as $key) {
                        if (strpos($join, $key) !== false) {
                            for ($i = 0; $i < count($this->searchableJoinedFields[$key]); $i++) {
                                if ($i === 0 && !count($this->searchableFields)) {
                                    $this->builder()->like($key.'.'.$this->searchableJoinedFields[$key][$i], $search);
                                } else {
                                    $this->builder()->orLike($key.'.'.$this->searchableJoinedFields[$key][$i], $search);
                                }
                            }
                        }
                    }
                }
            }
        }
        return $this;
    }



    function accessProtected($obj, $prop) {
        $reflection = new ReflectionClass($obj);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        return $property->getValue($obj);
    }

    public function getDTData($draw){
        $clone = clone $this->builder();
        $count = $clone->countAllResults();
        $data =  $this->builder()->get()->getResult();

        $DTData = ['data' => $data];
        $DTData['recordsTotal'] = $count;
        $DTData['recordsFiltered'] = $count;
        $DTData['draw'] = intval($draw);

        return $DTData;
    }

    public function sortDataTable($order = null, $dir = null)
    {
        if ($order == null )
            $order = 1;
        if ($dir == null) {
            $dir = '';
        }

        $order = intval($order) + 1;

        return $this->orderBy($order, $dir);

    }



}