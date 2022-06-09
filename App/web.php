<?php
return [
    '/' => ['index', 'MainController'],
    'participants' => ['index', 'ParticipantController'],
    'store-participant' => ['store', 'ParticipantController'],
  
    'isset-participant' => ['issetParticipant', 'ParticipantController'],

    'participant/(\d+)' => ['show', 'ParticipantController'],
];
