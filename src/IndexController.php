<?php 

class IndexController {
    public function searchInMultidimensionalArray(array $array, $search_value, $search_field){
        return array_search($search_value, array_column($array, $search_field));
    }
}