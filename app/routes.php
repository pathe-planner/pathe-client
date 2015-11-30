<?php

  use Pathe\Models\Day;
  use Pathe\Models\Theater;
  use Pathe\Models\Movie;

  $app->get("/getDays", function() {
    echo Day::all();
  });

  $app->get("/getTheaters", function() {
    echo Theater::all()->toJson();
  });

  $app->get("/getMovies/:theater/:date", function($theater, $date) use ($app) {
    echo Movie::getByTheaterAndDate($theater, $date, $app);
  });

  $app->post("/makePlanning", function() use ($app) {
    $data = json_decode($app->request->getBody());
    echo "Planning maken voor $data->date van theater ID $data->theaterId";
  });
