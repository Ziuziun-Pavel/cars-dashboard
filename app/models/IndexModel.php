<?php

namespace app\models;
use app\core\Model;
use PDO;

class IndexModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAvaragePriceOfAllCars()
    {
        $sql = "SELECT AVG(price) FROM showroom_cars";

        $model = new Model();
        $stmt = $model->dbconnect->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $row['AVG(price)'];
        return $result;
    }

    public function getAvaragePriceOfTodayCars($date)
    {
        $sql = "SELECT AVG(price) FROM showroom_cars WHERE date_of_sale = :date";

        $model = new Model();
        $stmt = $model->dbconnect->prepare($sql);
        $stmt->bindValue(':date', $date,PDO::PARAM_STR);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $result = $row['AVG(price)'];

        return $result;
    }

    public function getSoldCars($date)
        {
            $sql = "SELECT showroom_cars.date_of_sale, count(showroom_cars.id) as count 
                        FROM showroom_cars 
                            WHERE YEAR(date_of_sale) = YEAR(:date) - 1 
                                GROUP BY date_of_sale
                                    ORDER BY date_of_sale";

            $model = new Model();
            $stmt = $model->dbconnect->prepare($sql);
            $stmt->bindValue(':date', $date,PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $rows;
            return $result;
    }

    public function getUnsoldCars()
    {
        $sql = "SELECT showroom_cars.color, showroom_cars.price, vehicle_directory.model, vehicle_directory.year_of_production
                    FROM showroom_cars 
                        LEFT JOIN vehicle_directory 
                            ON showroom_cars.vihicle_id = vehicle_directory.id
                                WHERE showroom_cars.sold = 0
                                        ORDER BY vehicle_directory.year_of_production DESC, showroom_cars.price";

        $model = new Model();
        $stmt = $model->dbconnect->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = $rows;
        return $result;
    }
}