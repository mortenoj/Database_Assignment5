<?php

include_once("DBHandler.php");

class Club {
  public $id;
  public $name;
  public $city;

  public function parse($club) {
      $this->id = $club->getAttribute('id');
      $this->name = $club->getElementsByTagName('Name')[0]->nodeValue;
	    $this->city = $club->getElementsByTagName('City')[0]->nodeValue;

      $this->save();
    }

  private function save() {
    $dbi = Database::instance();

    $stm = $dbi->prepare('INSERT INTO Clubs (id, name, city) VALUES (:id, :name, :city)');
    $stm->execute([
      ':id' => $this->id,
      ':name' => $this->name,
      ':city' => $this->city
      ]);
  }
}

class City {
  public $cityname;
  public $county;

  public function parse($cities) {
    $this->cityname = $cities->getElementsByTagName('City')[0]->nodeValue;
    $this->county = $cities->getElementsByTagName('County')[0]->nodeValue;

    $this->save();
  }

  private function save() {
    $dbi = Database::instance();

    $stm = $dbi->prepare('INSERT INTO Cities (cityname, county) VALUES (:cityname, :county)');
    $stm->execute([
      ':cityname' => $this->cityname,
      ':county' => $this->county
      ]);
  }
}

class Log {
  public $season;
  public $club;
  public $skier;
  public $date;
  public $area;
  public $distance;

  public function parse($season, $club, $skier, $date, $area, $distance) {
	    $this->season = $season;
      $this->club = $club;
      $this->skier = $skier;
      $this->date = $date;
      $this->area = $area;
      $this->distance = $distance;

      $this->save();
    }

  private function save() {
    $dbi = Database::instance();

    $stm = $dbi->prepare('INSERT INTO Logs (season, club, skier, date, area, distance) VALUES (:season, :club, :skier, :date, :area, :distance)');
    $stm->execute([
      ':season' => $this->season,
      ':club' => $this->club,
      ':skier' => $this->skier,
      ':date' => $this->date,
      ':area' => $this->area,
      ':distance' => $this->distance
      ]);
  }
}

class Skier {
  public $username;
  public $firstname;
  public $lastname;
  public $birthyear;

  public function parse($skier) {
      $this->username = $skier->getAttribute('userName');
	    $this->firstname = $skier->getElementsByTagName('FirstName')[0]->nodeValue;
      $this->lastname = $skier->getElementsByTagName('LastName')[0]->nodeValue;
      $this->birthyear = $skier->getElementsByTagName('YearOfBirth')[0]->nodeValue;

      $this->save();
    }

  private function save() {
    $dbi = Database::instance();

    $stm = $dbi->prepare('INSERT INTO Skier (username, firstname, lastname, birthyear) VALUES (:username, :firstname, :lastname, :birthyear)');
    $stm->execute([
      ':username' => $this->username,
      ':firstname' => $this->firstname,
      ':lastname' => $this->lastname,
      ':birthyear' => $this->birthyear
      ]);
  }
}

class Season {
  public $year;

  public function parse($season) {
    $this->year = $season->getAttribute('fallYear');

    $this->save();
  }

  private function save() {
    $dbi = Database::instance();

    $stm = $dbi->prepare('INSERT INTO Season (year) VALUES (?)');
    $stm->execute([$this->year]);
  }
}

class TotalDistance {
  public $skier;
  public $season;
  public $distance;

  public function parse($skier, $season, $distance) {
    $this->skier = $skier;
    $this->season = $season;
    $this->distance = $distance;

    $this->save();
  }

  private function save() {
    $dbi = Database::instance();

    $stm = $dbi->prepare('INSERT INTO Totaldistance (skier, season, distance) VALUES (?, ?, ?)');
    $stm->execute([
      $this->skier,
      $this->season,
      $this->distance
      ]);
  }
}
