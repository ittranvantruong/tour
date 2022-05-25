<?php

namespace App\Traits;

trait SortTour{

    public function sortCollect($option = 0, $tour){
        if($option == 2){
            $tour = $tour->sortBy('title');
        }elseif($option == 3){
            $tour = $tour->sortByDESC('title');
        }elseif($option == 4){
            $tour = $tour->sortBy('price');
        }elseif($option == 5){
            $tour = $tour->sortByDESC('price');
        }elseif($option == 6){
            $tour = $tour->sortBy('id');
        }elseif($option == 7){
            $tour = $tour->sortByDESC('id');
        }
        return $tour;
    }

    public function sortQuery($option = 0, $tour){
        if($option == 2){
            $tour = $tour->orderBy('title', 'ASC');
        }elseif($option == 3){
            $tour = $tour->orderBy('title', 'DESC');
        }elseif($option == 4){
            $tour = $tour->orderBy('price', 'ASC');
        }elseif($option == 5){
            $tour = $tour->orderBy('price', 'DESC');

        }elseif($option == 6){
            $tour = $tour->orderBy('id', 'ASC');
        }elseif($option == 7){
            $tour = $tour->orderBy('id', 'DESC');
        }
        return $tour;
    }
}