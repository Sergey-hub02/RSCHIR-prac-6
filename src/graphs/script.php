<?php

require_once __DIR__ . "/models/Fixture.php";
require_once __DIR__ . "/script.php";
require_once __DIR__ . "/../vendor/autoload.php";

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

function generateString(int $length): string {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $charsLength = mb_strlen($chars);

  $string = "";
  for ($i = 0; $i < $length; ++$i) {
    $index = mt_rand(0, $charsLength - 1);
    $string .= $chars[$index];
  }

  return $string;
}


function generateFixtures(int $limit): array {
  $fixtures = [];

  for ($i = 0; $i < $limit; ++$i) {
    $id = mt_rand(1, 100);
    $firstName = generateString(8);
    $lastName = generateString(5);
    $firstValue = mt_rand(1, 80);
    $lastValue = mt_rand(0, 1);

    $fixture = new Fixture(
      $id,
      $firstName,
      $lastName,
      $firstValue,
      $lastValue
    );

    $fixtures[] = $fixture;
  }

  return $fixtures;
}


function createWatermark(): Plot\IconPlot {
  $icon = new Plot\IconPlot(__DIR__ . "/../uploads/hello.png", 950, 540);
  $icon->SetAnchor("center", "center");
  return $icon;
}


function drawLineGraph(array $fixtures, string $title): void {
  $values = array_map(function (Fixture $fixture) {
    return $fixture->getLastValue();
  }, $fixtures);

  $graph = new Graph\Graph(1900, 1080);
  $graph->ClearTheme();
  $graph->SetScale("textlin");

  $graph->title->Set($title);
  $graph->SetBox(true);

  $plot = new Plot\LinePlot($values);
  $plot->SetColor("green");

  $graph->Add($plot);
  $graph->Add(createWatermark());
  $graph->Stroke();
}


function drawBarGraph(array $fixtures, string $title): void {
  $values = array_map(function (Fixture $fixture) {
    return $fixture->getId();
  }, $fixtures);

  $graph = new Graph\Graph(1900, 1080);
  $graph->ClearTheme();
  $graph->SetScale("textlin");

  $graph->title->Set($title);
  $graph->SetBox(true);

  $plot = new Plot\BarPlot($values);
  $plot->SetColor("green");

  $graph->Add($plot);
  $graph->Add(createWatermark());
  $graph->Stroke();
}


function drawAccumulatedBarChart(array $fixtures, string $title): void {
  $values1 = array_map(function (Fixture $el) {
    return $el->getFirstValue();
  }, $fixtures);

  $values2 = array_map(function (Fixture $el) {
    return $el->getId();
  }, $fixtures);

  $graph = new Graph\Graph(1900, 1080);
  $graph->ClearTheme();
  $graph->SetScale("textlin");

  $graph->title->Set($title);
  $graph->SetBox(true);

  $plot1 = new Plot\BarPlot($values1);
  $plot2 = new Plot\BarPlot($values2);

  $plot1->SetFillColor("darkred");
  $plot2->SetFillColor("darkgreen");

  $accPlot = new Plot\AccBarPlot([$plot1, $plot2]);

  $graph->Add($accPlot);
  $graph->Add(createWatermark());
  $graph->Stroke();
}
