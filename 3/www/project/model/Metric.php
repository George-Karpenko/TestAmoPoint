<?php

namespace Project\Model;

use Core\Model;

class Metric extends Model
{
    function chart()
    {
        $metrics = (new Model)->query("SELECT
        HOUR(`datetime`) AS 'hour',
			COUNT(DISTINCT ip) AS 'number_of_times'
		FROM `metrics`
		WHERE datetime >=(DATE_SUB(now(), INTERVAL 24 HOUR))
		GROUP BY HOUR(`datetime`);");

        return $this->chart_from_metrica($metrics, ['hour', 'number_of_times']);
    }
    function pie_chart()
    {
        $metrics = $this->query("SELECT
		city,
			COUNT(DISTINCT ip) AS 'count_users'
		FROM `metrics`
		GROUP BY city;");

        return $this->chart_from_metrica($metrics, ['city', 'count_users']);
    }

    private function chart_from_metrica($metrics, $rows_name)
    {

        $chart = [];
        foreach ($rows_name as $value) {
            $chart[$value] = [];
        }
        $chart['city'] = [];
        $chart['count_users'] = [];
        while ($data = $metrics->fetch_assoc()) {
            foreach ($rows_name as $value) {
                $chart[$value][] = '\'' . $data[$value] . '\'';
            }
        }
        foreach ($rows_name as $value) {
            $chart[$value] = implode(',', $chart[$value]);
        }
        return $chart;
    }
}
