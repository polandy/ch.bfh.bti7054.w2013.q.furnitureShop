<?php

class CategoryService {

    /**
     * @return array with all categories
     */
    public static function getAllCategories() {
        $file = file(__DIR__."/category.txt");
        $category = array();
        foreach($file as $line)
            $category[] = $line;
        return $category;
    }
}