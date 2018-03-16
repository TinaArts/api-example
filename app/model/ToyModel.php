<?php

namespace app\model;

class ToyModel
{
    /**
     * @var array
     */
    private $toys = [
        [
            'id' => 1,
            'title' => 'bear',
            'price' => 9.99,
            'color' => 'brown'
        ],
        [
            'id' => 2,
            'title' => 'rabbit',
            'price' => 5.99,
            'color' => 'grey'
        ],
        [
            'id' => 3,
            'title' => 'fox',
            'price' => 7.55,
            'color' => 'white'
        ],
        [
            'id' => 4,
            'title' => 'wolf',
            'price' => 10.35,
            'color' => 'black'
        ]
    ];


    /**
     * @return array
     */
    public function getAll()
    {
        return $this->toys;
    }

    /**
     * @param int $id
     * @return mixed|null
     */
    public function getOne(int $id)
    {
        $id--;
        return isset($this->toys[$id]) ? $this->toys[$id] : null;
    }
}