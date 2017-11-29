<?php

include_once("classes.php");

$doc = new DOMDocument();
$doc->load('SkierLogs.xml');
$xpath = new DOMXPath($doc);

// Load xml file
// $xml = simplexml_load_file("SkierLogs.xml");

function parseCities($xml) {
  $query = '//SkierLogs/Clubs/Club';
  global $xpath;

  $xml_city = $xpath->query($query);

  $holder = new City();

  foreach ($xml_city as $city) {
    $holder->parse($city);
  }
}

function parseClubs($xml) {
  $query = '//SkierLogs/Clubs/Club';
  global $xpath;

  $xml_clubs = $xpath->query($query);

  $holder = new Club();

  foreach ($xml_clubs as $club) {
    $holder->parse($club);
  }
}

function parseSeasons($xml) {
  $query = '//SkierLogs/Season';
  global $xpath;

  $xml_seasons = $xpath->query($query);

  $holder = new Season();

  foreach ($xml_seasons as $season) {
    $holder->parse($season);
  }
}

function parseSkiers($xml) {
  $query = '//SkierLogs/Skiers/Skier';
  global $xpath;

  $xml_skiers = $xpath->query($query);

  $holder = new Skier();

  foreach ($xml_skiers as $skier) {
    $holder->parse($skier);
  }
}

function parseLogs($xml) {
  $query = '//SkierLogs/Season';
  global $xpath;

  $data = $xpath->query($query);

  $holder = new Log();

  foreach ($data as $Season) {
    $season = $Season->getAttribute('fallYear');

    foreach ($Season->getElementsByTagName('Skiers') as $Skiers) {
      $club = $Skiers->getAttribute('clubId');

      foreach ($Skiers->getElementsByTagName('Skier') as $Skier) {
        $skier = $Skier->getAttribute('userName');

        foreach ($Skier->getElementsByTagName('Log') as $Log) {

          foreach ($Log->getElementsByTagName('Entry') as $Entry) {
            $date = $Entry->getElementsByTagName('Date')[0]->nodeValue;
            $area = $Entry->getElementsByTagName('Area')[0]->nodeValue;;
            $distance = $Entry->getElementsByTagName('Distance')[0]->nodeValue;

            $holder->parse($season, $club, $skier, $date, $area, $distance);
          }
        }
      }
    }
  }
}

function parseTotalDistance($xml) {
  $query = '//SkierLogs/Season';
  global $xpath;

  $data = $xpath->query($query);

  $holder = new TotalDistance();

  foreach ($data as $Season) {
    $season = $Season->getAttribute('fallYear');

    foreach ($Season->getElementsByTagName('Skiers') as $Skiers) {

      foreach ($Skiers->getElementsByTagName('Skier') as $Skier) {
        $skier = $Skier->getAttribute('userName');
        $total = 0;

        foreach ($Skier->getElementsByTagName('Log') as $Log) {

          foreach ($Log->getElementsByTagName('Entry') as $Entry) {
            $total += $Entry->Distance;
          }
        }
        $holder->parse($skier, $season, $total);
      }
    }
  }
}

// Calling all functions
parseLogs($xml);
parseCities($xml);
parseSkiers($xml);
parseSeasons($xml);
parseClubs($xml);
parseTotalDistance($xml);
