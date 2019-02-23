<?php

function teams(){
    
    $teamsRequest = NEW ScantradTeams();
    $teamList = $teamsRequest->getListTeams();
    
    
    
    
    require 'views/teams.php';  
}