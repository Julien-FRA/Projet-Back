<?php
$nb_visites = file_get_contents('data/pagesvues.txt');
$nb_visites++;
file_put_contents('data/pagesvues.txt', $nb_visites);