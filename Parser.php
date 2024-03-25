<?php

require "./vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

class Parser
{
    public object $data;

    /**
     * Конструктор класса требует файл для дальнейшей работы
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $reader = IOFactory::createReader('Xls');
        $this->data = $reader->load($fileName)->getActiveSheet();
    }

    /**
     * Функция для получения сводки Заключенных и Исполненных закупок
     * @return array Массив с данными
     */
    public function getDataBdr()
    {
        $finallyData = [];
        $cells = ['e5','e6','e7','e8','e11','e12','e13','e14'];
//        $cells = [
//            "c4" => [
//                'd5' => 'e5',
//                'd6' => 'e6',
//                'd7' => 'e7',
//                'd8' => 'e8',
//            ],
//            "c10" => [
//                'd11' => 'e11',
//                'd12' => 'e12',
//                'd13' => 'e13',
//                'd14' => 'e14',
//            ]
//        ];

        //Шаблон получения данных по ячейкам ecxel таблицы
//        foreach ($cells as $key => $values) {
//            $title = $this->data->getCell($key)->getFormattedValue();
//            foreach ($values as $value) $finallyData[$title][] = $this->data->getCell($value)->getFormattedValue();
//        }
        foreach ($cells as $value) {
            $finallyData[] = (int)$this->data->getCell($value)->getFormattedValue();
        }
        return $finallyData;
    }

    public function getDataIp()
    {
        $finallyData = [];
        $cells = ['k5','k6','k7','k8','k11','k12','k13','k14'];
//
        foreach ($cells as $value) {
            $finallyData[] = (int)$this->data->getCell($value)->getFormattedValue();
        }
        return $finallyData;
    }




    /**
     * Функция для получения статистики за период (Дополни при необходимости)
     * @return array Массив со статистикой
     */
    public function getInfo()
    {
        $statistics = [];
        $data = $this->data->toArray();
        for ($i = 17; $i <= count($data); $i++) {
            $nullCount = 0;
            if (is_array($data[$i]) || is_object($data[$i])) {
                foreach ($data[$i] as $item) {
                    if (empty($item)) $nullCount++;
                    else break;
                }
                if ($nullCount === 6) $nullCount = 0;
                else $statistics[] = $data[$i];
            }
        }
        // Дополнить (если нужно) тут
        return $statistics;
    }
}