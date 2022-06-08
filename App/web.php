<?php
return [
    '/' => ['index', 'MainController'],
  
    'participants' => ['index', 'ParticipantController'],
    'store-participant-step-1' => ['storeStep1', 'ParticipantController'],
    'store-participant-step-2' => ['storeStep2', 'ParticipantController'],
    'isset-participant' => ['issetParticipant', 'ParticipantController'],
    'participant/(\d+)'=>['show','ParticipantController'],
    
    'test'=>['index','CountryController'],

    ];
